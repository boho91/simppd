<?php

class RenjaPerubahanController extends Controller
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
'actions'=>array('create','update','adminSkpd'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','modalForm','verifikasi','usulanexcel','cetakexcel','cetakpdf','usulanpdf'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}
public function actionVerifikasi($id)
{
	$model= $this->loadModel($id);
	if(isset($_POST['Renja']))
	{
		$model->attributes=$_POST['Renja'];
		$model->id = $id;
		if($model->save())
		{
			echo "sukses";
		}else 
		{
			echo "gagal";
		}
		exit();
	}
	$this->renderPartial('verifikasi',array(
		'model'=>$model,
	));
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
	$user = Yii::app()->getComponent('user');
	$model = $this->loadModel($id);
	
	
	$this->render('view',array(
		'model'=>$model,
	));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
	$model=new RenjaPerubahan;
	//$renja = array();
	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['RenjaPerubahan']))
	{
		$model->attributes=$_POST['RenjaPerubahan'];
		$model->urusan = $model->kegiatan_->program_->bidang_->urusan_-id;
		
		$model->bidang = $model->kegiatan_->program_->bidang_->id;
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd = '".$model->skpd."' AND urusan = '".$model->urusan."' AND bidang='".$model->bidang."' AND program = '".$model->program."' AND kegiatan = '".$model->kegiatan."' AND lokasi_kegiatan='".$model->lokasi_kegiatan."' AND kecamatan='".$model->kecamatan."' AND kelurahan='".$model->kelurahan."'";
		$renja = Renja::model()->find($criteria);
		
		if(sizeof($renja)>0)
		{
			$model->kebutuhan_dana = $renja->kebutuhan_dana;
			$model->sasaran_kegiatan = $renja->sasaran_kegiatan;
			$model->uraian =$renja->uraian;
			$model->status_renja = "Data Perubahan";
			$uploadedFile=CUploadedFile::getInstance($model,'foto');
			$fileName = "{$uploadedFile}"; 
			 $model->foto = $fileName;
		}else 
		{
			$model->status_renja = "Data Baru";
		}
		
		//echo $model->sumber_usulan;
		if($model->save())
		{
			$uploadedFile->saveAs(Yii::app()->basePath.'/../foto/'.$fileName);
			$this->redirect(array('view','id'=>$model->id));
		}
			
	}
	
	$this->render('create',array(
		'model'=>$model,
		'renja'=>$renja
	));
}

