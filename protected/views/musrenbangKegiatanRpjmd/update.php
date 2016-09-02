<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Musrenbang Rpjmd'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Kegiatan Rpjmd','url'=>array('index')),
	array('label'=>'Tambah Musrenbang Rpjmd','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Musrenbang Rpjmd','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Musrenbang Rpjmd','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Musrenbang Rpjmd</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>