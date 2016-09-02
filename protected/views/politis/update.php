<?php
/* @var $this PolitisController */
/* @var $model Politis */

$this->breadcrumbs=array(
	'Politises'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Politis', 'url'=>array('index')),
	array('label'=>'Create Politis', 'url'=>array('create')),
	array('label'=>'View Politis', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Politis', 'url'=>array('admin')),
);
?>

<h1>Update Politis <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>