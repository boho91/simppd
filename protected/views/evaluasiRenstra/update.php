<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Evaluasi Renstra'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Evaluasi Renstra','url'=>array('index')),
	array('label'=>'Tambah Evaluasi Renstra','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Evaluasi Renstra','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Evaluasi Renstra','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Evaluasi Renstra</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>