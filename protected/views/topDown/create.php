<?php
/* @var $this TopDownController */
/* @var $model TopDown */

$this->breadcrumbs=array(
	'Top Downs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TopDown', 'url'=>array('index')),
	array('label'=>'Manage TopDown', 'url'=>array('admin')),
);
?>

<h1>Create TopDown</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>