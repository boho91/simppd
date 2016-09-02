<?php
$this->breadcrumbs=array(
	'Prioritas Daerahs',
);

$this->menu=array(
array('label'=>'Create PrioritasDaerah','url'=>array('create')),
array('label'=>'Manage PrioritasDaerah','url'=>array('admin')),
);
?>

<h1>Prioritas Daerahs</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
