<?php
$this->breadcrumbs=array(
	'Evaluasi Renja',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Evaluasi Renja','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Evaluasi Renja','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Evaluasi Renja</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>