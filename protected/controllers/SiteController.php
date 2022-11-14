<?php

class SiteController extends Controller {

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
        $criteria = new CDbCriteria();
        $count = News::model()->count($criteria);
        $pages = new CPagination($count);
        $left_bar = News::model()->findAll(array('order' => 'id', 'limit' => 6));
        // results per page
        $pages->pageSize = 6;
        $pages->applyLimit($criteria);
        $models = News::model()->findAll($criteria);

        $this->render('index', array(
            'models' => $models,
            'pages' => $pages,
            'left_bar' => $left_bar
        ));
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
                        "Content-Type: text/plain; charset=UTF-8";

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

    public function actionView($id) {
        $left_bar = News::model()->findAll(array('order' => 'id', 'limit' => 7));
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'left_bar' => $left_bar
        ));
    }

    public function actionCategorya($id) {
        $criteria = new CDbCriteria();
        $criteria->condition = 'ctgory_id = ' . $id;
        $count = News::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 8;
        $pages->applyLimit($criteria);
        $models = News::model()->findAll($criteria);
//        if ($model === null) {
//            throw new CHttpException(404, Yii::t("translation", "the_requested_page_does_not_exist"));
//        }
        $this->render('catgory', array(
            'models' => $models,
            'pages' => $pages));
    }

    public function actionSearch() {
        $keyword = Yii::app()->request->getPost('search');
        $criteria = new CDbCriteria;
        $criteria->condition = 'title LIKE :keyword';
        $criteria->params = array(':keyword' => '%' . $keyword . '%');
        $count = News::model()->count($criteria);
        $pages = new CPagination($count);
        $pages->pageSize = 4;
        $pages->applyLimit($criteria);
        $models = News::model()->findAll($criteria);
        $this->render('catgory', array(
            'models' => $models,
            'pages' => $pages));
    }

   

    public function loadModel($id) {
        $model = News::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t("translation", "the_requested_page_does_not_exist"));
        return $model;
    }



}
