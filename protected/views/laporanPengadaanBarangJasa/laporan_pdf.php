<?php 
echo AplikasiKomponen::css_print();
?>
<h1 align=center>LAPORAN PENGADAAN BARANG DAN JASA <br>KABUPATEN MANDAILING NATAL</h1>

<table class='table' border=1>
<tr>
	<th width=15>No.</th>
	<th width=100>SKPD</th>
	<th width=100>URAIAN /KEGIATAN</th>
	<th width=45>VOLUME</th>
	<th width=45>SATUAN</th>
	<th width=84>BIAYA</th>
	<th width=84>PROSES PENGADAAN</th>
	<th width=90>TANGGAL PROSES PENGADAAN (TGL/BLN/THN)</th>
	<th width=90>T.TANDA TANGAN KONTRAK (TGL/BLN/THN)</th>
	<th width=90>PELAKSANAAN (TGL/BLN/THN)</th>
	<th width=90>PHO (TGL/BLN/THN)</th>
	<th width=100>KET</th>
	<th width='50'>TAHUN </th>
</tr>
<?php 
$nomor = 0;
if(sizeof($model)>0)
{
	foreach($model->getData() as $item)
	{
		$nomor++;
		?>
		<tr>
			<td><?php echo $nomor?></td>
			<td width='50'><?php echo $item->skpd_->nama_skpd?></td>
			<td width='50'><?php echo $item->uraian_kegiatan?></td>
			<td><?php echo $item->volume?></td>
			<td><?php echo $item->satuan?></td>
			<td width='50'><?php echo $item->proses_pengadaan?></td>
			<td width='50'><?php echo AplikasiKomponen::uang($item->biaya)?></td>
			<td width='50'><?php echo AplikasiKomponen::tanggalIndo($item->tgl_proses_pengadaan)?></td>
			<td width='50'><?php echo AplikasiKomponen::tanggalIndo($item->tanda_tangan_kontrak)?></td>
			<td width='50'><?php echo AplikasiKomponen::tanggalIndo($item->pelaksanaan)?></td>
			<td width='50'><?php echo AplikasiKomponen::tanggalIndo($item->pho)?></td>
			<td width=90><?php echo $item->keterangan?></td>
			<td><?php echo $item->tahun?></td>
		</tr>
		<?php 
	}
}
?>
</table>
