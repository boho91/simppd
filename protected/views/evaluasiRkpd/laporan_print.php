<?php 
echo AplikasiKomponen::css_print();

?>

<h1>EVALUASI TERHADAP RKPD <?php echo Yii::app()->params->kabupaten?> TAHUN <?php echo $_POST['EvaluasiRkpd']['tahun_anggaran']?> </h1>

<p>NAMA DINAS : <?php echo $skpd->nama_skpd?></p>
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<col style="width: 5%" class="col1">
<table border=1 >
<tr>
	<th rowspan=2 width=10px>No.</th>
	<th rowspan=2 >Kode</th>
	<th rowspan=2 valign=center width=80 >Urusan/Bidang <br>Urusan Pemerintahan Daerah <br>Pemerintah Daerah <br>Dan Program/Kegiatan</th>
	<th rowspan=2 width=50>Indikator <br>Kinerja Program<br> (Outcome) <br>Kegiatan (Output)</th>
	<th colspan=2 rowspan=2>Target RPJMD Kabupaten Kota</th>
	<th colspan=2 rowspan=2>Realisasi Capaian <br>Kinerja RPJMD <br>Kabupaten/Kota <br>sampai dengan <br>RKPD Kabupaten/Kota <br>Tahun <?php echo $model[0]->tahun_anggaran-1?></th>
	<th colspan=2 rowspan=2>Target Kinerja dan <br>Anggaran RKPD <br>Kabupaten/Kota <br>Tahun n-1 <br>(Tahun yang dievaluasi) <br>(T.A <?php echo $model[0]->tahun_anggaran?>)</th>
	<th colspan=8>Realisasi Kinerja Pada Triwulan</th>
	<th colspan=2 rowspan=2>Realisasi Capaian <br>Kinerja dan <br>Anggaran RKPD <br>Kabupaten/Kota <br>yang Dievaluasi</th>
	<th colspan=2 rowspan=2>Realisasi Kinerja <br>dan Anggaran RPJMD <br>Kab/Kota s/d <?php echo $model[0]->tahun_anggaran?> <br>akhir tahun <br>pelaksanaan RKPD <br>Tahun <?php echo $model[0]->tahun_anggaran?></th>
	<th colspan=2 rowspan=2>Tingkat Capaian <br>Kinerja dan Realisasi <br>Anggaran RPJMD <br>Kabupaten/Kota(%)</th>
</tr>
<tr>
	<th colspan=2>I</th>
	<th colspan=2>II</th>
	<th colspan=2>III</th>
	<th colspan=2>IV</th>
</tr>
<tr>
	<th rowspan=2>1</th>
	<th rowspan=2>2</th>
	<th rowspan=2>3</th>
	<th rowspan=2>4</th>
	<th colspan=2>5</th>
	<th colspan=2>6</th>
	<th colspan=2>7</th>
	<th colspan=2>8</th>
	<th colspan=2>9</th>
	<th colspan=2>10</th>
	<th colspan=2>11</th>
	<th colspan=2>12</th>
	<th colspan=2>13</th>
	<th colspan=2>14</th>
	
</tr>
<tr>
	<th>K</th>
	<th>Rp</th>
	<th>K</th>
	<th>Rp</th>
	<th>K</th>
	<th>Rp</th>
	<th>K</th>
	<th>Rp</th>
	<th>K</th>
	<th>Rp</th>
	<th>K</th>
	<th>Rp</th>
	<th>K</th>
	<th>Rp</th>
	<th>K</th>
	<th>Rp</th>
	<th>K</th>
	<th>Rp</th>
	<th>K</th>
	<th>Rp</th>
