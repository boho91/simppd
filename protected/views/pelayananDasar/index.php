<?php
/* @var $this PelayananDasarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pelayanan Dasars',
);

$this->menu=array(
	array('label'=>'Create PelayananDasar', 'url'=>array('create')),
	array('label'=>'Manage PelayananDasar', 'url'=>array('admin')),
);
?>

<h1>Pelayanan Dasars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
