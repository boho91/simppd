<?php

class RenstraController extends Controller
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
'actions'=>array('admin','delete','ModalForm','AdminSkpd','renstraexcel','renstrapdf','cetakrenstraexcel','cetakrenstrapdf'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

public function actionRenstraPdf(){
	$model=new Renstra;
	if(isset($_POST['Renstra']))
	{
		$model->attributes=$_POST['Renstra'];
		
		
		$this->redirect(array('CetakRenstrapdf','tahun_perencanaan'=>$model->tahun_perencanaan,'skpd'=>$model->skpd));
	}
	$this->render('CetakRenstrapdf',array(
	'model'=>$model,
	));
	
}

public function actionCetakRenstraPdf($skpd,$tahun_perencanaan){
	
	error_reporting(0);
	Yii::import('ext.phpexcel.XPHPExcel');    
	
	
	$objPHPExcel= XPHPExcel::createPHPExcel();
	
	$renderer = XPHPExcel::createPHPExcelSetting();
	$rendererName = $renderer::PDF_RENDERER_MPDF;
	//echo $rendererName;

	$rendererLibrary = 'mPDF60';
	
	$rendererLibraryPath = dirname(__FILE__).'/../extensions/phpexcel/vendor/PHPExcel/Libraries/' . $rendererLibrary;
	
	
	$criteria = new CDbCriteria();
	$criteria->condition = 'tahun_perencanaan='.$tahun_perencanaan.' AND skpd='.$skpd.'';
	$criteria->order = "t.program, t.kegiatan";		
	$criteria->select = "t.*";
	
	$model = Renstra::model()->findAll($criteria);
	$skpd = Skpd::model()->find(array('condition'=>'id = '.$skpd.''));
	
	$objPHPExcel->getProperties()->setCreator("Bappeda Kota Pematangsiantar")
								 ->setLastModifiedBy("Bappeda Kota Pematangsiantar")
								 ->setTitle("Simpepeda Bappeda Kota Pematangsiantar")
								 ->setSubject("Simpepeda Bappeda Kota Pematangsiantar")
								 ->setDescription("Simpepeda Bappeda Kota Pematangsiantar")
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
	$styleHeading = array(
	'alignment'=>array(
		'horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		'vertical'=>PHPExcel_Style_Alignment::VERTICAL_CENTER
	),
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 12,
        'name'  => 'Roboto', 'Noto', sans-serif
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
	
	$cell = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:S1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','RENCANA PROGRAM, KEGIATAN, INDIKATOR KINERJA, KELOMPOK SASARAN DAN PENDANAAN INDIKATIF SKPD '.$skpd->nama_skpd.'');
	$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->getStyle("A2:S2")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:S2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','KOTA PEMATANGSIANTAR');
	$objPHPExcel->getActiveSheet()->getStyle("A3:S5")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(10);
	$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(10);
	$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(30);
	
	
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
	$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
	
		
	$objPHPExcel->getActiveSheet()->mergeCells('A6:A8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A6','NOMOR');
	
	$objPHPExcel->getActiveSheet()->mergeCells('B6:B8');
	$objPHPExcel->getActiveSheet()->getStyle("B6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B6','TUJUAN');
	
	$objPHPExcel->getActiveSheet()->mergeCells('C6:C8');
	$objPHPExcel->getActiveSheet()->getStyle('C6')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C6','INDIKATOR SASARAN');
		
	$objPHPExcel->getActiveSheet()->mergeCells('D6:D8');
	$objPHPExcel->getActiveSheet()->getStyle('D6')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D6','SASARAN');
	
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('E6:E8');
	$objPHPExcel->getActiveSheet()->getStyle('E6')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','PROGRAM / KEGIATAN');
	
	$objPHPExcel->getActiveSheet()->mergeCells('F6:F8');
	$objPHPExcel->getActiveSheet()->getStyle('F6')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','INDIKATOR KINERJA PROGRAM');
	
	$objPHPExcel->getActiveSheet()->mergeCells('G6:G8');
	$objPHPExcel->getActiveSheet()->getStyle('G6')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G6','DATA CAPAIAN PADA TAHUN AWAL PERENCANAAN');
	
	$objPHPExcel->getActiveSheet()->mergeCells('H6:S7');
	$objPHPExcel->getActiveSheet()->getStyle('H6')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H6','TARGET KINERJA PROGRAM DAN KERANGKA PENDANAAN');
	
	$objPHPExcel->getActiveSheet()->mergeCells('H7:I7');
	$objPHPExcel->getActiveSheet()->getStyle('H7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H7','TAHUN I');
	
	$objPHPExcel->getActiveSheet()->getStyle('H8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H8','TARGET');
	
	$objPHPExcel->getActiveSheet()->getStyle('I8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I8','Rp');
	
	$objPHPExcel->getActiveSheet()->mergeCells('J7:K7');
	$objPHPExcel->getActiveSheet()->getStyle('J7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J7','TAHUN II');
	$objPHPExcel->getActiveSheet()->getStyle('K8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K8','TARGET');
	$objPHPExcel->getActiveSheet()->getStyle('K8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K8','Rp');
	
	$objPHPExcel->getActiveSheet()->mergeCells('L7:M7');
	$objPHPExcel->getActiveSheet()->getStyle('L7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L7','TAHUN III');
	$objPHPExcel->getActiveSheet()->getStyle('L8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L8','TARGET');
	$objPHPExcel->getActiveSheet()->getStyle('M8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M8','Rp');
	
	$objPHPExcel->getActiveSheet()->mergeCells('N7:O7');
	$objPHPExcel->getActiveSheet()->getStyle('N7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N7','TAHUN IV');
	$objPHPExcel->getActiveSheet()->getStyle('N8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N8','TARGET');
	$objPHPExcel->getActiveSheet()->getStyle('O8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O8','Rp');
	
	$objPHPExcel->getActiveSheet()->mergeCells('P7:Q7');
	$objPHPExcel->getActiveSheet()->getStyle('P7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P7','TAHUN V');
	$objPHPExcel->getActiveSheet()->getStyle('P8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P8','TARGET');
	$objPHPExcel->getActiveSheet()->getStyle('Q8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q8','Rp');
	
	$objPHPExcel->getActiveSheet()->mergeCells('R7:S7');
	$objPHPExcel->getActiveSheet()->getStyle('R7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R7','TAHUN AKHIR');
	$objPHPExcel->getActiveSheet()->getStyle('R8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R8','TARGET');
	$objPHPExcel->getActiveSheet()->getStyle('S8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S8','Rp');
	
	$objPHPExcel->getActiveSheet()->getStyle("A6:S9")->applyFromArray($styleTH);
	
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."9",$a+1);
	}
	
	$rows_awal = 10;
	$nomor_sasaran = 0;
	$currentSasaran;
	$currentProgram;
	$tempSasaran;
	$tempProgram;
	$total1=0;
	$total2=0;
	$total3=0;
	$total4=0;
	$total5=0;
	$total6=0;
		
		
foreach($model as $data)
	{
		$currentProgram = $data->program;
		$currentSasaran= $data->sasaran_pembangunan;

		if($currentSasaran != $tempSasaran)
		{
			
			//sasaran
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
			$objPHPExcel->getActiveSheet()->getStyle("N".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("O".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("P".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("Q".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("R".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("S".$rows_awal."")->applyFromArray($styleTD_BOLD);
			
			
			$nomor_sasaran++;
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_sasaran);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->sasaran_daerah_->sasaran_daerah);
		}
		
		if($currentProgram != $tempProgram)
		{
			$totalPaguPerProgram = Renstra::model()->totalPaguPerProgram($data->tahun_perencanaan,$data->skpd,$data->sasaran_pembangunan);
			$totalPaguPerProgram = explode("|",$totalPaguPerProgram);
			$total1+= $totalPaguPerProgram[0];
			$total2+= $totalPaguPerProgram[1];
			$total3+= $totalPaguPerProgram[2];
			$total4+= $totalPaguPerProgram[3];
			$total5+= $totalPaguPerProgram[4];
			$total6+= $totalPaguPerProgram[5];
			
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("L".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("N".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("O".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("P".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("Q".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("R".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("S".$rows_awal."")->applyFromArray($styleTD_LEFT);
			
				
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->kegiatan_->program_->program);
			
			$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[0]));
			
			$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("K".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
			
			$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("M".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[2]));
			
			$objPHPExcel->getActiveSheet()->getStyle("O".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("O".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[3]));
			
			$objPHPExcel->getActiveSheet()->getStyle("Q".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("Q".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[4]));
			
			$objPHPExcel->getActiveSheet()->getStyle("S".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("S".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[5]));
			
			
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
				$objPHPExcel->getActiveSheet()->getStyle("N".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("O".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("P".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("Q".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("R".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("S".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
					
				$nomor_kegiatan++;
				
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->tujuan);
				
				$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->kegiatan_->program_->program);
							
				$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,$data->indikator_kinerja_program_dan_kegiatan);
				
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data->capaian_tahun_awal);
				
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data->target_tahun_1);
				
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data->pagu1);
				
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,$data->target_tahun_2);
				
				$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("K".$rows_awal,$data->pagu2);
				
				$objPHPExcel->getActiveSheet()->getStyle("L".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows_awal,$data->target_tahun_3);
				
				$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("M".$rows_awal,$data->pagu3);
				
				$objPHPExcel->getActiveSheet()->getStyle("N".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("N".$rows_awal,$data->target_tahun_4);
				
				$objPHPExcel->getActiveSheet()->getStyle("O".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("O".$rows_awal,$data->pagu4);
				
				$objPHPExcel->getActiveSheet()->getStyle("P".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("P".$rows_awal,$data->target_tahun_5);
				
				$objPHPExcel->getActiveSheet()->getStyle("Q".$$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("Q".$rows_awal,$data->pagu5);
				
				$objPHPExcel->getActiveSheet()->getStyle("R".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("R".$rows_awal,$data->target_akhir);
				
				$objPHPExcel->getActiveSheet()->getStyle("S".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("S".$rows_awal,$data->pagu6);
				
								
				$tempProgram = $data->program;
				$tempSasaran = $data->sasaran_pembangunan;
			
		$rows_awal++;
				
	}
	
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":S".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,'TOTAL');
	
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($total1));
	$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("K".$rows_awal,AplikasiKomponen::uang($total2));
	$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("M".$rows_awal,AplikasiKomponen::uang($total3));
	$objPHPExcel->getActiveSheet()->getStyle("O".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("O".$rows_awal,AplikasiKomponen::uang($total4));
	$objPHPExcel->getActiveSheet()->getStyle("Q".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("Q".$rows_awal,AplikasiKomponen::uang($total5));
	$objPHPExcel->getActiveSheet()->getStyle("S".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("S".$rows_awal,AplikasiKomponen::uang($total6));
	
	for($a=10;$a<=$rows_awal;$a++){
		
		$objPHPExcel->getActiveSheet()->getRowDimension(''.$a.'')->setRowHeight(20);
	}
	$row=$rows_awal+1;
	$row_akhir=$rows_awal+10;
	
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(25);
	$objPHPExcel->getActiveSheet()->getStyle("A".$row.":S".$row_akhir."")->applyFromArray($styleHeading);
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("P".$rows.":R".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("P".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("P".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("P".$rows.":R".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("P".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("P".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("P".$rows.":R".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("P".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("P".$rows,'KOTA PEMATANGSIANTAR');
	$rows++;
	$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(30);
	$rows+=2;
	$objPHPExcel->getActiveSheet()->mergeCells("P".$rows.":R".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("P".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("P".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("P".$rows.":R".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("P".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("P".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("P".$rows.":R".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("P".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("P".$rows,$setting->nip_penanda_tangan_dokumen);
	
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
	//header('Content-Disposition: attachment;filename="Data RENSTRA.pdf"');
	header('Cache-Control: max-age=0');
		
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
	$objWriter->setSheetIndex(0);
	$objWriter->save('php://output');
	Yii::app()->end(); 

}

public function actionRenstraexcel(){
	$model=new Renstra;
	if(isset($_POST['Renstra']))
	{
		$model->attributes=$_POST['Renstra'];
		
		
		$this->redirect(array('CetakRenstraexcel','tahun_perencanaan'=>$model->tahun_perencanaan,'skpd'=>$model->skpd));
	}
	$this->render('CetakRenstraexcel',array(
	'model'=>$model,
	));
	
}

public function actionCetakRenstraExcel($skpd,$tahun_perencanaan){
	
	$criteria = new CDbCriteria();
	$criteria->condition = 'tahun_perencanaan='.$tahun_perencanaan.' AND skpd='.$skpd.'';
	$criteria->order = "t.program, t.kegiatan";		
	$criteria->select = "t.*";
	
	$model = Renstra::model()->findAll($criteria);
		
	Yii::import('ext.phpexcel.XPHPExcel');    
	$objPHPExcel= XPHPExcel::createPHPExcel();
	$objPHPExcel->getProperties()->setCreator("Bappeda Kota Pematangsiantar")
								 ->setLastModifiedBy("Bappeda Kota Pematangsiantar")
								 ->setTitle("Simpepeda Bappeda Kota Pematangsiantar")
								 ->setSubject("Simpepeda Bappeda Kota Pematangsiantar")
								 ->setDescription("Simpepeda Bappeda Kota Pematangsiantar")
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
	
	$cell = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:S1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','RENCANA PROGRAM, KEGIATAN, INDIKATOR KINERJA, KELOMPOK SASARAN DAN PENDANAAN INDIKATIF SKPD bappeda');
	$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getStyle("A2:S2")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:S2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','KOTA PEMATANGSIANTAR');
	
	
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
	$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
	
		
	$objPHPExcel->getActiveSheet()->mergeCells('A6:A8');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A6','NOMOR');
	
	$objPHPExcel->getActiveSheet()->mergeCells('B6:B8');
	$objPHPExcel->getActiveSheet()->getStyle("B6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B6','TUJUAN');
	
	$objPHPExcel->getActiveSheet()->mergeCells('C6:C8');
	$objPHPExcel->getActiveSheet()->getStyle('C6')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C6','INDIKATOR SASARAN');
		
	$objPHPExcel->getActiveSheet()->mergeCells('D6:D8');
	$objPHPExcel->getActiveSheet()->getStyle('D6')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D6','SASARAN');
		
	$objPHPExcel->getActiveSheet()->mergeCells('E6:E8');
	$objPHPExcel->getActiveSheet()->getStyle('E6')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','PROGRAM / KEGIATAN');
	
	$objPHPExcel->getActiveSheet()->mergeCells('F6:F8');
	$objPHPExcel->getActiveSheet()->getStyle('F6')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','INDIKATOR KINERJA PROGRAM');
	
	$objPHPExcel->getActiveSheet()->mergeCells('G6:G8');
	$objPHPExcel->getActiveSheet()->getStyle('G6')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G6','DATA CAPAIAN PADA TAHUN AWAL PERENCANAAN');
	
	$objPHPExcel->getActiveSheet()->mergeCells('H6:S7');
	$objPHPExcel->getActiveSheet()->getStyle('H6')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H6','TARGET KINERJA PROGRAM DAN KERANGKA PENDANAAN');
	
	$objPHPExcel->getActiveSheet()->mergeCells('H7:I7');
	$objPHPExcel->getActiveSheet()->getStyle('H7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H7','TAHUN I');
	
	$objPHPExcel->getActiveSheet()->getStyle('H8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H8','TARGET');
	
	$objPHPExcel->getActiveSheet()->getStyle('I8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I8','Rp');
	
	$objPHPExcel->getActiveSheet()->mergeCells('J7:K7');
	$objPHPExcel->getActiveSheet()->getStyle('J7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J7','TAHUN II');
	$objPHPExcel->getActiveSheet()->getStyle('K8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K8','TARGET');
	$objPHPExcel->getActiveSheet()->getStyle('K8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K8','Rp');
	
	$objPHPExcel->getActiveSheet()->mergeCells('L7:M7');
	$objPHPExcel->getActiveSheet()->getStyle('L7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L7','TAHUN III');
	$objPHPExcel->getActiveSheet()->getStyle('L8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L8','TARGET');
	$objPHPExcel->getActiveSheet()->getStyle('M8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M8','Rp');
	
	$objPHPExcel->getActiveSheet()->mergeCells('N7:O7');
	$objPHPExcel->getActiveSheet()->getStyle('N7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N7','TAHUN IV');
	$objPHPExcel->getActiveSheet()->getStyle('N8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N8','TARGET');
	$objPHPExcel->getActiveSheet()->getStyle('O8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O8','Rp');
	
	$objPHPExcel->getActiveSheet()->mergeCells('P7:Q7');
	$objPHPExcel->getActiveSheet()->getStyle('P7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P7','TAHUN V');
	$objPHPExcel->getActiveSheet()->getStyle('P8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P8','TARGET');
	$objPHPExcel->getActiveSheet()->getStyle('Q8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q8','Rp');
	
	$objPHPExcel->getActiveSheet()->mergeCells('R7:S7');
	$objPHPExcel->getActiveSheet()->getStyle('R7')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R7','TAHUN AKHIR');
	$objPHPExcel->getActiveSheet()->getStyle('R8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R8','TARGET');
	$objPHPExcel->getActiveSheet()->getStyle('S8')->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S8','Rp');
	
	$objPHPExcel->getActiveSheet()->getStyle("A6:S9")->applyFromArray($styleTH);
	
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."9",$a+1);
	}
	
	$rows_awal = 10;
	$nomor_sasaran = 0;
	$currentSasaran;
	$currentProgram;
	$tempSasaran;
	$tempProgram;
	$total1=0;
	$total2=0;
	$total3=0;
	$total4=0;
	$total5=0;
	$total6=0;
		
		
foreach($model as $data)
	{
		$currentProgram = $data->program;
		$currentSasaran= $data->sasaran_pembangunan;

		if($currentSasaran != $tempSasaran)
		{
			
			//sasaran
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
			$objPHPExcel->getActiveSheet()->getStyle("N".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("O".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("P".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("Q".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("R".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("S".$rows_awal."")->applyFromArray($styleTD_BOLD);
			
			
			$nomor_sasaran++;
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_sasaran);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->sasaran_daerah_->sasaran_daerah);
		}
		
		if($currentProgram != $tempProgram)
		{
			$totalPaguPerProgram = Renstra::model()->totalPaguPerProgram($data->tahun_perencanaan,$data->skpd,$data->sasaran_pembangunan);
			$totalPaguPerProgram = explode("|",$totalPaguPerProgram);
			$total1+= $totalPaguPerProgram[0];
			$total2+= $totalPaguPerProgram[1];
			$total3+= $totalPaguPerProgram[2];
			$total4+= $totalPaguPerProgram[3];
			$total5+= $totalPaguPerProgram[4];
			$total6+= $totalPaguPerProgram[5];
			
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("L".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("N".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("O".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("P".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("Q".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("R".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("S".$rows_awal."")->applyFromArray($styleTD_LEFT);
			
				
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->kegiatan_->program_->program);
			
			$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[0]));
			
			$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("K".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
			
			$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("M".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[2]));
			
			$objPHPExcel->getActiveSheet()->getStyle("O".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("O".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[3]));
			
			$objPHPExcel->getActiveSheet()->getStyle("Q".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("Q".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[4]));
			
			$objPHPExcel->getActiveSheet()->getStyle("S".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("S".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[5]));
			
			
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
				$objPHPExcel->getActiveSheet()->getStyle("N".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("O".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("P".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("Q".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("R".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("S".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
					
				$nomor_kegiatan++;
				
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->tujuan);
				
				$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->kegiatan_->program_->program);
							
				$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,$data->indikator_kinerja_program_dan_kegiatan);
				
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data->capaian_tahun_awal);
				
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data->target_tahun_1);
				
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data->pagu1);
				
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,$data->target_tahun_2);
				
				$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("K".$rows_awal,$data->pagu2);
				
				$objPHPExcel->getActiveSheet()->getStyle("L".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("L".$rows_awal,$data->target_tahun_3);
				
				$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("M".$rows_awal,$data->pagu3);
				
				$objPHPExcel->getActiveSheet()->getStyle("N".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("N".$rows_awal,$data->target_tahun_4);
				
				$objPHPExcel->getActiveSheet()->getStyle("O".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("O".$rows_awal,$data->pagu4);
				
				$objPHPExcel->getActiveSheet()->getStyle("P".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("P".$rows_awal,$data->target_tahun_5);
				
				$objPHPExcel->getActiveSheet()->getStyle("Q".$$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("Q".$rows_awal,$data->pagu5);
				
				$objPHPExcel->getActiveSheet()->getStyle("R".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("R".$rows_awal,$data->target_akhir);
				
				$objPHPExcel->getActiveSheet()->getStyle("S".$rows_awal."")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("S".$rows_awal,$data->pagu6);
				
								
				$tempProgram = $data->program;
				$tempSasaran = $data->sasaran_pembangunan;
			
		$rows_awal++;
				
	}
		
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":S".$rows_awal."")->applyFromArray($styleTD_LEFT);
	
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,'TOTAL');
	
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($total1));
	$objPHPExcel->getActiveSheet()->getStyle("K".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("K".$rows_awal,AplikasiKomponen::uang($total2));
	$objPHPExcel->getActiveSheet()->getStyle("M".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("M".$rows_awal,AplikasiKomponen::uang($total3));
	$objPHPExcel->getActiveSheet()->getStyle("O".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("O".$rows_awal,AplikasiKomponen::uang($total4));
	$objPHPExcel->getActiveSheet()->getStyle("Q".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("Q".$rows_awal,AplikasiKomponen::uang($total5));
	$objPHPExcel->getActiveSheet()->getStyle("S".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("S".$rows_awal,AplikasiKomponen::uang($total6));
	
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("L".$rows.":M".$rows."");
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
	header('Content-Disposition: attachment;filename="Data RENSTRA.xls"');
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
	$model=new Renstra;
	if(Yii::app()->user->isAdminBappeda())
	{
		
	}else{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$model->tahun_perencanaan = Yii::app()->session['tahun_perencanaan'];
	$this->renderPartial('formAwal',array(
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

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
	$model=new Renstra;

	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['Renstra']))
	{
		$model->attributes=$_POST['Renstra'];
		$model->urusan = $model->kegiatan_->program_->bidang_->urusan_->id;
		$model->bidang = $model->kegiatan_->program_->bidang_->id;
		//$uploadedFile=CUploadedFile::getInstance($model,'foto');
       // $fileName = "{$uploadedFile}"; 
		// $model->foto = $fileName;
		if($model->save())
			//$uploadedFile->saveAs(Yii::app()->basePath.'/../foto/'.$fileName);
			$this->redirect(array('view','id'=>$model->id));
		//print_r($model->getErrors());
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

if(isset($_POST['Renstra']))
{
$model->attributes=$_POST['Renstra'];
//$uploadedFile=CUploadedFile::getInstance($model,'foto');
 //       $fileName = "{$uploadedFile}"; 
//		 $model->foto = $fileName;
if($model->save())
	//$uploadedFile->saveAs(Yii::app()->basePath.'/../foto/'.$fileName);
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
$dataProvider=new CActiveDataProvider('Renstra');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin($skpd)
{
$model=new Renstra('search');
$model->unsetAttributes();  // clear any default values
$model->skpd = $skpd;
if(isset($_GET['Renstra']))
$model->attributes=$_GET['Renstra'];

$model->id_rpjmd = Yii::app()->session['id_rpjmd'];
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
	$model=new Renstra('searchPerSKpd');
	$model->tahun_perencanaan= Yii::app()->session['tahun_perencanaan'];
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['Renstra']))
		$model->attributes=$_GET['Renstra'];

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
$model=Renstra::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='renstra-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
