<?php

class RkaController extends Controller
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
'actions'=>array('admin','delete','GridUpdate','tambahSubUraian','modalForm','adminKegiatan','relational','relational2','rkaskpdexcel','cetakrkaskpdexcel','cetakrkaskpdpdf','rkaskpdpdf'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

public function actionRkaSkpdPdf()
{
	
	$model=new Rka;
	if(isset($_POST['Rka']))
	{
		$model->attributes=$_POST['Rka'];
		
		
		$this->redirect(array('cetakrkaskpdpdf','tahun'=>$model->tahun,'skpd'=>$model->skpd,'urusan'=>$model->urusan));
	}
	$this->render('cetakpdf',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actionCetakRkaSkpdPdf($tahun,$skpd,$urusan)
{
	Yii::import('ext.phpexcel.XPHPExcel');  
	$objPHPExcel= XPHPExcel::createPHPExcel();
	
	$renderer = XPHPExcel::createPHPExcelSetting();
	$rendererName = $renderer::PDF_RENDERER_MPDF;
	//echo $rendererName;

	$rendererLibrary = 'mPDF60';
	
	$rendererLibraryPath = dirname(__FILE__).'/../extensions/phpexcel/vendor/PHPExcel/Libraries/' . $rendererLibrary;
	
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.' AND urusan='.$urusan.' AND skpd='.$skpd.'';
	$criteria->order ="t.bidang, t.program, t.kegiatan";	
	$criteria->select = "t.*";
	
	$model = Rka::model()->findAll($criteria);
	$skpd = Skpd::model()->find(array('condition'=>'id = '.$skpd.''));
	$urusan = Urusan::model()->find(array('condition'=>'id = '.$urusan.''));
	
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
        'name'  => 'Arial'
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
	$styleTD_Head = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
		),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
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
	
	$cell = array('A','B','C','D','E','F');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','RENCANA KERJA DAN ANGGARAN SATUAN KERJA PERANGKAT DAERAH');
	$objPHPExcel->getActiveSheet()->getStyle("A1:F1")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.' KOTA PEMATANGSIANTAR');
	$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->getStyle("A3:F3")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);

	
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', ': '.$urusan->urusan);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','SKPD');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:C5');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5', ': '.$skpd->nama_skpd);
	$objPHPExcel->getActiveSheet()->getStyle("A4:F5")->applyFromArray($styleTD_Head);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A6:A7');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A6','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B6:B7');
	$objPHPExcel->getActiveSheet()->getStyle("B6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B6','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C6:E6');
	$objPHPExcel->getActiveSheet()->getStyle("C6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C6','RINCIAN PENGHITUNGAN');
	$objPHPExcel->getActiveSheet()->getStyle("C7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C7','VOLUME');
	$objPHPExcel->getActiveSheet()->getStyle("D7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D7','SATUAN');
	$objPHPExcel->getActiveSheet()->getStyle("E7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E7','HARGA');
	$objPHPExcel->getActiveSheet()->mergeCells('F6:F7');
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','JUMLAH');
		
	
	
		
	$objPHPExcel->getActiveSheet()->getStyle("A6:F8")->applyFromArray($styleTH);
	
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."8",$a+1);
	}
	
	$rows_awal = 9;
	$nomor_bidang = 0;
	$total1=0;
	$total2=0;
	$currentBidang;
	$tempBidang;
	$currentProgram;
	$tempProgram;
	
	foreach($model as $data)
	{
		$currentProgram=$data->program;
		$currentBidang=$data->bidang;
		
		if($currentBidang!=$tempBidang){
			
			//$totalPaguPerBidang=Renja::model()->totalPaguPerBidang($data->tahun,$data->skpd,$data->urusan,$data->bidang);
			//$totalPaguPerBidang= explode("|",$totalPaguPerBidang);
			////$total1+=$totalPaguPerBidang[0];
			//$total2+=$totalPaguPerBidang[1];
			
			$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_BOLD);
		
			
			$nomor_bidang++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			//$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[0]));
			//$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			//$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[1]));
				
			$rows_awal++;
			
			$nomor_program = 0;
	}
		if($currentProgram != $tempProgram)
		{
			$totalPaguPerProgram = Rka::model()->getPaguPerProgram($data->skpd,$data->program,$data->urusan,$data->tahun);
			//$totalPaguPerProgram = explode("|",$totalPaguPerProgram);
				// program
			$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_LEFT);
			
			$nomor_program++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram));
			//$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			//$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->program);
			$rows_awal++;
			
			$nomor_kegiatan = 0;
				
		} 
		// kegiatan
				$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
				
				
				$nomor_kegiatan++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->volume);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->satuan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->harga_satuan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($data->volume * $data->harga_satuan ));
				
				
		$tempBidang = $data->bidang;
		$tempProgram= $data->program;
			
		$rows_awal++;
		
				
	}
	
	$totalPaguPerKegiatan = Rka::model()->getPaguPerSkpd($data->skpd,$data->tahun);
	
	$objPHPExcel->getActiveSheet()->mergeCells("A".$rows_awal.":E".$rows_awal."");
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,'TOTAL');
	
	$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerKegiatan));;
	
	
	
	$row=$rows_awal+1;
	$row_akhir=$rows_awal+10;
		
	$objPHPExcel->getActiveSheet()->getStyle("A".$row.":F".$row_akhir."")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(25);
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
	//header('Content-Disposition: attachment;filename="Data RENJA.pdf"');
	header('Cache-Control: max-age=0');
		
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
	$objWriter->setSheetIndex(0);
	$objWriter->save('php://output');
	Yii::app()->end(); 

}

