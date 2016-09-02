<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Prioritas Daerah'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Prioritas Daerah','url'=>array('index')),
array('label'=>'Tambah Prioritas Daerah','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Prioritas Daerah','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Prioritas Daerah','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Prioritas Daerah','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Prioritas Daerah</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'tahun_perencanaan',
		'prioritas',
		'prioritas_ke',
		
),
)); ?>
</section>