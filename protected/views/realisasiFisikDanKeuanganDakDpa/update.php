<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Realisasi Fisik Dan Keuangan Dak Dpa'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Realisasi Fisik Dan Keuangan Dak Dpa','url'=>array('index')),
	array('label'=>'Tambah Realisasi Fisik Dan Keuangan Dak Dpa','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Realisasi Fisik Dan Keuangan Dak Dpa','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Realisasi Fisik Dan Keuangan Dak Dpa','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Realisasi Fisik Dan Keuangan Dak Dpa</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>