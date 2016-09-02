<?php

class EvaluasiRkpdController extends Controller
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
'actions'=>array('index','view','adminKegiatan'),
'users'=>array('@'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update','GridUpdate','AdminUrusan','AdminBidang','evaluasiKegiatan','laporanExcel','rekapitulasiPdf'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','ModalForm','adminCreate','AdminSkpd','adminProgram','laporanPdf'),
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
	$model=new TempEvaluasiRkpd('search');
	$model->unsetAttributes();  // clear any default values
	$model->skpd=$skpd;
	$model->kegiatan=$kegiatan;
	$model->program = $program;
	
	if(isset($_POST['TempEvaluasiRkpd']))
	{
		$modelSave = new TempEvaluasiRkpd;
		$modelSave->attributes=$_POST['TempEvaluasiRkpd'];
		$modelSave->urusan = $modelSave->kegiatan_->program_->bidang_->urusan_-id;
		$modelSave->bidang = $modelSave->kegiatan_->program_->bidang_->id;
		$rpjmd = KegiatanRpjmd::model()->getBySkpdKegiatan($modelSave->skpd,$modelSave->kegiatan,$modelSave->program,Yii::app()->session['id_rpjmd']);
		$renja = Renja::model()->getBySkpdKegiatan($modelSave->skpd,$modelSave->kegiatan,$modelSave->program,Yii::app()->session['tahun_perencanaan']);
		if(sizeof($rpjmd)>0 && sizeof($renja>0))
		{
			$modelSave->save();
			$this->redirect(array('adminCreate','skpd'=>$modelSave->skpd,'kegiatan'=>$modelSave->kegiatan,'program'=>$modelSave->program));
		}
		
		$model->attributes=$_POST['TempEvaluasiRkpd'];
		//$this->redirect(array('view','id'=>$model->id));
	}

	$this->render('adminCreate',array(
		'model'=>$model,
		'renja'=>$renja,
		'rpjmd'=>$rpjmd
	));
}
public function actionAdminCreate($skpd,$kegiatan,$program)
{
	$model=new TempEvaluasiRkpd('search');
	$model->unsetAttributes();  // clear any default values
	$model->skpd=$skpd;
	$model->kegiatan=$kegiatan;
	$model->program = $program;
	$rpjmd = KegiatanRpjmd::model()->getBySkpdKegiatan($model->skpd,$model->kegiatan,$model->program,Yii::app()->session['id_rpjmd']);
	$renja = Renja::model()->getBySkpdKegiatan($model->skpd,$model->kegiatan,$model->program,Yii::app()->session['tahun_perencanaan']);
	
	/*if(isset($_POST['TempEvaluasiRkpd']))
	{
		$modelSave = new TempEvaluasiRkpd;
		$modelSave->attributes=$_POST['TempEvaluasiRkpd'];
		$modelSave->urusan = $modelSave->kegiatan_->program_->bidang_->urusan_-id;
		$modelSave->bidang = $modelSave->kegiatan_->program_->bidang_->id;
		
		if(sizeof($rpjmd)>0 && sizeof($renja>0))
		{
			$modelSave->save();
			$this->redirect(array('create','skpd'=>$modelSave->skpd,'kegiatan'=>$modelSave->kegiatan,'program'=>$modelSave->program));
		}
		
		$model->attributes=$_POST['TempEvaluasiRkpd'];
		//$this->redirect(array('view','id'=>$model->id));
	}*/
	$this->render('adminCreate',array(
		'model'=>$model,
		'renja'=>$renja,
		'rpjmd'=>$rpjmd
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

if(isset($_POST['EvaluasiRkpd']))
{
$model->attributes=$_POST['EvaluasiRkpd'];
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
$dataProvider=new CActiveDataProvider('EvaluasiRkpd');
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
$model=new EvaluasiRkpd('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['EvaluasiRkpd']))
$model->attributes=$_GET['EvaluasiRkpd'];

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
$model=EvaluasiRkpd::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='evaluasi-rkpd-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
public function actionModalForm($skpd="")
{
	$model=new TempEvaluasiRkpd;
	if(Yii::app()->user->isAdminBappeda())
	{
		
	}else{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$model->skpd = $skpd;
	$model->tahun_anggaran = Yii::app()->session['tahun_perencanaan'];
	$this->renderPartial('formAwal',array(
	'model'=>$model,
	));
}
public function actionGridUpdate()
{
	if(isset($_POST['pk']))
	{
		if($_POST['name']=="target_rpjmd_rp" or $_POST['name']=='realisasi_capaian_kinerja_rpjmd1_rp' or $_POST['name']=='target_kinerja_rkpd_rp' or $_POST['name']=='realisasi_kinerja_triwulan_1_rp' or $_POST['name']=='realisasi_kinerja_triwulan_2_rp' or $_POST['name']=='realisasi_kinerja_triwulan_3_rp' or $_POST['name']=='realisasi_kinerja_triwulan_4_rp' or $_POST['name']=='realisasi_capaian_kinerja_rkpd_rp' or $_POST['name']=='realisasi_capaian_kinerja_rpjmd_rp' or $_POST['name']=='target_capaian_kinerja_dan_realisasi_rpjmd_rp')
		{
			$_POST['value'] = str_replace( ',', '', $_POST['value'] );
			$_POST['value'] = str_replace( '.', '', $_POST['value'] );
			$_POST['value'] = str_replace( 'Rp', '', $_POST['value'] );
			$_POST['value'] = str_replace( 'rp', '', $_POST['value'] );
			$_POST['value'] = str_replace( ' ', '', $_POST['value'] );
			
			
		}
		
		Yii::import('booster.components.TbEditableSaver');
		$es = new TbEditableSaver('EvaluasiRkpd');
		$es->update();
		if($_POST['name']=="target_rpjmd_rp" or $_POST['name']=='realisasi_capaian_kinerja_rpjmd1_rp' or $_POST['name']=='target_kinerja_rkpd_rp' or $_POST['name']=='realisasi_kinerja_triwulan_1_rp' or $_POST['name']=='realisasi_kinerja_triwulan_2_rp' or $_POST['name']=='realisasi_kinerja_triwulan_3_rp' or $_POST['name']=='realisasi_kinerja_triwulan_4_rp' or $_POST['name']=='realisasi_capaian_kinerja_rkpd_rp' or $_POST['name']=='realisasi_capaian_kinerja_rpjmd_rp' or $_POST['name']=='target_capaian_kinerja_dan_realisasi_rpjmd_rp')
		{
			$model = EvaluasiRkpd::model()->findByPk($_POST['pk']);
			$sql  = 'UPDATE evaluasi_rkpd SET realisasi_capaian_kinerja_rkpd_rp="'.($model->realisasi_kinerja_triwulan_1_rp+$model->realisasi_kinerja_triwulan_2_rp+$model->realisasi_kinerja_triwulan_3_rp+$model->realisasi_kinerja_triwulan_4_rp).'" WHERE id="'.$model->id.'"';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();
		}
		if($_POST['name']=="realisasi_kinerja_triwulan_1_k" or $_POST['name']=='realisasi_kinerja_triwulan_2_k' or $_POST['name']=='realisasi_kinerja_triwulan_3_k' or $_POST['name']=='realisasi_kinerja_triwulan_4_k' )
		{
			$model = EvaluasiRkpd::model()->findByPk($_POST['pk']);
			$sql  = 'UPDATE evaluasi_rkpd SET realisasi_capaian_kinerja_rkpd_k="'.($model->realisasi_kinerja_triwulan_1_k+$model->realisasi_kinerja_triwulan_2_k+$model->realisasi_kinerja_triwulan_3_k+$model->realisasi_kinerja_triwulan_4_k).'" WHERE id="'.$model->id.'"';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();
		}
		
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
	//$model->unsetAttributes();  // clear any default values
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
	$model=new Renja('GroupPerCOndition');
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
	$model=new Renja('GroupPerCOndition');
	$model->skpd = $skpd;
	$model->urusan= $urusan;
	$model->bidang= $bidang;
	$model->program= $program;
	$model->tahun= Yii::app()->session['tahun_perencanaan'];
	$criteria = new CDbCriteria;
	$criteria->condition = "skpd='".$skpd."' AND urusan='".$urusan."' AND bidang='".$bidang."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND tahun='".Yii::app()->session['tahun_perencanaan']."'";
	$modelKegiatan = Renja::model()->find($criteria);
	if(EvaluasiRkpd::model()->isExistKegiatan($skpd,$urusan,$bidang,$program,$kegiatan,Yii::app()->session['tahun_perencanaan']))
	{
		$modelEvaluasi = EvaluasiRkpd::model()->getByKegiatan($skpd,$urusan,$bidang,$program,$kegiatan,Yii::app()->session['tahun_perencanaan']);
	}else 
	{
		$modelEvaluasi = new EvaluasiRkpd;
		$modelEvaluasi->skpd = $skpd;
		$modelEvaluasi->urusan = $urusan;
		$modelEvaluasi->bidang = $bidang;
		$modelEvaluasi->program = $program;
		$modelEvaluasi->kegiatan = $kegiatan;
		$modelEvaluasi->tahun_anggaran = Yii::app()->session['tahun_perencanaan'];
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
public function actionlaporanPdf()
{
	error_reporting(0);
	$model=new EvaluasiRkpd;
	if(isset($_POST['EvaluasiRkpd']))
	{
		$model->attributes=$_POST['EvaluasiRkpd'];
		$criteria = new CDbCriteria();
		$criteria->select = "t.*,SUM(target_rpjmd_rp) AS target_rpjmd_rp,SUM(realisasi_capaian_kinerja_rpjmd1_rp) as realisasi_capaian_kinerja_rpjmd1_rp,SUM(target_kinerja_rkpd_rp) AS target_kinerja_rkpd_rp,SUM(realisasi_kinerja_triwulan_1_rp) as realisasi_kinerja_triwulan_1_rp,SUM(realisasi_kinerja_triwulan_2_rp) AS realisasi_kinerja_triwulan_2_rp,SUM(realisasi_kinerja_triwulan_3_rp) AS realisasi_kinerja_triwulan_3_rp,SUM(realisasi_kinerja_triwulan_4_rp) AS realisasi_kinerja_triwulan_4_rp,SUM(realisasi_capaian_kinerja_rkpd_rp) AS realisasi_capaian_kinerja_rkpd_rp,SUM(realisasi_capaian_kinerja_rpjmd_rp) AS realisasi_capaian_kinerja_rpjmd_rp,SUM(target_capaian_kinerja_dan_realisasi_rpjmd_rp) AS target_capaian_kinerja_dan_realisasi_rpjmd_rp";
		if(!Yii::app()->user->isAdminBappeda())
		{
			$criteria->condition = " tahun_anggaran = '".$model->tahun_anggaran."'  AND skpd = '".Yii::app()->user->account->skpd."'";
		}else 
		{
			$criteria->condition = " tahun_anggaran = '".$model->tahun_anggaran."'  AND skpd = '".$model->skpd."'";
		}
		$criteria->group = "program";
		$data = EvaluasiRkpd::model()->findAll($criteria);
		$skpd = Skpd::model()->findByPk($model->skpd);
		$jenis_file= $model->jenis_file;
		//new HTML2PDF('L', 'legal', 'en', true, 'UTF-8', array('12','2','12','15'));
		
		$mpdf = Yii::app()->ePdf->mpdf();
		//$mpdf->SetDisplayMode('fullpage');
		//$html2pdf->orientation = "landscape";
		//$this->renderPartial('laporan_pdf',array('model'=>$model));
		$mpdf->AddPage('L');
		$mpdf->WriteHTML($this->renderPartial('laporan_print',array('model'=>$data,'skpd'=>$skpd,'jenis_file'=>$jenis_file), true));
		
        $mpdf->Output("evaluasi_rkpd.pdf","I"); // OUTPUT_TO_BROWSER
		
	}
	$this->render('formLaporan',array(
		'model'=>$model,
	));
}
public function actionrekapitulasiPdf()
{
	error_reporting(0);
	$model=new EvaluasiRkpd;
	if(isset($_POST['EvaluasiRkpd']))
	{
		$model->attributes=$_POST['EvaluasiRkpd'];
		$criteria = new CDbCriteria();
		$criteria->select = "skpd,SUM(target_kinerja_rkpd_rp) as target_anggaran,tahun_anggaran,SUM(target_kinerja_rkpd_k) AS target_kinerja,SUM(realisasi_capaian_kinerja_rkpd_k) AS realisasi_capaian_kinerja_rkpd_k,SUM(realisasi_capaian_kinerja_rkpd_rp) as realisasi_capaian_kinerja_rkpd_rp,AVG((realisasi_capaian_kinerja_rkpd_rp/target_kinerja_rkpd_k)*100) as realisasi_capaian_kinerja_rkpd_k,AVG((realisasi_capaian_kinerja_rkpd_k/target_kinerja_rkpd_rp)*100) as realisasi_keuan";
		if(!Yii::app()->user->isAdminBappeda())
		{
			$criteria->condition = "tahun_anggaran = '".$model->tahun_anggaran."' AND skpd = '".Yii::app()->user->account->skpd."'";
		}else 
		{
			$criteria->condition = "tahun_anggaran = '".$model->tahun_anggaran."'";
		}
		$criteria->group = "skpd";
		$data = EvaluasiRkpd::model()->findAll($criteria);
		$mpdf = Yii::app()->ePdf->mpdf();
		//$mpdf->SetDisplayMode('fullpage');
		//$html2pdf->orientation = "landscape";
		//$this->renderPartial('laporan_pdf',array('model'=>$model));
		$mpdf->AddPage('L');
		//$mpdf->WriteHTML($this->renderPartial('laporan_print_rekapitulasi',array('model'=>$data,'skpd'=>$skpd,'jenis_file'=>$jenis_file), true));
		
       // $mpdf->Output("laporan_print_rekapitulasi.pdf","I"); // OUTPUT_TO_BROWSER
		
	}
	$this->render('formLaporanRekapitulasi',array(
		'model'=>$model,
	));
}
public function actionlaporanExcel()
{
	error_reporting(1);
	$model=new EvaluasiRkpd;
	if(isset($_POST['EvaluasiRkpd']))
	{
		$model->attributes=$_POST['EvaluasiRkpd'];
		$criteria = new CDbCriteria();
		$criteria->select = "t.*,SUM(target_rpjmd_rp) AS target_rpjmd_rp,SUM(realisasi_capaian_kinerja_rpjmd1_rp) as realisasi_capaian_kinerja_rpjmd1_rp,SUM(target_kinerja_rkpd_rp) AS target_kinerja_rkpd_rp,SUM(realisasi_kinerja_triwulan_1_rp) as realisasi_kinerja_triwulan_1_rp,SUM(realisasi_kinerja_triwulan_2_rp) AS realisasi_kinerja_triwulan_2_rp,SUM(realisasi_kinerja_triwulan_3_rp) AS realisasi_kinerja_triwulan_3_rp,SUM(realisasi_kinerja_triwulan_4_rp) AS realisasi_kinerja_triwulan_4_rp,SUM(realisasi_capaian_kinerja_rkpd_rp) AS realisasi_capaian_kinerja_rkpd_rp,SUM(realisasi_capaian_kinerja_rpjmd_rp) AS realisasi_capaian_kinerja_rpjmd_rp,SUM(target_capaian_kinerja_dan_realisasi_rpjmd_rp) AS target_capaian_kinerja_dan_realisasi_rpjmd_rp";
		if(!Yii::app()->user->isAdminBappeda())
		{
			$criteria->condition = " tahun_anggaran = '".$model->tahun_anggaran."'  AND skpd = '".Yii::app()->user->account->skpd."'";
		}else 
		{
			$criteria->condition = " tahun_anggaran = '".$model->tahun_anggaran."'  AND skpd = '".$model->skpd."'";
		}
		$criteria->group = "program";
		$data = EvaluasiRkpd::model()->findAll($criteria);
		$skpd = Skpd::model()->findByPk($model->skpd);
		$jenis_file= $model->jenis_file;
		$this->renderPartial('laporan_excel',array('model'=>$data,'skpd'=>$skpd,'jenis_file'=>$jenis_file));
	}
	$this->render('formLaporan',array(
		'model'=>$model,
	));
}
}
