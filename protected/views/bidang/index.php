<?php
$this->breadcrumbs=array(
	'Bidangs',
);

$this->menu=array(
array('label'=>'Create Bidang','url'=>array('create')),
array('label'=>'Manage Bidang','url'=>array('admin')),
);
?>

<h1>Bidangs</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
