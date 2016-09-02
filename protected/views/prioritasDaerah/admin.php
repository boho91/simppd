<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Prioritas Daerah'),
		
    )
);
$this->menu=array(
//array('label'=>'List PrioritasDaerah','url'=>array('index')),
array('label'=>'Tambah Prioritas Daerah','url'=>array('create'),'buttonType'=> 'link','context' => 'info',),
);

Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
$.fn.yiiGridView.update('prioritas-daerah-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Data Prioritas Daerah</h1>

<p>
	<small>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</small>
</p>
	<?php
$this->breadcrumbs=array(
		'Prioritas Daerah'=>array('index'),
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
'id'=>'prioritas-daerah-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		//	'id',
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>70),
			'type'=>'raw',
			'name'=>'tahun_perencanaan',
			'value'=>'$data->tahun_perencanaan',
			//'filter'=> CHtml::listData(Rpjmd::model()->findAll(array('order'=>'tahun_rpjmd')), 'id', 'tahun_rpjmd'),
			//'visible'=>Yii::app()->user->isAdminBappeda()
		),
		//'tahun_perencanaan',
		'prioritas',
		'prioritas_ke',
		//'created_date',
		//'created_by',
		//'mod_date',
		/*
		'mod_by',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</section>
