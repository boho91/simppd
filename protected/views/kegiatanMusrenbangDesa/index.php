<?php
$this->breadcrumbs=array(
	'Kegiatan Musrenbang',
);
echo '<section class="content-header">';
$this->menu=array(
//array('label'=>'Tambah Kegiatan Musrenbang','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Kegiatan Musrenbang','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Kegiatan Musrenbang</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>