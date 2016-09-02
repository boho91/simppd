<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Realisasi Fisik Dan Keuangan Dak Dpa'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Realisasi Fisik Dan Keuangan Dak Dpa','url'=>array('index')),
array('label'=>'Tambah Realisasi Fisik Dan Keuangan Dak Dpa','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Realisasi Fisik Dan Keuangan Dak Dpa','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Realisasi Fisik Dan Keuangan Dak Dpa','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Realisasi Fisik Dan Keuangan Dak Dpa','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Realisasi Fisik Dan Keuangan Dak Dpa</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_dpa',
		'realisasi_fisik',
		'realisasi_keuangan',
		'tahun',
		'bulan',
		'urusan',
		'bidang',
		'program',
		'kegiatan',
		'skpd',
		'harga_satuan',
		'volume',
		'kontrak',
		'swakelola',
		'created_date',
		'created_by',
		'mod_date',
		'mod_by',
		'is_perubahan',
		'kuasa_pengguna_anggaran',
		'pejabat_pelaksana_kegiatan',
		'penerima_manfaat',
		'dana_pendamping',
		'kesesuaian_sasaran_dan_lokasi_dengan_rkpd',
		'kesesuaian_antara_dpa_dengan_juknis',
		'modifikasi_masalah',
),
)); ?>
</section>