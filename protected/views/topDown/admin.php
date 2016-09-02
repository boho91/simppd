<?php
/* @var $this TopDownController */
/* @var $model TopDown */

$this->breadcrumbs=array(
	'Top Downs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TopDown', 'url'=>array('index')),
	array('label'=>'Create TopDown', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#top-down-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Top Downs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'top-down-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'kd_skpd',
		'kd_urusan',
		'kd_bidang',
		'kd_prog',
		'kd_kegiatan',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
