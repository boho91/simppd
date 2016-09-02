<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Rka'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Rka','url'=>array('index')),
array('label'=>'Tambah Rka','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Rka','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Rka','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Rka','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Rka</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'tahun',
		'urusan',
		'bidang',
		'program',
		'kegiatan',
		'skpd',
		'uraian',
		'sub_uraian',
		'created_by',
		'created_date',
		'mod_by',
		'mod_date',
		'parent_id',
		'parentCategory',
		'item',
		'volume',
		'satuan',
		'harga_satuan',
),
)); ?>
</section>