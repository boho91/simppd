<?php
$this->breadcrumbs=array(
	'Kegiatan Rpjmd',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Kegiatan Rpjmd','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Kegiatan Rpjmd','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Kegiatan Rpjmd</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>