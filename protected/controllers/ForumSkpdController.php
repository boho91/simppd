<?php

class ForumSkpdController extends Controller
{
	public $layout='//layouts/column2';

	/**
	* @return array action filters
	*/
	public function filters()
	{
	return array(
	'accessControl', // perform access control for CRUD operations
	);
	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules()
	{
	return array(
	array('allow',  // allow all users to perform 'index' and 'view' actions
	'actions'=>array('index','VerifikasiMusrenbang','VerifikasiRenja','history','undoRenja','undoMusrenbang'),
	'users'=>array('@'),
	),
	);
	}
	public function actionVerifikasiMusrenbang($id)
	{
		$model= KegiatanMusrenbang::model()->findByPk($id);
		if(isset($_POST['KegiatanMusrenbang']))
		{
			$model->attributes=$_POST['KegiatanMusrenbang'];
			$model->id = $id;
			if($model->save())
			{
				echo "sukses";
			}else 
			{
				echo "gagal";
			}
			exit();
		}
		$this->renderPartial('VerifikasiMusrenbang',array(
			'model'=>$model,
		));
	}
	public function actionHistory()
	{
		$modelRenja=new Renja('searchForumSKPDDitolak');

		$modelRenja->unsetAttributes();  // clear any default values
		if(Yii::app()->user->isAdminBappeda())
		{
			
		}else 
		{
			$model->skpd = $skpd;
		}
		if(isset($_GET['Renja']))
		$modelRenja->attributes=$_GET['Renja'];
		$modelRenja->tahun = Yii::app()->session['tahun_perencanaan'];
		
		$modelMusrenbang=new KegiatanMusrenbang('searchForumSKPDDitolak');
		$modelMusrenbang->unsetAttributes();  // clear any default values
		$modelMusrenbang->kd_skpd = $skpd;
		$modelMusrenbang->tahun = Yii::app()->session['tahun_perencanaan'];
		if(isset($_GET['KegiatanMusrenbang']))
			$modelMusrenbang->attributes=$_GET['KegiatanMusrenbang'];
	
		$this->renderPartial('history',array(
		'modelRenja'=>$modelRenja,
		'modelMusrenbang'=>$modelMusrenbang
		));
	}
	public function actionUndoRenja($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$modelRenja = Renja::model()->findByPk($id);
			$modelRenja->status_forum_skpd = "Terima";
			$modelRenja->keterangan_forum_skpd = "";
			$modelRenja->save();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			//if(!isset($_GET['ajax']))
				//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	public function actionUndoMusrenbang($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$modelMusrenbang = KegiatanMusrenbang::model()->findByPk($id);
			$modelMusrenbang->status_forum_skpd = "Terima";
			$modelMusrenbang->keterangan_forum_skpd = "";
			$modelMusrenbang->save();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			//if(!isset($_GET['ajax']))
				//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	public function actionVerifikasiRenja($id)
	{
		$model= Renja::model()->findByPk($id);
		if(isset($_POST['Renja']))
		{
			$model->attributes=$_POST['Renja'];
			$model->id = $id;
			if($model->save())
			{
				echo "sukses";
			}else 
			{
				print_r($model->getErrors());
				echo "gagal";
			}
			exit();
		}
		$this->renderPartial('VerifikasiRenja',array(
			'model'=>$model,
		));
	}
	public function actionIndex()
	{
		$modelRenja=new Renja('searchForumSKPD');

		$modelRenja->unsetAttributes();  // clear any default values
		
		
		$modelRenja->tahun = Yii::app()->session['tahun_perencanaan'];
		
		$modelMusrenbang=new KegiatanMusrenbang('searchForumSKPD');
		$modelMusrenbang->unsetAttributes();  // clear any default values
		$modelMusrenbang->kd_skpd = $skpd;
		$modelMusrenbang->tahun = Yii::app()->session['tahun_perencanaan'];
		
		if(Yii::app()->user->isAdminBappeda())
		{
			
		}else 
		{
			$modelRenja->skpd = $skpd;
			$modelMusrenbang->kd_skpd  = $skpd;
		}
		if(isset($_GET['Renja']))
			$modelRenja->attributes=$_GET['Renja'];
		if(isset($_GET['KegiatanMusrenbang']))
			$modelMusrenbang->attributes=$_GET['KegiatanMusrenbang'];
		$this->render('index',array(
			'modelRenja'=>$modelRenja,
			'modelMusrenbang'=>$modelMusrenbang
		));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}