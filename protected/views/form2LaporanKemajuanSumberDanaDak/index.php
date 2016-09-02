<?php
$this->breadcrumbs=array(
	'Form2 Laporan Kemajuan Sumber Dana Dak',
);
echo '<section class="content-header">';
$this->menu=array(
array('label'=>'Tambah Form2 Laporan Kemajuan Sumber Dana Dak','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
//array('label'=>'Manage Form2 Laporan Kemajuan Sumber Dana Dak','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>

<h1>Form2 Laporan Kemajuan Sumber Dana Dak</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</section>