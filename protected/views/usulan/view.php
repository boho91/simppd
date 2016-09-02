<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Usulan'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Desa','url'=>array('index')),
array('label'=>'Tambah  Usulan','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Usulan','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Desa','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Usulan','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<section class="content-header">
<h1>View Usulan</h1>
</section>

<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'usulan',
		'nama_usulan',
		
		
),
)); ?>
</section>
