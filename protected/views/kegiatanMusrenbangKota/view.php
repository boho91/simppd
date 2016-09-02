<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Usulan Musrenbang Kota'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Kegiatan Musrenbang','url'=>array('index')),
//array('label'=>'Tambah Kegiatan Musrenbang','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Usulan Musrenbang Kota','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Kegiatan Musrenbang','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->idkegiatan),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Usulan Musrenbang Kota','url'=>array('admin','skpd'=>$model->kd_skpd),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Usulan Musrenbang Kota</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'skpd_.nama_skpd',
		'kegiatan_.program_.bidang_.urusan_.urusan',
		'kegiatan_.program_.bidang_.bidang',
		'kegiatan_.program_.program',
		'kegiatan_.kegiatan',
		'tahun',
		'uraian',
		'pagu1',
		'pagu2',
		'sasaran_daerah_.sasaran_daerah',
		'prioritas_daerah_.prioritas',
		'sasaran_kegiatan',
		//'kecamatan_.kecamatan',
		//'kelurahan_.kelurahan',
		'volume',
		'satuan',
		array(
			'label'=>'Tolak Ukur Hasil Program',
			'value'=>$model->tolak_ukur_hasil_program,
		),
		array(
			'label'=>'Target Hasil Program',
			'value'=>$model->target_hasil_program,
		),
		array(
			'label'=>'Tolak Ukur Keluaran Kegiatan',
			'value'=>$model->tolak_ukur_keluaran_kegiatan,
		),
		array(
			'label'=>'Target Keluaran Kegiatan',
			'value'=>$model->target_keluaran_kegiatan,
		),
		array(
			'label'=>'Tolak Ukur Hasil Kegiatan',
			'value'=>$model->tolak_ukur_hasil_kegiatan,
		),
		array(
			'label'=>'Target Hasil Kegiatan',
			'value'=>$model->target_hasil_kegiatan,
		),
	
		'jenis_kegiatan_.jenis_kegiatan',
		'sumber_dana_.sumber_dana',
		'sumber_usulan',
		
	
),
)); ?>
</section>