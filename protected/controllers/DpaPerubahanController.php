<?php

class DpaPerubahanController extends Controller
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
'actions'=>array('create','update','tambahItem','autoCompleteSubUraian','AutoCompleteItem','adminSkpd'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','GridUpdate','tambahSubUraian','modalForm','adminKegiatan','relational','relational2'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}
public function actionTambahSubUraian($parent_id)
{
	$model=new DpaPerubahan;
	$data = $this->loadModel($parent_id);
	$model->skpd = $data['skpd'];
	$model->urusan = $data['urusan'];
	$model->bidang = $data['bidang'];
	$model->program = $data['program'];
	$model->kegiatan = $data['kegiatan'];
	$model->id_rekening_belanja = $data['id_rekening_belanja'];
	$model->level = "sub uraian";
	$model->parent_id = $parent_id;
	$model->tahun = Yii::app()->session['tahun_perencanaan'];
	if(isset($_POST['DpaPerubahan']))
	{
		$model->attributes=$_POST['DpaPerubahan'];
		//print_r($model);
		if($model->save())
			$this->redirect(array('admin','DpaPerubahan[tahun]'=>$model->tahun,'DpaPerubahan[skpd]'=>$model->skpd,'DpaPerubahan[kegiatan]'=>$model->kegiatan,'DpaPerubahan[program]'=>$model->program,'DpaPerubahan[urusan]'=>$model->urusan,'DpaPerubahan[bidang]'=>$model->bidang));
			//$this->redirect(array('admin','skpd'=>$model->skpd));
	}
	$this->renderPartial('createSubUraian',array(
		'model'=>$model,
	),false,true);
}
public function actionAutoCompleteSubUraian($term){

    $query = DpaPerubahan::model()->findall( array('condition'=>'sub_uraian like "%'.$term.'%"','group'=>'sub_uraian'));
    $list = array();        
    foreach($query as $q){
        $data['value']= $q['sub_uraian'];
        $data['label']= $q['sub_uraian'];

        $list[]= $data;
        unset($data);
    }

    echo json_encode($list);
}
public function actionAutoCompleteItem($term){

    $query = DpaPerubahan::model()->findall( array('condition'=>'item like "%'.$term.'%"','group'=>'item'));
    $list = array();        
    foreach($query as $q){
        $data['value']= $q['item'];
        $data['label']= $q['item'];

        $list[]= $data;
        unset($data);
    }

    echo json_encode($list);
}
public function actionTambahItem($parent_id)
{
	$model=new DpaPerubahan;
	$data = $this->loadModel($parent_id);
	
	$model->skpd = $data['skpd'];
	$model->urusan = $data['urusan'];
	$model->bidang = $data['bidang'];
	$model->program = $data['program'];
	$model->kegiatan = $data['kegiatan'];
	$model->id_rekening_belanja = $data['id_rekening_belanja'];
	$model->level = "item";
	$model->parent_id = $parent_id;
	$model->tahun = Yii::app()->session['tahun_perencanaan'];
	if(isset($_POST['DpaPerubahan']))
	{
		$model->attributes=$_POST['DpaPerubahan'];
		//print_r($model);
		$alokasiPagu = Rka::model()->getPaguPerKegiatan($model->skpd,$model->kegiatan,$model->program,$model->tahun);
		$jumlahPagu = DpaPerubahan::model()->getPaguPerKegiatan($model->skpd,$model->kegiatan,$model->program,$model->tahun);
		$jumlah = $model->volume *$model->harga_satuan + $jumlahPagu;
		if($alokasiPagu<$jumlah)
		{
			$model->status_verifikasi = "Belum Verifikasi";
		}
		
		if($model->save())
			$this->redirect(array('admin','DpaPerubahan[tahun]'=>$model->tahun,'DpaPerubahan[skpd]'=>$model->skpd,'DpaPerubahan[kegiatan]'=>$model->kegiatan,'DpaPerubahan[program]'=>$model->program,'DpaPerubahan[urusan]'=>$model->urusan,'DpaPerubahan[bidang]'=>$model->bidang));
			//$this->redirect(array('admin','skpd'=>$model->skpd));
	}
	$this->renderPartial('createItem',array(
		'model'=>$model,
	),false,true);
}
public function actionModalForm($skpd="")
{
	$model=new DpaPerubahan;
	if(Yii::app()->user->isAdminBappeda())
	{
		
	}else{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$model->skpd = $skpd;
	$model->tahun = Yii::app()->session['tahun_perencanaan'];
	$this->renderPartial('formAwal',array(
	'model'=>$model,
	));
}
public function actionGridUpdate()
{
	if(isset($_POST['pk']))
	{
		if($_POST['name']=="harga_satuan" or $_POST['name']=='volume')
		{
			$_POST['value'] = str_replace( ',', '', $_POST['value'] );
			$_POST['value'] = str_replace( '.', '', $_POST['value'] );
			$_POST['value'] = str_replace( 'Rp', '', $_POST['value'] );
			$_POST['value'] = str_replace( 'rp', '', $_POST['value'] );
			$_POST['value'] = str_replace( ' ', '', $_POST['value'] );
		}
		if($_POST['name']=="sumber_dana")
		{
			$sumber_dana = SumberDana::model()->findByPk($_POST['value']);
			$model = DpaPerubahan::model()->findByPk($_POST['pk']);
			$sql  = 'UPDATE dpa_perubahan SET jenis_sumber_dana="'.$sumber_dana->jenis_sumber_dana.'" WHERE urusan="'.$model->urusan.'" AND bidang="'.$model->bidang.'" AND program="'.$model->program.'" AND kegiatan="'.$model->kegiatan.'" AND skpd="'.$model->skpd.'" AND tahun="'.$model->tahun.'"';
			$command = Yii::app()->db->createCommand($sql);
			$command->execute();
	
		}
		Yii::import('booster.components.TbEditableSaver');
		$es = new TbEditableSaver('DpaPerubahan');
		$es->update();
		
	}
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

public function actionCreate()
{
$model=new DpaPerubahan;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

	if(isset($_POST['DpaPerubahan']))
	{
	$model->attributes=$_POST['DpaPerubahan'];
	if($model->save())
	$this->redirect(array('view','id'=>$model->id));
	}

$this->render('create',array(
'model'=>$model,
));
}
*/
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

if(isset($_POST['DpaPerubahan']))
{
$model->attributes=$_POST['DpaPerubahan'];
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
		$model = $this->loadModel($id);
		if($model->level=="parent1")
		{
			$this->deleteByParent1($id);
		}elseif($model->level=="parent2")
		{
			$this->deleteByParent2($id);
		}elseif($model->level=="parent3")
		{
			$this->deleteByParent3($id);
		}elseif($model->level=="parent4")
		{
			$this->deleteByParent4($id);
		}elseif($model->level=="uraian")
		{
			$this->deleteByUraian($id);
		}elseif($model->level=="sub uraian")
		{
			$this->deleteBySubUraian($id);
		}elseif($model->level=="item")
		{
			//$this->deleteByParent1($id);
			$this->loadModel($id)->delete();
		}
		
		//$this->loadModel($id)->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('admin','DpaPerubahan[tahun]'=>$model->tahun,'DpaPerubahan[skpd]'=>$model->skpd,'DpaPerubahan[kegiatan]'=>$model->kegiatan,'DpaPerubahan[program]'=>$model->program,'DpaPerubahan[urusan]'=>$model->urusan,'DpaPerubahan[bidang]'=>$model->bidang));
	}
	else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}
public function deleteByParent1($id)
{	
	$dataParent2 = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$id.'"'));
	$model = $this->loadModel($id);
	if(sizeof($dataParent2)>0)
	{
		foreach($dataParent2 as $parent2)
		{
			$dataParent3 = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$parent2->id.'"'));
			if(sizeof($dataParent3)>0)
			{
				foreach($dataParent3 as $parent3)
				{
					$dataParent4 = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$parent3->id.'"'));
					if(sizeof($dataParent4)>0)
					{
						foreach($dataParent4 as $parent4)
						{
							$dataUraian = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$parent4->id.'"'));
							if(sizeof($dataUraian)>0)
							{
								foreach($dataUraian as $uraian)
								{
									$dataSubUraian = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$uraian->id.'"'));
									if(sizeof($dataSubUraian)>0)
									{
										foreach($dataSubUraian as $itemSubUraian)
										{
											$dataItem  =  DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$itemSubUraian->id.'"'));
											if(sizeof($dataItem)>0)
											{
												foreach($dataItem as $item)
												{
													$this->loadModel($item->id)->delete();
												}
											}
											$this->loadModel($itemSubUraian->id)->delete();
										}
									}
									$this->loadModel($uraian->id)->delete();
								}
							}
							$this->loadModel($parent4->id)->delete();
						}
					}
					$this->loadModel($parent3->id)->delete();
				}
			}
			$this->loadModel($parent2->id)->delete();
		}
	}
	$this->loadModel($id)->delete();
	if(!isset($_GET['ajax']))
		$this->redirect(array('admin','DpaPerubahan[tahun]'=>$model->tahun,'DpaPerubahan[skpd]'=>$model->skpd,'DpaPerubahan[kegiatan]'=>$model->kegiatan,'DpaPerubahan[program]'=>$model->program,'DpaPerubahan[urusan]'=>$model->urusan,'DpaPerubahan[bidang]'=>$model->bidang));
}
public function deleteByParent2($id)
{	
	$dataParent3 = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$id.'"'));
	$model = $this->loadModel($id);
	if(sizeof($dataParent3)>0)
	{
		foreach($dataParent3 as $parent3)
		{
			$dataParent4 = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$parent3->id.'"'));
			if(sizeof($dataParent4)>0)
			{
				foreach($dataParent4 as $parent4)
				{
					$dataUraian = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$parent4->id.'"'));
					if(sizeof($dataUraian)>0)
					{
						foreach($dataUraian as $uraian)
						{
							$dataSubUraian = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$uraian->id.'"'));
							if(sizeof($dataSubUraian)>0)
							{
								foreach($dataSubUraian as $itemSubUraian)
								{
									$dataItem  =  DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$itemSubUraian->id.'"'));
									if(sizeof($dataItem)>0)
									{
										foreach($dataItem as $item)
										{
											$this->loadModel($item->id)->delete();
										}
									}
									$this->loadModel($itemSubUraian->id)->delete();
									
								}
							}
							$this->loadModel($uraian->id)->delete();
						}
					}
					$this->loadModel($parent4->id)->delete();
				}
				
			}
			$this->loadModel($parent3->id)->delete();
		}
	}
	$this->loadModel($id)->delete();
	if(!isset($_GET['ajax']))
		$this->redirect(array('admin','DpaPerubahan[tahun]'=>$model->tahun,'DpaPerubahan[skpd]'=>$model->skpd,'DpaPerubahan[kegiatan]'=>$model->kegiatan,'DpaPerubahan[program]'=>$model->program,'DpaPerubahan[urusan]'=>$model->urusan,'DpaPerubahan[bidang]'=>$model->bidang));
}
public function deleteByParent3($id)
{
	$dataParent4 = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$id.'"'));
	$model = $this->loadModel($id);
	if(sizeof($dataParent4)>0)
	{
		foreach($dataParent4 as $parent4)
		{
			$dataUraian = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$parent4->id.'"'));
			if(sizeof($dataUraian)>0)
			{
				foreach($dataUraian as $uraian)
				{
					$dataSubUraian = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$uraian->id.'"'));
					if(sizeof($dataSubUraian)>0)
					{
						foreach($dataSubUraian as $itemSubUraian)
						{
							$dataItem  =  DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$itemSubUraian->id.'"'));
							if(sizeof($dataItem)>0)
							{
								foreach($dataItem as $item)
								{
									$this->loadModel($item->id)->delete();
								}
							}
							$this->loadModel($itemSubUraian->id)->delete();
						}
					}
					$this->loadModel($uraian->id)->delete();
				}
			}
			$this->loadModel($parent4->id)->delete();
		}
	}
	$this->loadModel($id)->delete();
	if(!isset($_GET['ajax']))
		$this->redirect(array('admin','DpaPerubahan[tahun]'=>$model->tahun,'DpaPerubahan[skpd]'=>$model->skpd,'DpaPerubahan[kegiatan]'=>$model->kegiatan,'DpaPerubahan[program]'=>$model->program,'DpaPerubahan[urusan]'=>$model->urusan,'DpaPerubahan[bidang]'=>$model->bidang));
}
public function deleteByParent4($id)
{
	$dataUraian = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$id.'"'));
	$model = $this->loadModel($id);
	if(sizeof($dataUraian)>0)
	{
		foreach($dataUraian as $uraian)
		{
			if(sizeof($dataUraian)>0)
			{
				$dataSubUraian = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$uraian->id.'"'));
				if(sizeof($dataSubUraian)>0)
				{
					foreach($dataSubUraian as $itemSubUraian)
					{
						$dataItem  =  DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$itemSubUraian->id.'"'));
						if(sizeof($dataItem)>0)
						{
							foreach($dataItem as $item)
							{
								$this->loadModel($item->id)->delete();
							}
						}
						$this->loadModel($itemSubUraian->id)->delete();
					}
				}
			}
			$this->loadModel($uraian->id)->delete();
		}
	}
	$this->loadModel($id)->delete();
	if(!isset($_GET['ajax']))
		$this->redirect(array('admin','DpaPerubahan[tahun]'=>$model->tahun,'DpaPerubahan[skpd]'=>$model->skpd,'DpaPerubahan[kegiatan]'=>$model->kegiatan,'DpaPerubahan[program]'=>$model->program,'DpaPerubahan[urusan]'=>$model->urusan,'DpaPerubahan[bidang]'=>$model->bidang));
}
public function deleteByUraian($id)
{
	$dataSubUraian = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$id.'"'));
	$model = $this->loadModel($id);
	if(sizeof($dataSubUraian)>0)
	{
		foreach($dataSubUraian as $itemSubUraian)
		{
			$dataItem  =  DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$itemSubUraian->id.'"'));
			
			if(sizeof($dataItem)>0)
			{
				foreach($dataItem as $item)
				{
					$this->loadModel($item->id)->delete();
				}
			}
			$this->loadModel($itemSubUraian->id)->delete();
		}
	}
	$this->loadModel($id)->delete();
	if(!isset($_GET['ajax']))
		$this->redirect(array('admin','DpaPerubahan[tahun]'=>$model->tahun,'DpaPerubahan[skpd]'=>$model->skpd,'DpaPerubahan[kegiatan]'=>$model->kegiatan,'DpaPerubahan[program]'=>$model->program,'DpaPerubahan[urusan]'=>$model->urusan,'DpaPerubahan[bidang]'=>$model->bidang));
}
public function deleteBySubUraian($id)
{
	$model = $this->loadModel($id);
	$models = DpaPerubahan::model()->findAll(array('condition'=>'parent_id="'.$id.'"'));
	if(sizeof($models)>0)
	{
		$model_s = DpaPerubahan::model()->deleteAll(array('condition'=>'parent_id="'.$id.'"'));
	}
	$this->loadModel($id)->delete();
	if(!isset($_GET['ajax']))
		$this->redirect(array('admin','DpaPerubahan[tahun]'=>$model->tahun,'DpaPerubahan[skpd]'=>$model->skpd,'DpaPerubahan[kegiatan]'=>$model->kegiatan,'DpaPerubahan[program]'=>$model->program,'DpaPerubahan[urusan]'=>$model->urusan,'DpaPerubahan[bidang]'=>$model->bidang));
}
/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('DpaPerubahan');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin($skpd="")
{
	$model=new DpaPerubahan;
	$model->unsetAttributes(); 
	$model->tahun = Yii::app()->session['tahun_perencanaan'];
	$model->skpd = Yii::app()->getRequest()->getParam('skpd');
	
	$alokasiPagu = "";
	//$skpd = Yii::app()->getRequest()->getParam('skpd');
	if($skpd =="")
		$skpd = $_GET['DpaPerubahan']['skpd'];
	if(isset($_POST['DpaPerubahan']))
	{
		$modelNew=new DpaPerubahan;
		$modelNew->attributes=$_POST['DpaPerubahan'];
		$modelNew->urusan = $modelNew->kegiatan_->program_->bidang_->urusan_-id;
		$modelNew->level = 'uraian';
		$modelNew->bidang = $modelNew->kegiatan_->program_->bidang_->id;
		$kodeRekening1 = $modelNew->rekening_belanja->kode1;
		$kodeRekening2 = $modelNew->rekening_belanja->kode2;
		$kodeRekening3 = $modelNew->rekening_belanja->kode3;
		$kodeRekening4 = $modelNew->rekening_belanja->kode4;
		$kodeRekening5 = $modelNew->rekening_belanja->kode5;
		$parent1 = RekeningBelanja::model()->find(array('condition'=>'kode1 ="'.$kodeRekening1.'" AND kode2 ="" AND kode3 ="" AND kode4 =""'));
		$parent2 = RekeningBelanja::model()->find(array('condition'=>'kode1 ="'.$kodeRekening1.'" AND kode2 ="'.$kodeRekening2.'" AND kode3 ="" AND kode4 =""'));
		$parent3 = RekeningBelanja::model()->find(array('condition'=>'kode1 ="'.$kodeRekening1.'" AND kode2 ="'.$kodeRekening2.'" AND kode3 ="'.$kodeRekening3.'" AND kode4 =""'));
		$parent4 = RekeningBelanja::model()->find(array('condition'=>'kode1 ="'.$kodeRekening1.'" AND kode2 ="'.$kodeRekening2.'" AND kode3 ="'.$kodeRekening3.'" AND kode4 ="'.$kodeRekening4.'"'));
		//
		$modelParent1 = new DpaPerubahan;
		$modelParent1->attributes=$_POST['DpaPerubahan'];
		$modelParent1->urusan = $modelNew->kegiatan_->program_->bidang_->urusan_-id;
		$modelParent1->level = 'parent1';
		$modelParent1->bidang = $modelNew->kegiatan_->program_->bidang_->id;
		$modelParent1->id_rekening_belanja = $parent1->id;
		$cekParent1 = DpaPerubahan::model()->find(array('condition'=>'kegiatan = "'.$modelNew->kegiatan.'" AND program = "'.$modelNew->program.'" AND bidang = "'.$modelNew->bidang.'" AND urusan = "'.$modelNew->urusan.'" AND tahun = "'.$modelNew->tahun.'" AND skpd = "'.$modelNew->skpd.'" AND id_rekening_belanja="'.$modelParent1->id_rekening_belanja.'"'));
		if(sizeof($cekParent1)==0)
			$modelParent1->save();	
		else 
			$modelParent1->id = $cekParent1->id;
		// 
		$modelParent2 = new DpaPerubahan;
		$modelParent2->attributes=$_POST['DpaPerubahan'];
		$modelParent2->urusan = $modelNew->kegiatan_->program_->bidang_->urusan_-id;
		$modelParent2->level = 'parent2';
		$modelParent2->parent_id = $modelParent1->id;
		$modelParent2->bidang = $modelNew->kegiatan_->program_->bidang_->id;
		$modelParent2->id_rekening_belanja = $parent2->id;
		$cekParent2 = DpaPerubahan::model()->find(array('condition'=>'kegiatan = "'.$modelNew->kegiatan.'" AND program = "'.$modelNew->program.'" AND bidang = "'.$modelNew->bidang.'" AND urusan = "'.$modelNew->urusan.'" AND tahun = "'.$modelNew->tahun.'" AND skpd = "'.$modelNew->skpd.'" AND id_rekening_belanja="'.$modelParent2->id_rekening_belanja.'"'));
		if(sizeof($cekParent2)==0)
			$modelParent2->save();
		else 
			$modelParent2->id = $cekParent2->id;
		// 
		$modelParent3 = new DpaPerubahan;
		$modelParent3->attributes=$_POST['DpaPerubahan'];
		$modelParent3->urusan = $modelNew->kegiatan_->program_->bidang_->urusan_-id;
		$modelParent3->level = 'parent3';
		$modelParent3->parent_id = $modelParent2->id;
		$modelParent3->bidang = $modelNew->kegiatan_->program_->bidang_->id;
		$modelParent3->id_rekening_belanja = $parent3->id;
		$cekParent3 = DpaPerubahan::model()->find(array('condition'=>'kegiatan = "'.$modelNew->kegiatan.'" AND program = "'.$modelNew->program.'" AND bidang = "'.$modelNew->bidang.'" AND urusan = "'.$modelNew->urusan.'" AND tahun = "'.$modelNew->tahun.'" AND skpd = "'.$modelNew->skpd.'" AND id_rekening_belanja="'.$modelParent3->id_rekening_belanja.'"'));
		if(sizeof($cekParent3)==0)
			$modelParent3->save();
		else 
			$modelParent3->id = $cekParent3->id;
		// 
		$modelParent4 = new DpaPerubahan;
		$modelParent4->attributes=$_POST['DpaPerubahan'];
		$modelParent4->urusan = $modelNew->kegiatan_->program_->bidang_->urusan_-id;
		$modelParent4->level = 'parent4';
		$modelParent4->parent_id = $modelParent3->id;
		$modelParent4->bidang = $modelNew->kegiatan_->program_->bidang_->id;
		$modelParent4->id_rekening_belanja = $parent4->id;
		$cekParent4 = DpaPerubahan::model()->find(array('condition'=>'kegiatan = "'.$modelNew->kegiatan.'" AND program = "'.$modelNew->program.'" AND bidang = "'.$modelNew->bidang.'" AND urusan = "'.$modelNew->urusan.'" AND tahun = "'.$modelNew->tahun.'" AND skpd = "'.$modelNew->skpd.'" AND id_rekening_belanja="'.$modelParent4->id_rekening_belanja.'"'));
		if(sizeof($cekParent4)==0)
			$modelParent4->save();
		else 
			$modelParent4->id = $cekParent4->id;
		$modelNew=new DpaPerubahan;
		$modelNew->attributes=$_POST['DpaPerubahan'];
		$modelNew->urusan = $modelNew->kegiatan_->program_->bidang_->urusan_-id;
		$modelNew->level = 'uraian';
		$modelNew->bidang = $modelNew->kegiatan_->program_->bidang_->id;
		$modelNew->parent_id = $modelParent4->id;
		$modelNew->save();
		
		$this->redirect(array('admin','DpaPerubahan[tahun]'=>$modelNew->tahun,'DpaPerubahan[skpd]'=>$modelNew->skpd,'DpaPerubahan[kegiatan]'=>$modelNew->kegiatan,'DpaPerubahan[program]'=>$modelNew->program,'DpaPerubahan[urusan]'=>$modelNew->urusan,'DpaPerubahan[bidang]'=>$modelNew->bidang));
		
		$model=new DpaPerubahan('search');
		$model->unsetAttributes(); 
		$model->attributes=$_POST['DpaPerubahan'];
		$criteria3 = new CDbCriteria;
		$criteria3->condition = "skpd = '".$model->skpd."' AND tahun='".$model->tahun."' AND kegiatan='".$model->kegiatan."' AND level='parent1'";
		$data = DpaPerubahan::model()->find($criteria3);
		//$data->attributes = $_POST['DpaPerubahan'];
		//echo $modelParent2->id;
		$alokasiPagu = RkaPerubahan::model()->getPaguPerKegiatan($model->skpd,$model->kegiatan,$model->program,$model->tahun);
		$jumlahPagu = DpaPerubahan::model()->getPaguPerKegiatan($model->skpd,$model->kegiatan,$model->program,$model->tahun);
		$this->render('admin',array(
            'model'=>$model,
			'alokasiPagu'=>$alokasiPagu,
			'jumlahPagu'=>$jumlahPagu,
			'search'=>true,
			'data'=>$data
			//'data'=>$model->search()->kegiatan
        ));
	}
	
    elseif(isset($_GET['DpaPerubahan']))
    {
		$model=new DpaPerubahan('search');
		$model->unsetAttributes(); 
		$model->attributes=$_GET['DpaPerubahan'];
		$criteria3 = new CDbCriteria;
		$criteria3->condition = "skpd = '".$model->skpd."' AND tahun='".$model->tahun."' AND kegiatan='".$model->kegiatan."' AND level='parent1'";
		$data = DpaPerubahan::model()->find($criteria3);
		//$cekParent1 = DpaPerubahan::model()->find(array('condition'=>'kegiatan = "'.$modelNew->kegiatan.'" AND program = "'.$modelNew->program.'" AND bidang = "'.$modelNew->bidang.'" AND urusan = "'.$modelNew->urusan.'" AND tahun = "'.$modelNew->tahun.'" AND skpd = "'.$modelNew->skpd.'" AND id_rekening_belanja="'.$modelParent1->id_rekening_belanja.'"'));
		//$data->attributes = $_POST['DpaPerubahan'];
		//$model->tahun = Yii::app()->session['tahun_perencanaan'];
        $alokasiPagu = RkaPerubahan::model()->getPaguPerKegiatan($model->skpd,$model->kegiatan,$model->program,$model->tahun);
		$jumlahPagu = DpaPerubahan::model()->getPaguPerKegiatan($model->skpd,$model->kegiatan,$model->program,$model->tahun);
		$this->render('admin',array(
            'model'=>$model,
			'alokasiPagu'=>$alokasiPagu,
			'jumlahPagu'=>$jumlahPagu,
			'search'=>true,
			'data'=>$data
			//'data'=>$model->search()->kegiatan
        ));
    }else 
	{
		$this->render('admin',array(
           'model'=>$model,
		  // 'alokasiPagu'=>$alokasiPagu
        ));
	}
	
        
}/*
public function actionAdminKegiatan()
{
	$model=new DpaPerubahan;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
	$modelSearch=new DpaPerubahan('search');
	$dataProvider=new CActiveDataProvider('DpaPerubahan');
	$modelSearch->tahun = Yii::app()->session['tahun_perencanaan'];
	$modelSearch->attributes=$_POST['DpaPerubahan'];
if(isset($_POST['DpaPerubahan']))
{
	$model->attributes=$_POST['DpaPerubahan'];
	$model->urusan = $model->kegiatan_->program_->bidang_->urusan_-id;
	$model->level = 'uraian';
	$model->bidang = $model->kegiatan_->program_->bidang_->id;
	$model->save();
	//if($model->save())
		//$this->redirect(array('view','id'=>$model->id));
		$criteria = new CDbCriteria();
	 
		$model->unsetAttributes();  // clear any default values
		
        foreach($_POST['DpaPerubahan'] as $key=>$value) {
            $criteria -> compare($key, $value, true, 'AND');
        }
		$model->tahun = Yii::app()->session['tahun_perencanaan'];
        $dataProvider = new CActiveDataProvider('DpaPerubahan', array('criteria' => $criteria));
	}
	if(isset($_GET['DpaPerubahan']))
    {
		
	 
		$criteria = new CDbCriteria();
	 
		$model->unsetAttributes();  // clear any default values
		
        foreach($_GET['DpaPerubahan'] as $key=>$value) {
            $criteria -> compare($key, $value, true, 'AND');
        }
		$model->tahun = Yii::app()->session['tahun_perencanaan'];
        $dataProvider = new CActiveDataProvider('DpaPerubahan', array('criteria' => $criteria));
    }
	//$this->renderPartial('_relational_grid', array(
    //    'id' => Yii::app()->getRequest()->getParam('id'),
    //    'gridDataProvider' => $this->dataProvider(),
    //    'gridColumns' => $this->getGridColumns()
   // ));
	$this->render('admin',array(
            'model'=>$model,'dataProvider'=>$dataProvider
        ));
}
public function actionRelational()
{
    // partially rendering "_relational" view
    $this->renderPartial('relational_1', array(
        'id' => Yii::app()->getRequest()->getParam('id'),
        'gridDataProvider' => $this->getGridDataProvider(Yii::app()->getRequest()->getParam('id')),
    ), false, true);
}
public function actionRelational2()
{
    // partially rendering "_relational" view
    $this->renderPartial('relational_2', array(
        'id' => Yii::app()->getRequest()->getParam('id'),
        'gridDataProvider' => $this->getGridDataProvider(Yii::app()->getRequest()->getParam('id')),
    ), false, true);
}
public function getGridDataProvider($id) {
	$sql = 'SELECT * FROM DpaPerubahan WHERE parent_id = :parent_id ORDER BY id';
	$cmd = Yii::app()->db->createCommand($sql);
	$cmd->binDpaPerubahanram(':parent_id', $id, PDO::PARAM_INT);
	$result = $cmd->queryAll();
	$dataProvider = new CArrayDataProvider(
	$result, array(
		'sort' => array(
		'attributes' => array('id','parent_id','id'),
		'defaultOrder' => array('id' => CSort::SORT_ASC),
		),
		
		'pagination' => array(
			'pageSize' => 1,
		),
		));
            
	return $dataProvider;
}
*/
public function actionAdminSkpd()
{
	//$this->migrasiMusrenbangByDeleteInsert(Yii::app()->session['tahun_perencanaan']);
	if(!Yii::app()->user->isAdminBappeda())
	{
		$this->redirect(array("admin"));
	}
	
	$model=new DpaPerubahan('searchPerSKpd');
	$model->tahun= Yii::app()->session['tahun_perencanaan'];
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['DpaPerubahan']))
	{
		$model->attributes=$_GET['DpaPerubahan'];
		$model->tahun= Yii::app()->session['tahun_perencanaan'];
		
	}
	$this->render('adminSkpd',array(
		'model'=>$model,
		'alokasiPagu'=>$alokasiPagu
	));
}
/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=DpaPerubahan::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='DpaPerubahan-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
