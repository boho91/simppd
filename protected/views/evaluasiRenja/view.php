<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Evaluasi Renja'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Evaluasi Renja','url'=>array('index')),
array('label'=>'Tambah Evaluasi Renja','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Evaluasi Renja','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Evaluasi Renja','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Evaluasi Renja','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Evaluasi Renja</h1>
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
		'kesesuaian',
		'evaluasi',
		'tindak_lanjut',
		'hasil_tindak_lanjut',
		'created_by',
		'created_date',
		'mod_by',
		'mod_date',
),
)); ?>
</section>