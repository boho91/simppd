<?php
/* @var $this TopDownController */
/* @var $model TopDown */

$this->breadcrumbs=array(
	'Top Downs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TopDown', 'url'=>array('index')),
	array('label'=>'Create TopDown', 'url'=>array('create')),
	array('label'=>'View TopDown', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TopDown', 'url'=>array('admin')),
);
?>

<h1>Update TopDown <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>