<?php 
echo AplikasiKomponen::css_print();
?>
<h1 align=center>REKAPITULASI EVALUASI TERHADAP HASIL RKPD <?php echo Yii::app()->params->kabupaten?></h1>
<table border=1 align=center>
	<tr>
		<th width=13>NO</th>
		<th width=90>NAMA SKPD</th>
		<th width=60>Target Kinerja dan Anggaran RKPD Kabupaten/Kota Tahun Berjalan yang Dievaluasi</th>
		<th width=60>Realisasi Capaian Kinerja Program Prioritas RKPD Rp</th>
		<th width=60>Rata-rata Capaian Kinerja Program Prioritas RKPD (%)</th>
		<th width=60>Predikat Capaian Kinerja Program Prioritas RKPD</th>
		<th width=60>Rata-rata realisasi Anggaran Program Prioritas RKPD (%)</th>
		<th width=60>Predikat Capaian Kinerja Anggaran Prioritas RKPD</th>
		<th width=60>Faktor Penghambat</th>
		<th width=60>Faktor Pendukung</th>
		<th width=60>Rekomendasi Bagi Arahan Kebijakan RKPD Berikutnya</th>
		<th width=60>KET</th>
		<th width=60>Triwulan</th>
		<th width=60>Tahun</th>
	</tr>
	<tr>
		<th>1</th>
		<th>2</th>
		<th>3</th>
		<th>4</th>
		<th>5</th>
		<th>6</th>
		<th>7</th>
		<th>8</th>
		<th>9</th>
		<th>10</th>
		<th>11</th>
		<th>12</th>
		<th>13</th>
		<th>14</th>
	</tr>
<?php 
$nomor = 0;
if(sizeof($model)>0)
{
	foreach($model as $item)
	{
		$nomor++;
		?>
		<tr>
			<td><?php echo $nomor?></td>
			<td width=90><?php echo $item->skpd_->nama_skpd?></td>
			<td><?php echo $item->uang($item->target_anggaran)?></td>
			<td><?php echo $item->uang($item->realisasi_capaian_kinerja_rkpd_rp)?></td>
			<td><?php echo number_format($item->target_kinerja)?></td>
			<td><?php //echo $item->predikat_capaian?></td>
			<td><?php echo $item->realisasi_keuangan?></td>
			<td><?php// echo $item->predikat_capaian_kinerja?></td>
			<td><?php //echo $item->faktor_penghambat?></td>
			<td><?php //echo $item->faktor_pendorong?></td>
			<td><?php //echo $item->rekomendasi?></td>
			<td><?php// echo $item->keterangan?></td>
			<td><?php// echo $item->triwulan?></td>
			<td align=center><?php echo $item->tahun_anggaran?></td>
		</tr>
		<?php 
	}
}
?>
</table>
<?php echo AplikasiKomponen::tandaTangan()?>