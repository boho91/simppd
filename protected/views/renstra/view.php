<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Renstra'=> array('adminSkpd'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Renstra','url'=>array('index')),
//array('label'=>'Tambah Renstra','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Renstra','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Renstra','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Renstra','url'=>array('admin','skpd'=>$model->skpd),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Renstra</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'tujuan',
		//'sasaranskpd_.sasaran',
		'kegiatan_.program_.bidang_.urusan_.urusan',
		'kegiatan_.program_.bidang_.bidang',
		'kegiatan_.program_.program',
		'kegiatan_.kegiatan',
		'skpd_.nama_skpd',
		'sasaran_daerah_.sasaran_daerah',
		'indikator_sasaran',
		//'kode',
		'indikator_kinerja_program_dan_kegiatan',
		'capaian_tahun_awal',
		'target_tahun_1',
		'pagu1',
		'target_tahun_2',
		'pagu2',
		'target_tahun_3',
		'pagu3',
		'target_tahun_4',
		'pagu4',
		'target_tahun_5',
		'pagu5',
		'target_akhir',
		'pagu6',
		'lokasi',
	
),
)); ?>
</section>