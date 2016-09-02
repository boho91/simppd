<?php
/* @var $this PartisipatifController */
/* @var $model Partisipatif */

$this->breadcrumbs=array(
	'Partisipatifs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Partisipatif', 'url'=>array('index')),
	array('label'=>'Create Partisipatif', 'url'=>array('create')),
	array('label'=>'View Partisipatif', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Partisipatif', 'url'=>array('admin')),
);
?>

<h1>Update Partisipatif <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>