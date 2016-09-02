<?php
$this->breadcrumbs=array(
	'Misis',
);

$this->menu=array(
array('label'=>'Create Misi','url'=>array('create')),
array('label'=>'Manage Misi','url'=>array('admin')),
);
?>

<h1>Misis</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
