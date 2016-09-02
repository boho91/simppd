<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Sasaran Daerah'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Sasaran Daerah','url'=>array('index')),
	array('label'=>'Tambah Sasaran Daerah','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Sasaran Daerah','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Sasaran Daerah','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Sasaran Daerah</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>