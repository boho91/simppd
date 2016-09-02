<?php

class RkpdController extends Controller
{
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
	'actions'=>array('draft','final','draftexc','draftexcel','draftpd','draftpdf','finalpdf','finalpd','finalexc','finalexcel','tolakexc','tolakexcel','tolakpd','tolakpdf'),
	'users'=>array('@'),
	),);
	}
	
	public function actionDraftExc()
{
	
	$model=new Renja;
	if(isset($_POST['Renja']))
	{
		$model->attributes=$_POST['Renja'];
		
		
		$this->redirect(array('draftexcel','tahun'=>$model->tahun,'skpd'=>$model->skpd,'urusan'=>$model->urusan));
	}
	$this->render('draftexcel',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actiondraftExcel($tahun,$skpd,$urusan)
{
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.' AND urusan='.$urusan.' AND skpd='.$skpd.'';
	//$criteria->select = "t.*,SUM(kebutuhan_dana) AS pagu_tahun_awal, SUM(kebutuhan_dana_a2) AS pagu_tahun_akhir";
	$criteria->order ="t.bidang, t.program, t.kegiatan";	
	$criteria->select = "t.*";
	//$criteria->group = "bidang";

	$model = Renja::model()->findAll($criteria);
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
        'name'  =>'Roboto', 'Noto', sans-serif
    ),
	);
	
	$cell = array('A','B','C','D','E','F','G','H','I','J');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:J1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','PROGRAM DAN KEGIATAN SKPD KOTA PEMATANGSIANTAR');
	$objPHPExcel->getActiveSheet()->getStyle("A1:J1")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:J2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.' DAN PRAKIRAAN MAJU TAHUN '.($tahun + 1).'');
	$objPHPExcel->getActiveSheet()->getStyle("A2:J2")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', ': '.$urusan->urusan);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4','SKPD');
	$objPHPExcel->getActiveSheet()->mergeCells('B4:C4');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', ': '.$skpd->nama_skpd);
	
	$objPHPExcel->getActiveSheet()->getStyle("A3:J4")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
	$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
	$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','INDIKATOR KINERJA PROGRAM / KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('D5:F5');
	$objPHPExcel->getActiveSheet()->getStyle("D5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D5','TAHUN ANGGARAN '.$tahun.'');
	$objPHPExcel->getActiveSheet()->getStyle("D6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D6','LOKASI');
	$objPHPExcel->getActiveSheet()->getStyle("E6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','KEBUTUHAN DANA / PAGU INDIKATIF');
	$objPHPExcel->getActiveSheet()->mergeCells('G5:G6');
	$objPHPExcel->getActiveSheet()->getStyle("G5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G5','SUMBER DANA');
	$objPHPExcel->getActiveSheet()->mergeCells('H5:H6');
	$objPHPExcel->getActiveSheet()->getStyle("H5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H5','CATATAN PENTING');
	$objPHPExcel->getActiveSheet()->mergeCells('I5:J5');
	$objPHPExcel->getActiveSheet()->getStyle("I5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I5','PRAKIRAAN MAJU RENCANA TAHUN '.($tahun+1).'');
	$objPHPExcel->getActiveSheet()->getStyle("I6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("J6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J6','KEBUTUHAN DANA / PAGU INDIKATIF');
		
	$objPHPExcel->getActiveSheet()->getStyle("A5:J7")->applyFromArray($styleTH);
	
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."7",$a+1);
	}
	
	
	
	$rows_awal = 8;
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
			
			$totalPaguPerBidang=Renja::model()->totalPaguPerBidang($data->tahun,$data->skpd,$data->urusan,$data->bidang);
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
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[0]));
			$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[1]));
				
			$rows_awal++;
			
			$nomor_program = 0;
	}
		if($currentProgram != $tempProgram)
		{
			$totalPaguPerProgram = Renja::model()->totalPaguPerProgram($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program);
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
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[0]));
			$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
			
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
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
				
				$nomor_kegiatan++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->indikator_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->lokasi_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->target_capaian_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data->sumber_dana_->sumber_dana);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data->catatan_penting);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data->target_capaian_kinerja_a2);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana_a2));
				
		$tempBidang = $data->bidang;
		$tempProgram= $data->program;
			
		$rows_awal++;
		
				
	}
	$objPHPExcel->getActiveSheet()->mergeCells("A".$rows_awal.":E".$rows_awal."");
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,'TOTAL');
	
	$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($total2));
	
	$row=$rows_awal+1;
	$row_akhir=$rows_awal+10;
		
	$objPHPExcel->getActiveSheet()->getStyle("A".$row.":J".$row_akhir."")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(25);
	//$objPHPExcel->getActiveSheet()->getStyle($row)->applyFromArray($styleHeading);
	
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KOTA PEMATANGSIANTAR');
	$rows++;
	$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(30);
	$rows+=2;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nip_penanda_tangan_dokumen);
	
	// Redirect output to a clientâ€™s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Data Draft RKPD.xls"');
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