public function actionRkaSkpdExcel()
{
	
	$model=new Rka;
	if(isset($_POST['Rka']))
	{
		$model->attributes=$_POST['Rka'];
		
		
		$this->redirect(array('cetakrkaskpdexcel','tahun'=>$model->tahun,'skpd'=>$model->skpd,'urusan'=>$model->urusan));
	}
	$this->render('cetakexcel',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actionCetakRkaSkpdExcel($tahun,$skpd,$urusan)
{
		
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.' AND urusan='.$urusan.' AND skpd='.$skpd.'';
	$criteria->order ="t.bidang, t.program, t.kegiatan";	
	$criteria->select = "t.*";
	
	$model = Rka::model()->findAll($criteria);
	$skpd = Skpd::model()->find(array('condition'=>'id = '.$skpd.''));
	$urusan = Urusan::model()->find(array('condition'=>'id = '.$urusan.''));
	
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
        'name'  => 'Arial'
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
	$styleTD_Head = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER,
		),
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Arial'
    ),
	'borders' => array(
			'left' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			),
			'right' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
			),
			'bottom' => array(
			  'style' => PHPExcel_Style_Border::BORDER_NONE,
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
	
	$cell = array('A','B','C','D','E','F');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','RENCANA KERJA DAN ANGGARAN SATUAN KERJA PERANGKAT DAERAH');
	$objPHPExcel->getActiveSheet()->getStyle("A1:F1")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.' KOTA PEMATANGSIANTAR');
	$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->getStyle("A3:F3")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(25);
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);

	
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', ': '.$urusan->urusan);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','SKPD');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:C5');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5', ': '.$skpd->nama_skpd);
	$objPHPExcel->getActiveSheet()->getStyle("A4:F5")->applyFromArray($styleTD_Head);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A6:A7');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A6','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B6:B7');
	$objPHPExcel->getActiveSheet()->getStyle("B6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B6','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C6:E6');
	$objPHPExcel->getActiveSheet()->getStyle("C6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C6','RINCIAN PENGHITUNGAN');
	$objPHPExcel->getActiveSheet()->getStyle("C7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C7','VOLUME');
	$objPHPExcel->getActiveSheet()->getStyle("D7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D7','SATUAN');
	$objPHPExcel->getActiveSheet()->getStyle("E7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E7','HARGA');
	$objPHPExcel->getActiveSheet()->mergeCells('F6:F7');
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','JUMLAH');
		
	
	
		
	$objPHPExcel->getActiveSheet()->getStyle("A6:F8")->applyFromArray($styleTH);
	
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."8",$a+1);
	}
	
	$rows_awal = 9;
	$nomor_bidang = 0;
	$total1=0;
	$total2=0;
	$currentBidang;
	$tempBidang;
	$currentProgram;
	$tempProgram;
	
	foreach($model as $data)
	{
		$currentProgram=$data->program;
		$currentBidang=$data->bidang;
		
		if($currentBidang!=$tempBidang){
			
			//$totalPaguPerBidang=Renja::model()->totalPaguPerBidang($data->tahun,$data->skpd,$data->urusan,$data->bidang);
			//$totalPaguPerBidang= explode("|",$totalPaguPerBidang);
			////$total1+=$totalPaguPerBidang[0];
			//$total2+=$totalPaguPerBidang[1];
			
			$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_BOLD);
		
			
			$nomor_bidang++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			//$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[0]));
			//$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			//$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[1]));
				
			$rows_awal++;
			
			$nomor_program = 0;
	}
		if($currentProgram != $tempProgram)
		{
			$totalPaguPerProgram = Rka::model()->getPaguPerProgram($data->skpd,$data->program,$data->urusan,$data->tahun);
			//$totalPaguPerProgram = explode("|",$totalPaguPerProgram);
				// program
			$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_LEFT);
			
			$nomor_program++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			//$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram));
			//$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			//$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->program);
			$rows_awal++;
			
			$nomor_kegiatan = 0;
				
		} 
		// kegiatan
				$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
				
				
				$nomor_kegiatan++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->volume);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->satuan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->harga_satuan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($data->volume * $data->harga_satuan ));
				
				
		$tempBidang = $data->bidang;
		$tempProgram= $data->program;
			
		$rows_awal++;
		
				
	}
	
	$totalPaguPerKegiatan = Rka::model()->getPaguPerSkpd($data->skpd,$data->tahun);
	
	$objPHPExcel->getActiveSheet()->mergeCells("A".$rows_awal.":E".$rows_awal."");
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,'TOTAL');
	
	$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerKegiatan));;
	
	
	
	$row=$rows_awal+1;
	$row_akhir=$rows_awal+10;
		
	$objPHPExcel->getActiveSheet()->getStyle("A".$row.":F".$row_akhir."")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(25);
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
	header('Content-Disposition: attachment;filename="Data Plafon Kegiatan Musrenbang Kecamatan.xls"');
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

