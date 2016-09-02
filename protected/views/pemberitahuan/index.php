<?php
$this->breadcrumbs=array(
	'Pemberitahuan',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Pemberitahuan','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Pemberitahuan','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Pemberitahuan</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>