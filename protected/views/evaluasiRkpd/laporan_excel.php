<?php 
Yii::import('ext.phpexcel.XPHPExcel');    
	$objPHPExcel= XPHPExcel::createPHPExcel();
    $objPHPExcel->getProperties()->setCreator("SIPPD ".Yii::app()->params->kabupaten."")
                             ->setLastModifiedBy("SIPPD ".Yii::app()->params->kabupaten."")
                             ->setTitle("SIPPD ".Yii::app()->params->kabupaten."")
                             ->setSubject("SIPPD ".Yii::app()->params->kabupaten."")
                             ->setDescription("SIPPD ".Yii::app()->params->kabupaten."")
                             ->setKeywords("SIPPD ".Yii::app()->params->kabupaten."")
                             ->setCategory("SIPPD ".Yii::app()->params->kabupaten."");
	$kolom = array('A','B',"C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X");
	foreach($kolom as $item)
	{
		$objPHPExcel->getActiveSheet()->getColumnDimension($item)->setWidth(12);
		$objPHPExcel->getActiveSheet()->getStyle($item)->getAlignment()->setWrapText(true); 
	}
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(7);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
	$styleHeading = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 9,
        'name'  => 'Verdana',
		),
	'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
	);
	$styleNormal = array(
    'font'  => array(
        'bold'  => false,
        'color' => array('rgb' => '000'),
        'size'  => 7,
        'name'  => 'Verdana',
		),
	'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        )
	);
	$styleTH = array(
    'font'  => array(
        'bold'  => true,
        'color' => array('rgb' => '000'),
        'size'  => 7,
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
        'size'  => 7,
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
        'size'  => 7,
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
        'size'  => 7,
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
        'size'  => 7,
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
        'size'  => 7,
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
	$objPHPExcel->getActiveSheet()->getStyle('A3:C3')->applyFromArray($styleNormal);
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:X2')->applyFromArray($styleHeading);
	for($a=0;$a<sizeof($kolom);$a++)
	{
		$objPHPExcel->getActiveSheet()->getStyle(''.$kolom[$a].'5:'.$kolom[$a].'8')->applyFromArray($styleTH);
	}
	$a=0;
	
	$objPHPExcel->getActiveSheet()->mergeCells('A2:X2');
	$objPHPExcel->getActiveSheet()->mergeCells('B3:D3');
	// Add some data
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A2', 'EVALUASI TERHADAP RKPD '.Yii::app()->params->kabupaten.' TAHUN '.$_POST['EvaluasiRkpd']['tahun_anggaran'].' '.strtoupper($model[0]->triwulan).'');
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A3', 'SKPD');
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('B3', ': '.$skpd->nama_skpd);
	// set kolom
	$barisNilai = 5;
	$objPHPExcel->getActiveSheet()->mergeCells('E5:F5');
	$objPHPExcel->getActiveSheet()->mergeCells('G5:H5');
	$objPHPExcel->getActiveSheet()->mergeCells('I5:J5');
	$objPHPExcel->getActiveSheet()->mergeCells('K5:R5');
	$objPHPExcel->getActiveSheet()->mergeCells('S5:T5');
	$objPHPExcel->getActiveSheet()->mergeCells('U5:V5');
	$objPHPExcel->getActiveSheet()->mergeCells('W5:X5');
	$objPHPExcel->getActiveSheet()->mergeCells('A5:A6');
	$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
	$objPHPExcel->getActiveSheet()->mergeCells('C5:C6');
	$objPHPExcel->getActiveSheet()->mergeCells('D5:D6');
	$objPHPExcel->getActiveSheet()->mergeCells('E5:E6');
	$objPHPExcel->getActiveSheet()->mergeCells('F5:F6');
	$objPHPExcel->getActiveSheet()->mergeCells('G5:G6');
	$objPHPExcel->getActiveSheet()->mergeCells('H5:H6');
	$objPHPExcel->getActiveSheet()->mergeCells('G5:G6');
	$objPHPExcel->getActiveSheet()->mergeCells('I5:I6');
	$objPHPExcel->getActiveSheet()->mergeCells('J6:J6');
	$objPHPExcel->getActiveSheet()->mergeCells('S5:S6');
	$objPHPExcel->getActiveSheet()->mergeCells('T5:T6');
	$objPHPExcel->getActiveSheet()->mergeCells('U5:U6');
	$objPHPExcel->getActiveSheet()->mergeCells('V5:V6');
	$objPHPExcel->getActiveSheet()->mergeCells('W5:W6');
	$objPHPExcel->getActiveSheet()->mergeCells('X5:X6');
	$objPHPExcel->getActiveSheet()->mergeCells('K6:L6');
	$objPHPExcel->getActiveSheet()->mergeCells('M6:N6');
	$objPHPExcel->getActiveSheet()->mergeCells('O6:P6');
	$objPHPExcel->getActiveSheet()->mergeCells('Q6:R6');
	$objPHPExcel->getActiveSheet()->mergeCells('I6:J6');
	$objPHPExcel->getActiveSheet()->mergeCells('S6:T6');
	$objPHPExcel->getActiveSheet()->mergeCells('U6:V6');
	$objPHPExcel->getActiveSheet()->mergeCells('W6:X6');
	$objPHPExcel->getActiveSheet()->mergeCells('K7:L7');
	$objPHPExcel->getActiveSheet()->mergeCells('M7:N7');
	$objPHPExcel->getActiveSheet()->mergeCells('O7:P7');
	$objPHPExcel->getActiveSheet()->mergeCells('Q7:R7');
	$objPHPExcel->getActiveSheet()->mergeCells('I7:J7');
	$objPHPExcel->getActiveSheet()->mergeCells('S7:T7');
	$objPHPExcel->getActiveSheet()->mergeCells('U7:V7');
	$objPHPExcel->getActiveSheet()->mergeCells('W7:X7');
	$objPHPExcel->getActiveSheet()->mergeCells('E7:F7');
	$objPHPExcel->getActiveSheet()->mergeCells('G7:H7');
	$objPHPExcel->getActiveSheet()->mergeCells('A7:A8');
	$objPHPExcel->getActiveSheet()->mergeCells('B7:B8');
	$objPHPExcel->getActiveSheet()->mergeCells('C7:C8');
	$objPHPExcel->getActiveSheet()->mergeCells('D7:D8');
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$barisNilai, 'No.')
				->setCellValue('B'.$barisNilai, 'Kode')
				->setCellValue('C'.$barisNilai, 'Urusan/Bidang Urusan Pemerintahan Daerah Pemerintah Daerah Dan Program/Kegiatan')
				->setCellValue('D'.$barisNilai, 'Indikator Kinerja Program (Outcome) Kegiatan (Output)')
				->setCellValue('E'.$barisNilai, 'Target RPJMD Kabupaten Kota')
				->setCellValue('G'.$barisNilai, 'Realisasi Capaian Kinerja RPJMD Kabupaten/Kota sampai dengan RKPD Kabupaten/Kota Tahun '.($model[0]->tahun_anggaran-1).'')
				->setCellValue('I'.$barisNilai, 'Target Kinerja dan Anggaran RKPD Kabupaten/Kota Tahun n-1 (Tahun yang dievaluasi) (T.A '.$model[0]->tahun_anggaran.')')
				->setCellValue('K'.$barisNilai, 'Realisasi Kinerja Pada Triwulan')
				->setCellValue('S'.$barisNilai, 'Realisasi Capaian Kinerja dan Anggaran RKPD Kabupaten/Kota yang Dievaluasi')
				->setCellValue('U'.$barisNilai, 'Realisasi Kinerja dan Anggaran RPJMD Kab/Kota s/d '.$model[0]->tahun_anggaran.' akhir tahun pelaksanaan RKPD Tahun '.$model[0]->tahun_anggaran.'')
				->setCellValue('W'.$barisNilai, 'Tingkat Capaian Kinerja dan Realisasi Anggaran RPJMD Kabupaten/Kota(%)')
				->setCellValue('K6', 'I')
				->setCellValue('M6', 'II')
				->setCellValue('O6', 'III')
				->setCellValue('Q6', 'IV');
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A7', '1')
				->setCellValue('B7', '2')
				->setCellValue('C7', '3')
				->setCellValue('D7', '4')
				->setCellValue('E7', '5')
				->setCellValue('G7', '6')
				->setCellValue('I7', '7')
				->setCellValue('K7', '8')
				->setCellValue('M7', '9')
				->setCellValue('O7', '10')
				->setCellValue('Q7', '11')
				->setCellValue('S7', '12')
				->setCellValue('U7', '13')
				->setCellValue('W7', '14')
				->setCellValue('E8', 'K')
				->setCellValue('F8', 'Rp')
				->setCellValue('G8', 'K')
				->setCellValue('H8', 'Rp')
				->setCellValue('I8', 'K')
				->setCellValue('J8', 'Rp')
				->setCellValue('K8', 'K')
				->setCellValue('L8', 'Rp')
				->setCellValue('M8', 'K')
				->setCellValue('N8', 'Rp')
				->setCellValue('O8', 'K')
				->setCellValue('P8', 'Rp')
				->setCellValue('Q8', 'K')
				->setCellValue('R8', 'Rp')
				->setCellValue('S8', 'K')
				->setCellValue('T8', 'Rp')
				->setCellValue('U8', 'K')
				->setCellValue('V8', 'Rp')
				->setCellValue('W8', 'K')
				->setCellValue('X8', 'Rp');
	// set data
	$barisNilai=9;
	$nomor = 0;
	if(sizeof($model)>0)
	{
		foreach($model as $item)
		{
			$kode_program = explode(".",$item->kode);
			$nomor++;
			$nomor_kegiatan=0;
			for($a=0;$a<sizeof($kode_program)-1;$a++)
			{
				if($nomor_kode_program=="")
					$nomor_kode_program = $kode_program[$a];
				else
					$nomor_kode_program .= ".".$kode_program[$a];
			}
				$objPHPExcel->getActiveSheet()->getStyle('A'.$barisNilai.':X'.$barisNilai)->applyFromArray($styleTd);
				$objPHPExcel->getActiveSheet()->getStyle('C'.$barisNilai)->applyFromArray($styleTdLeft);
				$objPHPExcel->getActiveSheet()->getStyle('D'.$barisNilai)->applyFromArray($styleTdLeft);
				$objPHPExcel->getActiveSheet()->getStyle('B'.$barisNilai)->applyFromArray($styleTdLeft);
				$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A'.$barisNilai, $nomor)
					->setCellValue('B'.$barisNilai, $item->kode_program)
					->setCellValue('C'.$barisNilai, $item->kegiatan_->program_->program)
					->setCellValue('D'.$barisNilai, "")
					->setCellValue('E'.$barisNilai, "")
					->setCellValue('F'.$barisNilai, "")
					->setCellValue('G'.$barisNilai, "")
					->setCellValue('H'.$barisNilai, "")
					->setCellValue('I'.$barisNilai, "")
					->setCellValue('J'.$barisNilai, $item->uang($item->target_kinerja_rkpd_rp))
					->setCellValue('K'.$barisNilai, "")
					->setCellValue('L'.$barisNilai, $item->uang($item->realisasi_kinerja_triwulan_1_rp))
					->setCellValue('M'.$barisNilai, "")
					->setCellValue('N'.$barisNilai, $item->uang($item->realisasi_kinerja_triwulan_2_rp))
					->setCellValue('O'.$barisNilai, "")
					->setCellValue('P'.$barisNilai, $item->uang($item->realisasi_kinerja_triwulan_3_rp))
					->setCellValue('Q'.$barisNilai, "")
					->setCellValue('R'.$barisNilai, $item->uang($item->realisasi_kinerja_triwulan_4_rp))
					->setCellValue('S'.$barisNilai, "")
					->setCellValue('T'.$barisNilai, $item->uang($item->realisasi_capaian_kinerja_rkpd_rp))
					->setCellValue('U'.$barisNilai, "")
					->setCellValue('V'.$barisNilai, $item->uang($item->realisasi_capaian_kinerja_rpjmd_rp))
					->setCellValue('W'.$barisNilai, "")
					->setCellValue('X'.$barisNilai, "");
				$barisNilai++;
				$criteria = new CDbCriteria();
				$criteria->select = "t.*";
				$criteria->condition = "program = '".$item->program."' AND tahun_anggaran = '".$item->tahun_anggaran."' AND triwulan = '".$item->triwulan."' AND skpd = '".$item->skpd."'";
				$kegiatan_data  = EvaluasiRkpd::model()->findAll($criteria);
				foreach($kegiatan_data as $item_kegiatan)
				{
					$nomor_kegiatan++;
					$targetRpjmdK = KegiatanRpjmd::model()->getTargetRpjmdPerTahun(Yii::app()->session['id_rpjmd'],$item_kegiatan->skpd,$item_kegiatan->urusan,$item_kegiatan->bidang,$item_kegiatan->program,$item_kegiatan->kegiatan);
					$targetRpjmdRp = KegiatanRpjmd::model()->getTargetDanaRpjmdPerTahun(Yii::app()->session['id_rpjmd'],$item_kegiatan->skpd,$item_kegiatan->urusan,$item_kegiatan->bidang,$item_kegiatan->program,$item_kegiatan->kegiatan);
					$target_kinerja_rkpd_k = $item_kegiatan->target_kinerja_rkpd_k;
					$target_kinerja_rkpd_rp = $item_kegiatan->target_kinerja_rkpd_rp;
					$target_capaian_kinerja_dan_realisasi_rpjmd_k = number_format((($item_kegiatan->realisasi_capaian_kinerja_rpjmd_k/$targetRpjmdK)*100),2);
					$target_capaian_kinerja_dan_realisasi_rpjmd_rp = number_format((($item_kegiatan->realisasi_capaian_kinerja_rpjmd_rp/$targetRpjmdRp)*100),2);
					$objPHPExcel->getActiveSheet()->getStyle('A'.$barisNilai.':X'.$barisNilai)->applyFromArray($styleTd);
					$objPHPExcel->getActiveSheet()->getStyle('C'.$barisNilai)->applyFromArray($styleTdLeft);
					$objPHPExcel->getActiveSheet()->getStyle('D'.$barisNilai)->applyFromArray($styleTdLeft);
					$objPHPExcel->getActiveSheet()->getStyle('B'.$barisNilai)->applyFromArray($styleTdLeft);
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$barisNilai, $nomor_kegiatan)
						->setCellValue('B'.$barisNilai, $item_kegiatan->kode_kegiatan)
						->setCellValue('C'.$barisNilai, $item_kegiatan->kegiatan_->kegiatan)
						->setCellValue('D'.$barisNilai, "outcome : ".$item_kegiatan->indikator_kinerja_program."\noutput : ".$item_kegiatan->indikator_keluaran_kegiatan)
						->setCellValue('E'.$barisNilai, $targetRpjmdK)
						->setCellValue('F'.$barisNilai, $item_kegiatan->uang($targetRpjmdRp))
						->setCellValue('G'.$barisNilai, $item_kegiatan->realisasi_capaian_kinerja_rpjmd1_k)
						->setCellValue('H'.$barisNilai, $item_kegiatan->uang($item_kegiatan->realisasi_capaian_kinerja_rpjmd1_rp))
						->setCellValue('I'.$barisNilai, $target_kinerja_rkpd_k)
						->setCellValue('J'.$barisNilai, $item_kegiatan->uang($target_kinerja_rkpd_rp))
						->setCellValue('K'.$barisNilai, $item_kegiatan->realisasi_kinerja_triwulan_1_k." ".$item_kegiatan->satuan_kinerja)
						->setCellValue('L'.$barisNilai, $item_kegiatan->uang($item_kegiatan->realisasi_kinerja_triwulan_1_rp))
						->setCellValue('M'.$barisNilai, $item_kegiatan->realisasi_kinerja_triwulan_2_k." ".$item_kegiatan->satuan_kinerja)
						->setCellValue('N'.$barisNilai, $item_kegiatan->uang($item_kegiatan->realisasi_kinerja_triwulan_2_rp))
						->setCellValue('O'.$barisNilai, $item_kegiatan->realisasi_kinerja_triwulan_3_k." ".$item_kegiatan->satuan_kinerja)
						->setCellValue('P'.$barisNilai, $item_kegiatan->uang($item_kegiatan->realisasi_kinerja_triwulan_3_rp))
						->setCellValue('Q'.$barisNilai, $item_kegiatan->realisasi_kinerja_triwulan_4_k." ".$item_kegiatan->satuan_kinerja)
						->setCellValue('R'.$barisNilai, $item_kegiatan->uang($item_kegiatan->realisasi_kinerja_triwulan_4_rp))
						->setCellValue('S'.$barisNilai, $item_kegiatan->realisasi_capaian_kinerja_rkpd_k." ".$item_kegiatan->satuan_kinerja)
						->setCellValue('T'.$barisNilai, $item_kegiatan->uang($item_kegiatan->realisasi_capaian_kinerja_rkpd_rp))
						->setCellValue('U'.$barisNilai, $item_kegiatan->realisasi_capaian_kinerja_rpjmd_k." ".$item_kegiatan->satuan_kinerja)
						->setCellValue('V'.$barisNilai, $item_kegiatan->uang($item_kegiatan->realisasi_capaian_kinerja_rpjmd_rp))
						->setCellValue('W'.$barisNilai, $target_capaian_kinerja_dan_realisasi_rpjmd_k)
						->setCellValue('X'.$barisNilai, $item_kegiatan->uang($target_capaian_kinerja_dan_realisasi_rpjmd_rp));
					$barisNilai++;
				}
				$total_target_rpjmd_rp += $item->target_rpjmd_rp;
				$total_realisasi_capaian_kinerja_rpjmd1_rp += $item->realisasi_capaian_kinerja_rpjmd1_rp;
				$total_target_kinerja_rkpd_rp += $item->target_kinerja_rkpd_rp;
				$total_realisasi_kinerja_triwulan_1_rp += $item->target_kinerja_rkpd_rp;
				$total_realisasi_kinerja_triwulan_2_rp += $item->realisasi_kinerja_triwulan_2_rp;
				$total_realisasi_kinerja_triwulan_3_rp += $item->realisasi_kinerja_triwulan_3_rp;
				$total_realisasi_kinerja_triwulan_4_rp += $item->realisasi_kinerja_triwulan_4_rp;
				$total_realisasi_capaian_kinerja_rkpd_rp += $item->realisasi_capaian_kinerja_rkpd_rp;
				$total_realisasi_capaian_kinerja_rpjmd_rp += $item->realisasi_capaian_kinerja_rpjmd_rp;
				$total_target_capaian_kinerja_dan_realisasi_rpjmd_rp += $item->target_capaian_kinerja_dan_realisasi_rpjmd_rp;
			}
			
		
	}
	
		$setting = Skpd::model()->findByPk(Yii::app()->user->account->skpd);
		$barisNilai+=5;
		// membuat kolom untuk tanda tangan
		$objPHPExcel->getActiveSheet()->mergeCells('V'.($barisNilai).':X'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V'.$barisNilai, 'Pematangsiantar, '.AplikasiKomponen::TanggalIndo(date("Y-m-d")).'');
		$barisNilai++;
		$objPHPExcel->getActiveSheet()->mergeCells('V'.($barisNilai).':X'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V'.$barisNilai, 'KEPALA '.$setting->nama_skpd.'');
		$barisNilai++;
		$objPHPExcel->getActiveSheet()->mergeCells('V'.($barisNilai).':X'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V'.$barisNilai, Yii::app()->params->kabupaten);
		$barisNilai+=6;
		$objPHPExcel->getActiveSheet()->mergeCells('V'.($barisNilai).':X'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V'.$barisNilai, $setting->nama_penanda_tangan_dokumen);
		$barisNilai++;
		$objPHPExcel->getActiveSheet()->mergeCells('V'.($barisNilai).':X'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V'.$barisNilai, $setting->pangkat_penanda_tangan_dokumen);
		$barisNilai++;
		$objPHPExcel->getActiveSheet()->mergeCells('V'.($barisNilai).':X'.($barisNilai).'');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('V'.$barisNilai, 'Nip. '.$setting->nip_penanda_tangan_dokumen.'');
		$barisNilai++;
		
	
	// Redirect output to a client web browser (Excel5)
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="Evaluasi RKPD.xls"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	 
	
	 
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
    Yii::app()->end();
	?>
	