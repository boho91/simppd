<?php
$this->breadcrumbs=array(
	'Rpjmd',
);

$this->menu=array(
array('label'=>'Create Visi','url'=>array('create')),
array('label'=>'Manage Visi','url'=>array('admin')),
);
?>

<h1>Visi</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