public function actiondraftPd()
{
	
	$model=new Renja;
	if(isset($_POST['Renja']))
	{
		$model->attributes=$_POST['Renja'];
		
		
		$this->redirect(array('draftpdf','tahun'=>$model->tahun,'skpd'=>$model->skpd,'urusan'=>$model->urusan));
	}
	$this->render('draftpdf',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actiondraftPdf($tahun,$skpd,$urusan)
{Yii::import('ext.phpexcel.XPHPExcel');  
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
	
	$model = Renja::model()->findAll($criteria);
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
	
	$cell = array('A','B','C','D','E','F','G','H','I','J');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:J1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','PROGRAM DAN KEGIATAN SKPD KOTA PEMATANGSIANTAR');
	$objPHPExcel->getActiveSheet()->getStyle("A1:J1")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:J2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.' DAN PRAKIRAAN MAJU TAHUN '.($tahun + 1).'');
	$objPHPExcel->getActiveSheet()->getStyle("A2:J2")->applyFromArray($styleHeadingJudul);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', ': '.$urusan->urusan);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4','SKPD');
	$objPHPExcel->getActiveSheet()->mergeCells('B4:C4');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', ': '.$skpd->nama_skpd);
	$objPHPExcel->getActiveSheet()->getStyle("A3:J4")->applyFromArray($styleHeading);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
	$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
	$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','INDIKATOR KINERJA PROGRAM / KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('D5:F5');
	$objPHPExcel->getActiveSheet()->getStyle("D5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D5','TAHUN ANGGARAN '.$tahun.'');
	$objPHPExcel->getActiveSheet()->getStyle("D6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D6','LOKASI');
	$objPHPExcel->getActiveSheet()->getStyle("E6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','KEBUTUHAN DANA / PAGU INDIKATIF');
	$objPHPExcel->getActiveSheet()->mergeCells('G5:G6');
	$objPHPExcel->getActiveSheet()->getStyle("G5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G5','SUMBER DANA');
	$objPHPExcel->getActiveSheet()->mergeCells('H5:H6');
	$objPHPExcel->getActiveSheet()->getStyle("H5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H5','CATATAN PENTING');
	$objPHPExcel->getActiveSheet()->mergeCells('I5:J5');
	$objPHPExcel->getActiveSheet()->getStyle("I5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I5','PRAKIRAAN MAJU RENCANA TAHUN '.($tahun+1).'');
	$objPHPExcel->getActiveSheet()->getStyle("I6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("J6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J6','KEBUTUHAN DANA / PAGU INDIKATIF');
		
	$objPHPExcel->getActiveSheet()->getStyle("A5:J7")->applyFromArray($styleTH);
	
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."7",$a+1);
	}
	
	$rows_awal = 8;
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
			
			$totalPaguPerBidang=Renja::model()->totalPaguPerBidang($data->tahun,$data->skpd,$data->urusan,$data->bidang);
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
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[0]));
			$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[1]));
				
			$rows_awal++;
			
			$nomor_program = 0;
	}
		if($currentProgram != $tempProgram)
		{
			$totalPaguPerProgram = Renja::model()->totalPaguPerProgram($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program);
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
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[0]));
			$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
			
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
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
				
				$nomor_kegiatan++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->indikator_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->lokasi_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->target_capaian_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data->sumber_dana_->sumber_dana);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data->catatan_penting);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data->target_capaian_kinerja_a2);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana_a2));
				
		$tempBidang = $data->bidang;
		$tempProgram= $data->program;
			
		$rows_awal++;
		
				
	}
	$objPHPExcel->getActiveSheet()->mergeCells("A".$rows_awal.":E".$rows_awal."");
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,'TOTAL');
	
	$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($total2));
	
	$row=$rows_awal+1;
	$row_akhir=$rows_awal+10;
		
	$objPHPExcel->getActiveSheet()->getStyle("A".$row.":J".$row_akhir."")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(22);
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KOTA PEMATANGSIANTAR');
	$rows++;
	$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(30);
	$rows+=2;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nip_penanda_tangan_dokumen);
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

