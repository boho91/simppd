<?php
/* @var $this SasaranSkpdController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sasaran Skpds',
);

$this->menu=array(
	array('label'=>'Create SasaranSkpd', 'url'=>array('create')),
	array('label'=>'Manage SasaranSkpd', 'url'=>array('admin')),
);
?>

<h1>Sasaran Skpds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
