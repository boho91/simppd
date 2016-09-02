<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Form2 Laporan Kemajuan Sumber Dana Dak'=> array('admin'),
        'Edit Data',
),
		
    )
);

	$this->menu=array(
	//array('label'=>'List Form2 Laporan Kemajuan Sumber Dana Dak','url'=>array('index')),
	array('label'=>'Tambah Form2 Laporan Kemajuan Sumber Dana Dak','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	array('label'=>'View Form2 Laporan Kemajuan Sumber Dana Dak','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'default',),
	array('label'=>'Data Form2 Laporan Kemajuan Sumber Dana Dak','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	?>
<section class="content-header">
	<h1>Edit Form2 Laporan Kemajuan Sumber Dana Dak</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?></section>