public function actionTambahSubUraian($parent_id)
{
	$model=new Rka;
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
	if(isset($_POST['Rka']))
	{
		$model->attributes=$_POST['Rka'];
		//print_r($model);
		if($model->save())
			$this->redirect(array('admin','Rka[tahun]'=>$model->tahun,'Rka[skpd]'=>$model->skpd,'Rka[kegiatan]'=>$model->kegiatan,'Rka[program]'=>$model->program,'Rka[urusan]'=>$model->urusan,'Rka[bidang]'=>$model->bidang));
			//$this->redirect(array('admin','skpd'=>$model->skpd));
	}
	$this->renderPartial('createSubUraian',array(
		'model'=>$model,
	),false,true);
}
public function actionAutoCompleteSubUraian($term){

    $query = Rka::model()->findall( array('condition'=>'sub_uraian like "%'.$term.'%"','group'=>'sub_uraian'));
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

    $query = Rka::model()->findall( array('condition'=>'item like "%'.$term.'%"','group'=>'item'));
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
	$model=new Rka;
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
	if(isset($_POST['Rka']))
	{
		$model->attributes=$_POST['Rka'];
		//print_r($model);
		$alokasiPagu = PPas::model()->getPaguPerKegiatan($model->skpd,$model->kegiatan,$model->program,$model->tahun);
		$jumlah = $model->volume *$model->harga_satuan;
		if($alokasiPagu<$jumlah)
		{
			$model->status_verifikasi = "Tolak";
		}
		
		if($model->save())
			$this->redirect(array('admin','Rka[tahun]'=>$model->tahun,'Rka[skpd]'=>$model->skpd,'Rka[kegiatan]'=>$model->kegiatan,'Rka[program]'=>$model->program,'Rka[urusan]'=>$model->urusan,'Rka[bidang]'=>$model->bidang));
			//$this->redirect(array('admin','skpd'=>$model->skpd));
	}
	$this->renderPartial('createItem',array(
		'model'=>$model,
	),false,true);
}
public function actionModalForm($skpd="")
{
	$model=new Rka;
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
		
		Yii::import('booster.components.TbEditableSaver');
		$es = new TbEditableSaver('Rka');
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
$model=new Rka;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

	if(isset($_POST['Rka']))
	{
	$model->attributes=$_POST['Rka'];
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

if(isset($_POST['Rka']))
{
$model->attributes=$_POST['Rka'];
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
		
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(array('admin','Rka[tahun]'=>$model->tahun,'Rka[skpd]'=>$model->skpd,'Rka[kegiatan]'=>$model->kegiatan,'Rka[program]'=>$model->program,'Rka[urusan]'=>$model->urusan,'Rka[bidang]'=>$model->bidang));
	}
	else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}
public function deleteByParent1($id)
{	
	$dataParent2 = Rka::model()->findAll(array('condition'=>'parent_id="'.$id.'"'));
	$model = $this->loadModel($id);
	if(sizeof($dataParent2)>0)
	{
		foreach($dataParent2 as $parent2)
		{
			$dataParent3 = Rka::model()->findAll(array('condition'=>'parent_id="'.$parent2->id.'"'));
			if(sizeof($dataParent3)>0)
			{
				foreach($dataParent3 as $parent3)
				{
					$dataParent4 = Rka::model()->findAll(array('condition'=>'parent_id="'.$parent3->id.'"'));
					if(sizeof($dataParent4)>0)
					{
						foreach($dataParent4 as $parent4)
						{
							$dataUraian = Rka::model()->findAll(array('condition'=>'parent_id="'.$parent4->id.'"'));
							if(sizeof($dataUraian)>0)
							{
								foreach($dataUraian as $uraian)
								{
									$dataSubUraian = Rka::model()->findAll(array('condition'=>'parent_id="'.$uraian->id.'"'));
									if(sizeof($dataSubUraian)>0)
									{
										foreach($dataSubUraian as $itemSubUraian)
										{
											$dataItem  =  Rka::model()->findAll(array('condition'=>'parent_id="'.$itemSubUraian->id.'"'));
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
		$this->redirect(array('admin','Rka[tahun]'=>$model->tahun,'Rka[skpd]'=>$model->skpd,'Rka[kegiatan]'=>$model->kegiatan,'Rka[program]'=>$model->program,'Rka[urusan]'=>$model->urusan,'Rka[bidang]'=>$model->bidang));
}
public function deleteByParent2($id)
{	
	$dataParent3 = Rka::model()->findAll(array('condition'=>'parent_id="'.$id.'"'));
	$model = $this->loadModel($id);
	if(sizeof($dataParent3)>0)
	{
		foreach($dataParent3 as $parent3)
		{
			$dataParent4 = Rka::model()->findAll(array('condition'=>'parent_id="'.$parent3->id.'"'));
			if(sizeof($dataParent4)>0)
			{
				foreach($dataParent4 as $parent4)
				{
					$dataUraian = Rka::model()->findAll(array('condition'=>'parent_id="'.$parent4->id.'"'));
					if(sizeof($dataUraian)>0)
					{
						foreach($dataUraian as $uraian)
						{
							$dataSubUraian = Rka::model()->findAll(array('condition'=>'parent_id="'.$uraian->id.'"'));
							if(sizeof($dataSubUraian)>0)
							{
								foreach($dataSubUraian as $itemSubUraian)
								{
									$dataItem  =  Rka::model()->findAll(array('condition'=>'parent_id="'.$itemSubUraian->id.'"'));
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
		$this->redirect(array('admin','Rka[tahun]'=>$model->tahun,'Rka[skpd]'=>$model->skpd,'Rka[kegiatan]'=>$model->kegiatan,'Rka[program]'=>$model->program,'Rka[urusan]'=>$model->urusan,'Rka[bidang]'=>$model->bidang));
}
public function deleteByParent3($id)
{
	$dataParent4 = Rka::model()->findAll(array('condition'=>'parent_id="'.$id.'"'));
	$model = $this->loadModel($id);
	if(sizeof($dataParent4)>0)
	{
		foreach($dataParent4 as $parent4)
		{
			$dataUraian = Rka::model()->findAll(array('condition'=>'parent_id="'.$parent4->id.'"'));
			if(sizeof($dataUraian)>0)
			{
				foreach($dataUraian as $uraian)
				{
					$dataSubUraian = Rka::model()->findAll(array('condition'=>'parent_id="'.$uraian->id.'"'));
					if(sizeof($dataSubUraian)>0)
					{
						foreach($dataSubUraian as $itemSubUraian)
						{
							$dataItem  =  Rka::model()->findAll(array('condition'=>'parent_id="'.$itemSubUraian->id.'"'));
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
		$this->redirect(array('admin','Rka[tahun]'=>$model->tahun,'Rka[skpd]'=>$model->skpd,'Rka[kegiatan]'=>$model->kegiatan,'Rka[program]'=>$model->program,'Rka[urusan]'=>$model->urusan,'Rka[bidang]'=>$model->bidang));
}
public function deleteByParent4($id)
{
	$dataUraian = Rka::model()->findAll(array('condition'=>'parent_id="'.$id.'"'));
	$model = $this->loadModel($id);
	if(sizeof($dataUraian)>0)
	{
		foreach($dataUraian as $uraian)
		{
			if(sizeof($dataUraian)>0)
			{
				$dataSubUraian = Rka::model()->findAll(array('condition'=>'parent_id="'.$uraian->id.'"'));
				if(sizeof($dataSubUraian)>0)
				{
					foreach($dataSubUraian as $itemSubUraian)
					{
						$dataItem  =  Rka::model()->findAll(array('condition'=>'parent_id="'.$itemSubUraian->id.'"'));
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
		$this->redirect(array('admin','Rka[tahun]'=>$model->tahun,'Rka[skpd]'=>$model->skpd,'Rka[kegiatan]'=>$model->kegiatan,'Rka[program]'=>$model->program,'Rka[urusan]'=>$model->urusan,'Rka[bidang]'=>$model->bidang));
}
public function deleteByUraian($id)
{
	$dataSubUraian = Rka::model()->findAll(array('condition'=>'parent_id="'.$id.'"'));
	$model = $this->loadModel($id);
	if(sizeof($dataSubUraian)>0)
	{
		foreach($dataSubUraian as $itemSubUraian)
		{
			$dataItem  =  Rka::model()->findAll(array('condition'=>'parent_id="'.$itemSubUraian->id.'"'));
			
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
		$this->redirect(array('admin','Rka[tahun]'=>$model->tahun,'Rka[skpd]'=>$model->skpd,'Rka[kegiatan]'=>$model->kegiatan,'Rka[program]'=>$model->program,'Rka[urusan]'=>$model->urusan,'Rka[bidang]'=>$model->bidang));
}
public function deleteBySubUraian($id)
{
	$model = $this->loadModel($id);
	$models = Rka::model()->findAll(array('condition'=>'parent_id="'.$id.'"'));
	if(sizeof($models)>0)
	{
		$models = Rka::model()->deleteAll(array('condition'=>'parent_id="'.$id.'"'));
	}
	$this->loadModel($id)->delete();
	if(!isset($_GET['ajax']))
		$this->redirect(array('admin','Rka[tahun]'=>$model->tahun,'Rka[skpd]'=>$model->skpd,'Rka[kegiatan]'=>$model->kegiatan,'Rka[program]'=>$model->program,'Rka[urusan]'=>$model->urusan,'Rka[bidang]'=>$model->bidang));
}
/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('Rka');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin($skpd="")
{
	$model=new Rka;
	$model->unsetAttributes(); 
	$model->tahun = Yii::app()->session['tahun_perencanaan'];
	$model->skpd = Yii::app()->getRequest()->getParam('skpd');
	$alokasiPagu = "";
	//$skpd = Yii::app()->getRequest()->getParam('skpd');
	if($skpd =="")
		$skpd = $_GET['Rka']['skpd'];
	if(isset($_POST['Rka']))
	{
		$modelNew=new Rka;
		$modelNew->attributes=$_POST['Rka'];
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
		$modelParent1 = new Rka;
		$modelParent1->attributes=$_POST['Rka'];
		$modelParent1->urusan = $modelNew->kegiatan_->program_->bidang_->urusan_-id;
		$modelParent1->level = 'parent1';
		$modelParent1->bidang = $modelNew->kegiatan_->program_->bidang_->id;
		$modelParent1->id_rekening_belanja = $parent1->id;
		$cekParent1 = Rka::model()->find(array('condition'=>'kegiatan = "'.$modelNew->kegiatan.'" AND program = "'.$modelNew->program.'" AND bidang = "'.$modelNew->bidang.'" AND urusan = "'.$modelNew->urusan.'" AND tahun = "'.$modelNew->tahun.'" AND skpd = "'.$modelNew->skpd.'" AND id_rekening_belanja="'.$modelParent1->id_rekening_belanja.'"'));
		if(sizeof($cekParent1)==0)
			$modelParent1->save();	
		else 
			$modelParent1->id = $cekParent1->id;
		// 
		$modelParent2 = new Rka;
		$modelParent2->attributes=$_POST['Rka'];
		$modelParent2->urusan = $modelNew->kegiatan_->program_->bidang_->urusan_-id;
		$modelParent2->level = 'parent2';
		$modelParent2->parent_id = $modelParent1->id;
		$modelParent2->bidang = $modelNew->kegiatan_->program_->bidang_->id;
		$modelParent2->id_rekening_belanja = $parent2->id;
		$cekParent2 = Rka::model()->find(array('condition'=>'kegiatan = "'.$modelNew->kegiatan.'" AND program = "'.$modelNew->program.'" AND bidang = "'.$modelNew->bidang.'" AND urusan = "'.$modelNew->urusan.'" AND tahun = "'.$modelNew->tahun.'" AND skpd = "'.$modelNew->skpd.'" AND id_rekening_belanja="'.$modelParent2->id_rekening_belanja.'"'));
		if(sizeof($cekParent2)==0)
			$modelParent2->save();
		else 
			$modelParent2->id = $cekParent2->id;
		// 
		$modelParent3 = new Rka;
		$modelParent3->attributes=$_POST['Rka'];
		$modelParent3->urusan = $modelNew->kegiatan_->program_->bidang_->urusan_-id;
		$modelParent3->level = 'parent3';
		$modelParent3->parent_id = $modelParent2->id;
		$modelParent3->bidang = $modelNew->kegiatan_->program_->bidang_->id;
		$modelParent3->id_rekening_belanja = $parent3->id;
		$cekParent3 = Rka::model()->find(array('condition'=>'kegiatan = "'.$modelNew->kegiatan.'" AND program = "'.$modelNew->program.'" AND bidang = "'.$modelNew->bidang.'" AND urusan = "'.$modelNew->urusan.'" AND tahun = "'.$modelNew->tahun.'" AND skpd = "'.$modelNew->skpd.'" AND id_rekening_belanja="'.$modelParent3->id_rekening_belanja.'"'));
		if(sizeof($cekParent3)==0)
			$modelParent3->save();
		else 
			$modelParent3->id = $cekParent3->id;
		// 
		$modelParent4 = new Rka;
		$modelParent4->attributes=$_POST['Rka'];
		$modelParent4->urusan = $modelNew->kegiatan_->program_->bidang_->urusan_-id;
		$modelParent4->level = 'parent4';
		$modelParent4->parent_id = $modelParent3->id;
		$modelParent4->bidang = $modelNew->kegiatan_->program_->bidang_->id;
		$modelParent4->id_rekening_belanja = $parent4->id;
		$cekParent4 = Rka::model()->find(array('condition'=>'kegiatan = "'.$modelNew->kegiatan.'" AND program = "'.$modelNew->program.'" AND bidang = "'.$modelNew->bidang.'" AND urusan = "'.$modelNew->urusan.'" AND tahun = "'.$modelNew->tahun.'" AND skpd = "'.$modelNew->skpd.'" AND id_rekening_belanja="'.$modelParent4->id_rekening_belanja.'"'));
		if(sizeof($cekParent4)==0)
			$modelParent4->save();
		else 
			$modelParent4->id = $cekParent4->id;
		$modelNew=new Rka;
		$modelNew->attributes=$_POST['Rka'];
		$modelNew->urusan = $modelNew->kegiatan_->program_->bidang_->urusan_-id;
		$modelNew->level = 'uraian';
		$modelNew->bidang = $modelNew->kegiatan_->program_->bidang_->id;
		$modelNew->parent_id = $modelParent4->id;
		$modelNew->save();
		
		$this->redirect(array('admin','Rka[tahun]'=>$modelNew->tahun,'Rka[skpd]'=>$modelNew->skpd,'Rka[kegiatan]'=>$modelNew->kegiatan,'Rka[program]'=>$modelNew->program,'Rka[urusan]'=>$modelNew->urusan,'Rka[bidang]'=>$modelNew->bidang));
		$criteria3 = new CDbCriteria;
		$criteria3->condition = "skpd = '".$model->skpd."' AND tahun='".$model->tahun."' AND kegiatan='".$model->kegiatan."' AND level='parent1'";
		$data = Rka::model()->find($criteria3);
		$model=new Rka('search');
		$model->unsetAttributes(); 
		$model->attributes=$_POST['Rka'];
		//$model->tahun = Yii::app()->session['tahun_perencanaan'];
        $alokasiPagu = Ppas::model()->getPaguPerKegiatan($model->skpd,$model->kegiatan,$model->program,$model->tahun);
		$jumlahPagu = Rka::model()->getPaguPerKegiatan($model->skpd,$model->kegiatan,$model->program,$model->tahun);
		$this->render('admin',array(
            'model'=>$model,
			'alokasiPagu'=>$alokasiPagu,
			'jumlahPagu'=>$jumlahPagu,
			'search'=>true,
			'data'=>$data
			//'data'=>$model->search()->kegiatan
        ));
		//echo $modelParent2->id;
	}else if(isset($_GET['Rka']))
    {
		
		$data->attributes=$_GET['Rka'];
		$model=new Rka('search');
		$model->unsetAttributes(); 
		$model->attributes=$_GET['Rka'];
		//$model->tahun = Yii::app()->session['tahun_perencanaan'];
		$criteria3 = new CDbCriteria;
		$criteria3->condition = "skpd = '".$model->skpd."' AND tahun='".$model->tahun."' AND kegiatan='".$model->kegiatan."' AND level='parent1'";
		$data = Rka::model()->find($criteria3);
        $alokasiPagu = Ppas::model()->getPaguPerKegiatan($model->skpd,$model->kegiatan,$model->program,$model->tahun);
		$jumlahPagu = Rka::model()->getPaguPerKegiatan($model->skpd,$model->kegiatan,$model->program,$model->tahun);
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
		   'alokasiPagu'=>$alokasiPagu
        ));
	}
	
        
}/*
public function actionAdminKegiatan()
{
	$model=new Rka;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
	$modelSearch=new Rka('search');
	$dataProvider=new CActiveDataProvider('Rka');
	$modelSearch->tahun = Yii::app()->session['tahun_perencanaan'];
	$modelSearch->attributes=$_POST['Rka'];
if(isset($_POST['Rka']))
{
	$model->attributes=$_POST['Rka'];
	$model->urusan = $model->kegiatan_->program_->bidang_->urusan_-id;
	$model->level = 'uraian';
	$model->bidang = $model->kegiatan_->program_->bidang_->id;
	$model->save();
	//if($model->save())
		//$this->redirect(array('view','id'=>$model->id));
		$criteria = new CDbCriteria();
	 
		$model->unsetAttributes();  // clear any default values
		
        foreach($_POST['Rka'] as $key=>$value) {
            $criteria -> compare($key, $value, true, 'AND');
        }
		$model->tahun = Yii::app()->session['tahun_perencanaan'];
        $dataProvider = new CActiveDataProvider('Rka', array('criteria' => $criteria));
	}
	if(isset($_GET['Rka']))
    {
		
	 
		$criteria = new CDbCriteria();
	 
		$model->unsetAttributes();  // clear any default values
		
        foreach($_GET['Rka'] as $key=>$value) {
            $criteria -> compare($key, $value, true, 'AND');
        }
		$model->tahun = Yii::app()->session['tahun_perencanaan'];
        $dataProvider = new CActiveDataProvider('Rka', array('criteria' => $criteria));
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
	$sql = 'SELECT * FROM rka WHERE parent_id = :parent_id ORDER BY id';
	$cmd = Yii::app()->db->createCommand($sql);
	$cmd->bindParam(':parent_id', $id, PDO::PARAM_INT);
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
	
	$model=new Rka('searchPerSKpd');
	$model->tahun= Yii::app()->session['tahun_perencanaan'];
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['Rka']))
	{
		$model->attributes=$_GET['Rka'];
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
$model=Rka::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='rka-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
