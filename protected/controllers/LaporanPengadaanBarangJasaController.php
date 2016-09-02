<?php

class LaporanPengadaanBarangJasaController extends Controller
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
'actions'=>array('create','update','export','laporan','summary'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','detailSkpd'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}
public function actiondetailSkpd($skpd,$tahun)
{
	$model=new LaporanPengadaanBarangJasa('search');
	$model->unsetAttributes();  // clear any default values
	
	if(isset($_GET['LaporanPengadaanBarangJasa']))
	$model->attributes=$_GET['LaporanPengadaanBarangJasa'];
	if(Yii::app()->user->isOperatorDinas())
	{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$model->skpd = $skpd;
	$model->tahun = $tahun;
	$this->render('detail_per_skpd',array(
		'model'=>$model,
	));
}
public function actionsummary()
{
	$model=new LaporanPengadaanBarangJasa('summary_per_skpd');
	$model->unsetAttributes();  // clear any default values
	$model->tahun = date("Y");
	
	if(isset($_GET['LaporanPengadaanBarangJasa']))
	$model->attributes=$_GET['LaporanPengadaanBarangJasa'];
	if(Yii::app()->user->isOperatorDinas())
	{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$this->render('summary_per_skpd',array(
		'model'=>$model,
	));
}
public function actionLaporan()
{
	$model=new LaporanPengadaanBarangJasa;
	$model->unsetAttributes();  // clear any default values
	
	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['LaporanPengadaanBarangJasa']))
	{
		$model->attributes=$_POST['LaporanPengadaanBarangJasa'];
		$criteria = new CDbCriteria();
		$criteria->select = "t.*";
		$criteria->condition = " tahun = '".$model->tahun."' AND triwulan = '".$model->triwulan."'";
		$data = LaporanPengadaanBarangJasa::model()->findAll($criteria);
		
		$jenis_file= $model->jenis_file;
		if($model->jenis_file == "PDF")
		{
			$html2pdf = Yii::app()->ePdf->HTML2PDF('L', 'legal', 'en');
			//$html2pdf->orientation = "landscape";
			//$this->renderPartial('laporan_pdf',array('model'=>$model));
			$html2pdf->WriteHTML($this->renderPartial('laporan_print',
						array(
							'model'=>$data,'jenis_file'=>$jenis_file,
							), 
						true
						)
			);
			$html2pdf->output();
		}else if($model->jenis_file == "Excel")
		{
			
			$this->renderPartial('laporan_excel',
					array(
						'model'=>$data,
						'jenis_file'=>$jenis_file,
						)
			);
			Yii::app()->end();
		}
	}

	$this->render('laporan',array(
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
public function actionExport()
{
	$model=new LaporanPengadaanBarangJasa('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_POST['LaporanPengadaanBarangJasa']))
		$model->attributes=$_POST['LaporanPengadaanBarangJasa'];
	$model = $model->search();
	if(isset($_POST['PDF']))
	{
		$html2pdf = Yii::app()->ePdf->HTML2PDF('L', 'legal', 'en');
		//$html2pdf->orientation = "landscape";
		//$this->renderPartial('laporan_pdf',array('model'=>$model));
		$html2pdf->WriteHTML($this->renderPartial('laporan_pdf',array('model'=>$model), true));
		$html2pdf->output();
		//print_r($model);
	}else if(isset($_POST['Excel']))
	{
		/*Yii::import('ext.phpexcel.XPHPExcel');    
		$objPHPExcel= XPHPExcel::createPHPExcel();
		$objPHPExcel->getProperties()->setCreator("Bappeda Kabupaten Mandailing Natal")
								 ->setLastModifiedBy("Bappeda Kabupaten Mandailing Natal")
								 ->setTitle("Simrenbang Bappeda Kabupaten Mandailing Natal")
								 ->setSubject("Simrenbang Bappeda Kabupaten Mandailing Natal")
								 ->setDescription("Simrenbang Bappeda Kabupaten Mandailing Natal")
								 ->setKeywords("Bappeda Kabupaten Mandailing Natal")
								 ->setCategory("Bappeda Kabupaten Mandailing Natal");
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Times New Roman');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(8); 
		
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
			'allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN
			)
		)
		);

	   
		$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kabupaten Mandailing Natal');
		$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setTitle('Laporan Pengadaan');
		$objPHPExcel->getActiveSheet()->mergeCells('A2:Q2');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','LAPORAN PENGADAAN BARANG DAN JASA KABUPATEN MANDAILING NATAL');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4','NO.');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4','URAIAN/KEGIATAN.');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C4','SATUAN');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D4','BIAYA');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E4','PROSES PENGADAAN (TGL/BLN/THN)');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F4','T.TANGAN KONTRAK (TGL/BLN/THN)');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G4','PELAKSANAAN (TGL/BLN/THN)');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H4','PHO (TGL/BLN/THN)');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I4','KET ');
		// Redirect output to a clientâ€™s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Laporan Pengadaan Barang dan Jasa.xls"');
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
		Yii::app()->end();*/
		header("Cache-Control: no-cache, no-store, must-revalidate");
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=Laporan_Pengadaan_Barang_dan_Jasa.xls");
		$this->renderPartial('laporan_pdf',array('model'=>$model));
		Yii::app()->end();
	}
}
/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new LaporanPengadaanBarangJasa;
	if(Yii::app()->user->isOperatorDinas())
	{
		$model->skpd = Yii::app()->user->account->skpd;
	}
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['LaporanPengadaanBarangJasa']))
{
	$model->attributes=$_POST['LaporanPengadaanBarangJasa'];
	
if($model->save())
{
	$this->redirect(array('view','id'=>$model->id));
	
}

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

if(isset($_POST['LaporanPengadaanBarangJasa']))
{
$model->attributes=$_POST['LaporanPengadaanBarangJasa'];

if($model->save())
{
	$this->redirect(array('view','id'=>$model->id));
}

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
	$this->redirect(array('admin'));
	//$dataProvider=new CActiveDataProvider('LaporanPengadaanBarangJasa');
	//$this->render('index',array(
	//'dataProvider'=>$dataProvider,
	//));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
	$model=new LaporanPengadaanBarangJasa('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['LaporanPengadaanBarangJasa']))
	$model->attributes=$_GET['LaporanPengadaanBarangJasa'];
	if(Yii::app()->user->isOperatorDinas())
	{
		$model->skpd = Yii::app()->user->account->skpd;
	}
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
$model=LaporanPengadaanBarangJasa::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='laporan-pengadaan-barang-jasa-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
