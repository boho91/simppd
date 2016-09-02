<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Kecamatan'),
		
    )
);
$this->menu=array(
//array('label'=>'List Kecamatan','url'=>array('index')),
array('label'=>'Tambah Kecamatan','url'=>array('create'),'buttonType'=> 'link','context' => 'info',),
);

Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
$.fn.yiiGridView.update('kecamatan-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Data Kecamatan</h1>

<p>
	<small>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</small>
</p>
	<?php
$this->breadcrumbs=array(
		'Kecamatan'=>array('index'),
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
'id'=>'kecamatan-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		'kecamatan',
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
),
),
)); ?>
</section>
