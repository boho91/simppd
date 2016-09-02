<?php

class KuaPerubahanController extends Controller
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
'actions'=>array('create','update','adminSkpd','modalForm','tree','CetakPlafonperUrusanPdf','CetakPlafonperskpdExcel','plafonperskpdexcel','PlafonperUrusanPdf','PlafonperUrusanExcel','CetakPlafonperUrusanExcel','cetakurusanexcel','cetakskpdexcel','cetakplafonperskpdexcel','cetakskpdpdf','PlafonperskpdPdf','cetakplafonperskpdpdf','cetakurusanpdf'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','gridUpdate'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

public function actionModalForm()
{
	$model=new KuaPerubahan;
	if(Yii::app()->user->isAdminBappeda())
	{
		
	}else{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$model->tahun = Yii::app()->session['tahun_perencanaan'];
	$this->renderPartial('formAwal',array(
	'model'=>$model,
	));
}
public function actionGridUpdate()
{
	if(isset($_POST['pk']))
	{
		if($_POST['name']=="pagu_setelah_perubahan" or $_POST['name']=='pagu_sebelum_perubahan')
		{
			$_POST['value'] = str_replace( ',', '', $_POST['value'] );
			$_POST['value'] = str_replace( '.', '', $_POST['value'] );
			$_POST['value'] = str_replace( 'Rp', '', $_POST['value'] );
			$_POST['value'] = str_replace( 'rp', '', $_POST['value'] );
			$_POST['value'] = str_replace( ' ', '', $_POST['value'] );
		}
		
		Yii::import('booster.components.TbEditableSaver');
		$es = new TbEditableSaver('KuaPerubahan');
		$es->update();
		
	}
}

public function actionPlafonperskpdPdf()
{
	
	$model=new KuaPerubahan;
	if(isset($_POST['KuaPerubahan']))
	{
		$model->attributes=$_POST['KuaPerubahan'];
		
		
		$this->redirect(array('CetakPlafonperskpdPdf','tahun'=>$model->tahun));
	}
	$this->render('cetakskpdPdf',array(
	'model'=>$model,
	));
}
//CetakUsulanExcel
	
public function actionCetakPlafonperSkpdPdf($tahun)

{
	error_reporting(0);
	Yii::import('ext.phpexcel.XPHPExcel');  
	$objPHPExcel= XPHPExcel::createPHPExcel();
	
	$renderer = XPHPExcel::createPHPExcelSetting();
	$rendererName = $renderer::PDF_RENDERER_MPDF;
	//echo $rendererName;

	$rendererLibrary = 'mPDF60';
	
	$rendererLibraryPath = dirname(__FILE__).'/../extensions/phpexcel/vendor/PHPExcel/Libraries/' . $rendererLibrary;
	
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.'';
	$criteria->group = "urusan";
	$criteria->select = 't.*,sum(pagu_sebelum_perubahan) as pagu1, sum(pagu_setelah_perubahan) as pagu2';
	$model = KuaPerubahan::model()->findAll($criteria);
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
	
	$cell = array('A','B','C','D','E','F');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','TARGET PENCAPAIAN KINERJA YANG TERUKUR DARI SETIAP URUSAN');
	$objPHPExcel->getActiveSheet()->getStyle("A1:F1")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','PEMERINTAH DAERAH');
	$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(25);
	$objPHPExcel->getActiveSheet()->getStyle("A3:F4")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
	$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5',' BIDANG URUSAN PEMERINTAH DAERAH');
	$objPHPExcel->getActiveSheet()->mergeCells('C5:D5');
	$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','PAGU ');
	$objPHPExcel->getActiveSheet()->getStyle("C6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C6','SEBELUM PERUBAHAN');
	$objPHPExcel->getActiveSheet()->getStyle("C6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D6','TAHUN SETELAH PERUBAHAN');
	$objPHPExcel->getActiveSheet()->mergeCells('E5:F5');
	$objPHPExcel->getActiveSheet()->getStyle("E5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E5','BERTAMBAH / BERKURANG');
	$objPHPExcel->getActiveSheet()->getStyle("E6")->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','(Rp)');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','%');
	
	
		
	$objPHPExcel->getActiveSheet()->getStyle("A5:F7")->applyFromArray($styleTH);
	
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
		
		
		
		$nomor_bidang++;
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
		$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTH);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->urusan_->urusan);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->pagu1);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->pagu2);		
		$rows_awal++;
			
		$nomor_program = 0;
		$criteria_bidang = new CDbCriteria();
		$criteria_bidang->condition = 'tahun = '.$tahun.' AND urusan='.$data->urusan.'';
		$criteria_bidang->select = 't.*,sum(pagu_sebelum_perubahan) as pagu1, sum(pagu_setelah_perubahan) as pagu2';
		$criteria_bidang->group='bidang';
		$bidang = KuaPerubahan::model()->findAll($criteria_bidang);
		foreach($bidang as $data_bidang)
		{
		
			$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_BOLD);
			
			$nomor_program++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
						
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data_bidang->kegiatan_->program_->bidang_->bidang);
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data_bidang->pagu1);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data_bidang->pagu2);
			
			$rows_awal++;
			$nomor_kegiatan = 0;
			$criteria_skpd = new CDbCriteria();
			$criteria_skpd->condition = ' tahun = '.$tahun.' AND urusan='.$data->urusan.' AND bidang = '.$data->bidang.'';
			$criteria_skpd->select = 't.*,sum(pagu_sebelum_perubahan) as pagu1, sum(pagu_setelah_perubahan) as pagu2,SUM(pagu_setelah_perubahan)- SUM(pagu_sebelum_perubahan) as perubahan, (SUM(pagu_setelah_perubahan)- SUM(pagu_sebelum_perubahan)) / SUM(pagu_sebelum_perubahan) * 100  as persen_perubahan';
			$criteria_skpd->group='skpd';
			$kegiatan = KuaPerubahan::model()->findAll($criteria_skpd);
			foreach($kegiatan as $data_skpd)
			{
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
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data_skpd->skpd_->nama_skpd);
				
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data_skpd->pagu1);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data_skpd->pagu2);
				
						
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,AplikasiKomponen::uang($data_skpd->perubahan));
				
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal, round($data_skpd->persen_perubahan));
				
				
				$rows_awal++;
				
				//$total1+=$
			}	
			
		}
				
	}
	
	$row_akhir=$rows_awal+10;
		
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":F".$row_akhir."")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension($rows_awal)->setRowHeight(25);
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+2;
	$objPHPExcel->getActiveSheet()->mergeCells("E".$rows.":F".$rows."");
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
	//header('Content-Disposition: attachment;filename="Data Plafon Urusan Kua Perubahan.pdf"');
	header('Cache-Control: max-age=0');
		
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
	$objWriter->setSheetIndex(0);
	$objWriter->save('php://output');
	Yii::app()->end(); 

}