public function actionUsulanExcel()
{
	
	$model=new RenjaPerubahan;
	if(isset($_POST['RenjaPerubahan']))
	{
		$model->attributes=$_POST['RenjaPerubahan'];
		
		
		$this->redirect(array('cetakexcel','tahun'=>$model->tahun,'skpd'=>$model->skpd,'urusan'=>$model->urusan));
	}
	$this->render('cetakexcel',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actionCetakExcel($tahun,$skpd,$urusan)
{
	$criteria = new CDbCriteria();
	$criteria->condition = ' tahun = '.$tahun.' AND urusan='.$urusan.' AND skpd='.$skpd.'';
	//$criteria->select = "t.*,SUM(kebutuhan_dana) AS pagu_tahun_awal, SUM(kebutuhan_dana_a2) AS pagu_tahun_akhir";
	$criteria->order ="t.bidang, t.program, t.kegiatan";	
	$criteria->select = "t.*";
	//$criteria->group = "bidang";

	$model = RenjaPerubahan::model()->findAll($criteria);
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
	
	$cell = array('A','B','C','D','E','F','G','H','I');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:I1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','PROGRAM DAN KEGIATAN SKPD KOTA PEMATANGSIANTAR');
	$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:I2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.' DAN PRAKIRAAN MAJU TAHUN '.($tahun + 1).'');
	$objPHPExcel->getActiveSheet()->getStyle("A2:I2")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	//$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', ': '.$urusan->urusan);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4','SKPD');
	$objPHPExcel->getActiveSheet()->mergeCells('B4:C4');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', ': '.$skpd->nama_skpd);
	$objPHPExcel->getActiveSheet()->getStyle("A3:I4")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
	$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
	$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','SASARAN KEGIATAN');
	$objPHPExcel->getActiveSheet()->getStyle("D5")->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->mergeCells('D5:D6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D5','LOKASI');
	
	$objPHPExcel->getActiveSheet()->mergeCells('E5:F5');
	$objPHPExcel->getActiveSheet()->getStyle("E5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E5','TAHUN ANGGARAN '.$tahun.'');
	
	$objPHPExcel->getActiveSheet()->getStyle("E6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','KEBUTUHAN DANA / PAGU INDIKATIF');
	$objPHPExcel->getActiveSheet()->mergeCells('G5:G6');
	$objPHPExcel->getActiveSheet()->getStyle("G5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G5','SUMBER DANA');
	$objPHPExcel->getActiveSheet()->mergeCells('H5:H6');
	$objPHPExcel->getActiveSheet()->getStyle("H5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H5','SASARAN KEGIATAN SETELAH PERUBAHAN');
	//$objPHPExcel->getActiveSheet()->mergeCells('I5:J5');
	$objPHPExcel->getActiveSheet()->getStyle("I5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I5','PERUBAHAN ANGGARAN TAHUN '.($tahun).'');
	
	$objPHPExcel->getActiveSheet()->getStyle("I6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I6','KEBUTUHAN DANA / PAGU INDIKATIF');
		
	$objPHPExcel->getActiveSheet()->getStyle("A5:I7")->applyFromArray($styleTH);
		
	$objPHPExcel->getActiveSheet()->getStyle("A5:I7")->applyFromArray($styleTH);
	
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
			
			$totalPaguPerBidang=RenjaPerubahan::model()->totalPaguPerBidang($data->tahun,$data->skpd,$data->urusan,$data->bidang);
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
			//$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_BOLD);
			$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTD_BOLD);
			
			$nomor_bidang++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[0]));
			$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[1]));
				
			$rows_awal++;
			
			$nomor_program = 0;
	}
		if($currentProgram != $tempProgram)
		{
			$totalPaguPerProgram = RenjaPerubahan::model()->totalPaguPerProgram($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program);
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
			//$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
			
			$nomor_program++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[0]));
			$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
			
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
				//$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
				
				$nomor_kegiatan++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->sasaran_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->lokasi_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->target_capaian_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data->sumber_dana_->sumber_dana);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data->sasaran_kegiatan_setelah_perubahan);
				//$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data->target_capaian_kinerja_a2);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana_setelah_perubahan));
				
		$tempBidang = $data->bidang;
		$tempProgram= $data->program;
			
		$rows_awal++;
		
				
	}
	$objPHPExcel->getActiveSheet()->mergeCells("A".$rows_awal.":E".$rows_awal."");
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":I".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,'TOTAL');
	
	$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($total2));
	
	
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":I".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":I".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":I".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KOTA PEMATANGSIANTAR');
	$rows+=3;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":I".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":I".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":I".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nip_penanda_tangan_dokumen);
	
	// Redirect output to a clientâ€™s web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Data Renja Perubahan SKPD.xls"');
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


public function actionUsulanPdf()
{
	
	$model=new RenjaPerubahan;
	if(isset($_POST['RenjaPerubahan']))
	{
		$model->attributes=$_POST['RenjaPerubahan'];
		
		
		$this->redirect(array('cetakpdf','tahun'=>$model->tahun,'skpd'=>$model->skpd,'urusan'=>$model->urusan));
	}
	$this->render('cetakpdf',array(
	'model'=>$model,
	));
}

//CetakUsulanExcel
	
