<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Evaluasi Renstra'),
		
    )
);
$this->menu=array(
//array('label'=>'List EvaluasiRenstra','url'=>array('index')),
array('label'=>'Tambah Evaluasi Renstra','url'=>array('create'),'buttonType'=> 'link','context' => 'info',),
);

Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
$.fn.yiiGridView.update('evaluasi-renstra-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Data Evaluasi Renstra</h1>

<p>
	<small>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</small>
</p>
	<?php
$this->breadcrumbs=array(
		'Evaluasi Renstra'=>array('index'),
		'Manage',
	);?>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'evaluasi-renstra-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
			'id',
		'urusan',
		'bidang',
		'program',
		'kegiatan',
		'skpd',
		/*
		'tahun',
		'realisasi_target_tahun1',
		'realisasi_anggaran_tahun1',
		'realisasi_target_tahun2',
		'realisasi_anggaran_tahun2',
		'realisasi_target_tahun3',
		'realisasi_anggaran_tahun3',
		'realisasi_target_tahun4',
		'realisasi_anggaran_tahun4',
		'realisasi_target_tahun5',
		'realisasi_anggaran_tahun5',
		'created_by',
		'created_date',
		'mod_by',
		'mod_date',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
),
),
)); ?>
</section>
