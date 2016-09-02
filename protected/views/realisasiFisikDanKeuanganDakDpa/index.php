<?php
$this->breadcrumbs=array(
	'Realisasi Fisik Dan Keuangan Dak Dpa',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Realisasi Fisik Dan Keuangan Dak Dpa','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Realisasi Fisik Dan Keuangan Dak Dpa','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Realisasi Fisik Dan Keuangan Dak Dpa</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>