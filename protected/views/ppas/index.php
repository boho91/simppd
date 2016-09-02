<?php
$this->breadcrumbs=array(
	'Ppas',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Ppas','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Ppas','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Ppas</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>