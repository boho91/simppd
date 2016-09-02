<?php

class KegiatanRpjmdController extends Controller
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
'actions'=>array('create','update'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','AdminSkpd','ModalForm','GridUpdate','migrasiData'),
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
public function actionmigrasiData($skpd)
{
	
	$criteria2 = new CDbCriteria;
	$criteria2->condition = "t.skpd = '".$skpd."' AND t.status_verifikasi ='Diizinkan'   AND a.id IS NULL";
	$criteria2->join = "LEFT OUTER JOIN kegiatan_rpjmd a ON t.id = a.id_musrenbang_rpjmd";
	$modelRenja = MusrenbangKegiatanRpjmd::model()->findAll($criteria2);
	foreach($modelRenja as $model)
	{
		$item[id_rpjmd] = $model->id_rpjmd;
		$item[id_musrenbang_rpjmd] = $model->id;
		$item[skpd] = $model->skpd;
		$item[urusan] = $model->urusan;
		$item[bidang] = $model->bidang;
		$item[program] = $model->program;
		$item[kegiatan] = $model->kegiatan;
		$item[indikator_kinerja] = $model->indikator_kinerja;
		$item[kondisi_kinerja_awal] = $model->kondisi_kinerja_awal; 
		$item[target_tahun1] = $model->target_tahun1;
		$item[dana_tahun1] = $model->dana_tahun1;
		$item[target_tahun2] = $model->target_tahun2;
		$item[dana_tahun2] = $model->dana_tahun2;
		$item[target_tahun3] = $model->target_tahun3;
		$item[dana_tahun3] = $model->dana_tahun3;
		$item[target_tahun4] = $model->target_tahun4;
		$item[dana_tahun4] = $model->dana_tahun4;
		$item[target_akhir] = $model->target_akhir;
		$item[dana_akhir] = $model->dana_akhir;
		$item[target_tahun5] = $model->target_tahun5;
		$item[dana_tahun5] = $model->dana_tahun5;
		$item[created_date] = date("Y-m-d H:i:s");
		$item[created_by] = Yii::app()->user->name;
		$item[satuan_target_kinerja] = $model->satuan_target_kinerja;
		$value[$a] = $item;
		$a++;
	}
	if(sizeof($value)>0)
	{
		$connection = Yii::app()->db->getSchema()->getCommandBuilder();
		$command=$connection->createMultipleInsertCommand('kegiatan_rpjmd', $value);
		$command->execute();
	}
}
/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
	$model=new KegiatanRpjmd;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['KegiatanRpjmd']))
{
	$model->attributes=$_POST['KegiatanRpjmd'];
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

if(isset($_POST['KegiatanRpjmd']))
{
$model->attributes=$_POST['KegiatanRpjmd'];
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
$dataProvider=new CActiveDataProvider('KegiatanRpjmd');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin($skpd="")
{
$model=new KegiatanRpjmd('search');
$model->unsetAttributes();  // clear any default values
$model->skpd = $skpd;
if(isset($_GET['KegiatanRpjmd']))
$model->attributes=$_GET['KegiatanRpjmd'];

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
$model=KegiatanRpjmd::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='kegiatan-rpjmd-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
public function actionAdminSkpd()
{
	if(!Yii::app()->user->isAdminBappeda())
	{
		$this->redirect(array("admin"));
	}
	$model=new KegiatanRpjmd('searchPerSKpd');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['KegiatanRpjmd']))
		$model->attributes=$_GET['KegiatanRpjmd'];

	$this->render('adminSkpd',array(
		'model'=>$model,
	));
}
public function actionModalForm($skpd="")
{
	$model=new KegiatanRpjmd;
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
		$es = new TbEditableSaver('KegiatanRpjmd');
		$es->update();
		if($_POST['name']=="dana_tahun1" or $_POST['name']=='dana_tahun2' or $_POST['name']=='dana_tahun3' or $_POST['name']=='dana_tahun4' or $_POST['name']=='dana_tahun5')
		{
			$model = KegiatanRpjmd::model()->findByPk($_POST['pk']);
			$sql  = 'UPDATE kegiatan_rpjmd SET dana_akhir="'.($model->dana_tahun1+$model->dana_tahun2+$model->dana_tahun3+$model->dana_tahun4+$model->dana_tahun5).'" WHERE id="'.$model->id.'"';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();
		}
		if($_POST['name']=="target_tahun1" or $_POST['name']=='target_tahun2' or $_POST['name']=='target_tahun3' or $_POST['name']=='target_tahun4' or $_POST['name']=="target_tahun5" )
		{
			$model = KegiatanRpjmd::model()->findByPk($_POST['pk']);
			$sql  = 'UPDATE kegiatan_rpjmd SET target_akhir="'.($model->target_tahun1+$model->target_tahun2+$model->target_tahun3+$model->target_tahun4+$model->target_tahun5).'" WHERE id="'.$model->id.'"';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();
		}
	}
}
}