public function actionfinalExc()
{
	
	$model=new Renja;
	if(isset($_POST['Renja']))
	{
		$model->attributes=$_POST['Renja'];
		
		
		$this->redirect(array('finalexcel','tahun'=>$model->tahun,'skpd'=>$model->skpd,'urusan'=>$model->urusan));
	}
	$this->render('finalexcel',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actionfinalExcel($tahun,$skpd,$urusan)
{
	$criteria = new CDbCriteria();
	$criteria->condition = "tahun = ".$tahun." AND urusan=".$urusan." AND skpd=".$skpd." AND status_forum_skpd='Terima'";
	//$criteria->select = "t.*,SUM(kebutuhan_dana) AS pagu_tahun_awal, SUM(kebutuhan_dana_a2) AS pagu_tahun_akhir";
	$criteria->order ="t.bidang, t.program, t.kegiatan";	
	$criteria->select = "t.*";
	//$criteria->group = "bidang";

	$model = Renja::model()->findAll($criteria);
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
	
	$cell = array('A','B','C','D','E','F','G','H','I','J');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:J1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','PROGRAM DAN KEGIATAN SKPD KOTA PEMATANGSIANTAR');
	$objPHPExcel->getActiveSheet()->getStyle("A1:J1")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:J2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.' DAN PRAKIRAAN MAJU TAHUN '.($tahun + 1).'');
	$objPHPExcel->getActiveSheet()->getStyle("A2:J2")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', ': '.$urusan->urusan);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4','SKPD');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', ': '.$skpd->nama_skpd);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
	$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
	$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','INDIKATOR KINERJA PROGRAM / KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('D5:F5');
	$objPHPExcel->getActiveSheet()->getStyle("D5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D5','TAHUN ANGGARAN '.$tahun.'');
	$objPHPExcel->getActiveSheet()->getStyle("D6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D6','LOKASI');
	$objPHPExcel->getActiveSheet()->getStyle("E6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','KEBUTUHAN DANA / PAGU INDIKATIF');
	$objPHPExcel->getActiveSheet()->mergeCells('G5:G6');
	$objPHPExcel->getActiveSheet()->getStyle("G5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G5','SUMBER DANA');
	$objPHPExcel->getActiveSheet()->mergeCells('H5:H6');
	$objPHPExcel->getActiveSheet()->getStyle("H5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H5','CATATAN PENTING');
	$objPHPExcel->getActiveSheet()->mergeCells('I5:J5');
	$objPHPExcel->getActiveSheet()->getStyle("I5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I5','PRAKIRAAN MAJU RENCANA TAHUN '.($tahun+1).'');
	$objPHPExcel->getActiveSheet()->getStyle("I6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("J6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J6','KEBUTUHAN DANA / PAGU INDIKATIF');
		
	$objPHPExcel->getActiveSheet()->getStyle("A5:J7")->applyFromArray($styleTH);
	
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."7",$a+1);
	}
	
	
	
	$rows_awal = 8;
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
			
			$totalPaguPerBidang=Renja::model()->totalPaguBidangFinal($data->tahun,$data->skpd,$data->urusan,$data->bidang);
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
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[0]));
			$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[1]));
				
			$rows_awal++;
			
			$nomor_program = 0;
	}
		if($currentProgram != $tempProgram)
		{
			$totalPaguPerProgram = Renja::model()->totalPaguProgramFinal($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program);
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
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[0]));
			$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
			
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
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
				
				$nomor_kegiatan++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->indikator_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->lokasi_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->target_capaian_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data->sumber_dana_->sumber_dana);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data->catatan_penting);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data->target_capaian_kinerja_a2);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana_a2));
				
		$tempBidang = $data->bidang;
		$tempProgram= $data->program;
			
		$rows_awal++;
		
				
	}
	$objPHPExcel->getActiveSheet()->mergeCells("A".$rows_awal.":E".$rows_awal."");
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,'TOTAL');
	
	$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($total2));
	
	
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KOTA PEMATANGSIANTAR');
	$rows+=3;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nip_penanda_tangan_dokumen);
	
	// Redirect output to a clientâ€™s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Data RKPD Final.xls"');
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


