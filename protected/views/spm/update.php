<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('SPM'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Desa','url'=>array('index')),
	array('label'=>'Tambah SPM','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View SPM','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'DataSPM','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit SPM</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>