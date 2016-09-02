<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Evaluasi Rkpd'=> array('adminSkpd'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Evaluasi Rkpd','url'=>array('index')),
array('label'=>'Tambah Evaluasi Rkpd','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Evaluasi Rkpd','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Evaluasi Rkpd','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Evaluasi Rkpd','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Evaluasi Rkpd</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'skpd',
		'kode',
		'urusan',
		'bidang',
		'program',
		'kegiatan',
		'sasaran',
		'indikator_kinerja_program',
		'indikator_keluaran_kegiatan',
		'target_rpjmd_k',
		'target_rpjmd_rp',
		'realisasi_capaian_kinerja_rpjmd1_k',
		'realisasi_capaian_kinerja_rpjmd1_rp',
		'target_kinerja_rkpd_k',
		'target_kinerja_rkpd_rp',
		'realisasi_kinerja_triwulan_1_k',
		'realisasi_kinerja_triwulan_1_rp',
		'realisasi_kinerja_triwulan_2_k',
		'realisasi_kinerja_triwulan_2_rp',
		'realisasi_kinerja_triwulan_3_k',
		'realisasi_kinerja_triwulan_3_rp',
		'realisasi_kinerja_triwulan_4_k',
		'realisasi_kinerja_triwulan_4_rp',
		'realisasi_capaian_kinerja_rkpd_k',
		'realisasi_capaian_kinerja_rkpd_rp',
		'realisasi_capaian_kinerja_rpjmd_k',
		'realisasi_capaian_kinerja_rpjmd_rp',
		'target_capaian_kinerja_dan_realisasi_rpjmd_k',
		'target_capaian_kinerja_dan_realisasi_rpjmd_rp',
		'tahun_anggaran',
		'triwulan',
		'created_by',
		'created_date',
		'modified_by',
		'modified_date',
),
)); ?>
</section>