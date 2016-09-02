<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Evaluasi Renstra'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Evaluasi Renstra','url'=>array('index')),
array('label'=>'Tambah Evaluasi Renstra','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Evaluasi Renstra','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Evaluasi Renstra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Evaluasi Renstra','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Evaluasi Renstra</h1>
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
		'realisasi_target_tahun1',
		'realisasi_anggaran_tahun1',
		'realisasi_target_tahun2',
		'realisasi_anggaran_tahun2',
		'realisasi_target_tahun3',
		'realisasi_anggaran_tahun3',
		'realisasi_target_tahun4',
		'realisasi_anggaran_tahun4',
		'realisasi_target_tahun5',
		'realisasi_anggaran_tahun5',
		'created_by',
		'created_date',
		'mod_by',
		'mod_date',
),
)); ?>
</section>