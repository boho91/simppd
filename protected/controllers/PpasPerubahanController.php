<?php

class PpasPerubahanController extends Controller
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
'actions'=>array('create','update','migrasi'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','adminSkpd','modalForm','gridUpdate','PlafonperProgramPdf','PlafonperProgramExcel','cetakPlafonperProgrampdf','cetakPlafonperProgramExcel','cetakPlafonperUrusanExcel','cetakPlafonperurusanpdf','PlafonperUrusanPdf','PlafonperUrusanexcel'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}
public function actionGridUpdate()
{
	if(isset($_POST['pk']))
	{
		if($_POST['name']=="plafon_anggaran" or $_POST['name']=="plafon_anggaran_setelah_perubahan")
		{
			$_POST['value'] = str_replace( ',', '', $_POST['value'] );
			$_POST['value'] = str_replace( '.', '', $_POST['value'] );
			$_POST['value'] = str_replace( 'Rp', '', $_POST['value'] );
			$_POST['value'] = str_replace( 'rp', '', $_POST['value'] );
			$_POST['value'] = str_replace( ' ', '', $_POST['value'] );
		}
		
		Yii::import('booster.components.TbEditableSaver');
		$es = new TbEditableSaver('PpasPerubahan');
		$es->update();
		
	}
}
public function actionPlafonperProgramExcel()
	{
			
		$model=new PpasPerubahan;
		if(isset($_POST['PpasPerubahan']))
		{
			$model->attributes=$_POST['PpasPerubahan'];
			$this->redirect(array('cetakPlafonperProgramExcel','tahun'=>$model->tahun,'skpd'=>$model->skpd,'urusan'=>$model->urusan));
		}
			$this->render('cetakProgramExcel',array(
			'model'=>$model,
		));
	}

//CetakUsulanExcel
		
public function actionCetakPlafonperProgramExcel($tahun,$skpd,$urusan)
	{
				
		$criteria = new CDbCriteria();
		$criteria->condition = ' tahun = '.$tahun.' AND urusan='.$urusan.' AND skpd='.$skpd.'';
		$criteria->select = "t.*,SUM(plafon_anggaran) AS sumAnggaran";
			
		$criteria->group = "program";
		$model = PpasPerubahan::model()->findAll($criteria);
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
		
		$cell = array('A','B','C','D','E');
		$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
		$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
		
		$objPHPExcel->getActiveSheet()->mergeCells('A1:E1');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','PLAFON ANGGARAN SEMENTARA BERDASARKAN PROGRAM DAN KEGIATAN');
		$objPHPExcel->getActiveSheet()->getStyle("A1:E1")->applyFromArray($styleHeading);
		$objPHPExcel->getActiveSheet()->mergeCells('A2:E2');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.'');
		$objPHPExcel->getActiveSheet()->getStyle("A2:E2")->applyFromArray($styleHeading);
		
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','URUSAN');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5', ': '.$urusan->urusan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A6','SKPD');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B6', ': '.$skpd->nama_skpd);
				
				
				$objPHPExcel->getActiveSheet()->mergeCells('A8:A9');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A8','NOMOR');
				$objPHPExcel->getActiveSheet()->mergeCells('B8:B9');
				$objPHPExcel->getActiveSheet()->getStyle("B8")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B8',' PROGRAM/ KEGIATAN');
				$objPHPExcel->getActiveSheet()->mergeCells('C8:C9');
				$objPHPExcel->getActiveSheet()->getStyle("C8")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C8','SASARAN');
				$objPHPExcel->getActiveSheet()->mergeCells('D8:D9');
				$objPHPExcel->getActiveSheet()->getStyle("D8")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D8','TARGET');
				$objPHPExcel->getActiveSheet()->getStyle("E8")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E8','PLAFON ANGGARAN SEMENTARA');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E9','(Rp)');
				
					
				$objPHPExcel->getActiveSheet()->getStyle("A8:E10")->applyFromArray($styleTH);
		
		for($a=0;$a <sizeof($cell);$a++)
		{
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."10",$a+1);
		}
			
		$rows_awal = 11;
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
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->program);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->sumAnggaran);
			
			$rows_awal++;
				
				$nomor_kegiatan = 0;
				$criteria_kegiatan = new CDbCriteria();
				$criteria_kegiatan->condition = 'program = '.$data->program.' AND tahun = '.$tahun.' AND skpd = '.$data->skpd.' AND urusan='.$data->urusan.' ';
			  
				$kegiatan = PpasPerubahan::model()->findAll($criteria_kegiatan);
				foreach($kegiatan as $data_kegiatan)
					{
					$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
							$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
							$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
							$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
							$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
							
							
							
							$nomor_kegiatan++;
							$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
							$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
							$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data_kegiatan->kegiatan_->kegiatan);
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data_kegiatan->sasaran);
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data_kegiatan->target);
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data_kegiatan->plafon_anggaran);
							
							
							
							$rows_awal++;
							$total += $data_kegiatan->plafon_anggaran;			
						}
						
					
				}
				
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal.":E".$rows_awal."")->applyFromArray($styleTH);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,'Total');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,AplikasiKomponen::uang($total));

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
				header('Content-Disposition: attachment;filename="Data Plafon Per Program.xls"');
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


