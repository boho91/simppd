<?php
$this->breadcrumbs=array(
	'Evaluasi Rkpd',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Evaluasi Rkpd','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Evaluasi Rkpd','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Evaluasi Rkpd</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>