<?php

class KegiatanSkpdController extends Controller
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
'actions'=>array('create','update','drowdown_kegiatan'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','modalForm','drowdown_program'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}
public function actiondrowdown_kegiatan()
{
	$criteria = new CDbCriteria();
	$criteria->condition = "program = '".$_POST['program']."' AND skpd='".$_POST['skpd']."'";
	$criteria->order = "kegiatan";
//	echo "kd_bidang = '".$_POST['kd_bidang']."' AND kd_urusan = '".$_POST['kd_urusan']."'";
	$data=KegiatanSkpd::model()->findAll($criteria);
	
 	echo "<option value=''>--Pilih Kegiatan--</option>";
	$data=CHtml::listData($data,'kegiatan','namaKegiatan');
	
	foreach($data as $value=>$nm_bidang)
	{
		echo CHtml::tag('option',
					   array('value'=>$value),CHtml::encode($nm_bidang),true);
	}
	//echo $_POST['kd_urusan'];
}
public function actiondrowdown_program()
{
	$criteria = new CDbCriteria();
	$criteria->condition = "skpd='".$_POST['skpd']."'";
	$criteria->order = "program";
//	echo "kd_bidang = '".$_POST['kd_bidang']."' AND kd_urusan = '".$_POST['kd_urusan']."'";
	$data=KegiatanSkpd::model()->findAll($criteria);
	
 	echo "<option value=''>--Pilih Program--</option>";
	$data=CHtml::listData($data,'program','nama_program');
	
	foreach($data as $value=>$nm_bidang)
	{
		echo CHtml::tag('option',
					   array('value'=>$value),CHtml::encode($nm_bidang),true);
	}
	//echo $_POST['kd_urusan'];
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
public function actionModalForm()
{
$model=new KegiatanSkpd;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
$model->tahun = Yii::app()->session['tahun_perencanaan'];
if(isset($_POST['kegiatan']))
{
	$model->attributes=$_POST['KegiatanSkpd'];
	foreach($_POST['kegiatan'] as $kegiatan)
	{
		$data_kegiatan = Kegiatan::model()->find(array('condition'=>'id="'.$kegiatan.'"'));
		$modelBaru = new KegiatanSkpd;
		$modelBaru->attributes=$_POST['KegiatanSkpd'];
		$modelBaru->kegiatan = $kegiatan;
		$modelBaru->program = $data_kegiatan->program;
		$modelBaru->save();
	}
	echo "sukses";
	exit();
	//$this->redirect(array('view','id'=>$model->id));
	//if($model->save())
		//
}

$this->renderPartial('create',array(
'model'=>$model,
));
}
public function actionCreate()
{
$model=new KegiatanSkpd;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['KegiatanSkpd']))
{
	$model->attributes=$_POST['KegiatanSkpd'];
	foreach($_POST['kegiatan'] as $kegiatan)
	{
		
		$modelBaru = new KegiatanSkpd;
		$modelBaru->attributes=$_POST['KegiatanSkpd'];
		$modelBaru->kegiatan = $kegiatan;
		
		$modelBaru->save();
	}
	$this->redirect(array('view','id'=>$model->id));
	//if($model->save())
		//
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

if(isset($_POST['KegiatanSkpd']))
{
$model->attributes=$_POST['KegiatanSkpd'];
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
$dataProvider=new CActiveDataProvider('KegiatanSkpd');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new KegiatanSkpd('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['KegiatanSkpd']))
$model->attributes=$_GET['KegiatanSkpd'];

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
$model=KegiatanSkpd::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='kegiatan-skpd-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
