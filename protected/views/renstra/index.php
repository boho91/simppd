<?php
$this->breadcrumbs=array(
	'Renstra',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Renstra','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Renstra','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Renstra</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>