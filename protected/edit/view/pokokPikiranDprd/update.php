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
	//array('label'=>'List Kegiatan Musrenbang','url'=>array('index')),
	//array('label'=>'Tambah Usulan Musrenbang','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Usulan Pokok Pikiran DPRD','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Usulan Pokok Pikiran DPRD','url'=>array('admin','skpd'=>$model->kd_skpd),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Usulan Pokok Pikiran DPRD</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>