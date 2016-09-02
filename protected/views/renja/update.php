<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Renja'=> array('admin','skpd'=>$model->skpd),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Renja','url'=>array('index')),
	//array('label'=>'Tambah Renja','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Renja','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Renja','url'=>array('admin','skpd'=>$model->skpd),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Renja</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>