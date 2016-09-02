<?php

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Laporan Pengadaan Barang Jasa'=> array('admin'),
        'Laporan Per SKPD',
),
		
    )
);
$this->menu=array(
	//array('label'=>'List Sasaran Daerah','url'=>array('index')),
	array('label'=>'Tambah Data','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	//array('label'=>'Hapus Sasaran Daerah','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
	array('label'=>'Data Pengadaan Barang','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
?>
<section class='content-header'>
<h1 class="page-head-line">Laporan Rekapitulasi Pengadaan Barang dan Jasa Per SKPD</h1>
</section>
<section class='content'>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'laporan-pengadaan-barang-jasa-grid',
'dataProvider'=>$model->summary_per_skpd(),
'filter'=>$model,
'columns'=>array(
		array(
			'header'=>'No.',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		array(
			'class'=>'CDataColumn',
			'type'=>'raw',
			'header'=>'SKPD',
			'htmlOptions'=>array('width'=>'230'),
			'name'=>'skpd',
			'value'=>function($data,$row) use ($outsideVariable){
				echo "<a data-original-title='Lihat Laporan Pengadaan Barang dan Jasa ".$data->skpd_->nama_skpd."' data-toggle='tooltip' data-placement='right' title='' data-content='Default popover' href='index.php?r=laporanPengadaanBarangJasa/detailSkpd&skpd=".$data->skpd."&tahun=".$data->tahun."'>".$data->skpd_->nama_skpd."</a>";
			},
			'filter'=> CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')), 'id', 'nama_skpd'),
			'footer'=>'<strong>Total</strong>'
		),
		array(
			'class'=>'CDataColumn',
			'type'=>'raw',
			'header'=>'Tahun',
			'htmlOptions'=>array('width'=>'70'),
			'name'=>'tahun',
			'value'=>'$data->tahun',
			'filter'=> CHtml::listData(LaporanPengadaanBarangJasa::model()->findAll(array('order'=>'tahun','group'=>'tahun')), 'tahun', 'tahun'),
		),
		array(
			'class'=>'CDataColumn',
			'type'=>'raw',
			'header'=>'Triwulan',
			'htmlOptions'=>array('width'=>'70'),
			'name'=>'triwulan',
			'value'=>'$data->triwulan',
			'filter'=> CHtml::listData(LaporanPengadaanBarangJasa::model()->findAll(array('order'=>'triwulan','group'=>'triwulan')), 'triwulan', 'triwulan'),
		),
		array(
		'header'=>'Penunjukan Langsung',
		'name'=>'penunjukan_langsung',
		'footer'=>'<strong>'.number_format($model->getTotal($model->summary_per_skpd()->getData(), 'penunjukan_langsung')).'</strong>',
		'filter'=>'',
		'value'=>'AplikasiKomponen::uang($data->penunjukan_langsung)'
		),
		array(
		'header'=>'Pelelangan Terbatas',
		'name'=>'pelelangan_terbatas',
		'footer'=>'<strong>'.number_format($model->getTotal($model->summary_per_skpd()->getData(), 'pelelangan_terbatas')).'</strong>',
		'filter'=>'',
		'value'=>'AplikasiKomponen::uang($data->pelelangan_terbatas)'
		),
		array(
		'header'=>'Pemilihan Langsung',
		'name'=>'pemilihan_langsung',
		'footer'=>'<strong>'.number_format($model->getTotal($model->summary_per_skpd()->getData(), 'pemilihan_langsung')).'</strong>',
		'filter'=>'',
		'value'=>'AplikasiKomponen::uang($data->pemilihan_langsung)'
		),
		array(
		'header'=>'Pelelangan Umum',
		'name'=>'pelelangan_umum',
		'filter'=>'',
		'footer'=>'<strong>'.number_format($model->getTotal($model->summary_per_skpd()->getData(), 'pelelangan_umum')).'</strong>',
		'value'=>'AplikasiKomponen::uang($data->pelelangan_umum)'
		),
		array(
		'header'=>'Total',
		'filter'=>'',
		'name'=>'biaya',
		'footer'=>'<strong>'.number_format($model->getTotal($model->summary_per_skpd()->getData(), 'biaya')).'</strong>',
		'value'=>'AplikasiKomponen::uang($data->biaya)'
		),
		
		/*
		'proses_pengadaan',
		'tanda_tangan_kontrak',
		'pelaksanaan',
		'pho',
		'keterangan',
		*/
		
),
)); ?>
</section>