<?php
$this->breadcrumbs=array(
	'Sasaran Daerahs',
);

$this->menu=array(
array('label'=>'Create SasaranDaerah','url'=>array('create')),
array('label'=>'Manage SasaranDaerah','url'=>array('admin')),
);
?>

<h1>Sasaran Daerahs</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