public function actionPlafonperskpdExcel()
{
	
	$model=new KuaPerubahan;
	if(isset($_POST['KuaPerubahan']))
	{
		$model->attributes=$_POST['KuaPerubahan'];
		
		
		$this->redirect(array('CetakPlafonperskpdExcel','tahun'=>$model->tahun));
	}
	$this->render('cetakskpdExcel',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actionCetakPlafonperskpdExcel($tahun)
{
	
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.'';
	$criteria->group = "urusan";
	$criteria->select = 't.*,sum(pagu_sebelum_perubahan) as pagu1, sum(pagu_setelah_perubahan) as pagu2';
	$model = KuaPerubahan::model()->findAll($criteria);
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
	
	$cell = array('A','B','C','D','E','F');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','TARGET PENCAPAIAN KINERJA YANG TERUKUR DARI SETIAP URUSAN');
	$objPHPExcel->getActiveSheet()->getStyle("A1:F1")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','PEMERINTAH DAERAH');
	$objPHPExcel->getActiveSheet()->getStyle("A2:F2")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
	$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5',' BIDANG URUSAN PEMERINTAH DAERAH');
	$objPHPExcel->getActiveSheet()->mergeCells('C5:D5');
	$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','PAGU ');
	$objPHPExcel->getActiveSheet()->getStyle("C6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C6','TAHUN SEBELUM PERUBAHAN');
	$objPHPExcel->getActiveSheet()->getStyle("C6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D6','TAHUN SETELAH PERUBAHAN');
	$objPHPExcel->getActiveSheet()->mergeCells('E5:F5');
	$objPHPExcel->getActiveSheet()->getStyle("E5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E5','BERTAMBAH / BERKURANG');
	$objPHPExcel->getActiveSheet()->getStyle("E6")->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','(Rp)');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','%');
	
	
		
	$objPHPExcel->getActiveSheet()->getStyle("A5:F7")->applyFromArray($styleTH);
	
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
		
		
		
		$nomor_bidang++;
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
		$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTH);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->urusan_->urusan);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->pagu1);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->pagu2);	
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$perubahan);
		//$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,$data->pagu1);		
		$rows_awal++;
			
		$nomor_program = 0;
		$criteria_bidang = new CDbCriteria();
		$criteria_bidang->condition = 'tahun = '.$tahun.' AND urusan='.$data->urusan.'';
		$criteria_bidang->select = 't.*,sum(pagu_sebelum_perubahan) as pagu1, sum(pagu_setelah_perubahan) as pagu2';
		$criteria_bidang->group='bidang';
		$bidang = KuaPerubahan::model()->findAll($criteria_bidang);
		foreach($bidang as $data_bidang)
		{
		
			$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTD_BOLD);
			
			$nomor_program++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
						
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data_bidang->kegiatan_->program_->bidang_->bidang);
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data_bidang->pagu1);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data_bidang->pagu2);
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,'');
			
			$rows_awal++;
			$nomor_kegiatan = 0;
			$criteria_skpd = new CDbCriteria();
			$criteria_skpd->condition = ' tahun = '.$tahun.' AND urusan='.$data->urusan.' AND bidang = '.$data->bidang.'';
			$criteria_skpd->select = 't.*,sum(pagu_sebelum_perubahan) as pagu1, sum(pagu_setelah_perubahan) as pagu2,SUM(pagu_setelah_perubahan)- SUM(pagu_sebelum_perubahan) as perubahan, (SUM(pagu_setelah_perubahan)- SUM(pagu_sebelum_perubahan)) / SUM(pagu_sebelum_perubahan) * 100  as persen_perubahan';
			$criteria_skpd->group='skpd';
			$kegiatan = KuaPerubahan::model()->findAll($criteria_skpd);
			foreach($kegiatan as $data_skpd)
			{
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
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data_skpd->skpd_->nama_skpd);
				
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data_skpd->pagu1);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data_skpd->pagu2);
				
						
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,AplikasiKomponen::uang($data_skpd->perubahan));
				
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal, round($data_skpd->persen_perubahan));
				
				
				$rows_awal++;
				
				//$total1+=$
			}		
			
		}
				
	}
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("E".$rows.":F".$rows."");
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
	header('Content-Disposition: attachment;filename="Data Plafon per SKPD (KuaPerubahan).xls"');
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


