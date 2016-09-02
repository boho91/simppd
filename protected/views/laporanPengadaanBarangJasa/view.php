<?php

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Laporan Pengadaan Barang Jasa'=> array('admin'),
        'Lihat Data',),		
    )
);
$this->menu=array(
//array('label'=>'List Sasaran Daerah','url'=>array('index')),
array('label'=>'Tambah Data','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit ','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Sasaran Daerah','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Pengadaan Barang','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);


?>
<section class='content-header'>
<h1 class='page-head-line'>View Laporan Pengadaan Barang dan Jasa #<?php echo $model->id; ?></h1>
</section>
<section class='content'>
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'skpd_.nama_skpd',
		'tahun',
		'triwulan',
		'uraian_kegiatan',
		'volume',
		'satuan',
		'proses_pengadaan',
		 array(
		 'name'=>'biaya',
		 'value'=>AplikasiKomponen::uang($model->biaya)
		 ),
		  array(
		 'name'=>'tgl_proses_pengadaan',
		 'value'=>AplikasiKomponen::tanggalIndo($model->tgl_proses_pengadaan)
		 ),
		  array(
		 'name'=>'tanda_tangan_kontrak',
		 'value'=>AplikasiKomponen::tanggalIndo($model->tanda_tangan_kontrak)
		 ),
		  array(
		 'name'=>'pelaksanaan',
		 'value'=>AplikasiKomponen::tanggalIndo($model->pelaksanaan)
		 ),
		array(
		 'name'=>'pho',
		 'value'=>AplikasiKomponen::tanggalIndo($model->pho)
		 ),
		
		//'jenis_belanja',
		'keterangan',
),
)); ?>
</section>