public function actionfinalPd()
{
	
	$model=new Renja;
	if(isset($_POST['Renja']))
	{
		$model->attributes=$_POST['Renja'];
		
		
		$this->redirect(array('finalpdf','tahun'=>$model->tahun,'skpd'=>$model->skpd,'urusan'=>$model->urusan));
	}
	$this->render('finalpdf',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actionfinalPdf($tahun,$skpd,$urusan)
{
	Yii::import('ext.phpexcel.XPHPExcel');  
	$objPHPExcel= XPHPExcel::createPHPExcel();
	
	$renderer = XPHPExcel::createPHPExcelSetting();
	$rendererName = $renderer::PDF_RENDERER_MPDF;
	//echo $rendererName;

	$rendererLibrary = 'mPDF60';
	
	$rendererLibraryPath = dirname(__FILE__).'/../extensions/phpexcel/vendor/PHPExcel/Libraries/' . $rendererLibrary;
	$criteria = new CDbCriteria();
	$criteria->condition = "tahun = ".$tahun." AND urusan=".$urusan." AND skpd=".$skpd." AND status_forum_skpd='Terima'";
	//$criteria->select = "t.*,SUM(kebutuhan_dana) AS pagu_tahun_awal, SUM(kebutuhan_dana_a2) AS pagu_tahun_akhir";
	$criteria->order ="t.bidang, t.program, t.kegiatan";	
	$criteria->select = "t.*";
	//$criteria->group = "bidang";

	$model = Renja::model()->findAll($criteria);
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
	
	$cell = array('A','B','C','D','E','F','G','H','I','J');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:J1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','PROGRAM DAN KEGIATAN SKPD KOTA PEMATANGSIANTAR');
	$objPHPExcel->getActiveSheet()->getStyle("A1:J1")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:J2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.' DAN PRAKIRAAN MAJU TAHUN '.($tahun + 1).'');
	$objPHPExcel->getActiveSheet()->getStyle("A2:J2")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', ': '.$urusan->urusan);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4','SKPD');
	$objPHPExcel->getActiveSheet()->mergeCells('B4:C4');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', ': '.$skpd->nama_skpd);
	$objPHPExcel->getActiveSheet()->getStyle("A3:J4")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
	$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
	$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','INDIKATOR KINERJA PROGRAM / KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('D5:F5');
	$objPHPExcel->getActiveSheet()->getStyle("D5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D5','TAHUN ANGGARAN '.$tahun.'');
	$objPHPExcel->getActiveSheet()->getStyle("D6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D6','LOKASI');
	$objPHPExcel->getActiveSheet()->getStyle("E6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','KEBUTUHAN DANA / PAGU INDIKATIF');
	$objPHPExcel->getActiveSheet()->mergeCells('G5:G6');
	$objPHPExcel->getActiveSheet()->getStyle("G5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G5','SUMBER DANA');
	$objPHPExcel->getActiveSheet()->mergeCells('H5:H6');
	$objPHPExcel->getActiveSheet()->getStyle("H5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H5','CATATAN PENTING');
	$objPHPExcel->getActiveSheet()->mergeCells('I5:J5');
	$objPHPExcel->getActiveSheet()->getStyle("I5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I5','PRAKIRAAN MAJU RENCANA TAHUN '.($tahun+1).'');
	$objPHPExcel->getActiveSheet()->getStyle("I6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("J6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J6','KEBUTUHAN DANA / PAGU INDIKATIF');
		
	$objPHPExcel->getActiveSheet()->getStyle("A5:J7")->applyFromArray($styleTH);
	
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."7",$a+1);
	}
	
	
	
	$rows_awal = 8;
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
			
			$totalPaguPerBidang=Renja::model()->totalPaguBidangFinal($data->tahun,$data->skpd,$data->urusan,$data->bidang);
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
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[0]));
			$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[1]));
				
			$rows_awal++;
			
			$nomor_program = 0;
	}
		if($currentProgram != $tempProgram)
		{
			$totalPaguPerProgram = Renja::model()->totalPaguProgramFinal($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program);
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
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[0]));
			$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
			
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
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
				
				$nomor_kegiatan++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->indikator_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->lokasi_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->target_capaian_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data->sumber_dana_->sumber_dana);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data->catatan_penting);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data->target_capaian_kinerja_a2);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana_a2));
				
		$tempBidang = $data->bidang;
		$tempProgram= $data->program;
			
		$rows_awal++;
		
				
	}
	$objPHPExcel->getActiveSheet()->mergeCells("A".$rows_awal.":E".$rows_awal."");
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,'TOTAL');
	
	$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($total2));
	
	$row=$rows_awal+1;
	$row_akhir=$rows_awal+10;
		
	$objPHPExcel->getActiveSheet()->getStyle("A".$row.":J".$row_akhir."")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(22);
	
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KOTA PEMATANGSIANTAR');
	$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nip_penanda_tangan_dokumen);

	
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
	//header('Content-Disposition: attachment;filename="Data RKPD Final.pdf"');
	header('Cache-Control: max-age=0');
		
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
	$objWriter->setSheetIndex(0);
	$objWriter->save('php://output');
	Yii::app()->end(); 

}
	
	public function actiontolakExc()
{
	
	$model=new Renja;
	if(isset($_POST['Renja']))
	{
		$model->attributes=$_POST['Renja'];
		
		
		$this->redirect(array('tolakexcel','tahun'=>$model->tahun,'skpd'=>$model->skpd,'urusan'=>$model->urusan));
	}
	$this->render('tolakexcel',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actiontolakExcel($tahun,$skpd,$urusan)
{
	$criteria = new CDbCriteria();
	$criteria->condition = "tahun = ".$tahun." AND urusan=".$urusan." AND skpd=".$skpd." AND status_forum_skpd='Tolak'";
	//$criteria->select = "t.*,SUM(kebutuhan_dana) AS pagu_tahun_awal, SUM(kebutuhan_dana_a2) AS pagu_tahun_akhir";
	$criteria->order ="t.bidang, t.program, t.kegiatan";	
	$criteria->select = "t.*";
	//$criteria->group = "bidang";

	$model = Renja::model()->findAll($criteria);
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
	
	$cell = array('A','B','C','D','E','F','G','H','I','J');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:J1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','PROGRAM DAN KEGIATAN SKPD KOTA PEMATANGSIANTAR');
	$objPHPExcel->getActiveSheet()->getStyle("A1:J1")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:J2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.' DAN PRAKIRAAN MAJU TAHUN '.($tahun + 1).'');
	$objPHPExcel->getActiveSheet()->getStyle("A2:J2")->applyFromArray($styleHeadingJudul);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', ': '.$urusan->urusan);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4','SKPD');
	$objPHPExcel->getActiveSheet()->mergeCells('B4:C4');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', ': '.$skpd->nama_skpd);
	$objPHPExcel->getActiveSheet()->getStyle("A3:J4")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
	$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
	$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','INDIKATOR KINERJA PROGRAM / KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('D5:F5');
	$objPHPExcel->getActiveSheet()->getStyle("D5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D5','TAHUN ANGGARAN '.$tahun.'');
	$objPHPExcel->getActiveSheet()->getStyle("D6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D6','LOKASI');
	$objPHPExcel->getActiveSheet()->getStyle("E6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','KEBUTUHAN DANA / PAGU INDIKATIF');
	$objPHPExcel->getActiveSheet()->mergeCells('G5:G6');
	$objPHPExcel->getActiveSheet()->getStyle("G5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G5','SUMBER DANA');
	$objPHPExcel->getActiveSheet()->mergeCells('H5:H6');
	$objPHPExcel->getActiveSheet()->getStyle("H5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H5','CATATAN PENTING');
	$objPHPExcel->getActiveSheet()->mergeCells('I5:J5');
	$objPHPExcel->getActiveSheet()->getStyle("I5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I5','PRAKIRAAN MAJU RENCANA TAHUN '.($tahun+1).'');
	$objPHPExcel->getActiveSheet()->getStyle("I6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("J6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J6','KEBUTUHAN DANA / PAGU INDIKATIF');
		
	$objPHPExcel->getActiveSheet()->getStyle("A5:J7")->applyFromArray($styleTH);
	
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."7",$a+1);
	}
	
	
	
	$rows_awal = 8;
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
			
			$totalPaguPerBidang=Renja::model()->totalPaguBidangTolak($data->tahun,$data->skpd,$data->urusan,$data->bidang);
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
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[0]));
			$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[1]));
				
			$rows_awal++;
			
			$nomor_program = 0;
	}
		if($currentProgram != $tempProgram)
		{
			$totalPaguPerProgram = Renja::model()->totalPaguProgramTolak($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program);
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
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[0]));
			$objPHPExcel->getActiveSheet()->getStyle("j".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
			
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
				$objPHPExcel->getActiveSheet()->getStyle("G".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("H".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
				
				$nomor_kegiatan++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->indikator_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->lokasi_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->target_capaian_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data->sumber_dana_->sumber_dana);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data->catatan_penting);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data->target_capaian_kinerja_a2);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana_a2));
				
		$tempBidang = $data->bidang;
		$tempProgram= $data->program;
			
		$rows_awal++;
		
				
	}
	$objPHPExcel->getActiveSheet()->mergeCells("A".$rows_awal.":E".$rows_awal."");
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,'TOTAL');
	
	$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,AplikasiKomponen::uang($total2));
	
	$row=$rows_awal+1;
	$row_akhir=$rows_awal+10;
		
	$objPHPExcel->getActiveSheet()->getStyle("B".$row.":E".$row_akhir."")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(22);
	
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KOTA PEMATANGSIANTAR');
	$rows+=3;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nip_penanda_tangan_dokumen);
	
	// Redirect output to a clientâ€™s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Data RKPD Tolak.xls"');
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


