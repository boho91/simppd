<?php
$this->breadcrumbs=array(
	'Laporan Pengadaan Barang Jasas',
);

$this->menu=array(
array('label'=>'Create LaporanPengadaanBarangJasa','url'=>array('create')),
array('label'=>'Manage LaporanPengadaanBarangJasa','url'=>array('admin')),
);
?>

<h1>Laporan Pengadaan Barang Jasas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
