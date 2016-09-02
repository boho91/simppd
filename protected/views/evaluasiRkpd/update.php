<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Evaluasi Rkpd'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Evaluasi Rkpd','url'=>array('index')),
	array('label'=>'Tambah Evaluasi Rkpd','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Evaluasi Rkpd','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Evaluasi Rkpd','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Evaluasi Rkpd</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>