<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('PPAS Perubahan'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Ppas','url'=>array('index')),
//array('label'=>'Tambah PPAS','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit PPAS Perubahan','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Ppas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data PPAS Perubahan','url'=>array('admin','skpd'=>$model->skpd),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View PPAS Perubahan</h1>
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
		'sasaran',
		'target',
		'plafon_anggaran1',
		'plafon_anggaran2',
		'status_ppas',
		
),
)); ?>
</section>