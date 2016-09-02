<?php

class KegiatanMusrenbangKotaController extends Controller
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
'actions'=>array('create','update','modalForm','AdminSkpd','petaKecamatan','migrasiData','migrasiDataSkpd','foto','verifikasi','usulanexcel','cetakusulanexcel','usulanpdf','cetakusulanpdf','plafonexcel','cetakplafonexcel','plafonPdf','cetakPlafonPdf'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','history','UndoMusrenbang','ResumeMusrenbang'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

public function actionPetaKecamatan()
{
	$this->render('index');
}

public function actionResumeMusrenbang($kecamatan=null)
{
	if($kecamatan!=null)
	{
		$criteria = new CDbCriteria;
		$criteria->join = "LEFT JOIN kecamatan a ON a.id = t.kecamatan LEFT join sumber_dana b ON b.id = t.sumber_dana";
		$criteria->condition = "a.kecamatan = '".$kecamatan."'";
		$criteria->select = "t.*,SUM(pagu_indikatif) as pagu_indikatif,SUM(pagu_prakiraan_maju) as pagu_prakiraan_maju,GROUP_CONCAT(DISTINCT(b.sumber_dana)) as sumber_dana";
		$model = KegiatanMusrenbangKota::model()->find($criteria);
		$this->renderPartial("resumeKecamatan",array('model'=>$model));
	}
}


	public function actionVerifikasi($id)
	{
		$model= $this->loadModel($id);
		if(isset($_POST['KegiatanMusrenbangKota']))
		{
			$model->attributes=$_POST['KegiatanMusrenbangKota'];
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
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}
public function actionUndoMusrenbang($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$modelMusrenbang = KegiatanMusrenbangKota::model()->findByPk($id);
			$modelMusrenbang->status_usulan = "Terima";
			$modelMusrenbang->keterangan_status_usulan = "";
			$modelMusrenbang->save();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			//if(!isset($_GET['ajax']))
				//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
public function actionHistory()
{
	$model=new KegiatanMusrenbangKota('searchDitolak');
	$model->unsetAttributes();  // clear any default values
	if(Yii::app()->user->isAdminBappeda())
	{
			
	}else 
	{
		$model->kd_skpd = $skpd;
	}
	if(isset($_GET['KegiatanMusrenbangKota']))
	$model->attributes=$_GET['KegiatanMusrenbangKota'];
	$model->tahun = Yii::app()->session['tahun_perencanaan'];
		
	
	
	$this->renderPartial('history',array(
		'model'=>$model,
	));
}

public function actionFoto($id)
{
	$model=new KegiatanMusrenbangKota;
	
	$modelFoto= new Foto;
	
	Yii::import("ext.EAjaxUpload.qqFileUploader");
    $folder=Yii::app()->basePath.'/../foto/';// folder for uploaded files
    $allowedExtensions = array("jpg","jpeg","png"); // and etc...
    $sizeLimit = 3 * 1024 * 1024;// maximum file size in bytes
    $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
    $result = $uploader->handleUpload($folder);
	$fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
    $fileName=$result['filename'];//GETTING FILE NAME
    $result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        echo $result;// it's array			
	
	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);
	
	if(isset($_POST['KegiatanMusrenbangKota']))
	{
		$model->attributes=$_POST['KegiatanMusrenbangKota'];
		$modelFoto->attributes=$_POST['KegiatanMusrenbangKota'];
		$modelFoto->jenis_musrenbang="Musrenbang Kota";
		$modelFoto->foto = $fileName;
		if($model->save())
		{
			$modelFoto->save();
			$this->redirect(array('view','id'=>$model->id));
		}
	}

	$this->render('foto',array(
		'model'=>$model,
	));
}

public function actionModalForm()
{
	$model=new KegiatanMusrenbangKota;
	if(Yii::app()->user->isAdminBappeda())
	{
		
	}else{
		$model->kd_skpd = Yii::app()->user->account->skpd;
	}
	$model->tahun = Yii::app()->session['tahun_perencanaan'];
	$this->renderPartial('formAwal',array(
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

if(isset($_POST['KegiatanMusrenbangKota']))
{
$model->attributes=$_POST['KegiatanMusrenbangKota'];
$uploadedFile=CUploadedFile::getInstance($model,'foto');
    $fileName = "{$uploadedFile}"; 
	 $model->foto = $fileName;
if($model->save())
	$uploadedFile->saveAs(Yii::app()->basePath.'/../foto/'.$fileName);
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
$dataProvider=new CActiveDataProvider('KegiatanMusrenbangKota');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}
public function migrasiMusrenbangBySelectJoinKecamatan($tahun)
{
	$criteria = new CDbCriteria;
	$criteria->condition = "t2.kd_skpd Is Null AND t.status_forum_skpd 	='Terima'";
	
	$criteria->join = "LEFT JOIN kegiatan_musrenbang_kota as t2 ON t.kd_skpd= t2.kd_skpd AND t.uraian =t2.uraian AND t.kd_kegiatan=t2.kd_kegiatan AND t.tahun=t2.tahun AND t.kecamatan=t2.kecamatan";
	$modelMusrenbangKecamatan = KegiatanMusrenbang::model()->findAll($criteria);
	foreach($modelMusrenbangKecamatan as $model)
	{
		$modelKota = new KegiatanMusrenbangKota;
		$modelKota->kd_skpd = $model->kd_skpd;
		$modelKota->kd_urusan = $model->kd_urusan;
		$modelKota->kd_bidang = $model->kd_bidang;
		$modelKota->kd_prog = $model->kd_prog;
		$modelKota->kd_kegiatan = $model->kd_kegiatan;
		$modelKota->tahun= $model->tahun;
		$modelKota->sasaran_daerah = $model->sasaran_daerah;
		$modelKota->pagu_indikatif  = $model->pagu_tahun_1;
		$modelKota->pagu_prakiraan_maju   = $model->pagu_tahun_2;
		$modelKota->prioritas_daerah = $model->prioritas_daerah;
		$modelKota->sasaran_kegiatan = $model->sasaran_kegiatan;
		$modelKota->uraian = $model->uraian;
		$modelKota->kecamatan = $model->kecamatan;
		$modelKota->kelurahan = $model->kelurahan;
		$modelKota->volume = $model->volume;
		$modelKota->satuan = $model->satuan;
		$modelKota->sumber_dana = $model->sumber_dana;
		$modelKota->sumber_usulan = $model->sumber_usulan;
		$modelKota->save();
	}
}
public function actionMigrasiData($tahun)
{
	$this->migrasiMusrenbangByDeleteInsert($tahun);
}
public function actionMigrasiDataSkpd($skpd,$tahun)
{
	$this->migrasiMusrenbangByDeleteInsertSkpd($skpd,$tahun);
}
public function migrasiMusrenbangByDeleteInsertSkpd($skpd,$tahun)
{
	//$model = KegiatanMusrenbangKota::model()->deleteAll(array('condition'=>'kd_skpd ="'.$skpd.'" AND tahun="'.$tahun.'"'));
	//$model->deleteAll();
	$criteria = new CDbCriteria;
	$criteria->condition = "t.kd_skpd= '".$skpd."' AND t.status_forum_skpd ='Terima' AND t.tahun='".$tahun."' AND a.id IS NULL";
	
	$criteria->join = "LEFT OUTER JOIN kegiatan_musrenbang_kota a ON a.id_musrenbang_kecamatan = t.id";
	//$criteria->join = "LEFT JOIN kegiatan_musrenbang_kota as t2 ON t.kd_skpd= t2.kd_skpd AND t.uraian =t2.uraian AND t.kd_kegiatan=t2.kd_kegiatan AND t.tahun=t2.tahun AND t.kecamatan=t2.kecamatan";
	$modelMusrenbangKecamatan = KegiatanMusrenbang::model()->findAll($criteria);
	$value = array();
	$item=array();
	$a=0;
	foreach($modelMusrenbangKecamatan as $model)
	{
		//$modelKota = new KegiatanMusrenbangKota;
		$item[kd_skpd] = $model->kd_skpd;
		$item[id_musrenbang_kecamatan] = $model->id;
		//$modelKota->kd_skpd = $model->kd_skpd;
		$item[kd_urusan] = $model->kd_urusan;
		//$modelKota->kd_urusan = $model->kd_urusan;
		$item[kd_bidang] = $model->kd_bidang;
		//$modelKota->kd_bidang = $model->kd_bidang;
		$item[kd_prog] = $model->kd_prog;
		//$modelKota->kd_prog = $model->kd_prog;
		$item[kd_kegiatan] = $model->kd_kegiatan;
		//$modelKota->kd_kegiatan = $model->kd_kegiatan;
		$item[tahun] = $model->tahun;
		//$modelKota->tahun= $model->tahun;
		$item[sasaran_daerah] = $model->sasaran_daerah;
	//	$modelKota->sasaran_daerah = $model->sasaran_daerah;
		$item[pagu_indikatif] = $model->pagu_tahun_1;
		//$modelKota->pagu_indikatif  = $model->pagu_tahun_1;
		$item[pagu_prakiraan_maju] = $model->pagu_tahun_2;
		//$modelKota->pagu_prakiraan_maju   = $model->pagu_tahun_2;
		$item[prioritas_daerah] = $model->prioritas_daerah;
		//$modelKota->prioritas_daerah = $model->prioritas_daerah;
		$item[sasaran_kegiatan] = $model->sasaran_kegiatan;
		//$modelKota->sasaran_kegiatan = $model->sasaran_kegiatan;
		$item[uraian] = $model->uraian;
		//$modelKota->uraian = $model->uraian;
		$item[kecamatan] = $model->kecamatan;
	//	$modelKota->kecamatan = $model->kecamatan;
		$item[kelurahan] = $model->kelurahan;
		//$modelKota->kelurahan = $model->kelurahan;
		$item[volume] = $model->volume;
		//$modelKota->volume = $model->volume;
		$item[satuan] = $model->satuan;
		//$modelKota->satuan = $model->satuan;
		$item[sumber_dana] = $model->sumber_dana;
		//$modelKota->sumber_dana = $model->sumber_dana;
		$item[sumber_usulan] = $model->sumber_usulan;
		//$modelKota->sumber_usulan = $model->sumber_usulan;
		//$modelKota->save();
		$value[$a] = $item;
		$item[created_date] = date("Y-m-d H:i:s");
		$item[created_by] = Yii::app()->user->name;
		//$item = array('kd_skpd' => $model->kd_skpd, 'kd_urusan' => $model->kd_urusan);
		$a++;
	}
	$criteria2 = new CDbCriteria;
	$criteria2->condition = "t.skpd = '".$skpd."' AND t.status_forum_skpd ='Terima' AND t.tahun='".$tahun."' AND a.id IS NULL";
	$criteria2->join = "LEFT OUTER JOIN kegiatan_musrenbang_kota a ON t.id = a.id_renja";
	$modelRenja = Renja::model()->findAll($criteria2);
	foreach($modelRenja as $model)
	{
		$item[id_renja] = $model->id;
		//$modelKota = new KegiatanMusrenbangKota;
		$item[kd_skpd] = $model->skpd;
		//$modelKota->kd_skpd = $model->kd_skpd;
		$item[kd_urusan] = $model->urusan;
		//$modelKota->kd_urusan = $model->kd_urusan;
		$item[kd_bidang] = $model->bidang;
		//$modelKota->kd_bidang = $model->kd_bidang;
		$item[kd_prog] = $model->program;
		//$modelKota->kd_prog = $model->kd_prog;
		$item[kd_kegiatan] = $model->kegiatan;
		//$modelKota->kd_kegiatan = $model->kd_kegiatan;
		$item[tahun] = $model->tahun;
		//$modelKota->tahun= $model->tahun;
		//$item[sasaran_daerah] = $model->sasaran_daerah;
	//	$modelKota->sasaran_daerah = $model->sasaran_daerah;
		$item[pagu_indikatif] = $model->kebutuhan_dana; 
		//$modelKota->pagu_indikatif  = $model->pagu_tahun_1;
		$item[pagu_prakiraan_maju] = $model->kebutuhan_dana_a2;
		//$modelKota->pagu_prakiraan_maju   = $model->pagu_tahun_2;
		//$item[prioritas_daerah] = $model->prioritas_daerah;
		//$modelKota->prioritas_daerah = $model->prioritas_daerah;
		$item[sasaran_kegiatan] = $model->sasaran_kegiatan;
		//$modelKota->sasaran_kegiatan = $model->sasaran_kegiatan;
		$item[uraian] = $model->uraian;
		//$modelKota->uraian = $model->uraian;
		$item[kecamatan] = $model->kecamatan;
	//	$modelKota->kecamatan = $model->kecamatan;
		$item[kelurahan] = $model->kelurahan;
		//$modelKota->kelurahan = $model->kelurahan;
		//$item[volume] = $model->volume;
		//$modelKota->volume = $model->volume;
	//	$item[satuan] = $model->satuan;
		//$modelKota->satuan = $model->satuan;
		$item[sumber_dana] = $model->sumber_dana;
		//$modelKota->sumber_dana = $model->sumber_dana;
		$item[created_date] = date("Y-m-d H:i:s");
		$item[created_by] = Yii::app()->user->name;
		$item[sumber_usulan] = "Renja";
		//$modelKota->sumber_usulan = $model->sumber_usulan;
		//$modelKota->save();
		$value[$a] = $item;
		//$item = array('kd_skpd' => $model->kd_skpd, 'kd_urusan' => $model->kd_urusan);
		$a++;
	}
	if(sizeof($value)>0)
	{
		$connection = Yii::app()->db->getSchema()->getCommandBuilder();
		$command=$connection->createMultipleInsertCommand('kegiatan_musrenbang_kota', $value);
		$command->execute();
	}
}
public function migrasiMusrenbangByDeleteInsert($tahun)
{
	//$model = KegiatanMusrenbangKota::model()->deleteAll(array('condition'=>'tahun="'.$tahun.'"'));
	//$model->deleteAll();
	$criteria = new CDbCriteria;
	$criteria->condition = " t.status_forum_skpd ='Terima' AND t.tahun='".$tahun."' AND a.id IS NULL";
	
	$criteria->join = "LEFT OUTER JOIN kegiatan_musrenbang_kota a ON a.id_musrenbang_kecamatan = t.id";
	
	//$criteria->join = "LEFT JOIN kegiatan_musrenbang_kota as t2 ON t.kd_skpd= t2.kd_skpd AND t.uraian =t2.uraian AND t.kd_kegiatan=t2.kd_kegiatan AND t.tahun=t2.tahun AND t.kecamatan=t2.kecamatan";
	$modelMusrenbangKecamatan = KegiatanMusrenbang::model()->findAll($criteria);
	$value = array();
	$item=array();
	$a=0;
	foreach($modelMusrenbangKecamatan as $model)
	{
		$item[id_musrenbang_kecamatan] = $model->id;
		//$modelKota = new KegiatanMusrenbangKota;
		$item[kd_skpd] = $model->kd_skpd;
		//$modelKota->kd_skpd = $model->kd_skpd;
		$item[kd_urusan] = $model->kd_urusan;
		//$modelKota->kd_urusan = $model->kd_urusan;
		$item[kd_bidang] = $model->kd_bidang;
		//$modelKota->kd_bidang = $model->kd_bidang;
		$item[kd_prog] = $model->kd_prog;
		//$modelKota->kd_prog = $model->kd_prog;
		$item[kd_kegiatan] = $model->kd_kegiatan;
		//$modelKota->kd_kegiatan = $model->kd_kegiatan;
		$item[tahun] = $model->tahun;
		//$modelKota->tahun= $model->tahun;
		$item[sasaran_daerah] = $model->sasaran_daerah;
	//	$modelKota->sasaran_daerah = $model->sasaran_daerah;
		$item[pagu_indikatif] = $model->pagu_tahun_1;
		//$modelKota->pagu_indikatif  = $model->pagu_tahun_1;
		$item[pagu_prakiraan_maju] = $model->pagu_tahun_2;
		//$modelKota->pagu_prakiraan_maju   = $model->pagu_tahun_2;
		$item[prioritas_daerah] = $model->prioritas_daerah;
		//$modelKota->prioritas_daerah = $model->prioritas_daerah;
		$item[sasaran_kegiatan] = $model->sasaran_kegiatan;
		//$modelKota->sasaran_kegiatan = $model->sasaran_kegiatan;
		$item[uraian] = $model->uraian;
		//$modelKota->uraian = $model->uraian;
		$item[kecamatan] = $model->kecamatan;
	//	$modelKota->kecamatan = $model->kecamatan;
		$item[kelurahan] = $model->kelurahan;
		//$modelKota->kelurahan = $model->kelurahan;
		$item[volume] = $model->volume;
		//$modelKota->volume = $model->volume;
		$item[created_date] = date("Y-m-d H:i:s");
		$item[created_by] = Yii::app()->user->name;
		$item[satuan] = $model->satuan;
		//$modelKota->satuan = $model->satuan;
		$item[sumber_dana] = $model->sumber_dana;
		//$modelKota->sumber_dana = $model->sumber_dana;
		$item[sumber_usulan] = $model->sumber_usulan;
		//$modelKota->sumber_usulan = $model->sumber_usulan;
		//$modelKota->save();
		$value[$a] = $item;
		//$item = array('kd_skpd' => $model->kd_skpd, 'kd_urusan' => $model->kd_urusan);
		$a++;
	}
	$criteria2 = new CDbCriteria;
	$criteria2->condition = "t.status_forum_skpd ='Terima' AND t.tahun='".$tahun."' AND a.id IS NULL";
	$criteria2->join = "LEFT OUTER JOIN kegiatan_musrenbang_kota a ON t.id = a.id_renja";
	$modelRenja = Renja::model()->findAll($criteria2);
	foreach($modelRenja as $model)
	{
		$item[id_renja] = $model->id;
		//$modelKota = new KegiatanMusrenbangKota;
		$item[kd_skpd] = $model->skpd;
		//$modelKota->kd_skpd = $model->kd_skpd;
		$item[kd_urusan] = $model->urusan;
		//$modelKota->kd_urusan = $model->kd_urusan;
		$item[kd_bidang] = $model->bidang;
		//$modelKota->kd_bidang = $model->kd_bidang;
		$item[kd_prog] = $model->program;
		//$modelKota->kd_prog = $model->kd_prog;
		$item[kd_kegiatan] = $model->kegiatan;
		//$modelKota->kd_kegiatan = $model->kd_kegiatan;
		$item[tahun] = $model->tahun;
		//$modelKota->tahun= $model->tahun;
		$item[created_date] = date("Y-m-d H:i:s");
		$item[created_by] = Yii::app()->user->name;
		//$item[sasaran_daerah] = $model->sasaran_daerah;
	//	$modelKota->sasaran_daerah = $model->sasaran_daerah;
		$item[pagu_indikatif] = $model->kebutuhan_dana; 
		//$modelKota->pagu_indikatif  = $model->pagu_tahun_1;
		$item[pagu_prakiraan_maju] = $model->kebutuhan_dana_a2;
		//$modelKota->pagu_prakiraan_maju   = $model->pagu_tahun_2;
		//$item[prioritas_daerah] = $model->prioritas_daerah;
		//$modelKota->prioritas_daerah = $model->prioritas_daerah;
		$item[sasaran_kegiatan] = $model->sasaran_kegiatan;
		//$modelKota->sasaran_kegiatan = $model->sasaran_kegiatan;
		$item[uraian] = $model->uraian;
		//$modelKota->uraian = $model->uraian;
		$item[kecamatan] = $model->kecamatan;
	//	$modelKota->kecamatan = $model->kecamatan;
		$item[kelurahan] = $model->kelurahan;
		//$modelKota->kelurahan = $model->kelurahan;
		//$item[volume] = $model->volume;
		//$modelKota->volume = $model->volume;
	//	$item[satuan] = $model->satuan;
		//$modelKota->satuan = $model->satuan;
		$item[sumber_dana] = $model->sumber_dana;
		//$modelKota->sumber_dana = $model->sumber_dana;
		$item[sumber_usulan] = "Renja";
		//$modelKota->sumber_usulan = $model->sumber_usulan;
		//$modelKota->save();
		$value[$a] = $item;
		//$item = array('kd_skpd' => $model->kd_skpd, 'kd_urusan' => $model->kd_urusan);
		$a++;
	}
	if(sizeof($value)>0)
	{
		$connection = Yii::app()->db->getSchema()->getCommandBuilder();
		$command=$connection->createMultipleInsertCommand('kegiatan_musrenbang_kota', $value);
		$command->execute();
	}
}
public function migrasiMusrenbangByDeleteInsertPerSkpd($tahun,$skpd)
{
	$model = KegiatanMusrenbangKota::model()->deleteAll(array('condition'=>'kd_skpd = "'.$skpd.'" AND tahun="'.$tahun.'"'));
	//$model->deleteAll();
	$criteria = new CDbCriteria;
	$criteria->condition = "t.status_forum_skpd ='Terima' AND kd_skpd='".$skpd."'";
	
	//$criteria->join = "LEFT JOIN kegiatan_musrenbang_kota as t2 ON t.kd_skpd= t2.kd_skpd AND t.uraian =t2.uraian AND t.kd_kegiatan=t2.kd_kegiatan AND t.tahun=t2.tahun AND t.kecamatan=t2.kecamatan";
	$modelMusrenbangKecamatan = KegiatanMusrenbang::model()->findAll($criteria);
	$value = array();
	$item=array();
	$a=0;
	foreach($modelMusrenbangKecamatan as $model)
	{
		$modelKota = new KegiatanMusrenbangKota;
		
		

		$item[kd_skpd] = $model->kd_skpd;
		//$modelKota->kd_skpd = $model->kd_skpd;
		$item[kd_urusan] = $model->kd_urusan;
		//$modelKota->kd_urusan = $model->kd_urusan;
		$item[kd_bidang] = $model->kd_bidang;
		//$modelKota->kd_bidang = $model->kd_bidang;
		$item[kd_prog] = $model->kd_prog;
		//$modelKota->kd_prog = $model->kd_prog;
		$item[kd_kegiatan] = $model->kd_kegiatan;
		//$modelKota->kd_kegiatan = $model->kd_kegiatan;
		$item[tahun] = $model->tahun;
		//$modelKota->tahun= $model->tahun;
		$item[sasaran_daerah] = $model->sasaran_daerah;
	//	$modelKota->sasaran_daerah = $model->sasaran_daerah;
		$item[pagu_indikatif] = $model->pagu_tahun_1;
		//$modelKota->pagu_indikatif  = $model->pagu_tahun_1;
		$item[pagu_prakiraan_maju] = $model->pagu_tahun_2;
		//$modelKota->pagu_prakiraan_maju   = $model->pagu_tahun_2;
		$item[prioritas_daerah] = $model->prioritas_daerah;
		//$modelKota->prioritas_daerah = $model->prioritas_daerah;
		$item[sasaran_kegiatan] = $model->sasaran_kegiatan;
		//$modelKota->sasaran_kegiatan = $model->sasaran_kegiatan;
		$item[uraian] = $model->uraian;
		//$modelKota->uraian = $model->uraian;
		$item[kecamatan] = $model->kecamatan;
	//	$modelKota->kecamatan = $model->kecamatan;
		$item[kelurahan] = $model->kelurahan;
		//$modelKota->kelurahan = $model->kelurahan;
		$item[volume] = $model->volume;
		//$modelKota->volume = $model->volume;
		$item[satuan] = $model->satuan;
		//$modelKota->satuan = $model->satuan;
		$item[sumber_dana] = $model->sumber_dana;
		//$modelKota->sumber_dana = $model->sumber_dana;
		$item[sumber_usulan] = $model->sumber_usulan;
		//$modelKota->sumber_usulan = $model->sumber_usulan;
		//$modelKota->save();
		$value[$a] = $item;
		//$item = array('kd_skpd' => $model->kd_skpd, 'kd_urusan' => $model->kd_urusan);
		$a++;
	}
	
	$connection = Yii::app()->db->getSchema()->getCommandBuilder();
	$command=$connection->createMultipleInsertCommand('kegiatan_musrenbang_kota', $value);
	$command->execute();
}
/**
* Manages all models.
*/
public function actionAdmin($skpd)
{
	//$this->migrasiMusrenbangByDeleteInsertPerSkpd(Yii::app()->session['tahun_perencanaan'],$skpd);
	$model=new KegiatanMusrenbangKota('search');
	$model->unsetAttributes();  // clear any default values
	$model->kd_skpd = $skpd;
	$model->tahun = Yii::app()->session['tahun_perencanaan'];
	if(isset($_GET['KegiatanMusrenbangKota']))
		$model->attributes=$_GET['KegiatanMusrenbangKota'];

	$this->render('admin',array(
		'model'=>$model,
		'skpd'=>$skpd
	));
}
public function actionAdminSkpd()
{
	//$this->migrasiMusrenbangByDeleteInsert(Yii::app()->session['tahun_perencanaan']);
	if(!Yii::app()->user->isAdminBappeda())
	{
		$this->redirect(array("admin"));
	}
	$model=new KegiatanMusrenbangKota('searchPerSKpd');
	$model->tahun= Yii::app()->session['tahun_perencanaan'];
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['KegiatanMusrenbangKota']))
		$model->attributes=$_GET['KegiatanMusrenbangKota'];

	$this->render('adminSkpd',array(
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
$model=KegiatanMusrenbangKota::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='kegiatan-musrenbang-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}


public function actionPlafonPdf(){
	$model=new KegiatanMusrenbangKota;
	if(isset($_POST['KegiatanMusrenbangKota']))
	{
		$model->attributes=$_POST['KegiatanMusrenbangKota'];
		
		
		$this->redirect(array('cetakplafonpdf','tahun'=>$model->tahun,'kd_urusan'=>$model->kd_urusan));
	}
	$this->render('CetakPlafonPdf',array(
	'model'=>$model,
	));
	
}

public function actionCetakPlafonPdf($tahun,$kd_urusan){
	error_reporting(0);
	Yii::import('ext.phpexcel.XPHPExcel');    
	
	$objPHPExcel= XPHPExcel::createPHPExcel();
	
	$renderer = XPHPExcel::createPHPExcelSetting();
	$rendererName = $renderer::PDF_RENDERER_MPDF;
	//echo $rendererName;

	$rendererLibrary = 'mPDF60';
	
	$rendererLibraryPath = dirname(__FILE__).'/../extensions/phpexcel/vendor/PHPExcel/Libraries/' . $rendererLibrary;
	
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.' AND kd_urusan='.$kd_urusan.' ';
	$criteria->select = "t.*,SUM(pagu_indikatif) AS pagu_indikatif, SUM(pagu_prakiraan_maju) AS pagu_prakiraan_maju";
		
	$criteria->group = "kecamatan";

	$model = KegiatanMusrenbangKota::model()->findAll($criteria);
	
	$urusan = Urusan::model()->find(array('condition'=>'id = '.$kd_urusan.''));
	
	Yii::import('ext.phpexcel.XPHPExcel');    
	$objPHPExcel= XPHPExcel::createPHPExcel();
	$objPHPExcel->getProperties()->setCreator("Bappeda Kota Pematangsiantar")
								 ->setLastModifiedBy("Bappeda Kota Pematangsiantar")
								 ->setTitle("Simrenbang Bappeda Kota Pematangsiantar")
								 ->setSubject("Simrenbang Bappeda Kota Pematangsiantar")
								 ->setDescription("Simrenbang Bappeda Kota Pematangsiantar")
								 ->setKeywords("Bappeda Kota Pematangsiantar")
								 ->setCategory("Bappeda Kota Pematangsiantar");
								 
	$styleHeadingJudul = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 11,
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	);	
	$styleHeading = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	);	
	$styleTH = array(
	'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => 'CACED3')
		),
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
	)
	);
	$styleTD = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'top' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			), 	
	)
	);
	
	$styleTD_LEFT = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
		'indent'=>2
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'top' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			), 	
	)
	);
	
	$styleTD_BOLD = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  =>'Roboto', 'Noto', sans-serif
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'top' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			), 	
	)
	);
	
	$styleTtd = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	);
	
	$cell = array('B','C','D','E');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('B1:E1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1',"PLAFON ANGGARAN SEMENTARA TAHUN ANGGARAN ".$tahun." \nSUMBER USULAN MUSRENBANG");
	$objPHPExcel->getActiveSheet()->getStyle("B1:E1")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->getStyle("B2:E6")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(22);
	$objPHPExcel->getActiveSheet()->getStyle("B1")->getAlignment()->setWrapText(true);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(0);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(40);
	$objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(30);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5', ': '.$urusan->urusan);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('B7:B8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B7','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('C7:C8');
	$objPHPExcel->getActiveSheet()->getStyle("C7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C7','KECAMATAN');
	$objPHPExcel->getActiveSheet()->getStyle('D7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D7','PAGU TAHUN 1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D8','(Rp)');
	$objPHPExcel->getActiveSheet()->getStyle('E7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E7','PAGU TAHUN 2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E8','(Rp)');
	
	$objPHPExcel->getActiveSheet()->getStyle("B7:E9")->applyFromArray($styleTH);
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."9",$a+1);
	}
	
	$rows_awal = 10;
	$nomor_bidang = 0;
	$total1=0;
	$total2=0;
	foreach($model as $data)
	{
		$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_BOLD);
		$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_BOLD);
		$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_BOLD);
		$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_BOLD);
		
		$nomor_bidang++;
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$nomor_bidang);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->kecamatan_->kecamatan);
		$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->getAlignment()->setWrapText(true);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,AplikasiKomponen::uang($data->pagu_indikatif));
		$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->getAlignment()->setWrapText(true);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,AplikasiKomponen::uang($data->pagu_prakiraan_maju));
		$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->getAlignment()->setWrapText(true);
		
			
		$rows_awal++;		
		$total1+=$data->pagu_indikatif;
		$total2+=$data->pagu_prakiraan_maju;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal.":E".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,'TOTAL');
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,AplikasiKomponen::uang($total2));
	
	$row=$rows_awal+1;
	$row_akhir=$rows_awal+10;
		
	$objPHPExcel->getActiveSheet()->getStyle("B".$row.":E".$row_akhir."")->applyFromArray($styleHeading);
	
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	//$objPHPExcel->getActiveSheet()->mergeCells("E".$rows.":F".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	//$objPHPExcel->getActiveSheet()->mergeCells("E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	//$objPHPExcel->getActiveSheet()->mergeCells("E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,'KOTA PEMATANGSIANTAR');
	$rows++;
	$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(30);
	$rows+=2;
	//$objPHPExcel->getActiveSheet()->mergeCells("E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	//$objPHPExcel->getActiveSheet()->mergeCells("E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	//$objPHPExcel->getActiveSheet()->mergeCells("E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,$setting->nip_penanda_tangan_dokumen);

	$objPHPExcel->getActiveSheet()->mergeCells('A1:A'.$rows.'');

	if (!$renderer::setPdfRenderer(
			$rendererName,
			$rendererLibraryPath
		)) {
		die(
			'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
			'<br />' .
			'at the top of this script as appropriate for your directory structure'
		);
	}
	
	header('Content-Type: application/pdf');
	//header('Content-Disposition: attachment;filename="Data Usulan Kegiatan Musrenbang.pdf"');
	header('Cache-Control: max-age=0');
		
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
	$objWriter->setSheetIndex(0);
	$objWriter->save('php://output');
	Yii::app()->end(); 
}

