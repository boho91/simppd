<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Desa'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Desa','url'=>array('index')),
	array('label'=>'Tambah Desa','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Desa','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Desa','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Desa</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>