<?php
$this->breadcrumbs=array(
	'Asds',
);

$this->menu=array(
array('label'=>'Create Asd','url'=>array('create')),
array('label'=>'Manage Asd','url'=>array('admin')),
);
?>

<h1>Asds</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
