<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Kegiatan SKPD'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Kegiatan Skpd','url'=>array('index')),
array('label'=>'Tambah Kegiatan Skpd','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Kegiatan Skpd','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Kegiatan Skpd','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Kegiatan Skpd','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Kegiatan Skpd</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'kegiatan_.kegiatan',
		'skpd_.nama_skpd',
		'tahun',
		
),
)); ?>
</section>