public function actiontolakPd()
{
	
	$model=new Renja;
	if(isset($_POST['Renja']))
	{
		$model->attributes=$_POST['Renja'];
		
		
		$this->redirect(array('tolakpdf','tahun'=>$model->tahun,'skpd'=>$model->skpd,'urusan'=>$model->urusan));
	}
	$this->render('tolakpdf',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actiontolakPdf($tahun,$skpd,$urusan)
{
	Yii::import('ext.phpexcel.XPHPExcel');  
	$objPHPExcel= XPHPExcel::createPHPExcel();
	
	$renderer = XPHPExcel::createPHPExcelSetting();
	$rendererName = $renderer::PDF_RENDERER_MPDF;
	//echo $rendererName;

	$rendererLibrary = 'mPDF60';
	
	$rendererLibraryPath = dirname(__FILE__).'/../extensions/phpexcel/vendor/PHPExcel/Libraries/' . $rendererLibrary;
	$terima='Terima';
	$criteria = new CDbCriteria();
	$criteria->condition = "tahun = ".$tahun." AND urusan=".$urusan." AND skpd=".$skpd." AND status_forum_skpd='Tolak'";
	$criteria->select = "t.*,SUM(kebutuhan_dana) AS pagu_tahun_awal, SUM(kebutuhan_dana_a2) AS pagu_tahun_akhir";
		
	$criteria->group = "bidang";

	$model = Renja::model()->findAll($criteria);
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
	
	$cell = array('A','B','C','D','E','F','G','H','I','J');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:J1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','PROGRAM DAN KEGIATAN SKPD KOTA PEMATANGSIANTAR');
	$objPHPExcel->getActiveSheet()->getStyle("A1:J1")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:J2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.' DAN PRAKIRAAN MAJU TAHUN '.($tahun + 1).'');
	$objPHPExcel->getActiveSheet()->getStyle("A2:J2")->applyFromArray($styleHeadingJudul);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', ': '.$urusan->urusan);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4','SKPD');
	$objPHPExcel->getActiveSheet()->mergeCells('B4:C4');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', ': '.$skpd->nama_skpd);
	$objPHPExcel->getActiveSheet()->getStyle("A3:J4")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
	$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
	$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','INDIKATOR KINERJA PROGRAM / KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('D5:F5');
	$objPHPExcel->getActiveSheet()->getStyle("D5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D5','TAHUN ANGGARAN '.$tahun.'');
	$objPHPExcel->getActiveSheet()->getStyle("D6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D6','LOKASI');
	$objPHPExcel->getActiveSheet()->getStyle("E6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','KEBUTUHAN DANA / PAGU INDIKATIF');
	$objPHPExcel->getActiveSheet()->mergeCells('G5:G6');
	$objPHPExcel->getActiveSheet()->getStyle("G5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G5','SUMBER DANA');
	$objPHPExcel->getActiveSheet()->mergeCells('H5:H6');
	$objPHPExcel->getActiveSheet()->getStyle("H5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H5','CATATAN PENTING');
	$objPHPExcel->getActiveSheet()->mergeCells('I5:J5');
	$objPHPExcel->getActiveSheet()->getStyle("I5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I5','PRAKIRAAN MAJU RENCANA TAHUN '.($tahun+1).'');
	$objPHPExcel->getActiveSheet()->getStyle("I6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("J6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J6','KEBUTUHAN DANA / PAGU INDIKATIF');
		
	$objPHPExcel->getActiveSheet()->getStyle("A5:J7")->applyFromArray($styleTH);
	
	for($a=0;$a <sizeof($cell);$a++)
	{
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."7",$a+1);
	}
	
	$rows_awal = 8;
	$nomor_bidang = 0;
	$total1=0;
	$total2=0;
	foreach($model as $data)
	{
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
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,$data->pagu_tahun_awal);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,$data->pagu_tahun_akhir);
			
		$rows_awal++;
		
		$nomor_program = 0;
		$criteria_program = new CDbCriteria();
		$criteria_program->condition = "tahun = ".$tahun." AND skpd = ".$data->skpd." AND urusan=".$data->urusan." AND bidang = ".$data->bidang." AND status_forum_skpd='Tolak' ";
		$criteria_program->select = "t.*,SUM(kebutuhan_dana) AS pagu_tahun_awal, SUM(kebutuhan_dana_a2) AS pagu_tahun_akhir";
		$criteria_program->group = "t.program";
		$kegiatan_program = Renja::model()->findAll($criteria_program);
		foreach($kegiatan_program as $program)
		{
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
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,$program->pagu_tahun_awal);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,$program->pagu_tahun_akhir);
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$program->kegiatan_->program_->program);
			$rows_awal++;
			
			$nomor_kegiatan = 0;
			$criteria_kegiatan = new CDbCriteria();
			$criteria_kegiatan->condition = "program = ".$program->program." AND tahun = ".$tahun." AND skpd = ".$data->skpd." AND urusan=".$data->urusan." AND bidang = ".$data->bidang." AND status_forum_skpd='Tolak'";
			$criteria_kegiatan->select = "t.*,SUM(kebutuhan_dana) AS pagu_tahun_awal, SUM(kebutuhan_dana_a2) AS pagu_tahun_akhir";
			$criteria_kegiatan->group='t.kegiatan';
			$kegiatan = Renja::model()->findAll($criteria_kegiatan);
			foreach($kegiatan as $data_kegiatan)
			{
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
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data_kegiatan->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data_kegiatan->indikator_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data_kegiatan->lokasi_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data_kegiatan->target_capaian_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,$data_kegiatan->pagu_tahun_awal);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data_kegiatan->sumber_dana_->sumber_dana);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data_kegiatan->catatan_penting);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data_kegiatan->target_capaian_kinerja_a2);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,$data_kegiatan->pagu_tahun_akhir);
				
				
				$rows_awal++;
			}
			
		}
		
		
	}
	
	//$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":G".$rows_awal."")->applyFromArray($styleTD_LEFT);
	$objPHPExcel->getActiveSheet()->mergeCells("A".$rows_awal.":E".$rows_awal."");
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,'TOTAL');
	
	$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,$data->pagu_tahun_awal);;
	$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("J".$rows_awal,$data->pagu_tahun_akhir);
	
	$row=$rows_awal+1;
	$row_akhir=$rows_awal+10;
		
	$objPHPExcel->getActiveSheet()->getStyle("A".$row.":J".$row_akhir."")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(22);
	
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KOTA PEMATANGSIANTAR');
	$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(30);
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":J".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nip_penanda_tangan_dokumen);

	
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
	//header('Content-Disposition: attachment;filename="Data RKPD Tolak.pdf"');
	header('Cache-Control: max-age=0');
		
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
	$objWriter->setSheetIndex(0);
	$objWriter->save('php://output');
	Yii::app()->end(); 


}
	
	public function actionDraft()
	{
		$this->render('draft');
	}
	public function actionFinal()
	{
		$this->render('final');
	}
	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}