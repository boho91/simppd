<?php
/* @var $this TujuanSkpdController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tujuan Skpds',
);

$this->menu=array(
	array('label'=>'Create TujuanSkpd', 'url'=>array('create')),
	array('label'=>'Manage TujuanSkpd', 'url'=>array('admin')),
);
?>

<h1>Tujuan Skpds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