public function actionPlafonperProgramPdf()
{
		$model=new PpasPerubahan;
		if(isset($_POST['PpasPerubahan']))
		{
			$model->attributes=$_POST['PpasPerubahan'];
			$this->redirect(array('CetakPlafonPerProgramPdf','tahun'=>$model->tahun,'skpd'=>$model->skpd,'urusan'=>$model->urusan));
		}
		$this->render('cetakProgramPdf',array(
		'model'=>$model,
		));
}
			//CetakUsulanExcel
				
public function actionCetakPlafonPerProgramPdf($tahun,$skpd,$urusan)
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
		$criteria->condition = ' tahun = '.$tahun.' AND urusan='.$urusan.' AND skpd='.$skpd.'';
		$criteria->select = "t.*,SUM(plafon_anggaran) AS sumAnggaran";
			
		$criteria->group = "program";
		$model = PpasPerubahan::model()->findAll($criteria);
		$skpd = Skpd::model()->find(array('condition'=>'id = '.$skpd.''));
		$urusan = Urusan::model()->find(array('condition'=>'id = '.$urusan.''));
		
		$objPHPExcel->getProperties()->setCreator("Bappeda Kota Pematangsiantar")
										->setLastModifiedBy("Bappeda Kota Pematangsiantar")
										 ->setTitle("Simrenbang Bappeda Kota Pematangsiantar")
										 ->setSubject("Simrenbang Bappeda Kota Pematangsiantar")
										 ->setDescription("Simrenbang Bappeda Kota Pematangsiantar")
										 ->setKeywords("Bappeda Kota Pematangsiantar")
										 ->setCategory("Bappeda Kota Pematangsiantar");
										 
		//$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		//$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
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
		$objPHPExcel->getActiveSheet()->getStyle("A1")->applyFromArray($styleHeadingJudul);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','PLAFON ANGGARAN SEMENTARA BERDASARKAN PROGRAM DAN KEGIATAN');
		
		$objPHPExcel->getActiveSheet()->mergeCells('A2:E2');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.'');
		$objPHPExcel->getActiveSheet()->getStyle("A2")->applyFromArray($styleHeadingJudul);
		
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
		
		$objPHPExcel->getActiveSheet()->getStyle("A3:E7")->applyFromArray($styleHeading);
		
		$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(23);
		$objPHPExcel->getActiveSheet()->getRowDimension('7')->setRowHeight(10);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','URUSAN');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5', ': '.$urusan->urusan);
		$objPHPExcel->getActiveSheet()->mergeCells('B6:C6');
		$objPHPExcel->getActiveSheet()->getStyle("B6")->applyFromArray($styleHeading);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A6','SKPD');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B6', ': '.$skpd->nama_skpd);
						
		$objPHPExcel->getActiveSheet()->mergeCells('A8:A9');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A8','NOMOR');
		$objPHPExcel->getActiveSheet()->mergeCells('B8:B9');
		$objPHPExcel->getActiveSheet()->getStyle("B8")->getAlignment()->setWrapText(true);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B8',' PROGRAM/ KEGIATAN');
		$objPHPExcel->getActiveSheet()->mergeCells('C8:C9');
		$objPHPExcel->getActiveSheet()->getStyle("C8")->getAlignment()->setWrapText(true);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C8','SASARAN');
		$objPHPExcel->getActiveSheet()->mergeCells('D8:D9');
		$objPHPExcel->getActiveSheet()->getStyle("D8")->getAlignment()->setWrapText(true);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D8','TARGET');
		$objPHPExcel->getActiveSheet()->getStyle("E8")->getAlignment()->setWrapText(true);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E8','PLAFON ANGGARAN SEMENTARA');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E9','(Rp)');
		
					
		$objPHPExcel->getActiveSheet()->getStyle("A8:E10")->applyFromArray($styleTH);
		for($a=0;$a <sizeof($cell);$a++)
		{
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($cell[$a]."10",$a+1);
		}
			
		$rows_awal = 11;
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
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->program);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->sumAnggaran);
			
			$rows_awal++;
				
			$nomor_kegiatan = 0;
			$criteria_kegiatan = new CDbCriteria();
			$criteria_kegiatan->condition = 'program = '.$data->program.' AND tahun = '.$tahun.' AND skpd = '.$data->skpd.' AND urusan='.$data->urusan.' ';
			  
			$kegiatan = PpasPerubahan::model()->findAll($criteria_kegiatan);
			foreach($kegiatan as $data_kegiatan)
			{
				$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
				$objPHPExcel->getActiveSheet()->getStyle("E".$rows_awal."")->applyFromArray($styleTD_LEFT);
							
				$nomor_kegiatan++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data_kegiatan->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data_kegiatan->sasaran);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data_kegiatan->target);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,AplikasiKomponen::uang($data_kegiatan->plafon_anggaran));
									
				$rows_awal++;
				$total += $data_kegiatan->plafon_anggaran;			
			}
					
					
		}		
				
		$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal.":E".$rows_awal."")->applyFromArray($styleTH);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,'Total');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,AplikasiKomponen::uang($total));
		
		$row=$rows_awal+1;
		$row_akhir=$rows_awal+10;
		
		$objPHPExcel->getActiveSheet()->getStyle("A".$row.":E".$row_akhir."")->applyFromArray($styleHeading);
		$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(25);
		
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
		//header('Content-Disposition: attachment;filename="Data Plafon Per Program.pdf"');
		header('Cache-Control: max-age=0');
			
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
		$objWriter->setSheetIndex(0);
		$objWriter->save('php://output');
		Yii::app()->end(); 

}


