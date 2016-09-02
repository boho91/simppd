<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Rka'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Rka','url'=>array('index')),
	array('label'=>'Tambah Rka','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Rka','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Rka','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Rka</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>