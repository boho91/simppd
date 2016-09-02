<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Rekening Belanja'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Rekening Belanja','url'=>array('index')),
array('label'=>'Tambah Rekening Belanja','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Rekening Belanja','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Rekening Belanja','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Rekening Belanja','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Rekening Belanja</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'uraian',
		'parent_id',
		'kode1',
		'kode2',
		'kode3',
		'kode4',
		'kode5',
		'keterangan',
		'created_date',
		'created_by',
		'mod_date',
		'mod_by',
),
)); ?>
</section>