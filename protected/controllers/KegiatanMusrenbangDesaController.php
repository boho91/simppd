<?php

class KegiatanMusrenbangDesaController extends Controller
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
'actions'=>array('create','update','modalForm','AdminSkpd','foto','usulanexcel','cetakusulanexcel','usulanpdf','cetakusulanpdf','plafonexcel','cetakplafonexcel','plafonPdf','cetakPlafonPdf'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
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

public function actionFoto($id)
{
	$uploadedFile=CUploadedFile::getInstance($model,'foto');
     $fileName = "{$uploadedFile}"; 
$this->render('foto',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
	$model=new KegiatanMusrenbangDesa;
	$modelKecamatan=new KegiatanMusrenbang;
	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);
	$model->kunci = 0;
	if(isset($_POST['KegiatanMusrenbangDesa']))
	{
		$model->attributes=$_POST['KegiatanMusrenbangDesa'];
		$modelKecamatan->attributes=$_POST['KegiatanMusrenbangDesa'];
		$model->kd_urusan = $model->kegiatan_->program_->bidang_->urusan_-id;
		$model->kd_bidang = $model->kegiatan_->program_->bidang_->id;
		$modelKecamatan->kd_urusan = $model->kegiatan_->program_->bidang_->urusan_-id;
		$modelKecamatan->kd_bidang = $model->kegiatan_->program_->bidang_->id;
		$modelKecamatan->sumber_usulan = "Musrenbang Desa";
		$uploadedFile=CUploadedFile::getInstance($model,'foto');
        $fileName = "{$uploadedFile}"; 
        $model->foto = $fileName;
		if($model->save())
		{
			$uploadedFile->saveAs(Yii::app()->basePath.'/../foto/'.$fileName);
			$modelKecamatan->save();
			$this->redirect(array('view','id'=>$model->id));
		}
	}

	$this->render('create',array(
		'model'=>$model,
	));
}

public function actionPlafonPdf(){
	$model=new KegiatanMusrenbangDesa;
	if(isset($_POST['KegiatanMusrenbangDesa']))
	{
		$model->attributes=$_POST['KegiatanMusrenbangDesa'];
		
		
		$this->redirect(array('cetakplafonpdf','tahun'=>$model->tahun,'kd_urusan'=>$model->kd_urusan));
	}
	$this->render('cetakplafonpdf',array(
	'model'=>$model,
	));
	
}

public function actionCetakPlafonPdf($tahun,$kd_urusan)
{
	Yii::import('ext.phpexcel.XPHPExcel');    
	
	$objPHPExcel= XPHPExcel::createPHPExcel();
	
	$renderer = XPHPExcel::createPHPExcelSetting();
	$rendererName = $renderer::PDF_RENDERER_MPDF;
	//echo $rendererName;

	$rendererLibrary = 'mPDF60';
	
	$rendererLibraryPath = dirname(__FILE__).'/../extensions/phpexcel/vendor/PHPExcel/Libraries/' . $rendererLibrary;
	
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.' AND kd_urusan='.$kd_urusan.' ';
	$criteria->select = "t.*,SUM(pagu_tahun_1) AS pagu_tahun_1, SUM(pagu_tahun_2) AS pagu_tahun_1";
		
	$criteria->group = "desa";

	$model = KegiatanMusrenbangDesa::model()->findAll($criteria);
	
	$urusan = Urusan::model()->find(array('condition'=>'id = '.$kd_urusan.''));
	
	
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
        'bold'  => false,
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
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	);
	
	$cell = array('B','C','D','E');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang Desa');
	
	$objPHPExcel->getActiveSheet()->mergeCells('B1:E1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1',"PLAFON ANGGARAN SEMENTARA TAHUN ANGGARAN ".$tahun." \nSUMBER USULAN MUSRENBANG");
	$objPHPExcel->getActiveSheet()->getStyle("B1:E1")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(22);
	$objPHPExcel->getActiveSheet()->getStyle("B1")->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getStyle("B2:E6")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(22);
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(0);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(33);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(33);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(33);
	
	
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
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->desa_->desa);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,AplikasiKomponen::uang($data->pagu_tahun_1));
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,AplikasiKomponen::uang($data->pagu_tahun_2));
			
		$rows_awal++;		
		$total1+=$data->pagu_tahun_1;
		$total2+=$data->pagu_tahun_2;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal.":E".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,'TOTAL');
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,AplikasiKomponen::uang($total2));
		
	$row=$rows_awal+1;
	$row_akhir=$rows_awal+10;
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(20);
	$objPHPExcel->getActiveSheet()->getStyle("B".$row.":E".$row_akhir."")->applyFromArray($styleHeading);	
		
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,'KOTA PEMATANGSIANTAR');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(30);
	$rows+=2;
	
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows,$setting->nip_penanda_tangan_dokumen);
	
	$objPHPExcel->getActiveSheet()->getStyle("A1:A".$rows."")->applyFromArray($styleHeading);
	
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
	$model=new KegiatanMusrenbangDesa;
	if(isset($_POST['KegiatanMusrenbangDesa']))
	{
		$model->attributes=$_POST['KegiatanMusrenbangDesa'];
		
		
		$this->redirect(array('cetakusulanpdf','tahun'=>$model->tahun,'kd_urusan'=>$model->kd_urusan,'desa'=>$model->desa));
	}
	$this->render('cetakusulanpdf',array(
	'model'=>$model,
	));
	
}
public function actionCetakUsulanPdf($tahun,$desa,$kd_urusan)
{
	Yii::import('ext.phpexcel.XPHPExcel');    
	
	$objPHPExcel= XPHPExcel::createPHPExcel();
	
	$renderer = XPHPExcel::createPHPExcelSetting();
	$rendererName = $renderer::PDF_RENDERER_MPDF;
	//echo $rendererName;

	$rendererLibrary = 'mPDF60';
	
	$rendererLibraryPath = dirname(__FILE__).'/../extensions/phpexcel/vendor/PHPExcel/Libraries/' . $rendererLibrary;
	
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.' AND kd_urusan='.$kd_urusan.' AND desa='.$desa.'';
	//$criteria->select = "t.*,SUM(pagu_tahun_1) AS sumPagu1, SUM(pagu_tahun_2) AS sumPagu2";
		
	$criteria->order = "t.kd_bidang, t.kd_prog,t.kd_kegiatan";
	$criteria->select = "t.*";
	$model = KegiatanMusrenbangDesa::model()->findAll($criteria);
	$desa = desa::model()->find(array('condition'=>'id = '.$desa.''));
	$urusan = Urusan::model()->find(array('condition'=>'id = '.$kd_urusan.''));
	
	
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
        'bold'  => false,
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
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	);
	
	$cell = array('A','B','C','D','E','F','G','H','I','J','K','L','M');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang Desa');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:M1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','USULAN KEGIATAN MUSRENBANG Desa '.$desa->desa.' TAHUN '.$tahun.'');
	$objPHPExcel->getActiveSheet()->getStyle("A1:M1")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(25);
	$objPHPExcel->getActiveSheet()->getStyle("A2:M6")->applyFromArray($styleHeading);
	
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getStyle("A5")->applyFromArray($styleHeading);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5', ': '.$urusan->urusan);
	$objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(25);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A7:A8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A7','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B7:B8');
	$objPHPExcel->getActiveSheet()->getStyle("B7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B7','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C7:C8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C7','URAIAN');
	$objPHPExcel->getActiveSheet()->mergeCells('D7:D8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D7','VOLUME');
	$objPHPExcel->getActiveSheet()->mergeCells('E7:E8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E7','SATUAN');
	$objPHPExcel->getActiveSheet()->mergeCells('F7:F8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F7','PRIORITAS DAERAH');
	$objPHPExcel->getActiveSheet()->mergeCells('G7:G8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G7','SASARAN DAERAH');
	$objPHPExcel->getActiveSheet()->mergeCells('H7:H8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H7','SASARAN KEGIATAN');
	$objPHPExcel->getActiveSheet()->getStyle('I7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I7','PAGU TAHUN 1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I8','(Rp)');
	$objPHPExcel->getActiveSheet()->getStyle('J7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J7','PAGU TAHUN 2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J8','(Rp)');
	$objPHPExcel->getActiveSheet()->mergeCells('K7:K8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K7','SUMBER DANA');
	$objPHPExcel->getActiveSheet()->mergeCells('L7:L8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L7','KECAMATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('M7:M8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M7','SKPD');
	$objPHPExcel->getActiveSheet()->getStyle("A7:M9")->applyFromArray($styleTH);
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."9",$a+1);
	}
	
	$rows_awal = 10;
	$nomor_bidang = 0;
	$currentBidang;
	$currentProgram;
	$tempBidang;
	$tempProgram;
	$total1=0;
	$total2=0;
	foreach($model as $data)
	{
		$currentBidang=$data->kd_bidang;
		$currentProgram=$data->kd_prog;
		
		if($currentBidang != $tempBidang){
		
			$totalPaguPerBidang=KegiatanMusrenbangDesa::model()->totalPaguPerBidangDesa($data->tahun,$data->desa,$data->kd_bidang);
			$totalPaguPerBidang=explode("|",$totalPaguPerBidang);
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
			$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("L".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$nomor_bidang++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[0]));
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[1]));
				
			$rows_awal++;
			
			$nomor_program = 0;
			
		}
		
		if($currentProgram != $tempProgram){
			$totalPaguPerProgram=KegiatanMusrenbangDesa::model()->totalPaguPerProgramDesa($data->tahun,$data->desa,$data->kd_bidang,$data->kd_prog);
			$totalPaguPerProgram=explode("|",$totalPaguPerProgram);
						
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
			$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("L".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$nomor_program++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[0]));
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->program);
			$rows_awal++;
			
			$nomor_kegiatan = 0;
			
			
		}
				$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD_RIGHT);
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD);
				$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD);
				$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("L".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
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
				$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("L".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal)->getAlignment()->setWrapText(true);
				
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->uraian);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->volume);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->satuan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,$data->prioritas_daerah_->prioritas);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data->sasaran_daerah_->sasaran_daerah);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data->sasaran_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data->pagu1);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,$data->pagu2);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("K".$rows_awal,$data->sumber_dana_->sumber_dana);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows_awal,$data->kecamatan_->kecamatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("M".$rows_awal,$data->skpd_->nama_skpd);
				
				$tempBidang = $data->kd_bidang;
		        $tempProgram= $data->kd_prog;
				$rows_awal++;
			
				
	}
	
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":G".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,'TOTAL');
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($total2));
	$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal.":M".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$row=$rows_awal+1;
	$row_akhir=$rows_awal+10;
		
	$objPHPExcel->getActiveSheet()->getStyle("A".$row.":M".$row_akhir."")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(20);
	
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("L".$rows.":M".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("L".$rows.":M".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("L".$rows.":M".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows,'KOTA PEMATANGSIANTAR');
	$rows++;
	$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(30);
	$rows+=2;
	$objPHPExcel->getActiveSheet()->mergeCells("L".$rows.":M".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("L".$rows.":M".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("L".$rows.":M".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows,$setting->nip_penanda_tangan_dokumen);
	
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
	
	$model=new KegiatanMusrenbangDesa;
	if(isset($_POST['KegiatanMusrenbangDesa']))
	{
		$model->attributes=$_POST['KegiatanMusrenbangDesa'];
		
		
		$this->redirect(array('cetakplafonexcel','tahun'=>$model->tahun,'kd_urusan'=>$model->kd_urusan));
	}
	$this->render('cetakplafonexcel',array(
	'model'=>$model,
	));
}

public function actionCetakPlafonExcel($tahun,$kd_urusan)
{
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.' AND kd_urusan='.$kd_urusan.' ';
	$criteria->select = "t.*,SUM(pagu_tahun_1) AS pagu_tahun_1, SUM(pagu_tahun_2) AS pagu_tahun_1";
		
	$criteria->group = "desa";

	$model = KegiatanMusrenbangDesa::model()->findAll($criteria);
	
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
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	);
	
	$cell = array('B','C','D','E');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang Desa');
	
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
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C7','DESA');
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
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->desa_->desa);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,AplikasiKomponen::uang($data->pagu_tahun_1));
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,AplikasiKomponen::uang($data->pagu_tahun_2));
			
		$rows_awal++;		
		$total1+=$data->pagu_tahun_1;
		$total2+=$data->pagu_tahun_2;
	}
	
	$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal.":E".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,'TOTAL');
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,AplikasiKomponen::uang($total2));
		$objPHPExcel->getActiveSheet()->getRowDimension($rows_awal)->setRowHeight(20);
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
	$rows++;
	$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(30);
	$rows+=2;
	
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
	header('Content-Disposition: attachment;filename="Data Plafon Kegiatan Musrenbang Desa.xls"');
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
	
	$model=new KegiatanMusrenbangDesa;
	if(isset($_POST['KegiatanMusrenbangDesa']))
	{
		$model->attributes=$_POST['KegiatanMusrenbangDesa'];
		
		
		$this->redirect(array('cetakusulanexcel','tahun'=>$model->tahun,'kd_urusan'=>$model->kd_urusan,'desa'=>$model->desa));
	}
	$this->render('cetakusulanexcel',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actionCetakUsulanExcel($tahun,$desa,$kd_urusan)
{
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.' AND kd_urusan='.$kd_urusan.' AND desa='.$desa.'';
	//$criteria->select = "t.*,SUM(pagu_tahun_1) AS sumPagu1, SUM(pagu_tahun_2) AS sumPagu2";
		
	$criteria->order = "t.kd_bidang, t.kd_prog,t.kd_kegiatan";
	$criteria->select = "t.*";
	$model = KegiatanMusrenbangDesa::model()->findAll($criteria);
	$desa = Desa::model()->find(array('condition'=>'id = '.$desa.''));
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
        'name'  => 'Roboto', 'Noto', sans-serif
    ),
	);
	
	$cell = array('A','B','C','D','E','F','G','H','I','J','K','L','M');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang Desa');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:M1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','USULAN KEGIATAN MUSRENBANG DESA '.$desa->desa.' TAHUN '.$tahun.'');
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
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5', ': '.$urusan->urusan);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A7:A8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A7','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B7:B8');
	$objPHPExcel->getActiveSheet()->getStyle("B7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B7','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C7:C8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C7','URAIAN');
	$objPHPExcel->getActiveSheet()->mergeCells('D7:D8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D7','VOLUME');
	$objPHPExcel->getActiveSheet()->mergeCells('E7:E8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E7','SATUAN');
	$objPHPExcel->getActiveSheet()->mergeCells('F7:F8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F7','PRIORITAS DAERAH');
	$objPHPExcel->getActiveSheet()->mergeCells('G7:G8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G7','SASARAN DAERAH');
	$objPHPExcel->getActiveSheet()->mergeCells('H7:H8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H7','SASARAN KEGIATAN');
	$objPHPExcel->getActiveSheet()->getStyle('I7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I7','PAGU TAHUN 1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I8','(Rp)');
	$objPHPExcel->getActiveSheet()->getStyle('J7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J7','PAGU TAHUN 2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J8','(Rp)');
	$objPHPExcel->getActiveSheet()->mergeCells('K7:K8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K7','SUMBER DANA');
	$objPHPExcel->getActiveSheet()->mergeCells('L7:L8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L7','KECAMATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('M7:M8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M7','SKPD');
	$objPHPExcel->getActiveSheet()->getStyle("A7:M9")->applyFromArray($styleTH);
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."9",$a+1);
	}
	
	$rows_awal = 10;
	$nomor_bidang = 0;
	$currentBidang;
	$currentProgram;
	$tempBidang;
	$tempProgram;
	$total1=0;
	$total2=0;
	foreach($model as $data)
	{
		$currentBidang=$data->kd_bidang;
		$currentProgram=$data->kd_prog;
		
		if($currentBidang != $tempBidang){
		
			$totalPaguPerBidang=KegiatanMusrenbangDesa::model()->totalPaguPerBidangDesa($data->tahun,$data->desa,$data->kd_bidang);
			$totalPaguPerBidang=explode("|",$totalPaguPerBidang);
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
			$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("L".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$nomor_bidang++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[0]));
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[1]));
				
			$rows_awal++;
			
			$nomor_program = 0;
			
		}
		
		if($currentProgram != $tempProgram){
			$totalPaguPerProgram=KegiatanMusrenbangDesa::model()->totalPaguPerProgramDesa($data->tahun,$data->desa,$data->kd_bidang,$data->kd_prog);
			$totalPaguPerProgram=explode("|",$totalPaguPerProgram);
						
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
			$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("L".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$nomor_program++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[0]));
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->program);
			$rows_awal++;
			
			$nomor_kegiatan = 0;
			
			
		}
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
				$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("L".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
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
				$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("L".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal)->getAlignment()->setWrapText(true);
				
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->uraian);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->volume);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->satuan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,$data->prioritas_daerah_->prioritas);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data->sasaran_daerah_->sasaran_daerah);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data->sasaran_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data->pagu1);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,$data->pagu2);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("K".$rows_awal,$data->sumber_dana_->sumber_dana);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows_awal,$data->kecamatan_->kecamatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("M".$rows_awal,$data->skpd_->nama_skpd);
				
				$tempBidang = $data->kd_bidang;
		        $tempProgram= $data->kd_prog;
				$rows_awal++;
			
				
	}
	
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":G".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,'TOTAL');
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($total2));
	$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal.":M".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$objPHPExcel->getActiveSheet()->getRowDimension($rows_awal)->setRowHeight(20);
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("L".$rows.":M".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("L".$rows.":M".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("L".$rows.":M".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows,'KOTA PEMATANGSIANTAR');
	$rows++;
	$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(30);
	$rows+=3;
	$objPHPExcel->getActiveSheet()->mergeCells("L".$rows.":M".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("L".$rows.":M".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("L".$rows.":M".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows,$setting->nip_penanda_tangan_dokumen);
	
	// Redirect output to a clientâ€™s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Data Usulan Kegiatan Musrenbang Desa.xls"');
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

public function actionModalForm()
{
	$model=new KegiatanMusrenbangDesa;
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

if(isset($_POST['KegiatanMusrenbangDesa']))
{
$model->attributes=$_POST['KegiatanMusrenbangDesa'];
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
$dataProvider=new CActiveDataProvider('KegiatanMusrenbangDesa');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin($skpd)
{
	
	$model=new KegiatanMusrenbangDesa('search');
	$model->unsetAttributes();  // clear any default values
	$model->kd_skpd = $skpd;
	$model->tahun = Yii::app()->session['tahun_perencanaan'];
	if(isset($_GET['KegiatanMusrenbangDesa']))
		$model->attributes=$_GET['KegiatanMusrenbangDesa'];

	$this->render('admin',array(
		'model'=>$model,
	));
}
public function actionAdminSkpd()
{
	if(!Yii::app()->user->isAdminBappeda())
	{
		$this->redirect(array("admin"));
	}
	$model=new KegiatanMusrenbangDesa('searchPerSKpd');
	$model->tahun= Yii::app()->session['tahun_perencanaan'];
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['KegiatanMusrenbangDesa']))
		$model->attributes=$_GET['KegiatanMusrenbangDesa'];

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
$model=KegiatanMusrenbangDesa::model()->findByPk($id);
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
}