public function actionCetakPdf($tahun,$skpd,$urusan)
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
	
	$model = RenjaPerubahan::model()->findAll($criteria);
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
	
	$cell = array('A','B','C','D','E','F','G','H','I');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddHeader('&L&G&C&HDicetak dari Sistem Perencanaan Pembangunan Kota Pematangsiantar');
	$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');
	$objPHPExcel->setActiveSheetIndex(0);
	$objPHPExcel->getActiveSheet()->setTitle('Kegiatan Musrenbang');
	
	$objPHPExcel->getActiveSheet()->mergeCells('A1:I1');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1','PROGRAM DAN KEGIATAN SKPD KOTA PEMATANGSIANTAR');
	$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->applyFromArray($styleHeadingJudul);
	$objPHPExcel->getActiveSheet()->mergeCells('A2:I2');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A2','TAHUN ANGGARAN '.$tahun.' DAN PRAKIRAAN MAJU TAHUN '.($tahun + 1).'');
	$objPHPExcel->getActiveSheet()->getStyle("A2:I2")->applyFromArray($styleHeadingJudul);
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	//$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
	
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A3','URUSAN');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B3', ': '.$urusan->urusan);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A4','SKPD');
	$objPHPExcel->getActiveSheet()->mergeCells('B4:C4');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B4', ': '.$skpd->nama_skpd);
	$objPHPExcel->getActiveSheet()->getStyle("A3:I4")->applyFromArray($styleHeading);
	
	$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A5','NOMOR');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
	$objPHPExcel->getActiveSheet()->getStyle("B5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B5','BIDANG/ PROGRAM/ KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
	$objPHPExcel->getActiveSheet()->getStyle("C5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C5','SASARAN KEGIATAN');
	$objPHPExcel->getActiveSheet()->mergeCells('E5:F5');
	$objPHPExcel->getActiveSheet()->getStyle("E5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E5','TAHUN ANGGARAN '.$tahun.'');
	$objPHPExcel->getActiveSheet()->getStyle("D5")->getAlignment()->setWrapText(true);
	$objPHPExcel->getActiveSheet()->mergeCells('D5:D6');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D5','LOKASI');
	$objPHPExcel->getActiveSheet()->getStyle("E6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E6','TARGET CAPAIAN KINERJA ');
	$objPHPExcel->getActiveSheet()->getStyle("F6")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F6','KEBUTUHAN DANA / PAGU INDIKATIF');
	$objPHPExcel->getActiveSheet()->mergeCells('G5:G6');
	$objPHPExcel->getActiveSheet()->getStyle("G5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G5','SUMBER DANA');
	$objPHPExcel->getActiveSheet()->mergeCells('H5:H6');
	$objPHPExcel->getActiveSheet()->getStyle("H5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H5','SASARAN KEGIATAN SETELAH PERUBAHAN');
	$objPHPExcel->getActiveSheet()->mergeCells('I5:I6');
	$objPHPExcel->getActiveSheet()->getStyle("I5")->getAlignment()->setWrapText(true);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I5','PERUBAHAN ANGGARAN TAHUN '.($tahun).'');
	
	
		
	$objPHPExcel->getActiveSheet()->getStyle("A5:I7")->applyFromArray($styleTH);
	
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
			
			$totalPaguPerBidang=RenjaPerubahan::model()->totalPaguPerBidang($data->tahun,$data->skpd,$data->urusan,$data->bidang);
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
			//$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_BOLD);
			
			$nomor_bidang++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_bidang);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->program_->bidang_->bidang);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[0]));
			$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($totalPaguPerBidang[1]));
				
			$rows_awal++;
			
			$nomor_program = 0;
	}
		if($currentProgram != $tempProgram)
		{
			$totalPaguPerProgram = RenjaPerubahan::model()->totalPaguPerProgram($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program);
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
			//$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
			
			$nomor_program++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_program);
			$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[0]));
			$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->getAlignment()->setWrapText(true);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($totalPaguPerProgram[1]));
			
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
				//$objPHPExcel->getActiveSheet()->getStyle("J".$rows_awal."")->applyFromArray($styleTD_LEFT);
				
				
				$nomor_kegiatan++;
				$objPHPExcel->getActiveSheet()->getStyle("B".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("C".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->getStyle("D".$rows_awal)->getAlignment()->setWrapText(true);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,$nomor_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("B".$rows_awal,$data->kegiatan_->kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("C".$rows_awal,$data->sasaran_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("D".$rows_awal,$data->lokasi_kegiatan);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("E".$rows_awal,$data->target_capaian_kinerja);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana));
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("G".$rows_awal,$data->sumber_dana_->sumber_dana);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows_awal,$data->sasaran_kegiatan_setelah_perubahan);
				//$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,$data->target_capaian_kinerja_a2);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($data->kebutuhan_dana_setelah_perubahan));
				
		$tempBidang = $data->bidang;
		$tempProgram= $data->program;
			
		$rows_awal++;
		
				
	}
	$objPHPExcel->getActiveSheet()->mergeCells("A".$rows_awal.":E".$rows_awal."");
	$objPHPExcel->getActiveSheet()->getStyle("A".$rows_awal.":I".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("A".$rows_awal,'TOTAL');
	
	$objPHPExcel->getActiveSheet()->getStyle("F".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("F".$rows_awal,AplikasiKomponen::uang($total1));;
	$objPHPExcel->getActiveSheet()->getStyle("I".$rows_awal."")->applyFromArray($styleTH);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("I".$rows_awal,AplikasiKomponen::uang($total2));
	
	
	$row=$rows_awal+1;
	$row_akhir=$rows_awal+10;
		
	$objPHPExcel->getActiveSheet()->getStyle("A".$row.":I".$row_akhir."")->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getRowDimension($row)->setRowHeight(25);
	$setting=Yii::app()->user->account->skpd_;
	$rows=$rows_awal+3;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":I".$rows."");
	//$objPHPExcel->getActiveSheet()->getStyle("L".$rows."")->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_NONE);
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'Pematangsiantar, '.date("d M Y").'');
	
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":I".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KEPALA '.$setting->nama_skpd.'');
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":I".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,'KOTA PEMATANGSIANTAR');
	$rows++;
	$objPHPExcel->getActiveSheet()->getRowDimension($rows)->setRowHeight(30);
	$rows+=2;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":I".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->nama_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":I".$rows."");
	$objPHPExcel->getActiveSheet()->getStyle("H".$rows."")->applyFromArray($styleTtd);
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue("H".$rows,$setting->pangkat_penanda_tangan_dokumen);
	$rows++;
	$objPHPExcel->getActiveSheet()->mergeCells("H".$rows.":I".$rows."");
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
	//header('Content-Disposition: attachment;filename="Data RenjaPerubahan.pdf"');
	header('Cache-Control: max-age=0');
		
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
	$objWriter->setSheetIndex(0);
	$objWriter->save('php://output');
	Yii::app()->end(); 

}

public function actionModalForm()
{
	$model=new RenjaPerubahan;
	if(Yii::app()->user->isAdminBappeda())
	{
		
	}else{
		$model->skpd = Yii::app()->user->account->skpd;
	}
	$model->lokasi_kegiatan = "Kota Pematangsiantar";
	$model->tahun = Yii::app()->session['tahun_perencanaan'];
	$this->renderPartial('formAwal',array(
	'model'=>$model,
	),false,true);
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

if(isset($_POST['RenjaPerubahan']))
{
$model->attributes=$_POST['RenjaPerubahan'];
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
$dataProvider=new CActiveDataProvider('RenjaPerubahan');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin($skpd)
{
$model=new RenjaPerubahan('search');

$model->unsetAttributes();  // clear any default values
$model->skpd = $skpd;
if(isset($_GET['RenjaPerubahan']))
$model->attributes=$_GET['RenjaPerubahan'];

$model->tahun = Yii::app()->session['tahun_perencanaan'];
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
	$model=new RenjaPerubahan('searchPerSKpd');
	$model->tahun= Yii::app()->session['tahun_perencanaan'];
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['RenjaPerubahan']))
		$model->attributes=$_GET['RenjaPerubahan'];

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
$model=RenjaPerubahan::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='renja-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