public function actionUsulanPdf(){
	$model=new KegiatanMusrenbangKota;
	if(isset($_POST['KegiatanMusrenbangKota']))
	{
		$model->attributes=$_POST['KegiatanMusrenbangKota'];
		
		
		$this->redirect(array('cetakusulanpdf','tahun'=>$model->tahun,'kd_skpd'=>$model->kd_skpd,'sumber_dana'=>$model->sumber_dana));
	}
	$this->render('CetakUsulanPdf',array(
	'model'=>$model,
	));
	
}
public function actionCetakUsulanPdf($sumber_dana,$tahun,$kd_skpd){
	//error_reporting(0);
	Yii::import('ext.phpexcel.XPHPExcel');    
	
	$objPHPExcel= XPHPExcel::createPHPExcel();
	
	$renderer = XPHPExcel::createPHPExcelSetting();
	$rendererName = $renderer::PDF_RENDERER_MPDF;
	//echo $rendererName;

	$rendererLibrary = 'mPDF60';
	
	$rendererLibraryPath = dirname(__FILE__).'/../extensions/phpexcel/vendor/PHPExcel/Libraries/' . $rendererLibrary;
	
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.' AND sumber_dana='.$sumber_dana.' AND kd_skpd='.$kd_skpd.'';
	$criteria->order="t.kd_bidang,t.kd_prog,t.kd_kegiatan";	
	
	$criteria->select="t.*";

	$model = KegiatanMusrenbangKota::model()->findAll($criteria);
	$sumber_dana = SumberDana::model()->find(array('condition'=>'id = '.$sumber_dana.''));
	$skpd = Skpd::model()->find(array('condition'=>'id = '.$kd_skpd.''));
	
	Yii::import('ext.phpexcel.XPHPExcel');    
	$objPHPExcel= XPHPExcel::createPHPExcel();
	$objPHPExcel->getProperties()->setCreator("Bappeda Kota Pematangsiantar")
								 ->setLastModifiedBy("Bappeda Kota Pematangsiantar")
								 ->setTitle("Simrenbang Bappeda Kota Pematangsiantar")
								 ->setSubject("Simrenbang Bappeda Kota Pematangsiantar")
								 ->setDescription("Simrenbang Bappeda Kota Pematangsiantar")
								 ->setKeywords("Bappeda Kota Pematangsiantar")
								 ->setCategory("Bappeda Kota Pematangsiantar");
								 
	$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
	
	$styleHeadingJudul = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 11,
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	);	
	$styleHeading = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	);	
	$styleTH = array(
	'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => 'fff')
		),
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
	)
	);
	$styleTD = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'top' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			), 	
	)
	);
	
	$styleTD_LEFT = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
		'indent'=>2
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'top' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			), 	
	)
	);
	
	$styleTD_BOLD = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'top' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			), 	
	)
	);
	
	$styleTtd = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  =>'Roboto', 'Noto', sans-serif
    ),
	);
	$styleTD_RIGHT = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
		
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'top' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			), 	
	)
	);
	$cell = array('A','B','C','D','E','F','G','H','I','J');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:J1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','USULAN KEGIATAN MUSRENBANG '.$skpd->nama_skpd.' TAHUN '.$tahun.'');
	$objPHPExcel->getActiveSheet()->getStyle("A1:J1")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->getStyle("A2:J6")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(24);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(25);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5', ': Urusan Wajib');
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A7:A8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A7','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B7:B8');
	$objPHPExcel->getActiveSheet()->getStyle("B7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B7','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C7:C8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C7','PRIORITAS DAERAH');
	$objPHPExcel->getActiveSheet()->mergeCells('D7:D8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D7','SASARAN DAERAH');
	$objPHPExcel->getActiveSheet()->mergeCells('E7:E8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E7','KELURAHAN');
	$objPHPExcel->getActiveSheet()->mergeCells('F7:F8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F7','VOLUME');
	$objPHPExcel->getActiveSheet()->getStyle('G7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G7','PAGU INDIKATIF');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G8','(Rp)');
	$objPHPExcel->getActiveSheet()->getStyle('H7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H7','PERKIRAAN MAJU');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H8','(Rp)');
	$objPHPExcel->getActiveSheet()->mergeCells('I7:I8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I7','KECAMATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('J7:J8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J7','SKPD');
	
	$objPHPExcel->getActiveSheet()->getStyle("A7:J9")->applyFromArray($styleTH);
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."9",$a+1);
	}
	
	$rows_awal = 10;
	$nomor_bidang = 0;
	$total1=0;
	$total2=0;
	$currentBidang;
	$tempBidang;
	$currentProgram;
	$tempProgram;
	
	foreach($model as $data)
	{
		$currentProgram=$data->kd_prog;
		$currentBidang=$data->kd_bidang;
		
		if($currentBidang!=$tempBidang){
			
			$totalPaguPerBidang=KegiatanMusrenbangKota::model()->totalPaguPerBidangSkpd($data->tahun,$data->kd_skpd,$data->kd_bidang);
			$totalPaguPerBidang= explode("|",$totalPaguPerBidang);
			$total1+=$totalPaguPerBidang[0];
			$total2+=$totalPaguPerBidang[1];
			
			$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_BOLD);
			
			$nomor_bidang++;
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[0]));
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[1]));
				
			$rows_awal++;
			$nomor_program = 0;
		}
		if($currentProgram != $tempProgram)
		{
			$totalPaguPerProgram = KegiatanMusrenbangKota::model()->totalPaguPerProgramSkpd($data->tahun,$data->kd_skpd,$data->kd_bidang,$data->kd_prog);
			$totalPaguPerProgram = explode("|",$totalPaguPerProgram);
				// program
				$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
				$nomor_program++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[0]));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
				
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->program);
				$rows_awal++;
				$nomor_kegiatan=0;
				
		} 
	
		
		
		
		// kegiatan
				$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD_RIGHT);
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
				
				$nomor_kegiatan++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal)->getAlignment()->setWrapText(true);
				
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->prioritas_daerah_->prioritas);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->sasaran_daerah_->sasaran_daerah);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->kelurahan_->kelurahan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,$data->volume);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data->pagu1);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data->pagu2);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data->kecamatan_->kecamatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,$data->skpd_->nama_skpd);
		
		$tempBidang = $data->kd_bidang;
		$tempProgram= $data->kd_prog;
			
		$rows_awal++;
		
		
			
	}
	
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":E".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,'TOTAL');
	$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal)->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal)->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,AplikasiKomponen::uang($total2));
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal)->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal.":J".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$row=$rows_awal+1;
	$row_akhir=$rows_awal+11;
		
	$objPHPExcel->getActiveSheet()->getStyle("A".$row.":J".$row_akhir."")->applyFromArray($styleHeading);
	
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("I".$rows.":J".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("I".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("I".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows,'KOTA PEMATANGSIANTAR');
	$rows++;
	$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(30);
	$rows+=3;
	$objPHPExcel->getActiveSheet()->mergeCells("I".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("I".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("I".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows,$setting->nip_penanda_tangan_dokumen);

	if (!$renderer::setPdfRenderer(
			$rendererName,
			$rendererLibraryPath
		)) {
		die(
			'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
			'<br />' .
			'at the top of this script as appropriate for your directory structure'
		);
	}
	
	header('Content-Type: application/pdf');
	//header('Content-Disposition: attachment;filename="Data Usulan Kegiatan Musrenbang.pdf"');
	header('Cache-Control: max-age=0');
		
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
	$objWriter->setSheetIndex(0);
	$objWriter->save('php://output');
	Yii::app()->end(); 

}

public function actionPlafonExcel()
{
	
	$model=new KegiatanMusrenbangKota;
	if(isset($_POST['KegiatanMusrenbangKota']))
	{
		$model->attributes=$_POST['KegiatanMusrenbangKota'];
		
		
		$this->redirect(array('cetakplafonexcel','tahun'=>$model->tahun,'kd_urusan'=>$model->kd_urusan));
	}
	$this->render('CetakPlafonExcel',array(
	'model'=>$model,
	));
}

public function actionCetakPlafonExcel($tahun,$kd_urusan)
{
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.' AND kd_urusan='.$kd_urusan.' ';
	$criteria->select = "t.*,SUM(pagu_indikatif) AS pagu_indikatif, SUM(pagu_prakiraan_maju) AS pagu_prakiraan_maju";
		
	$criteria->group = "kecamatan";

	$model = KegiatanMusrenbangKota::model()->findAll($criteria);
	
	$urusan = Urusan::model()->find(array('condition'=>'id = '.$kd_urusan.''));
	
	Yii::import('ext.phpexcel.XPHPExcel');    
	$objPHPExcel= XPHPExcel::createPHPExcel();
	$objPHPExcel->getProperties()->setCreator("Bappeda Kota Pematangsiantar")
								 ->setLastModifiedBy("Bappeda Kota Pematangsiantar")
								 ->setTitle("Simrenbang Bappeda Kota Pematangsiantar")
								 ->setSubject("Simrenbang Bappeda Kota Pematangsiantar")
								 ->setDescription("Simrenbang Bappeda Kota Pematangsiantar")
								 ->setKeywords("Bappeda Kota Pematangsiantar")
								 ->setCategory("Bappeda Kota Pematangsiantar");
								 
	$styleHeading = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	);	
	$styleTH = array(
	'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => 'CACED3')
		),
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
	)
	);
	$styleTD = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'top' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			), 	
	)
	);
	
	$styleTD_LEFT = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
		'indent'=>2
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'top' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			), 	
	)
	);
	
	$styleTD_BOLD = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'top' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			), 	
	)
	);
	
	$styleTtd = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	);
	
	$cell = array('B','C','D','E');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('B1:E1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1',"PLAFON ANGGARAN SEMENTARA TAHUN ANGGARAN ".$tahun." \nSUMBER USULAN MUSRENBANG");
	$objPHPExcel->getActiveSheet()->getStyle("B1:E1")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(22);
	$objPHPExcel->getActiveSheet()->getStyle("B1")->getAlignment()->setWrapText(true);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(0);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5', ': '.$urusan->urusan);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('B7:B8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B7','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('C7:C8');
	$objPHPExcel->getActiveSheet()->getStyle("C7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C7','KECAMATAN');
	$objPHPExcel->getActiveSheet()->getStyle('D7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D7','PAGU TAHUN 1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D8','(Rp)');
	$objPHPExcel->getActiveSheet()->getStyle('E7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E7','PAGU TAHUN 2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E8','(Rp)');
	
	$objPHPExcel->getActiveSheet()->getStyle("B7:E9")->applyFromArray($styleTH);
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."9",$a+1);
	}
	
	$rows_awal = 10;
	$nomor_bidang = 0;
	$total1=0;
	$total2=0;
	foreach($model as $data)
	{
		$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_BOLD);
		$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_BOLD);
		$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_BOLD);
		$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_BOLD);
		
		$nomor_bidang++;
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$nomor_bidang);
		$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->kecamatan_->kecamatan);
		$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,AplikasiKomponen::uang($data->pagu_indikatif));
		$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal)->getAlignment()->setWrapText(true);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,AplikasiKomponen::uang($data->pagu_prakiraan_maju));
			
		$rows_awal++;		
		$total1+=$data->pagu_indikatif;
		$total2+=$data->pagu_prakiraan_maju;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal.":E".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,'TOTAL');
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal)->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,AplikasiKomponen::uang($total2));
		
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("E".$rows.":F".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("E".$rows.":F".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("E".$rows.":F".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,'KOTA PEMATANGSIANTAR');
	$rows+=3;
	$objPHPExcel->getActiveSheet()->mergeCells("E".$rows.":F".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("E".$rows.":F".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("E".$rows.":F".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,$setting->nip_penanda_tangan_dokumen);
	
	// Redirect output to a clientâ€™s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Data Plafon Kegiatan Musrenbang Kota.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
		 
	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0
		
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	Yii::app()->end(); 

}

public function actionUsulanExcel()
{
	
	$model=new KegiatanMusrenbangKota;
	if(isset($_POST['KegiatanMusrenbangKota']))
	{
		$model->attributes=$_POST['KegiatanMusrenbangKota'];
		
		
		$this->redirect(array('cetakusulanexcel','tahun'=>$model->tahun,'kd_skpd'=>$model->kd_skpd,'sumber_dana'=>$model->sumber_dana));
	}
	$this->render('CetakUsulanExcel',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actionCetakUsulanExcel($tahun,$kd_skpd,$sumber_dana)
{
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.' AND sumber_dana='.$sumber_dana.' AND kd_skpd='.$kd_skpd.'';
	//$criteria->select = "t.*,SUM(pagu_indikatif) AS sumPagu1, SUM(pagu_prakiraan_maju) AS sumPagu2";
	$criteria->order="t.kd_bidang,t.kd_prog,t.kd_kegiatan";	
	//$criteria->group = "kd_bidang";
	$criteria->select="t.*";

	$model = KegiatanMusrenbangKota::model()->findAll($criteria);
	$sumber_dana = SumberDana::model()->find(array('condition'=>'id = '.$sumber_dana.''));
	$skpd = Skpd::model()->find(array('condition'=>'id = '.$kd_skpd.''));
	
	Yii::import('ext.phpexcel.XPHPExcel');    
	$objPHPExcel= XPHPExcel::createPHPExcel();
	$objPHPExcel->getProperties()->setCreator("Bappeda Kota Pematangsiantar")
								 ->setLastModifiedBy("Bappeda Kota Pematangsiantar")
								 ->setTitle("Simrenbang Bappeda Kota Pematangsiantar")
								 ->setSubject("Simrenbang Bappeda Kota Pematangsiantar")
								 ->setDescription("Simrenbang Bappeda Kota Pematangsiantar")
								 ->setKeywords("Bappeda Kota Pematangsiantar")
								 ->setCategory("Bappeda Kota Pematangsiantar");
								 
	$styleHeading = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	);	
	$styleTH = array(
	'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => 'CACED3')
		),
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
	)
	);
	$styleTD = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'top' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			), 	
	)
	);
	
	$styleTD_LEFT = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
		'indent'=>2
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'top' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			), 	
	)
	);
	
	$styleTD_BOLD = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_THIN,
			),
			'top' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			), 	
	)
	);
	
	$styleTtd = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	);
	
	$cell = array('A','B','C','D','E','F','G','H','I','J');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:M1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','USULAN KEGIATAN MUSRENBANG '.$skpd->nama_skpd.' TAHUN '.$tahun.'');
	$objPHPExcel->getActiveSheet()->getStyle("A1:M1")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5', ': URUSAN');
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A7:A8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A7','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B7:B8');
	$objPHPExcel->getActiveSheet()->getStyle("B7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B7','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C7:C8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C7','PRIORITAS DAERAH');
	$objPHPExcel->getActiveSheet()->mergeCells('D7:D8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D7','SASARAN DAERAH');
	$objPHPExcel->getActiveSheet()->mergeCells('E7:E8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E7','KELURAHAN');
	$objPHPExcel->getActiveSheet()->mergeCells('F7:F8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F7','VOLUME');
	$objPHPExcel->getActiveSheet()->getStyle('G7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G7','PAGU INDIKATIF');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G8','(Rp)');
	$objPHPExcel->getActiveSheet()->getStyle('H7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H7','PERKIRAAN MAJU');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H8','(Rp)');
	$objPHPExcel->getActiveSheet()->mergeCells('I7:I8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I7','KECAMATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('J7:J8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J7','SKPD');
	
	$objPHPExcel->getActiveSheet()->getStyle("A7:J9")->applyFromArray($styleTH);
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."9",$a+1);
	}
	
	$rows_awal = 10;
	$nomor_bidang = 0;
	$total1=0;
	$total2=0;
	$currentBidang;
	$tempBidang;
	$currentProgram;
	$tempProgram;
	
	foreach($model as $data)
	{
		$currentProgram=$data->kd_prog;
		$currentBidang=$data->kd_bidang;
		
		if($currentBidang!=$tempBidang){
			
			$totalPaguPerBidang=KegiatanMusrenbangKota::model()->totalPaguPerBidangSkpd($data->tahun,$data->kd_skpd,$data->kd_bidang);
			$totalPaguPerBidang= explode("|",$totalPaguPerBidang);
			$total1+=$totalPaguPerBidang[0];
			$total2+=$totalPaguPerBidang[1];
			
			$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_BOLD);
			
			$nomor_bidang++;
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[0]));
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[1]));
				
			$rows_awal++;
			$nomor_program = 0;
		}
		if($currentProgram != $tempProgram)
		{
			$totalPaguPerProgram = KegiatanMusrenbangKota::model()->totalPaguPerProgramSkpd($data->tahun,$data->kd_skpd,$data->kd_bidang,$data->kd_prog);
			$totalPaguPerProgram = explode("|",$totalPaguPerProgram);
				// program
				$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
				$nomor_program++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[0]));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
				
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->program);
				$rows_awal++;
				$nomor_kegiatan=0;
				
		} 
		// kegiatan
				$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
				
				$nomor_kegiatan++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal)->getAlignment()->setWrapText(true);
				
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->prioritas_daerah_->prioritas);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->sasaran_daerah_->sasaran_daerah);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->kelurahan_->kelurahan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,$data->volume);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data->pagu1);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data->pagu2);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data->kecamatan_->kecamatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,$data->skpd_->nama_skpd);
		
		$tempBidang = $data->kd_bidang;
		$tempProgram= $data->kd_prog;
			
		$rows_awal++;
		
		
			
	}
	
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":E".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,'TOTAL');
	$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal)->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal)->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,AplikasiKomponen::uang($total2));
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal)->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal.":J".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("I".$rows.":J".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("I".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("I".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows,'KOTA PEMATANGSIANTAR');
	$rows+=3;
	$objPHPExcel->getActiveSheet()->mergeCells("I".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("I".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("I".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows,$setting->nip_penanda_tangan_dokumen);
	
	// Redirect output to a clientâ€™s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Data Usulan Kegiatan Musrenbang Kota.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
		 
	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0
		
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	Yii::app()->end(); 

}


/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
	$model=new KegiatanMusrenbangKota;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);
	$model->kunci = 0;
	if(isset($_POST['KegiatanMusrenbangKota']))
	{
		$model->attributes=$_POST['KegiatanMusrenbangKota'];
		$model->kd_urusan = $model->kegiatan_->program_->bidang_->urusan_-id;
		$model->kd_bidang = $model->kegiatan_->program_->bidang_->id;
		$model->sumber_usulan = "Musrenbang Kota";
		$uploadedFile=CUploadedFile::getInstance($model,'foto');
        $fileName = "{$uploadedFile}"; 
		 $model->foto = $fileName;
		if($model->save()){
			$uploadedFile->saveAs(Yii::app()->basePath.'/../foto/'.$fileName);
			$this->redirect(array('view','id'=>$model->id));
	}
		}

	$this->render('create',array(
		'model'=>$model,
	));
}
}
