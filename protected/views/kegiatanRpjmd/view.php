<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Kegiatan Rpjmd'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Kegiatan Rpjmd','url'=>array('index')),
array('label'=>'Tambah Kegiatan Rpjmd','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Kegiatan Rpjmd','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Kegiatan Rpjmd','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Kegiatan Rpjmd','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Kegiatan Rpjmd</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'urusan',
		'bidang',
		'program',
		'kegiatan',
		'skpd',
		'tahun',
		'indikator_kinerja',
		'kondisi_kinerja_awal',
		'id_rpjmd',
		'target_tahun1',
		'dana_tahun1',
		'target_tahun2',
		'dana_tahun2',
		'target_tahun3',
		'dana_tahun3',
		'target_tahun4',
		'dana_tahun4',
		'target_tahun5',
		'dana_tahun5',
		'target_akhir',
		'dana_akhir',
),
)); ?>
</section>