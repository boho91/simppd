<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Pokok Pikiran DPRD'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Desa','url'=>array('index')),
	array('label'=>'Tambah Pokok Pikiran DPRD','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Pokok Pikiran DPRD','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Pokok Pikiran DPRD','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Pokok Pikiran DPRD</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>