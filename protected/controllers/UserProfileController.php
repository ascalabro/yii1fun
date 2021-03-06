<?php

class UserProfileController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view','GetGitHubRepos'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update','addGitHub'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
		$model = $this->loadModel($id);
        $response = file_get_contents("http://api.southeast.club/index.php?r=user/getgithubrepos&id=" . $_GET['id']);
		$repos = json_decode($response);
        $this->render('view', array(
            'model' => $model,
            'repos' => $repos
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
//	public function actionCreate()
//	{
//		$model=new UserProfile;
//
//		// Uncomment the following line if AJAX validation is needed
//		// $this->performAjaxValidation($model);
//
//		if(isset($_POST['UserProfile']))
//		{
//			$model->attributes=$_POST['UserProfile'];
//			if($model->save())
//				$this->redirect(array('view','id'=>$model->ProfileID));
//		}
//
//		$this->render('create',array(
//			'model'=>$model,
//		));
//	}

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['UserProfile'])) {
            $model->attributes = $_POST['UserProfile'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->user->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
//	public function actionDelete($id)
//	{
//		$this->loadModel($id)->delete();
//
//		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//		if(!isset($_GET['ajax']))
//			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
//	}

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('UserProfile');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new UserProfile('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['UserProfile']))
            $model->attributes = $_GET['UserProfile'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return UserProfile the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = UserProfile::model()->findByPk($id); // PK is UserID
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param UserProfile $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-profile-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /*public function actionAddGitHub() {
        $model = $this->loadModel(Yii::app()->user->id);
        $gha = new GitHubAccount();
        if (Yii::app()->request->isPostRequest) {
            $gha->attributes = $_POST['GitHubAccount'];
            if ($gha->validate()) {
                $gha->setIsNewRecord(false);
                $gha->save();
                $this->redirect(array('view','id'=>'1'));
            } else {
                $this->render('createGitHubAccount',array(
                'model'=>$model,
                    'gha'=>$gha
                ));
            }
            
        } else {
            $this->render('createGitHubAccount',array(
                'model'=>$model,
                    'gha'=>$gha
            ));
        }
    }*/

}
