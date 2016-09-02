<?php 
Yii::import('ext.phpexcel.XPHPExcel');    
	$objPHPExcel= XPHPExcel::createPHPExcel();
    $objPHPExcel->getProperties()->setCreator("Sistem Pelaporan Keuangan Kabupaten Mandaling Natal")
                             ->setLastModifiedBy("Sistem Pelaporan Keuangan Kabupaten Mandaling Natal")
                             ->setTitle("Sistem Pelaporan Keuangan Kabupaten Mandaling Natal")
                             ->setSubject("Sistem Pelaporan Keuangan Kabupaten Mandaling Natal")
                             ->setDescription("Sistem Pelaporan Keuangan Kabupaten Mandaling Natal")
                             ->setKeywords("Sistem Pelaporan Keuangan Kabupaten Mandaling Natal")
                             ->setCategory("Sistem Pelaporan Keuangan Kabupaten Mandaling Natal");
	$kolom = array('A','B',"C","D","E","F","G","H","I","J","K");
	foreach($kolom as $item)
	{
		$objPHPExcel->getActiveSheet()->getColumnDimension($item)->setWidth(15);
		$objPHPExcel->getActiveSheet()->getStyle($item)->getAlignment()->setWrapText(true); 
	}
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(7);
	$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
	$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
	$styleHeading = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 10,
        'name'  => 'Verdana',
		),
	'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
	);
	$styleTH = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 8,
        'name'  => 'Verdana',
		),
	'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
	'borders' => array(
		'allborders' => array(
			'style' =>PHPExcel_Style_Border::BORDER_THIN,
			'color' => array(
						'rgb' =>'000'
						)
		)
	),
	'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'eeeeee')
        )
	);
	$styleTd = array(
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 8,
        'name'  => 'Verdana',
		),
	'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
	'borders' => array(
		'allborders' => array(
			'style' =>PHPExcel_Style_Border::BORDER_THIN,
			'color' => array(
						'rgb' =>'000'
						)
		)
	)
	);
	$styleTdBold = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 8,
        'name'  => 'Verdana',
		),
	'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
	'borders' => array(
		'allborders' => array(
			'style' =>PHPExcel_Style_Border::BORDER_THIN,
			'color' => array(
						'rgb' =>'000'
						)
		)
	)
	);
	$styleTdLeftBold = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 8,
        'name'  => 'Verdana',
		),
	'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        ),
	'borders' => array(
		'allborders' => array(
			'style' =>PHPExcel_Style_Border::BORDER_THIN,
			'color' => array(
						'rgb' =>'000'
						)
		)
	)
	);
	$styleTdLeft = array(
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 8,
        'name'  => 'Verdana',
		),
	'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        ),
	'borders' => array(
		'allborders' => array(
			'style' =>PHPExcel_Style_Border::BORDER_THIN,
			'color' => array(
						'rgb' =>'000'
						)
		)
	)
	);
	$stylePembatas = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 8,
        'name'  => 'Verdana',
		),
	'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        ),
	'borders' => array(
		'allborders' => array(
			'style' =>PHPExcel_Style_Border::BORDER_THIN,
			'color' => array(
						'rgb' =>'000'
						)
		)
	),
	'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'C0c0c0')
        )
	);
	$objPHPExcel->getActiveSheet()->getStyle('A1:K3')->applyFromArray($styleHeading);
	$objPHPExcel->getActiveSheet()->getStyle('A5:K6')->applyFromArray($styleTH);
	
	

	for($a=8;$a<sizeof($kolom);$a++)
	{
		$objPHPExcel->getActiveSheet()->getStyle(''.$kolom[$a].'5:'.$kolom[$a].'6')->applyFromArray($styleTH);
	}
	$a=0;
	foreach($kolom as $item)
	{
		$a++;
		$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue($item.'6', $a);
	}
	$objPHPExcel->getActiveSheet()->mergeCells('A2:K2');
	$objPHPExcel->getActiveSheet()->mergeCells('A3:K3');
	// Add some data
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A2', 'LAPORAN PENGADAAN BARANG DAN JASA ')
				->setCellValue('A3', 'TAHUN '.$model[0]->tahun.' '.strtoupper($model[0]->triwulan).'');


	// set kolom
	$barisNilai = 5;
	
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$barisNilai, 'No.')
				->setCellValue('B'.$barisNilai, 'URAIAN/KEGIATAN')
				->setCellValue('C'.$barisNilai, 'VOLUME')
				->setCellValue('D'.$barisNilai, 'SATUAN')
				->setCellValue('E'.$barisNilai, 'BIAYA')
				->setCellValue('F'.$barisNilai, 'PROSES PENGADAAN')
				->setCellValue('G'.$barisNilai, 'TANGGAL PROSES PENGADAAN (TGL/BLN/THN)')
				->setCellValue('H'.$barisNilai, 'T.TANDA TANGAN KONTRAK (TGL/BLN/THN)')
				->setCellValue('I'.$barisNilai, 'PELAKSANAAN (TGL/BLN/THN)')
				->setCellValue('J'.$barisNilai, 'PHO (TGL/BLN/THN)')
				->setCellValue('K'.$barisNilai, 'KET');
	// set data
	$barisNilai=7;
	$nomor = 0;
	if(sizeof($model)>0)
	{
		foreach($model as $item)
		{
			$objPHPExcel->getActiveSheet()->getStyle('A'.$barisNilai.':K'.$barisNilai.'')->applyFromArray($styleTd);
			$objPHPExcel->getActiveSheet()->getStyle('B'.$barisNilai)->applyFromArray($styleTdLeft);
			$objPHPExcel->getActiveSheet()->getStyle('F'.$barisNilai)->applyFromArray($styleTdLeft);
			$nomor++;
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$barisNilai, $nomor)
				->setCellValue('B'.$barisNilai, $item->uraian_kegiatan)
				->setCellValue('C'.$barisNilai, $item->volume)
				->setCellValue('D'.$barisNilai, $item->satuan)
				->setCellValue('E'.$barisNilai, AplikasiKomponen::uang($item->biaya))
				->setCellValue('F'.$barisNilai, $item->proses_pengadaan)
				->setCellValue('G'.$barisNilai, AplikasiKomponen::tanggalIndo($item->tgl_proses_pengadaan))
				->setCellValue('H'.$barisNilai, AplikasiKomponen::tanggalIndo($item->tanda_tangan_kontrak))
				->setCellValue('I'.$barisNilai, AplikasiKomponen::tanggalIndo($item->pelaksanaan))
				->setCellValue('J'.$barisNilai, AplikasiKomponen::tanggalIndo($item->pho))
				->setCellValue('K'.$barisNilai, $item->keterangan);
			$barisNilai++;
		}
	}
	if(Yii::app()->user->isAdminBappeda())
	{
		$setting = Yii::app()->user->account->skpd_;
		$barisNilai+=5;
		// membuat kolom untuk tanda tangan
		$objPHPExcel->getActiveSheet()->mergeCells('I'.($barisNilai).':K'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$barisNilai, 'Penyabungan, '.date("d M Y").'');
		$barisNilai++;
		$objPHPExcel->getActiveSheet()->mergeCells('I'.($barisNilai).':K'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$barisNilai, 'KEPALA BAPPEDA');
		$barisNilai++;
		$objPHPExcel->getActiveSheet()->mergeCells('I'.($barisNilai).':K'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$barisNilai, 'KAB. MANDAILING NATAL');
		$barisNilai+=6;
		$objPHPExcel->getActiveSheet()->mergeCells('I'.($barisNilai).':K'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$barisNilai, $setting->nama_penanda_tangan_dokumen);
		$barisNilai++;
		$objPHPExcel->getActiveSheet()->mergeCells('I'.($barisNilai).':K'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$barisNilai, $setting->pangkat_penanda_tangan_dokumen);
		$barisNilai++;
		$objPHPExcel->getActiveSheet()->mergeCells('I'.($barisNilai).':K'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$barisNilai, 'Nip. '.$setting->nip_penanda_tangan_dokumen.'');
		$barisNilai++;
	}else
	{
		$setting = Skpd::model()->findByPk(Yii::app()->user->account->skpd);
		$barisNilai+=5;
		// membuat kolom untuk tanda tangan
		$objPHPExcel->getActiveSheet()->mergeCells('I'.($barisNilai).':K'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$barisNilai, 'Penyabungan, '.date("d M Y").'');
		$barisNilai++;
		$objPHPExcel->getActiveSheet()->mergeCells('I'.($barisNilai).':K'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$barisNilai, 'KEPALA '.$setting->nama_skpd.'');
		$barisNilai++;
		$objPHPExcel->getActiveSheet()->mergeCells('I'.($barisNilai).':K'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$barisNilai, 'KAB. MANDAILING NATAL');
		$barisNilai+=6;
		$objPHPExcel->getActiveSheet()->mergeCells('I'.($barisNilai).':K'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$barisNilai, $setting->nama_penanda_tangan_dokumen);
		$barisNilai++;
		$objPHPExcel->getActiveSheet()->mergeCells('I'.($barisNilai).':K'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$barisNilai, $setting->pangkat_penanda_tangan_dokumen);
		$barisNilai++;
		$objPHPExcel->getActiveSheet()->mergeCells('I'.($barisNilai).':K'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$barisNilai, 'Nip. '.$setting->nip_penanda_tangan_dokumen.'');
		$barisNilai++;
		
	}
	// Redirect output to a client web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Laporan Pengadaan Barang dan Jasa.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	 
	
	 
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
    Yii::app()->end();
	?>
