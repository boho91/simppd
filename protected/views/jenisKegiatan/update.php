<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Jenis Kegiatan'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Jenis Kegiatan','url'=>array('index')),
	array('label'=>'Tambah Jenis Kegiatan','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Jenis Kegiatan','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Jenis Kegiatan','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Jenis Kegiatan</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>