public function actionPlafonperurusanExcel()
{
	
	$model=new KuaPerubahan;
	if(isset($_POST['KuaPerubahan']))
	{
		$model->attributes=$_POST['KuaPerubahan'];
		
		
		$this->redirect(array('CetakPlafonperUrusanExcel','tahun'=>$model->tahun));
	}
	$this->render('cetakurusanExcel',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actionCetakPlafonperUrusanExcel($tahun)
{
	
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.'';
	//$criteria->select = 't.*,sum(pagu_sebelum_perubahan) as pagu_tahun_n2, sum(pagu_setelah_perubahan) as pagu_setelah_perubahan2';
	$criteria->group = "urusan";

	$model = KuaPerubahan::model()->findAll($criteria);
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
	
	$cell = array('A','B','C','D','E');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:E1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','TARGET PENCAPAIAN KINERJA YANG TERUKUR DARI SETIAP URUSAN');
	$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:E2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','PEMERINTAH DAERAH');
	$objPHPExcel->getActiveSheet()->getStyle("A2")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
	$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5',' BIDANG URUSAN PEMERINTAH DAERAH');
	$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
	$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','SKPD PELAKSANA');
	$objPHPExcel->getActiveSheet()->getStyle("D5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D5','PAGU SEBELUM PERUBAHAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D6','(Rp)');
	$objPHPExcel->getActiveSheet()->getStyle("E5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E5','PAGU SETELAH PERUBAHAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','(Rp)');
	
	
		
	$objPHPExcel->getActiveSheet()->getStyle("A5:E7")->applyFromArray($styleTH);
	
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
		
		
		
		$nomor_bidang++;
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
		$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTH);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->urusan_->urusan);
				
		$rows_awal++;
			
		$nomor_program = 0;
		$criteria_bidang = new CDbCriteria();
		$criteria_bidang->condition = 'tahun = '.$tahun.' AND urusan='.$data->urusan.'';
		$criteria_bidang->select = 't.*,sum(pagu_sebelum_perubahan) as pagu1, sum(pagu_setelah_perubahan) as pagu2,(SELECT GROUP_CONCAT(DISTINCT(a.nama_skpd) SEPARATOR ";") FROM Kua_Perubahan  LEFT JOIN skpd a ON Kua_Perubahan.skpd =a.id WHERE tahun = '.$tahun.' AND urusan='.$data->urusan.' GROUP BY bidang) as namaskpd';
		//select GROUP_CONCAT(DISTINCT(skpd)) from KuaPerubahan
		//results = MyModel::model()->findAllBySql("SELECT * FROM MyModel WHERE Column1=:a AND Column2 IN 
                 //                         (SELECT Column2 FROM OtherModel WHERE Column3=:B)",
                 //                         array(':a'=>'SomeValue',':b'=>'SomeOtherValue'));
		$criteria_bidang->group='bidang';
		$bidang = KuaPerubahan::model()->findAll($criteria_bidang);
		foreach($bidang as $data_bidang)
		{
		
			$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
			
			$nomor_program++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
						
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data_bidang->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data_bidang->namaskpd);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data_bidang->pagu1);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data_bidang->pagu2);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
		
			
			
			
		}
				
	}
	

	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("D".$rows.":E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("D".$rows.":E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("D".$rows.":E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,'KOTA PEMATANGSIANTAR');
	$rows+=3;
	$objPHPExcel->getActiveSheet()->mergeCells("D".$rows.":E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("D".$rows.":E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("D".$rows.":E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,$setting->nip_penanda_tangan_dokumen);
	
	// Redirect output to a clientâ€™s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Data Plafon per Urusan (KuaPerubahan).xls"');
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

public function actionPlafonperUrusanPdf()
{
	
	$model=new KuaPerubahan;
	if(isset($_POST['KuaPerubahan']))
	{
		$model->attributes=$_POST['KuaPerubahan'];
		
		
		$this->redirect(array('CetakPlafonperurusanPdf','tahun'=>$model->tahun));
	}
	$this->render('cetakurusanPdf',array(
	'model'=>$model,
	));
}
//CetakUsulanPdf
	
public function actionCetakPlafonperUrusanPdf($tahun)

{
	error_reporting(0);
	Yii::import('ext.phpexcel.XPHPExcel');  
	$objPHPExcel= XPHPExcel::createPHPExcel();
	
	$renderer = XPHPExcel::createPHPExcelSetting();
	$rendererName = $renderer::PDF_RENDERER_MPDF;
	//echo $rendererName;

	$rendererLibrary = 'mPDF60';
	
	$rendererLibraryPath = dirname(__FILE__).'/../extensions/phpexcel/vendor/PHPExcel/Libraries/' . $rendererLibrary;
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.'';
	//$criteria->select = 't.*,sum(pagu_sebelum_perubahan) as pagu_tahun_n2, sum(pagu_setelah_perubahan) as pagu_setelah_perubahan2';
	$criteria->group = "urusan";
	
	$model=KuaPerubahan::model()->findAll($criteria);
	
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
	
	$cell = array('A','B','C','D','E');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:E1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','TARGET PENCAPAIAN KINERJA YANG TERUKUR DARI SETIAP URUSAN');
	$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:E2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','PEMERINTAH DAERAH');
	$objPHPExcel->getActiveSheet()->getStyle("A2")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(27);
	$objPHPExcel->getActiveSheet()->getStyle("A3:E4")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	
	
	$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
	$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5',' BIDANG URUSAN PEMERINTAH DAERAH');
	$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
	$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','SKPD PELAKSANA');
	$objPHPExcel->getActiveSheet()->getStyle("D5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D5','PAGU SEBELUM PERUBAHAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D6','(Rp)');
	$objPHPExcel->getActiveSheet()->getStyle("E5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E5','PAGU SETELAH PERUBAHAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','(Rp)');
	
	
		
	$objPHPExcel->getActiveSheet()->getStyle("A5:E7")->applyFromArray($styleTH);
	
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
		
		
		
		$nomor_bidang++;
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
		$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTH);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->urusan_->urusan);
				
		$rows_awal++;
			
		$nomor_program = 0;
		$criteria_bidang = new CDbCriteria();
		$criteria_bidang->condition = 'tahun = '.$tahun.' AND urusan='.$data->urusan.'';
		$criteria_bidang->select = 't.*,sum(pagu_sebelum_perubahan) as pagu1, sum(pagu_setelah_perubahan) as pagu2,(SELECT GROUP_CONCAT(DISTINCT(a.nama_skpd) SEPARATOR ";") FROM Kua_Perubahan  LEFT JOIN skpd a ON Kua_Perubahan.skpd =a.id WHERE tahun = '.$tahun.' AND urusan='.$data->urusan.' GROUP BY bidang) as namaskpd';
		$criteria_bidang->group='bidang';
		$bidang = KuaPerubahan::model()->findAll($criteria_bidang);
		foreach($bidang as $data_bidang)
		{
		
			$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
			
			$nomor_program++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
						
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data_bidang->kegiatan_->program_->bidang_->bidang);
			$nomor_kegiatan = 0;
			$criteria_skpd = new CDbCriteria();
			$criteria_skpd->condition = ' tahun = '.$tahun.' AND urusan='.$data->urusan.' AND bidang = '.$data->bidang.'';
			$criteria_skpd->group='bidang';
			$kegiatan = KuaPerubahan::model()->findAll($criteria_skpd);
			

				
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
							
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
				
				
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data_bidang->namaskpd);
											
				
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data_bidang->pagu1);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data_bidang->pagu2);
						
			
			$rows_awal++;
			
		}
				
	}
	$objPHPExcel->getActiveSheet()->getRowDimension($rows_awal)->setRowHeight(25);
	$row_akhir=$rows_awal+10;
	
	
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":E".$row_akhir."")->applyFromArray($styleHeading);

	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("D".$rows.":E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("D".$rows.":E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("D".$rows.":E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,'KOTA PEMATANGSIANTAR');
	$rows++;
	$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(33);
	$rows+=2;
	$objPHPExcel->getActiveSheet()->mergeCells("D".$rows.":E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("D".$rows.":E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("D".$rows.":E".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,$setting->nip_penanda_tangan_dokumen);
	
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
	//header('Content-Disposition: attachment;filename="Data Plafon Urusan KuaPerubahan.pdf"');
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
$model=new KuaPerubahan;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['KuaPerubahan']))
{
	$model->attributes=$_POST['KuaPerubahan'];
	$model->urusan = $model->kegiatan_->program_->bidang_->urusan_-id;
	$model->bidang = $model->kegiatan_->program_->bidang_->id;
	$criteria = new CDbCriteria;
	$criteria->condition = "skpd = '".$model->skpd."' AND urusan = '".$model->urusan."' AND bidang='".$model->bidang."' AND program = '".$model->program."' AND kegiatan = '".$model->kegiatan."' ";
	$kua = Kua::model()->find($criteria);
	if(sizeof($kua)>0)
	{
		$model->pagu_sebelum_perubahan = $kua->pagu_tahun_n;

		$model->status_kua = "Data Perubahan";
	}else 
	{
		$model->status_kua = "Data Baru";
	}
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

if(isset($_POST['KuaPerubahan']))
{
$model->attributes=$_POST['KuaPerubahan'];
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
$dataProvider=new CActiveDataProvider('KuaPerubahan');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin($skpd)
{
$model=new KuaPerubahan('search');
$model->unsetAttributes();  // clear any default values
$model->skpd= $skpd;
if(isset($_GET['KuaPerubahan']))
$model->attributes=$_GET['KuaPerubahan'];

$this->render('admin',array(
'model'=>$model,
));
}
public function actionAdminSkpd()
{
	//$this->migrasiMusrenbangByDeleteInsert(Yii::app()->session['tahun_perencanaan']);
	if(!Yii::app()->user->isAdminBappeda())
	{
		$this->redirect(array("admin"));
	}
	$model=new KuaPerubahan('searchPerSKpd');
	$model->tahun= Yii::app()->session['tahun_perencanaan'];
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['KuaPerubahan']))
		$model->attributes=$_GET['KuaPerubahan'];

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
$model=KuaPerubahan::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='kua-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
