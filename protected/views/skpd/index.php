<?php
$this->breadcrumbs=array(
	'Skpds',
);

$this->menu=array(
array('label'=>'Create Skpd','url'=>array('create')),
array('label'=>'Manage Skpd','url'=>array('admin')),
);
?>

<h1>Skpds</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
