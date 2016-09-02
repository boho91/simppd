<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Renstra'=> array('adminSkpd'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Renstra','url'=>array('index')),
	//array('label'=>'Tambah Renstra','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Renstra','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Renstra','url'=>array('admin','skpd'=>$model->skpd),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Renstra</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>