<?php

class MusrenbangKegiatanRpjmdController extends Controller
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
				'actions'=>array('create','update','adminSkpd','gridUpdate','verifikasi'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','modalForm'),
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
	$model=new MusrenbangKegiatanRpjmd;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['MusrenbangKegiatanRpjmd']))
{
	$model->attributes=$_POST['MusrenbangKegiatanRpjmd'];
	$model->urusan = $model->kegiatan_->program_->bidang_->urusan_-id;
	$model->bidang = $model->kegiatan_->program_->bidang_->id;
	if($model->save())
		$this->redirect(array('admin','skpd'=>$model->skpd));
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

		if(isset($_POST['MusrenbangKegiatanRpjmd']))
		{
			$model->attributes=$_POST['MusrenbangKegiatanRpjmd'];
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
		$dataProvider=new CActiveDataProvider('MusrenbangKegiatanRpjmd');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($skpd="")
	{
	$model=new MusrenbangKegiatanRpjmd('search');
	$model->unsetAttributes();  // clear any default values
	$model->skpd = $skpd;
	if(isset($_GET['MusrenbangKegiatanRpjmd']))
		$model->attributes=$_GET['MusrenbangKegiatanRpjmd'];

		$this->render('admin',array(
		'model'=>$model,
		));
	}
	
	public function actionVerifikasi($id)
	{
		$model= $this->loadModel($id);
		if(isset($_POST['MusrenbangKegiatanRpjmd']))
		{
			$model->attributes=$_POST['MusrenbangKegiatanRpjmd'];
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
		$this->renderPartial('verifikasi',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return MusrenbangKegiatanRpjmd the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=MusrenbangKegiatanRpjmd::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionAdminSkpd()
{
	if(!Yii::app()->user->isAdminBappeda())
	{
		$this->redirect(array("admin"));
	}
	$model=new KegiatanRpjmd('searchPerSKpd');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['MusrenbangKegiatanRpjmd']))
		$model->attributes=$_GET['MusrenbangKegiatanRpjmd'];

	$this->render('adminSkpd',array(
		'model'=>$model,
	));
}

public function actionModalForm($skpd="")
{
	$model=new MusrenbangKegiatanRpjmd;
	if(Yii::app()->user->isAdminBappeda())
	{
		
	}else{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$model->skpd = $skpd;
	$model->id_rpjmd = Yii::app()->session['id_rpjmd'];
	$this->renderPartial('formAwal',array(
	'model'=>$model,
	));
}

	/**
	 * Performs the AJAX validation.
	 * @param MusrenbangKegiatanRpjmd $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='musrenbangkegiatanrpjmd-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionGridUpdate()
{
	if(isset($_POST['pk']))
	{
		if($_POST['name']=="dana_tahun1" or $_POST['name']=='dana_tahun2' or $_POST['name']=='dana_tahun3' or $_POST['name']=='dana_tahun4' or $_POST['name']=='dana_tahun5')
		{
			$_POST['value'] = str_replace( ',', '', $_POST['value'] );
			$_POST['value'] = str_replace( '.', '', $_POST['value'] );
			$_POST['value'] = str_replace( 'Rp', '', $_POST['value'] );
			$_POST['value'] = str_replace( 'rp', '', $_POST['value'] );
			$_POST['value'] = str_replace( ' ', '', $_POST['value'] );
		}
		
		Yii::import('booster.components.TbEditableSaver');
		$es = new TbEditableSaver('MusrenbangKegiatanRpjmd');
		$es->update();
		if($_POST['name']=="dana_tahun1" or $_POST['name']=='dana_tahun2' or $_POST['name']=='dana_tahun3' or $_POST['name']=='dana_tahun4' or $_POST['name']=='dana_tahun5')
		{
			$model = KegiatanRpjmd::model()->findByPk($_POST['pk']);
			$sql  = 'UPDATE musrenbang_kegiatan_rpjmd SET dana_akhir="'.($model->dana_tahun1+$model->dana_tahun2+$model->dana_tahun3+$model->dana_tahun4+$model->dana_tahun5).'" WHERE id="'.$model->id.'"';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();
		}
		if($_POST['name']=="target_tahun1" or $_POST['name']=='target_tahun2' or $_POST['name']=='target_tahun3' or $_POST['name']=='target_tahun4' or $_POST['name']=="target_tahun5" )
		{
			$model = KegiatanRpjmd::model()->findByPk($_POST['pk']);
			$sql  = 'UPDATE musrenbang_kegiatan_rpjmd SET target_akhir="'.($model->target_tahun1+$model->target_tahun2+$model->target_tahun3+$model->target_tahun4+$model->target_tahun5).'" WHERE id="'.$model->id.'"';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();
		}
	}
}
}
