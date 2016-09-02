<?php
$this->breadcrumbs=array(
	'Rekening Belanja',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Rekening Belanja','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Rekening Belanja','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Rekening Belanja</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>