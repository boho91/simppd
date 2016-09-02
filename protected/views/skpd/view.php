<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Skpd'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Skpd','url'=>array('index')),
array('label'=>'Tambah Skpd','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Skpd','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Skpd','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Skpd','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Skpd</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'kode',
		'bidang_urusan_.bidang',
		'nama_skpd',
		'alamat',
		'no_telp',
		'nama_penanda_tangan_dokumen',
		'nip_penanda_tangan_dokumen',
		'pangkat_penanda_tangan_dokumen',
),
)); ?>
</section>