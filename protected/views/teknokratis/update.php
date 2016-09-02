<?php
/* @var $this TeknokratisController */
/* @var $model Teknokratis */

$this->breadcrumbs=array(
	'Teknokratises'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Teknokratis', 'url'=>array('index')),
	array('label'=>'Create Teknokratis', 'url'=>array('create')),
	array('label'=>'View Teknokratis', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Teknokratis', 'url'=>array('admin')),
);
?>

<h1>Update Teknokratis <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>