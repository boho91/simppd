<?php
/* @var $this SpmController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Spms',
);

$this->menu=array(
	array('label'=>'Create Spm', 'url'=>array('create')),
	array('label'=>'Manage Spm', 'url'=>array('admin')),
);
?>

<h1>Spms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
