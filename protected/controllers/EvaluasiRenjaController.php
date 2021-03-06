<?php

class EvaluasiRenjaController extends Controller
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
'actions'=>array('create','update','GridUpdate','AdminUrusan','AdminBidang','adminKegiatan','EvaluasiKegiatan'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','ModalForm','adminCreate','AdminSkpd','adminProgram','getKesesuaian'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}
public function actionGetKesesuaian()
{
    $model = new EvaluasiRenja;
    $data = $model->getDataKesesuaian();
    echo json_encode($data);
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
$model=new EvaluasiRenja;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['EvaluasiRenja']))
{
$model->attributes=$_POST['EvaluasiRenja'];
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

if(isset($_POST['EvaluasiRenja']))
{
$model->attributes=$_POST['EvaluasiRenja'];
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
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('EvaluasiRenja');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
	$this->redirect(array('adminSkpd'));
$model=new EvaluasiRenja('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['EvaluasiRenja']))
$model->attributes=$_GET['EvaluasiRenja'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=EvaluasiRenja::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='evaluasi-renja-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
public function actionAdminSkpd()
{
	
	$model=new Renja('GroupPerCOndition');
	if(!Yii::app()->user->isAdminBappeda())
	{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$model->tahun= Yii::app()->session['tahun_perencanaan'];
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['Renja']))
		$model->attributes=$_GET['Renja'];

	$this->render('adminSkpd',array(
		'model'=>$model,
	));
}
public function actionAdminUrusan($skpd)
{
	if(!Yii::app()->user->isAdminBappeda())
	{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$modelSkpd = Skpd::model()->findByPk($skpd);
	$model=new Renja('GroupPerCOndition');
	$model->skpd = $skpd;
	//$model->urusan= $urusan;
	$model->tahun= Yii::app()->session['tahun_perencanaan'];
	//$model->unsetAttributes();  // clear any default values
	if(isset($_GET['Renja']))
		$model->attributes=$_GET['Renja'];

	$this->render('adminUrusan',array(
		'model'=>$model,
		'modelSkpd'=>$modelSkpd
	));
}
public function actionAdminBidang($skpd,$urusan)
{
	if(!Yii::app()->user->isAdminBappeda())
	{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$modelUrusan = Urusan::model()->findByPk($urusan);
	$modelSkpd = Skpd::model()->findByPk($skpd);
	$model=new Renja('GroupPerCOndition');
	$model->skpd = $skpd;
	$model->urusan= $urusan;
	//$model->bidang= $bidang;
	$model->tahun= Yii::app()->session['tahun_perencanaan'];

	$this->render('adminBidang',array(
		'model'=>$model,
		'modelSkpd'=>$modelSkpd,
		'modelUrusan'=>$modelUrusan,
	));
}
public function actionAdminProgram($skpd,$urusan,$bidang)
{
	if(!Yii::app()->user->isAdminBappeda())
	{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$modelBidang = Bidang::model()->findByPk($bidang);
	$modelSkpd = Skpd::model()->findByPk($skpd);
	$model=new Renja('GroupPerCOndition');
	$model->skpd = $skpd;
	$model->urusan= $urusan;
	$model->bidang= $bidang;
	$model->tahun= Yii::app()->session['tahun_perencanaan'];

	$this->render('adminProgram',array(
		'model'=>$model,
		'modelSkpd'=>$modelSkpd,
		'modelBidang'=>$modelBidang,
	));
}
public function actionAdminKegiatan($skpd,$urusan,$bidang,$program)
{
	if(!Yii::app()->user->isAdminBappeda())
	{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$modelProgram = Program::model()->findByPk($program);
	$modelSkpd = Skpd::model()->findByPk($skpd);
	$model=new Renja('GroupPerCOnditionWithRka');
	$model->skpd = $skpd;
	$model->urusan= $urusan;
	$model->bidang= $bidang;
	$model->program= $program;
	$model->tahun= Yii::app()->session['tahun_perencanaan'];

	$this->render('adminKegiatan',array(
		'model'=>$model,
		'modelSkpd'=>$modelSkpd,
		'modelProgram'=>$modelProgram,
	));
}
public function actionEvaluasiKegiatan($skpd,$urusan,$bidang,$program,$kegiatan)
{
	if(!Yii::app()->user->isAdminBappeda())
	{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$modelProgram = Program::model()->findByPk($program);
	$modelSkpd = Skpd::model()->findByPk($skpd);
	$model=new Renja('GroupPerCOnditionWithRka');
	$model->skpd = $skpd;
	$model->urusan= $urusan;
	$model->bidang= $bidang;
	$model->program= $program;
	$model->tahun= Yii::app()->session['tahun_perencanaan'];
	
	$criteria = new CDbCriteria;
	$criteria->condition = "skpd='".$skpd."' AND urusan='".$urusan."' AND bidang='".$bidang."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND tahun='".Yii::app()->session['tahun_perencanaan']."'";
	$modelKegiatan = Renja::model()->find($criteria);
	
	if(EvaluasiRenja::model()->isExistKegiatan($skpd,$urusan,$bidang,$program,$kegiatan,Yii::app()->session['tahun_perencanaan']))
	{
		$modelEvaluasi = EvaluasiRenja::model()->getByKegiatan($skpd,$urusan,$bidang,$program,$kegiatan,Yii::app()->session['tahun_perencanaan']);
	}else 
	{
		$modelEvaluasi = new EvaluasiRenja;
		$modelEvaluasi->skpd = $skpd;
		$modelEvaluasi->urusan = $urusan;
		$modelEvaluasi->bidang = $bidang;
		$modelEvaluasi->program = $program;
		$modelEvaluasi->kegiatan = $kegiatan;
		$modelEvaluasi->tahun = Yii::app()->session['tahun_perencanaan'];
		$modelEvaluasi->save();
	}
	
	$this->render('evaluasiKegiatan',array(
		'model'=>$model,
		'modelSkpd'=>$modelSkpd,
		'modelProgram'=>$modelProgram,
		'modelKegiatan'=>$modelKegiatan,
		'modelEvaluasi'=>$modelEvaluasi
	));
}
public function actionGridUpdate()
{
	if(isset($_POST['pk']))
	{
		
		Yii::import('booster.components.TbEditableSaver');
		$es = new TbEditableSaver('EvaluasiRenja');
		$es->update();
		
	}
}
}
