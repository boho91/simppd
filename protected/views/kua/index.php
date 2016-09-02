<?php
$this->breadcrumbs=array(
	'Kua',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Kua','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Kua','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Kua</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>