<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Foto Musrenbang'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Sumber Dana','url'=>array('index')),
	array('label'=>'Tambah Foto Musrenbang','url'=>array('upload'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Foto Musrenbang','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Foto Musrenbang','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Foto Musrenbang</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>