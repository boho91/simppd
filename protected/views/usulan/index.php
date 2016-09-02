<?php
/* @var $this UsulanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usulans',
);

$this->menu=array(
	array('label'=>'Create Usulan', 'url'=>array('create')),
	array('label'=>'Manage Usulan', 'url'=>array('admin')),
);
?>

<h1>Usulans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
