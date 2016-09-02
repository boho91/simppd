<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Pokok Pikiran DPRD'),
		
    )
);
$this->menu=array(
//array('label'=>'List Desa','url'=>array('index')),
array('label'=>'Tambah Pokok Pikiran DPRD','url'=>array('create'),'buttonType'=> 'link','context' => 'info',),
array('label'=>'Cetak Pokok Pikiran DPRD','url'=>array('cetakpdf'),'buttonType'=> 'link','context' => 'success','htmlOptions'=>array('target'=>'_BLANK')),
array('label'=>'Export Pokok Pikiran DPRD','url'=>array('exportexcel'),'buttonType'=> 'link','context' => 'warning','htmlOptions'=>array('target'=>'_BLANK')),

);

Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
$.fn.yiiGridView.update('reses-dprd-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Data Pokok Pikiran DPRD</h1>

<p>
	<small>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</small>
</p>
	<?php
$this->breadcrumbs=array(
		'Pokok Pikiran DPRD'=>array('index'),
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
'id'=>'reses-dprd-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'skpd',
			'value'=>'$data->skpd_->nama_skpd',
			'filter'=> CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')), 'id', 'nama_skpd'),
		),
		'usulan',
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'sumber_dana',
			'value'=>'$data->sumberdana_->sumber_dana',
			'filter'=> CHtml::listData(SumberDana::model()->findAll(array('order'=>'sumber_dana')), 'id', 'sumber_dana'),
		),
		'keterangan',
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
),
),
)); ?>
</section>
