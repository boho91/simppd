<?php
/* @var $this PolitisController */
/* @var $model Politis */

$this->breadcrumbs=array(
	'Politises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Politis', 'url'=>array('index')),
	array('label'=>'Manage Politis', 'url'=>array('admin')),
);
?>

<h1>Create Politis</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>