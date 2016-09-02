<?php
/* @var $this TopDownController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Top Downs',
);

$this->menu=array(
	array('label'=>'Create TopDown', 'url'=>array('create')),
	array('label'=>'Manage TopDown', 'url'=>array('admin')),
);
?>

<h1>Top Downs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
