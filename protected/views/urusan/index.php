<?php
$this->breadcrumbs=array(
	'Urusans',
);

$this->menu=array(
array('label'=>'Create Urusan','url'=>array('create')),
array('label'=>'Manage Urusan','url'=>array('admin')),
);
?>

<h1>Urusans</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