</tr>
<?php 
$nomor = 0;
if(sizeof($model)>0)
{
	foreach($model as $item)
	{
		$nomor_kegiatan=0;
		$nomor++;
		?>
		<tr>
			<td><?php echo $nomor?></td>
			<td><?php echo $item->kode_program?></td>
			<td  width=80><?php echo $item->kegiatan_->program_->program?></td>
			<td width=50></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?php echo $item->uang($item->realisasi_kinerja_triwulan_1_rp)?></td>
			<td></td>
			<td><?php echo $item->uang($item->realisasi_kinerja_triwulan_2_rp)?></td>
			<td></td>
			<td><?php echo $item->uang($item->realisasi_kinerja_triwulan_3_rp)?></td>
			<td></td>
			<td><?php echo $item->uang($item->realisasi_kinerja_triwulan_4_rp)?></td>
			<td></td>
			<td><?php echo $item->uang($item->realisasi_capaian_kinerja_rkpd_rp)?></td>
			<td></td>
			<td><?php echo $item->uang($item->realisasi_capaian_kinerja_rpjmd_rp)?></td>
			<td></td>
			<td><?php echo $item->uang($item->target_capaian_kinerja_dan_realisasi_rpjmd_rp)?></td>
		</tr>
		<?php
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
			?>
			<tr>
				<td><?php echo $nomor_kegiatan?></td>
				<td><?php echo $item_kegiatan->kode_kegiatan?></td>
				<td width=80 ><?php echo $item_kegiatan->kegiatan_->kegiatan?></td>
				<td  width=50><?php echo "outcome : ".$item_kegiatan->indikator_kinerja_program."<br>output : ".$item_kegiatan->indikator_keluaran_kegiatan?></td>
				<td><?php echo $targetRpjmdK?></td>
				<td><?php echo $item_kegiatan->uang($targetRpjmdRp)?></td>
				<td><?php echo $item_kegiatan->realisasi_capaian_kinerja_rpjmd1_k?></td>
				<td><?php echo $item_kegiatan->uang($item_kegiatan->realisasi_capaian_kinerja_rpjmd1_rp)?></td>
				<td><?php echo $target_kinerja_rkpd_k?></td>
				<td><?php echo $item_kegiatan->uang($item_kegiatan->target_kinerja_rkpd_rp)?></td>
				<td><?php echo $item_kegiatan->realisasi_kinerja_triwulan_1_k." ".$item_kegiatan->satuan_kinerja?></td>
				<td><?php echo $item_kegiatan->uang($item_kegiatan->realisasi_kinerja_triwulan_1_rp)?></td>
				<td><?php echo $item_kegiatan->realisasi_kinerja_triwulan_2_k." ".$item_kegiatan->satuan_kinerja?></td>
				<td><?php echo $item_kegiatan->uang($item_kegiatan->realisasi_kinerja_triwulan_2_rp)?></td>
				<td><?php echo $item_kegiatan->realisasi_kinerja_triwulan_3_k." ".$item_kegiatan->satuan_kinerja?></td>
				<td><?php echo $item_kegiatan->uang($item_kegiatan->realisasi_kinerja_triwulan_3_rp)?></td>
				<td><?php echo $item_kegiatan->realisasi_kinerja_triwulan_4_k." ".$item_kegiatan->satuan_kinerja?></td>
				<td><?php echo $item_kegiatan->uang($item_kegiatan->realisasi_kinerja_triwulan_4_rp)?></td>
				<td><?php echo $item_kegiatan->realisasi_capaian_kinerja_rkpd_k." ".$item_kegiatan->satuan_kinerja?></td>
				<td><?php echo $item_kegiatan->uang($item_kegiatan->realisasi_capaian_kinerja_rkpd_rp)?></td>
				<td><?php echo $item_kegiatan->realisasi_capaian_kinerja_rpjmd_k." ".$item_kegiatan->satuan_kinerja?></td>
				<td><?php echo $item_kegiatan->uang($item_kegiatan->realisasi_capaian_kinerja_rpjmd_rp)?></td>
				<td><?php echo $target_capaian_kinerja_dan_realisasi_rpjmd_k?></td>
				<td><?php echo $item_kegiatan->uang($target_capaian_kinerja_dan_realisasi_rpjmd_rp)?></td>
			</tr>
			<?php
			$total_target_rpjmd_rp += $targetRpjmdRp;
		}
		
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
	?>
	<tr>
		<td></td>
		<td>TOTAL</td>
		<td></td>
		<td></td>
		<td></td>
		<td><?php echo $item->uang($total_target_rpjmd_rp)?></td>
		<td></td>
		<td><?php echo $item->uang($total_realisasi_capaian_kinerja_rpjmd1_rp)?></td>
		<td></td>
		<td><?php echo $item->uang($total_target_kinerja_rkpd_rp)?></td>
		<td></td>
		<td><?php echo $item->uang($total_realisasi_kinerja_triwulan_1_rp)?></td>
		<td></td>
		<td><?php echo $item->uang($total_realisasi_kinerja_triwulan_2_rp)?></td>
		<td></td>
		<td><?php echo $item->uang($total_realisasi_kinerja_triwulan_3_rp)?></td>
		<td></td>
		<td><?php echo $item->uang($total_realisasi_kinerja_triwulan_4_rp)?></td>
		<td></td>
		<td><?php echo $item->uang($total_realisasi_capaian_kinerja_rkpd_rp)?></td>
		<td></td>
		<td><?php echo $item->uang($total_realisasi_capaian_kinerja_rpjmd_rp)?></td>
		<td></td>
		<td><?php echo $item->uang($total_target_capaian_kinerja_dan_realisasi_rpjmd_rp)?></td>
		</tr>
	<?php 
}
?>
</table>
<?php echo AplikasiKomponen::tandaTangan()?>