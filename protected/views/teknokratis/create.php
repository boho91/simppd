<?php
/* @var $this TeknokratisController */
/* @var $model Teknokratis */

$this->breadcrumbs=array(
	'Teknokratises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Teknokratis', 'url'=>array('index')),
	array('label'=>'Manage Teknokratis', 'url'=>array('admin')),
);
?>

<h1>Create Teknokratis</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>