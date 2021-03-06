<?php

class SiteController extends Controller {

    public $layout = '//layouts/column2';
    
    const AJAX_FETCH_ERROR_MESSAGE_TRY_AGAIN = "Error retreiving data. Try again.";

    public function accessRules() {
        return array('allow',
            'actions' => array('loadMp3Playlist'),
            'users' => array('ascalabro'));
    }
    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->layout = '//layouts/main';
        $carouselItems = $this->getCarouselItems();
        $feedxml = simplexml_load_file("https://news.google.com/news/feeds?output=rss&q=" . Yii::app()->params['newsKeywords']);
        $this->render('index',array('data'=>$feedxml,'carouselItems'=>$carouselItems));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionLoadMp3Playlist() {
        $files = CFileHelper::findFiles(Yii::app()->params['mp3filespath'] . '/' . Yii::app()->user->name);
        shuffle($files);
        foreach ($files as &$file) {
                   $pathParts = explode("/", $file);
            if (count($pathParts) == 7) {
                $file = $pathParts[5] . '/' . basename($file);
            } elseif (count($pathParts) == 8) {
                $file = $pathParts[5] . '/' . $pathParts[6] . '/' . basename($file);
            } elseif (count($pathParts) == 9) {
                $file = $pathParts[5] . '/' . $pathParts[6] . '/' . $pathParts[7] . '/' . basename($file);
            } else {
                $file = basename($file);
            }
        }
        echo json_encode($files);
    }

    public function actionRenderRefreshNewsFeed() { 
        $term = Yii::app()->request->getParam("term") ? Yii::app()->request->getParam("term") : Yii::app()->params['newsKeywords'];
        try {
            $data = GoogleNewsFeed::fetchRssFeed($term);
        } catch (Exception $exc) {
            $data = new CException(self::AJAX_FETCH_ERROR_MESSAGE_TRY_AGAIN);
        }
        return $this->renderPartial("_newsFeed", compact('term', 'data'));
    }

    public function getCarouselItems() {
        $carouselImages = NasaImageFeed::getCarouselImageUrls();
        $items = array();
        foreach($carouselImages as $i => $imageUrl) {
            $items[] = array('image'=>$imageUrl, 'label'=>'NASA images');
        }
        return $items;
    }
}
