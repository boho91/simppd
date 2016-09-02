<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Tujuan SKPD'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Sasaran Daerah','url'=>array('index')),
	array('label'=>'Tambah Tujuan SKPD','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Tujuan SKPD','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Tujuan SKPD','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Tujuan SKPD</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>