public function actionPlafonperurusanExcel()
			{
				
				$model=new PpasPerubahan;
				if(isset($_POST['PpasPerubahan']))
				{
					$model->attributes=$_POST['PpasPerubahan'];
					
					
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
					
				$criteria->group = "urusan";

				$model = PpasPerubahan::model()->findAll($criteria);
				
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
				
				$cell = array('A','B','C','D');
				$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
				$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
				$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
				
				$objPHPExcel->getActiveSheet()->mergeCells('A1:D1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','PLAFON ANGGARAN SEMENTARA BERDASARKAN URUSAN  PEMERINTAHAN');
				$objPHPExcel->getActiveSheet()->getStyle("A1:D1")->applyFromArray($styleHeading);
				$objPHPExcel->getActiveSheet()->mergeCells('A2:D2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.'');
				$objPHPExcel->getActiveSheet()->getStyle("A2:D2")->applyFromArray($styleHeading);
				
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
				
				
				$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
				$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
				$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5',' URUSAN / SKPD');
				$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','PLAFON ANGGARAN SEMENTARA');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C6','(Rp)');
				$objPHPExcel->getActiveSheet()->mergeCells('D5:D6');
				$objPHPExcel->getActiveSheet()->getStyle("D5")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D5','KET');
				
				
					
				$objPHPExcel->getActiveSheet()->getStyle("A5:D7")->applyFromArray($styleTH);
				
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
					
					
					
					$nomor_bidang++;
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
					$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTH);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->urusan_->urusan);
							
					$rows_awal++;
						
					$nomor_program = 0;
					$criteria_kegiatan = new CDbCriteria();
					$criteria_kegiatan->condition = 'tahun = '.$tahun.' AND urusan='.$data->urusan.'';
					$criteria_kegiatan->group='t.bidang';
					$kegiatan = PpasPerubahan::model()->findAll($criteria_kegiatan);
					foreach($kegiatan as $data_bidang)
					{
					
						$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
						$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
						$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
						$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
						
						$nomor_program++;
						$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
						$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
									
						$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data_bidang->kegiatan_->program_->bidang_->bidang);
						$rows_awal++;
						
						$nomor_kegiatan = 0;
						$criteria_kegiatan = new CDbCriteria();
						$criteria_kegiatan->condition = 'tahun = '.$tahun.' AND urusan='.$data->urusan.' AND bidang='.$data->bidang.'';
						$criteria_kegiatan->select='t.*,SUM(plafon_anggaran) as anggaran';
						$criteria_kegiatan->group='t.skpd';
						
						$kegiatan = PpasPerubahan::model()->findAll($criteria_kegiatan);
						foreach($kegiatan as $data_kegiatan)
						{
							$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
							$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
							$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
							$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
							
							$nomor_kegiatan++;
							$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
							$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
							$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data_kegiatan->skpd_->nama_skpd);
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data_kegiatan->anggaran);
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,' ');
							
							$rows_awal++;
							
							
						}
						
					}
							
				}
				

				$setting=Yii::app()->user->account->skpd_;
				$rows=$rows_awal+3;
				
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,'Pematangsiantar, '.date("d M Y").'');
				
				$rows++;
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,'KEPALA '.$setting->nama_skpd.'');
				$rows++;
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,'KOTA PEMATANGSIANTAR');
				$rows++;
				$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(33);
				$rows+=2;
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,$setting->nama_penanda_tangan_dokumen);
				$rows++;
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,$setting->pangkat_penanda_tangan_dokumen);
				$rows++;
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,$setting->nip_penanda_tangan_dokumen);
				
				
	// Redirect output to a clientâ€™s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Data Plafon Per Urusan.xls"');
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
				
				$model=new PpasPerubahan;
				if(isset($_POST['PpasPerubahan']))
				{
					$model->attributes=$_POST['PpasPerubahan'];
					
					
					$this->redirect(array('CetakPlafonperUrusanPdf','tahun'=>$model->tahun));
				}
				$this->render('cetakurusanPdf',array(
				'model'=>$model,
				));
			}
			//CetakUsulanExcel
				
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
					
				$criteria->group = "urusan";

				$model = PpasPerubahan::model()->findAll($criteria);
				
				Yii::import('ext.phpexcel.XPHPExcel');    
				$objPHPExcel= XPHPExcel::createPHPExcel();
				$objPHPExcel->getProperties()->setCreator("Bappeda Kota Pematangsiantar")
											 ->setLastModifiedBy("Bappeda Kota Pematangsiantar")
											 ->setTitle("Simrenbang Bappeda Kota Pematangsiantar")
											 ->setSubject("Simrenbang Bappeda Kota Pematangsiantar")
											 ->setDescription("Simrenbang Bappeda Kota Pematangsiantar")
											 ->setKeywords("Bappeda Kota Pematangsiantar")
											 ->setCategory("Bappeda Kota Pematangsiantar");
											 
				//$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
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
				
				$cell = array('A','B','C','D');
				$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
				$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
				$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
				
				$objPHPExcel->getActiveSheet()->mergeCells('A1:D1');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','PLAFON ANGGARAN SEMENTARA BERDASARKAN URUSAN  PEMERINTAHAN');
				$objPHPExcel->getActiveSheet()->getStyle("A1:D1")->applyFromArray($styleHeadingJudul);
				$objPHPExcel->getActiveSheet()->mergeCells('A2:D2');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.'');
				$objPHPExcel->getActiveSheet()->getStyle("A2:D2")->applyFromArray($styleHeadingJudul);
				$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(25);
				$objPHPExcel->getActiveSheet()->getStyle("A3:D4")->applyFromArray($styleHeading);
				
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(40);
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
				
				
				$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
				$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
				$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5',' URUSAN / SKPD');
				$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','PLAFON ANGGARAN SEMENTARA');
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C6','(Rp)');
				$objPHPExcel->getActiveSheet()->mergeCells('D5:D6');
				$objPHPExcel->getActiveSheet()->getStyle("D5")->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D5','KET');
				
				
					
				$objPHPExcel->getActiveSheet()->getStyle("A5:D7")->applyFromArray($styleTH);
				
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
					
					
					
					$nomor_bidang++;
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
					$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTH);
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->urusan_->urusan);
							
					$rows_awal++;
						
					$nomor_program = 0;
					$criteria_kegiatan = new CDbCriteria();
					$criteria_kegiatan->condition = 'tahun = '.$tahun.' AND urusan='.$data->urusan.'';
					$criteria_kegiatan->group='t.bidang';
					$kegiatan = PpasPerubahan::model()->findAll($criteria_kegiatan);
					foreach($kegiatan as $data_bidang)
					{
					
						$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
						$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
						$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
						$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
						
						$nomor_program++;
						$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
						$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
									
						$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data_bidang->kegiatan_->program_->bidang_->bidang);
						$rows_awal++;
						
						$nomor_kegiatan = 0;
						$criteria_kegiatan = new CDbCriteria();
						$criteria_kegiatan->condition = 'tahun = '.$tahun.' AND urusan='.$data->urusan.' AND bidang='.$data->bidang.'';
						$criteria_kegiatan->select='t.*,SUM(plafon_anggaran) as anggaran';
						$criteria_kegiatan->group='t.skpd';
						
						$kegiatan = PpasPerubahan::model()->findAll($criteria_kegiatan);
						foreach($kegiatan as $data_kegiatan)
						{
							$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal."")->applyFromArray($styleTD);
							$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal."")->applyFromArray($styleTD_LEFT);
							$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal."")->applyFromArray($styleTD_LEFT);
							$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal."")->applyFromArray($styleTD_LEFT);
							
							$nomor_kegiatan++;
							$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
							$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
							$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data_kegiatan->skpd_->nama_skpd);
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data_kegiatan->anggaran);
							$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,' ');
							
							$rows_awal++;
							
							
						}
						
					}
							
				}
				
		
				$row_akhir=$rows_awal+10;
		
				$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":D".$row_akhir."")->applyFromArray($styleHeading);
				$objPHPExcel->getActiveSheet()->getRowDimension($rows_awal)->setRowHeight(33);
				$setting=Yii::app()->user->account->skpd_;
				$rows=$rows_awal+2;
				
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,'Pematangsiantar, '.date("d M Y").'');
				
				$rows++;
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,'KEPALA '.$setting->nama_skpd.'');
				$rows++;
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,'KOTA PEMATANGSIANTAR');
				$rows++;
				$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(33);
				$rows+=2;
				
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,$setting->nama_penanda_tangan_dokumen);
				$rows++;
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows."")->applyFromArray($styleTtd);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows,$setting->pangkat_penanda_tangan_dokumen);
				$rows++;
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
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
				//header('Content-Disposition: attachment;filename="Data Plafon Per Urusan.pdf"');
				header('Cache-Control: max-age=0');
					
				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
				$objWriter->setSheetIndex(0);
				$objWriter->save('php://output');
				Yii::app()->end(); 

			}

