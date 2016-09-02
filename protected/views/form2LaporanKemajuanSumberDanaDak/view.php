<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Form2 Laporan Kemajuan Sumber Dana Dak'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Form2 Laporan Kemajuan Sumber Dana Dak','url'=>array('index')),
array('label'=>'Tambah Form2 Laporan Kemajuan Sumber Dana Dak','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Form2 Laporan Kemajuan Sumber Dana Dak','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Form2 Laporan Kemajuan Sumber Dana Dak','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Form2 Laporan Kemajuan Sumber Dana Dak','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Form2 Laporan Kemajuan Sumber Dana Dak</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'urusan',
		'skpd',
		'bidang',
		'program',
		'kegiatan',
		'pmk',
		'tgl_pmk',
		'juknis',
		'tgl_juknis',
		'penyusunan_rencana_kerja',
		'tgl_penyusunan_rencana_kerja',
		'penetapan_dpa',
		'tgl_penetapan_dpa',
		'sk_penetapan_pelaksanaan_kegiatan',
		'tgl_sk_penetapan_pelaksanaan_kegiatan',
		'tgl_pelaksanaan_tender',
		'pelaksanaan_tender',
		'persiapan_pekerjaan_swakelola',
		'tgl_persiapan_pekerjaan_swakelola',
		'pelaksanaan_pekerjaan_kontrak',
		'tgl_pelaksanaan_pekerjaan_kontrak',
		'pelaksanaan_pekerjaan_swakelola',
		'tgl_pelaksanaan_pekerjaan_swakelola',
		'penerbitan_spp',
		'tgl_penerbitan_spp',
		'penerbitan_spm',
		'tgl_penerbitan_spm',
		'penerbitan_sp2d',
		'tgl_penerbitan_sp2d',
		'tahun',
		'bulan',
		'created_by',
		'created_date',
		'mod_by',
		'mod_date',
		'is_perubahan',
		'id_dpa',
),
)); ?>
</section>