<?php
/* @var $this PartisipatifController */
/* @var $model Partisipatif */

$this->breadcrumbs=array(
	'Partisipatifs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Partisipatif', 'url'=>array('index')),
	array('label'=>'Manage Partisipatif', 'url'=>array('admin')),
);
?>

<h1>Create Partisipatif</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>