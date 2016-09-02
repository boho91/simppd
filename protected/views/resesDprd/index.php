<?php
/* @var $this ResesDprdController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reses Dprds',
);

$this->menu=array(
	array('label'=>'Create ResesDprd', 'url'=>array('create')),
	array('label'=>'Manage ResesDprd', 'url'=>array('admin')),
);
?>

<h1>Reses Dprds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
