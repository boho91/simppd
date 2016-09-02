<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Misi'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Misi','url'=>array('index')),
array('label'=>'Tambah Misi','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Misi','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Misi','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Misi','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Misi</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'rpjmd.tahun_rpjmd',
		'rpjmd.akhir_tahun_rpjmd',
		'misi',
		'keterangan:html',

),
)); ?>
</section>