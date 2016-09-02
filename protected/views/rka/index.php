<?php
$this->breadcrumbs=array(
	'Rka',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Rka','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Rka','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Rka</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>