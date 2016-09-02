<?php

class RealisasiFisikDanKeuanganDakDpaController extends Controller
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
'actions'=>array('create','update','GridUpdate','AdminUrusan','AdminBidang','evaluasiKegiatan','adminKegiatan','HistoryKegiatan'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','AdminSkpd','adminProgram','history','CreateKegiatan','Form2'),
'users'=>array('@'),
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
public function actionHistory($id,$jenis)
{
	
	$model=new RealisasiFisikDanKeuanganDakDpa('search');
	//$model->unsetAttributes();  // clear any default values
	//if(isset($_GET['RealisasiFisikDanKeuanganDauDpa']))
	//$model->attributes=$_GET['RealisasiFisikDanKeuanganDauDpa'];
	$model->id_dpa = $id;
	if($jenis=="dpa")
	{
		$model->is_perubahan=0;
	
	}elseif($jenis=="dpa_perubahan")
	{
		$model->is_perubahan=1;
	}
	//$model->jenis_dpa = $jenis;
	$this->renderPartial('admin',array(
		'model'=>$model,
		'jenis'=>$jenis
	),false,true);
}
/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate($id,$jenis)
{
	$model=new RealisasiFisikDanKeuanganDakDpa;

	//Uncomment the following line if AJAX validation is needed
	$this->performAjaxValidation($model);
	if($jenis=="dpa")
	{
		$model->is_perubahan=0;
		$data = Dpa::model()->findByPk($id);
	}elseif($jenis=="dpa_perubahan")
	{
		$model->is_perubahan=1;
		$data = DpaPerubahan::model()->findByPk($id);
	}
	$model->id_dpa = $id;
	$model->skpd = $data->skpd;
	$model->tahun = $data->tahun;
	$model->urusan= $data->urusan;
	$model->bidang= $data->bidang;
	$model->program= $data->program;
	$model->kegiatan= $data->kegiatan;
	$model->volume= $data->volume;
	$model->harga_satuan= $data->harga_satuan;
	if(isset($_POST['RealisasiFisikDanKeuanganDakDpa']))
	{
		$model->attributes=$_POST['RealisasiFisikDanKeuanganDakDpa'];
		if($model->save())
			$this->redirect(array('evaluasiKegiatan','skpd'=>$data->skpd,'urusan'=>$data->urusan,'bidang'=>$data->bidang,'program'=>$data->program,'kegiatan'=>$data->kegiatan,'tahun'=>$data->tahun));
	}

	$this->renderPartial('create',array(
		'model'=>$model,
		'jenis'=>$jenis
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

if(isset($_POST['RealisasiFisikDanKeuanganDakDpa']))
{
$model->attributes=$_POST['RealisasiFisikDanKeuanganDakDpa'];
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
$dataProvider=new CActiveDataProvider('RealisasiFisikDanKeuanganDakDpa');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new RealisasiFisikDanKeuanganDakDpa('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['RealisasiFisikDanKeuanganDakDpa']))
$model->attributes=$_GET['RealisasiFisikDanKeuanganDakDpa'];

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
$model=RealisasiFisikDanKeuanganDakDpa::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='realisasi-fisik-dan-keuangan-dak-dpa-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
public function actionAdminSkpd()
{
	
	$model= Uniondpa::model()->GroupPerCOnditionDak('skpd',Yii::app()->session['tahun_perencanaan']);
	//$data = Uniondpa::model()->findALl();
	
	//echo sizeof($data);
	if(!Yii::app()->user->isAdminBappeda())
	{
		//$model->skpd = Yii::app()->user->account->skpd;
	}
	//$model->tahun= Yii::app()->session['tahun_perencanaan'];
	//$model->unsetAttributes();  // clear any default values

	$this->render('adminSkpd',array(
		'model'=>$model,
	));
}
public function actionAdminUrusan($skpd)
{
	$model= Uniondpa::model()->GroupPerCOnditionDak('skpd,urusan',Yii::app()->session['tahun_perencanaan'],$skpd);
	$modelSkpd = Skpd::model()->findByPk($skpd);
	//$model=new Dpa('GroupPerCOndition');
	//$model->skpd = $skpd;
	//$model->urusan= $urusan;
	//$model->tahun= Yii::app()->session['tahun_perencanaan'];
	//$model->unsetAttributes();  // clear any default values

	$this->render('adminUrusan',array(
		'model'=>$model,
		'modelSkpd'=>$modelSkpd
	));
}
public function actionAdminBidang($skpd,$urusan)
{
	
	$model= Uniondpa::model()->GroupPerCOnditionDak('skpd,urusan,bidang',Yii::app()->session['tahun_perencanaan'],$skpd,$urusan);
	$modelUrusan = Urusan::model()->findByPk($urusan);
	$modelSkpd = Skpd::model()->findByPk($skpd);
	//$model=new Dpa('GroupPerCOndition');
	//$model->skpd = $skpd;
	///$model->urusan= $urusan;
	//$model->bidang= $bidang;
	//$model->tahun= Yii::app()->session['tahun_perencanaan'];

	$this->render('adminBidang',array(
		'model'=>$model,
		'modelSkpd'=>$modelSkpd,
		'modelUrusan'=>$modelUrusan,
	));
}
public function actionAdminProgram($skpd,$urusan,$bidang)
{
	$model= Uniondpa::model()->GroupPerCOnditionDak('skpd,urusan,bidang,program',Yii::app()->session['tahun_perencanaan'],$skpd,$urusan,$bidang);
	$modelBidang = Bidang::model()->findByPk($bidang);
	$modelSkpd = Skpd::model()->findByPk($skpd);
	//$model=new Dpa('GroupPerCOndition');
	//$model->skpd = $skpd;
	//$model->urusan= $urusan;
	//$model->bidang= $bidang;
	//$model->tahun= Yii::app()->session['tahun_perencanaan'];

	$this->render('adminProgram',array(
		'model'=>$model,
		'modelSkpd'=>$modelSkpd,
		'modelBidang'=>$modelBidang,
	));
}
public function actionAdminKegiatan($skpd,$urusan,$bidang,$program)
{
	$model= Uniondpa::model()->GroupPerCOnditionDak('skpd,urusan,bidang,program,kegiatan',Yii::app()->session['tahun_perencanaan'],$skpd,$urusan,$bidang,$program);
	$modelProgram = Program::model()->findByPk($program);
	$modelSkpd = Skpd::model()->findByPk($skpd);
	//$model=new Dpa('GroupPerCOndition');
	//$model->skpd = $skpd;
	//$model->urusan= $urusan;
	//$model->bidang= $bidang;
	//$model->program= $program;
	//$model->tahun= Yii::app()->session['tahun_perencanaan'];

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
	/*$model=new Dpa('GroupPerCOndition');
	$model->skpd = $skpd;
	$model->urusan= $urusan;
	$model->bidang= $bidang;
	$model->program= $program;
	$model->tahun = Yii::app()->session['tahun_perencanaan'];*/
	$criteria = new CDbCriteria;
	$criteria->condition = "skpd='".$skpd."' AND urusan='".$urusan."' AND bidang='".$bidang."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND tahun='".Yii::app()->session['tahun_perencanaan']."'";
	$modelKegiatan = Dpa::model()->find($criteria);
	/*if(RealisasiFisikDanKeuanganDauPerkegiatan::model()->isExistKegiatan($skpd,$urusan,$bidang,$program,$kegiatan,Yii::app()->session['tahun_perencanaan']))
	{
		//$modelEvaluasi = RealisasiFisikDanKeuanganDauPerkegiatan::model()->getByKegiatan($skpd,$urusan,$bidang,$program,$kegiatan,Yii::app()->session['tahun_perencanaan']);
	}else 
	{
		$modelEvaluasi = new RealisasiFisikDanKeuanganDauPerkegiatan;
		$modelEvaluasi->skpd = $skpd;
		$modelEvaluasi->urusan = $urusan;
		$modelEvaluasi->bidang = $bidang;
		$modelEvaluasi->program = $program;
		$modelEvaluasi->kegiatan = $kegiatan;
		$modelEvaluasi->tahun = Yii::app()->session['tahun_perencanaan'];
		$modelEvaluasi->save();
	}*/
	// kegiatan DPA
	$modelDpa=new Dpa('search');
	$modelDpa->unsetAttributes(); 
	$modelDpa->attributes=$_POST['Dpa'];
	$modelDpa->skpd = $skpd;
	$modelDpa->urusan= $urusan;
	$modelDpa->bidang= $bidang;
	$modelDpa->jenis_sumber_dana= "Dana Alokasi Khusus";
	$modelDpa->program= $program;
	$modelDpa->kegiatan= $kegiatan;
	$modelDpa->tahun = Yii::app()->session['tahun_perencanaan'];
	$criteria3 = new CDbCriteria;
	$criteria3->condition = "skpd = '".$modelDpa->skpd."' AND tahun='".$modelDpa->tahun."' AND kegiatan='".$modelDpa->kegiatan."' AND level='parent1'";
	//$dataDpa = Dpa::model()->find($criteria3);
	//$alokasiPaguRka = Rka::model()->getPaguPerKegiatan($modelDpa->skpd,$modelDpa->kegiatan,$modelDpa->program,$modelDpa->tahun);
	//$jumlahPaguDpa = Dpa::model()->getPaguPerKegiatan($modelDpa->skpd,$modelDpa->kegiatan,$modelDpa->program,$modelDpa->tahun);
	
	//kegiatan DPA Perubahan
	$modelDpaPerubahan=new DpaPerubahan('search');
	$modelDpaPerubahan->unsetAttributes(); 
	$modelDpaPerubahan->attributes=$_POST['DpaPerubahan'];
	$modelDpaPerubahan->skpd = $skpd;
	$modelDpaPerubahan->urusan= $urusan;
	$modelDpaPerubahan->bidang= $bidang;
	$modelDpaPerubahan->program= $program;
	$modelDpaPerubahan->kegiatan= $kegiatan;
	$modelDpaPerubahan->jenis_sumber_dana= "Dana Alokasi Khusus";
	$modelDpaPerubahan->tahun = Yii::app()->session['tahun_perencanaan'];
	$criteria3 = new CDbCriteria;
	//$criteria3->condition = "skpd = '".$modelDpaPerubahan->skpd."' AND tahun='".$modelDpaPerubahan->tahun."' AND kegiatan='".$modelDpaPerubahan->kegiatan."' AND level='parent1'";
	//$dataDpaPerubahan = DpaPerubahan::model()->find($criteria3);
	//$alokasiPaguRkaPerubahan = RkaPerubahan::model()->getPaguPerKegiatan($modelDpaPerubahan->skpd,$modelDpaPerubahan->kegiatan,$modelDpaPerubahan->program,$modelDpaPerubahan->tahun);
	//$jumlahPaguDpaPerubahan = DpaPerubahan::model()->getPaguPerKegiatan($modelDpaPerubahan->skpd,$modelDpaPerubahan->kegiatan,$modelDpaPerubahan->program,$modelDpaPerubahan->tahun);
	
	$this->render('evaluasiKegiatan',array(
		'model'=>$model,
		'modelSkpd'=>$modelSkpd,
		'modelProgram'=>$modelProgram,
		'modelKegiatan'=>$modelKegiatan,
		//'modelEvaluasi'=>$modelEvaluasi,
		'modelDpa'=>$modelDpa,
		//'jumlahPaguDpa'=>$jumlahPaguDpa,
		//'dataDpa'=>$dataDpa,
		'modelDpaPerubahan'=>$modelDpaPerubahan,
		//'jumlahPaguDpaPerubahan'=>$jumlahPaguDpaPerubahan,
		//'dataDpaPerubahan'=>$dataDpaPerubahan
	));
}
}
