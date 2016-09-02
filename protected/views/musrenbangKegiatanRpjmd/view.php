<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Musrenbang Rpjmd'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Kegiatan Rpjmd','url'=>array('index')),
array('label'=>'Tambah Rencana Program Musrenbang RPJMD','url'=>array('create'),'buttonType'=> 'link','context' => 'info','htmlOptions'=>array('id'=>'btn_tambah')),
array('label'=>'Edit Musrenbang Rpjmd','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Kegiatan Rpjmd','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Musrenbang Rpjmd','url'=>array('adminSkpd'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Musrenbang Rpjmd</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'urusan_.urusan',
		'bidang_.bidang',
		'program_.program',
		'kegiatan_.kegiatan',
		'skpd_.nama_skpd',
		'indikator_kinerja',
		'kondisi_kinerja_awal',
		'id_rpjmd',
		'target_tahun1',
		'dana_tahun1',
		'target_tahun2',
		'dana_tahun2',
		'target_tahun3',
		'dana_tahun3',
		'target_tahun4',
		'dana_tahun4',
		'target_tahun5',
		'dana_tahun5',
		'target_akhir',
		'dana_akhir',
		'status_verifikasi',
),
)); ?>
</section>