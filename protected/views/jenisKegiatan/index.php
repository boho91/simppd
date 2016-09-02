<?php
$this->breadcrumbs=array(
	'Jenis Kegiatan',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Jenis Kegiatan','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Jenis Kegiatan','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Jenis Kegiatan</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>