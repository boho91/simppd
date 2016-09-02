<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Usulan Musrenbang Kelurahan'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Kegiatan Musrenbang','url'=>array('index')),
	//array('label'=>'Tambah Usulan Musrenbang','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Usulan Musrenbang Kelurahan','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Usulan Musrenbang Kelurahan','url'=>array('admin','skpd'=>$model->kd_skpd),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Usulan Musrenbang Kelurahan</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>