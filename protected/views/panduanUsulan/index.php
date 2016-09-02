<?php
/* @var $this PanduanUsulanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Panduan Usulan',
);

$this->menu=array(
	array('label'=>'Create Panduan Usulan', 'url'=>array('create')),
	array('label'=>'Manage Panduan Usulan', 'url'=>array('admin')),
);
?>

<h1>Panduan Usulans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
