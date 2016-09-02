<?php
$this->breadcrumbs=array(
	'Kegiatan Skpd',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Kegiatan Skpd','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Kegiatan Skpd','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Kegiatan Skpd</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>