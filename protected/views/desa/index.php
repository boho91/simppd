<?php
$this->breadcrumbs=array(
	'Desas',
);

$this->menu=array(
array('label'=>'Create Desa','url'=>array('create')),
array('label'=>'Manage Desa','url'=>array('admin')),
);
?>

<h1>Desas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
