<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Pelayanan Dasar'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Desa','url'=>array('index')),
array('label'=>'Tambah Pelayanan Dasar','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Pelayanan Dasar','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Desa','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Pelayanan Dasar','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),

);
?>

<section class="content-header">
<h1>View Pelayanan Dasar</h1>
</section>

<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		
		'pelayanan_dasar',
		
),
)); ?>
</section>
