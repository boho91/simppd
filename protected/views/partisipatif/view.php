<?php
/* @var $this PartisipatifController */
/* @var $model Partisipatif */

$this->breadcrumbs=array(
	'Partisipatifs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Partisipatif', 'url'=>array('index')),
	array('label'=>'Create Partisipatif', 'url'=>array('create')),
	array('label'=>'Update Partisipatif', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Partisipatif', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Partisipatif', 'url'=>array('admin')),
);
?>

<h1>View Partisipatif #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kd_skpd',
		'kd_urusan',
		'kd_bidang',
		'kd_prog',
		'kd_kegiatan',
		'tahun',
		'kunci',
		'sasaran_daerah',
		'prioritas_daerah',
		'sasaran_kegiatan',
		'keterangan',
		'created_date',
		'created_by',
		'mod_date',
		'mod_by',
		'uraian',
		'kecamatan',
		'kelurahan',
		'volume',
		'satuan',
		'pagu_indikatif',
		'pagu_prakiraan_maju',
		'sumber_dana',
		'urutan',
		'jenis_kegiatan',
		'tolak_ukur_hasil_program',
		'target_hasil_program',
		'tolak_ukur_keluaran_kegiatan',
		'target_keluaran_kegiatan',
		'tolak_ukur_hasil_kegiatan',
		'target_hasil_kegiatan',
		'sumber_usulan',
		'status_usulan',
		'keterangan_status_usulan',
		'foto',
		'latitude',
		'longitude',
	),
)); ?>
