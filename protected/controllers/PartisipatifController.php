<?php

class PartisipatifController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Partisipatif;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Partisipatif']))
		{
			$model->attributes=$_POST['Partisipatif'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Partisipatif']))
		{
			$model->attributes=$_POST['Partisipatif'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$modelMusrenbangKelurahan=new KegiatanMusrenbangKelurahan('searchForumSKPD');
		$modelMusrenbangKelurahan->unsetAttributes();  // clear any default values
		$modelMusrenbangKelurahan->kd_skpd = $skpd;
		$modelMusrenbangKelurahan->tahun = Yii::app()->session['tahun_perencanaan'];
		
		$modelMusrenbangKota=new KegiatanMusrenbangKota('searchForumSKPD');
		$modelMusrenbangKota->unsetAttributes();  // clear any default values
		$modelMusrenbangKota->kd_skpd = $skpd;
		$modelMusrenbangKota->tahun = Yii::app()->session['tahun_perencanaan'];
		
		$modelMusrenbang=new KegiatanMusrenbang('searchForumSKPD');
		$modelMusrenbang->unsetAttributes();  // clear any default values
		$modelMusrenbang->kd_skpd = $skpd;
		$modelMusrenbang->tahun = Yii::app()->session['tahun_perencanaan'];
		
		$modelMusrenbangRpjmd=new MusrenbangKegiatanRpjmd('searchForumSKPD');
		$modelMusrenbangRpjmd->unsetAttributes();  // clear any default values
		$modelMusrenbangRpjmd->skpd = $skpd;
		//$modelMusrenbangRpjmd->tahun = Yii::app()->session['tahun_perencanaan'];
		
		if(Yii::app()->user->isAdminBappeda())
		{
			
		}else 
		{
			$modelMusrenbangKelurahan->kd_skpd = $skpd;
			$modelMusrenbang->kd_skpd  = $skpd;
			$modelMusrenbangKota->kd_skpd  = $skpd;
			$modelMusrenbangRpjmd->skpd  = $skpd;
		}
		if(isset($_GET['KegiatanMusrenbangKelurahan']))
			$modelMusrenbangKelurahan->attributes=$_GET['KegiatanMusrenbangKelurahan'];
		if(isset($_GET['KegiatanMusrenbang']))
			$modelMusrenbang->attributes=$_GET['KegiatanMusrenbang'];
		if(isset($_GET['KegiatanMusrenbangKota']))
			$modelMusrenbang->attributes=$_GET['KegiatanMusrenbangKota'];
		if(isset($_GET['KegiatanMusrenbangRpjmd']))
			$modelMusrenbang->attributes=$_GET['KegiatanMusrenbangRpjmd'];
		$this->render('index',array(
			'modelMusrenbangKelurahan'=>$modelMusrenbangKelurahan,
			'modelMusrenbangKota'=>$modelMusrenbangKota,
			'modelMusrenbang'=>$modelMusrenbang,
			'modelMusrenbangRpjmd'=>$modelMusrenbangRpjmd
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Partisipatif('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Partisipatif']))
			$model->attributes=$_GET['Partisipatif'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Partisipatif the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Partisipatif::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Partisipatif $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='partisipatif-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
