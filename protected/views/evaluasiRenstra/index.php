<?php
$this->breadcrumbs=array(
	'Evaluasi Renstra',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Evaluasi Renstra','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Evaluasi Renstra','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Evaluasi Renstra</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>