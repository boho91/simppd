<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Sasaran SKPD'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Sasaran Daerah','url'=>array('index')),
array('label'=>'Tambah Sasaran SKPD','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Sasaran SKPD','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Sasaran Daerah','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Sasaran SKPD','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Sasaran SKPD</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'tujuanskpd_.tujuan',
		'sasaran',
		'skpd_.nama_skpd',
		
),
)); ?>
</section>