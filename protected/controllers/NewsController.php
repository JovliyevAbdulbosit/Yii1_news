<?php

class NewsController extends Controller
{		
	public function filters()
	{
		return array(
			'accessControl',
			'postOnly + delete',
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('delete'),
				'users'=>array('*'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
	
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionCreate()
	{
		$model=new News;		

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
                        $model->imageFile=CUploadedFile::getInstance($model,'imageFile');
                        $model->image='upload_file/news/'.$model->imageFile->getName();
                        if($model->upload()&& $model->save()){
                            
                            
                            $this->redirect(array('view','id'=>$model->id));}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);		

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
                        $model->imageFile=CUploadedFile::getInstance($model,'imageFile');
                        $model->image='upload_file/news/'.$model->imageFile->getName();
			if($model->upload()&&$model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
	public function actionIndex()
	{
		$model=new News('search');
		$model->unsetAttributes();
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

		$this->render('index',array(
			'model'=>$model,
		));
	}
	
	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404, Yii::t("translation", "the_requested_page_does_not_exist"));
		return $model;
	}
	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
