<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Prioritas Daerah'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Prioritas Daerah','url'=>array('index')),
	array('label'=>'Tambah Prioritas Daerah','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Prioritas Daerah','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Prioritas Daerah','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Prioritas Daerah</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>