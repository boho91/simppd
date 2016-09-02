<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Pemberitahuan'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Pemberitahuan','url'=>array('index')),
array('label'=>'Tambah Pemberitahuan','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Pemberitahuan','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Pemberitahuan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Pemberitahuan','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Pemberitahuan</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'pesan',
		'link',
		'created_date',
		'created_by',
		'mod_date',
		'mod_by',
),
)); ?>
</section>