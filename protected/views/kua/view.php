<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Kua'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Kua','url'=>array('index')),
//array('label'=>'Tambah Kua','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Kua','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Kua','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Kua','url'=>array('admin','skpd'=>$model->skpd),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Kua</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'kegiatan_.program_.bidang_.urusan_.urusan',
		'kegiatan_.program_.bidang_.bidang',
		'kegiatan_.program_.program',
		'kegiatan_.kegiatan',
		'skpd_.nama_skpd',
		'pagu_tahun_n2',
		'pagu_tahun_n_min_12'
		
),
)); ?>
</section>