<?php
$this->breadcrumbs=array(
	'Kelurahans',
);

$this->menu=array(
array('label'=>'Create Kelurahan','url'=>array('create')),
array('label'=>'Manage Kelurahan','url'=>array('admin')),
);
?>

<h1>Kelurahan</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