public function actionModalForm()
{
	$model=new PpasPerubahan;
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
$model=new PpasPerubahan;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['PpasPerubahan']))
{
	$model->attributes=$_POST['PpasPerubahan'];
	$model->urusan = $model->kegiatan_->program_->bidang_->urusan_-id;
	$model->bidang = $model->kegiatan_->program_->bidang_->id;
	$criteria = new CDbCriteria;
	$criteria->condition = "tahun='".$model->tahun."' AND skpd = '".$model->skpd."' AND urusan = '".$model->urusan."' AND bidang='".$model->bidang."' AND program = '".$model->program."' AND kegiatan = '".$model->kegiatan."' ";
	$renja = Ppas::model()->find($criteria);
	if(sizeof($renja)>0)
	{
		$model->plafon_anggaran = $renja->plafon_anggaran;

		$model->status_ppas = "Data Perubahan";
	}else 
	{
		$model->status_ppas = "Data Baru";
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

if(isset($_POST['PpasPerubahan']))
{
$model->attributes=$_POST['PpasPerubahan'];
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
$dataProvider=new CActiveDataProvider('PpasPerubahan');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin($skpd)
{
$model=new PpasPerubahan('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['PpasPerubahan']))
$model->attributes=$_GET['PpasPerubahan'];
$model->skpd = $skpd;
$model->tahun = Yii::app()->session['tahun_perencanaan'];
$this->render('admin',array(
'model'=>$model,
));
}
public function actionMigrasi($skpd)
{
	$this->migrasiPPasSkpd($skpd);
	$this->migrasiKuaSkpd($skpd);
}

public function actionAdminSkpd()
{
	//$this->migrasiMusrenbangByDeleteInsert(Yii::app()->session['tahun_perencanaan']);
	if(!Yii::app()->user->isAdminBappeda())
	{
		$this->redirect(array("admin"));
	}
	$model=new PpasPerubahan('searchPerSKpd');
	$model->tahun= Yii::app()->session['tahun_perencanaan'];
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['PpasPerubahan']))
		$model->attributes=$_GET['PpasPerubahan'];

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
$model=PpasPerubahan::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='ppas-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
