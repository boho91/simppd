<?php

class SpmController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('admin','delete','cetakspmpdf','spmpdf','exportspmexcel','spmexcel'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
public function actionSpmExcel(){
	$model=new Spm;
	if(isset($_POST['Spm']))
	{
		$model->attributes=$_POST['Spm'];
		$this->redirect(array('exportspmexcel','kd_skpd'=>$model->kd_skpd));
	}
	$this->render('exportspmexcel',array(
	'model'=>$model,
	));
	
}
public function actionExportSpmExcel($kd_skpd){
	
	Yii::import('ext.phpexcel.XPHPExcel');    
		
	$objPHPExcel= XPHPExcel::createPHPExcel();
	
	$criteria = new CDbCriteria();
	$criteria->condition = ' kd_skpd = '.$kd_skpd.'';
	$criteria->group="kd_pelayanan_dasar";
	$model = Spm::model()->findAll($criteria);
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
        'size'  => 13,
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
	
	$cell = array('A','B','C','D','E','F');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang Kelurahan');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','INDIKATOR STANDAR PELAYANAN MINIMAL '.$skpd->nama_skpd.'');
	$objPHPExcel->getActiveSheet()->getStyle("A1:F5")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	
	$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(27);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A6:A7');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A6','NO');
	$objPHPExcel->getActiveSheet()->mergeCells('B6:B7');
	$objPHPExcel->getActiveSheet()->getStyle("B6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B6','Jenis Pelayanan Dasar & Sub Kegiatan');
	$objPHPExcel->getActiveSheet()->mergeCells('C6:D6');
	$objPHPExcel->getActiveSheet()->getStyle("C6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C6','Standar Pelayanan Minimal');
	$objPHPExcel->getActiveSheet()->getStyle("C7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C7','Indikator');
	$objPHPExcel->getActiveSheet()->getStyle("D7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D7','Harga (%)');
	$objPHPExcel->getActiveSheet()->mergeCells('E6:E7');
	$objPHPExcel->getActiveSheet()->getStyle("E6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','Batas Waktu Pencapaian (Tahun)');
	$objPHPExcel->getActiveSheet()->mergeCells('F6:F7');
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','Satuan Kerja / Lembaga Penanggung Jawab');
	
	$objPHPExcel->getActiveSheet()->getStyle("A6:F8")->applyFromArray($styleTH);
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."8",$a+1);
	}
	
	$rows_awal = 9;
	$nomor_pelayanan = 0;
	$total1=0;
	$total2=0;
	foreach($model as $data)
	{
		$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
		$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTH);
		$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD);
		$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD);
		$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD);
		$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD);
		
		$nomor_pelayanan++;
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_pelayanan);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->pelayanan_dasar_->pelayanan_dasar);
		$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->getAlignment()->setWrapText(true);
					
		$rows_awal++;	
		$nomor_indikator=0;
		$criteria_indikator = new CDbCriteria();
		$criteria_indikator -> condition="kd_pelayanan_dasar='".$data->kd_pelayanan_dasar."' AND kd_skpd = '".$kd_skpd."'";
	
		$modelIndikator = Spm::model()->findAll($criteria_indikator);
		foreach($modelIndikator as $data_indikator){
			$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD);
						
			$nomor_indikator++;
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_indikator);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data_indikator->indikator);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data_indikator->nilai);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data_indikator->batas_waktu);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,$data_indikator->skpd_->nama_skpd);
			$rows_awal++;
		}
		
		
	}
	
	
	
		
	$objPHPExcel->getActiveSheet()->getRowDimension($rows_awal)->setRowHeight(30);
	$row_akhir=$rows_awal+10;
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":F".$row_akhir."")->applyFromArray($styleHeading);
	$row=$rows_awal+2;
		
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
	header('Content-Disposition: attachment;filename="SPM '.$skpd->nama_skpd.'.xls"');
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
	
	public function actionSpmPdf(){
	$model=new Spm;
	if(isset($_POST['Spm']))
	{
		$model->attributes=$_POST['Spm'];
		$this->redirect(array('cetakspmpdf','kd_skpd'=>$model->kd_skpd));
	}
	$this->render('cetakspmpdf',array(
	'model'=>$model,
	));
	
}
public function actionCetakSpmPdf($kd_skpd){
	
	Yii::import('ext.phpexcel.XPHPExcel');    
		
	$objPHPExcel= XPHPExcel::createPHPExcel();
	
	$renderer = XPHPExcel::createPHPExcelSetting();
	$rendererName = $renderer::PDF_RENDERER_MPDF;
	//echo $rendererName;

	$rendererLibrary = 'mpdf60';
	
	$rendererLibraryPath = dirname(__FILE__).'/../extensions/phpexcel/vendor/PHPExcel/Libraries/' . $rendererLibrary;
	
	$criteria = new CDbCriteria();
	$criteria->condition = ' kd_skpd = '.$kd_skpd.'';
	$criteria->group="kd_pelayanan_dasar";
	$model = Spm::model()->findAll($criteria);
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
        'size'  => 13,
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
	
	$cell = array('A','B','C','D','E','F');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang Kelurahan');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','INDIKATOR STANDAR PELAYANAN MINIMAL '.$skpd->nama_skpd.'');
	$objPHPExcel->getActiveSheet()->getStyle("A1:F5")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	
	$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(27);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A6:A7');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A6','NO');
	$objPHPExcel->getActiveSheet()->mergeCells('B6:B7');
	$objPHPExcel->getActiveSheet()->getStyle("B6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B6','Jenis Pelayanan Dasar & Sub Kegiatan');
	$objPHPExcel->getActiveSheet()->mergeCells('C6:D6');
	$objPHPExcel->getActiveSheet()->getStyle("C6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C6','Standar Pelayanan Minimal');
	$objPHPExcel->getActiveSheet()->getStyle("C7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C7','Indikator');
	$objPHPExcel->getActiveSheet()->getStyle("D7")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D7','Harga (%)');
	$objPHPExcel->getActiveSheet()->mergeCells('E6:E7');
	$objPHPExcel->getActiveSheet()->getStyle("E6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','Batas Waktu Pencapaian (Tahun)');
	$objPHPExcel->getActiveSheet()->mergeCells('F6:F7');
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','Satuan Kerja / Lembaga Penanggung Jawab');
	
	$objPHPExcel->getActiveSheet()->getStyle("A6:F8")->applyFromArray($styleTH);
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."8",$a+1);
	}
	
	$rows_awal = 9;
	$nomor_pelayanan = 0;
	$total1=0;
	$total2=0;
	foreach($model as $data)
	{
		$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
		$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTH);
		$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD);
		$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD);
		$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD);
		$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD);
		
		$nomor_pelayanan++;
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_pelayanan);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->pelayanan_dasar_->pelayanan_dasar);
		$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->getAlignment()->setWrapText(true);
					
		$rows_awal++;	
		$nomor_indikator=0;
		$criteria_indikator = new CDbCriteria();
		$criteria_indikator -> condition="kd_pelayanan_dasar='".$data->kd_pelayanan_dasar."' AND kd_skpd = '".$kd_skpd."'";
	
		$modelIndikator = Spm::model()->findAll($criteria_indikator);
		foreach($modelIndikator as $data_indikator){
			$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD);
						
			$nomor_indikator++;
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_indikator);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data_indikator->indikator);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data_indikator->nilai);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data_indikator->batas_waktu);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,$data_indikator->skpd_->nama_skpd);
			$rows_awal++;
		}
		
		
	}
	
	
	
		
	$objPHPExcel->getActiveSheet()->getRowDimension($rows_awal)->setRowHeight(30);
	$row_akhir=$rows_awal+10;
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":F".$row_akhir."")->applyFromArray($styleHeading);
	$row=$rows_awal+2;
		
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
	//header('Content-Disposition: attachment;filename="Data Usulan Kegiatan Musrenbang.pdf"');
	header('Cache-Control: max-age=0');
		
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
	$objWriter->setSheetIndex(0);
	$objWriter->save('php://output');
	Yii::app()->end(); 

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
		$model=new Spm;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Spm']))
		{
			$model->attributes=$_POST['Spm'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['Spm']))
		{
			$model->attributes=$_POST['Spm'];
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Spm');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Spm('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Spm']))
			$model->attributes=$_GET['Spm'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Spm the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Spm::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Spm $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='spm-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
