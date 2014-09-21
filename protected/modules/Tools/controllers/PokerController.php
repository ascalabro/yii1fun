<?php

class PokerController extends Controller {

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'statkingImport', 'statkingDatabase'),
                'users' => array('@')
            ),
            array('deny')
        );
    }

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function actionIndex() {
        $this->setPageTitle("Poker Tools");
        $this->render('index');
    }

    public function actionStatkingImport() {
        $model = new StatkingImportForm();
        if (isset($_POST['StatkingImportForm'])) {
            $model->attributes = $_POST['StatkingImportForm'];
            $model->dbaFile = CUploadedFile::getInstance($model, 'dbaFile');
            if ($model->validate()) {
                $rows = array_map('str_getcsv', file($model->dbaFile->getTempName()));
                if (StatkingSession::model()->exists('user_id = :user_id', array(":user_id" => Yii::app()->user->id))) {
                    $model->deleteUserOldSessions();
                    // replace old data with new database import data
                }
                foreach ($rows as $x => $row) {
                    $session = new StatkingSession();
                    $session->user_id = Yii::app()->user->id;
                    $session->date = date('Y-m-d', strtotime($row[0]));
                    $session->location = $row[1];
                    $session->game = $row[2];
                    $session->session_length = $row[3];
                    $session->profit_loss = $row[4];
                    $session->comments = $row[5];
                    $session->save();
                }
                // redirect user to where the data will be displayed on a graph
                $this->redirect('statkingDatabase');
            }
        }
        $this->setPageTitle("Statking Database Import");
        $this->render('statkingimport', array(
            'model' => $model
        ));
    }

    public function actionStatkingDatabase() {
        $data = StatkingSession::getAllSessionsByMonth();
        if (empty($data)) {
            $this->redirect("statkingimport");
        }
        $sessions[0] = 0;
        $months = array();
        $max = 0;
        foreach ($data as $x => $session) {
            $months[] = $session['Year'] . "-" . $session['Month'];
            $sessions[] = $sessions[$x] + $session['Profit_Loss'];
            if ($session['Profit_Loss'] > $max) {
                $max = $session['Profit_Loss'];
            }
        }
        $max = (int) $max * 1.5;
        $this->setPageTitle("Statking Database View");
        $this->render('statking', array(
            "max" => $max,
            "sessions" => $sessions,
            "months" => $months
        ));
    }

}
