<?php 
echo AplikasiKomponen::css_print();
?>
<h1 align=center>LAPORAN PENGADAAN BARANG DAN JASA <br>KABUPATEN MANDAILING NATAL <br>TAHUN <?php echo $model[0]->tahun?> <?php echo strtoupper($model[0]->triwulan)?> </h1>
<p>Nama SKPD : <?php echo $model[0]->skpd_->nama_skpd?></p>
<table class='table' border=1>
<tr>
	<th width=15>No.</th>
	<th width=200>URAIAN/KEGIATAN</th>
	<th width=50>VOLUME</th>
	<th width=50>SATUAN</th>
	<th width=90>BIAYA</th>
	<th width=90>PROSES PENGADAAN</th>
	<th width=90>TANGGAL PROSES PENGADAAN (TGL/BLN/THN)</th>
	<th width=90>T.TANDA TANGAN KONTRAK (TGL/BLN/THN)</th>
	<th width=90>PELAKSANAAN (TGL/BLN/THN)</th>
	<th width=90>PHO (TGL/BLN/THN)</th>
	<th width=150>KET</th>
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
			<td width=90><?php echo $item->uraian_kegiatan?></td>
			<td><?php echo $item->volume?></td>
			<td><?php echo $item->satuan?></td>
			<td><?php echo AplikasiKomponen::uang($item->biaya)?></td>
			<td width=90><?php echo $item->proses_pengadaan?></td>
			<td><?php echo AplikasiKomponen::tanggalIndo($item->tgl_proses_pengadaan)?></td>
			<td><?php echo AplikasiKomponen::tanggalIndo($item->tanda_tangan_kontrak)?></td>
			<td><?php echo AplikasiKomponen::tanggalIndo($item->pelaksanaan)?></td>
			<td><?php echo AplikasiKomponen::tanggalIndo($item->pho)?></td>
			<td width=90><?php echo $item->keterangan?></td>
		</tr>
		<?php 
	}
}
?>
</table>
<?php echo AplikasiKomponen::tandaTangan()?>