<?php

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Laporan Pengadaan Barang Jasa'=> array('admin'),
        'Edit Data',
),
		
    )
);
	$this->menu=array(
	//array('label'=>'List Sasaran Daerah','url'=>array('index')),
	array('label'=>'View','url'=>array('view','id'=>$model->id),'buttonType'=> 'link','context' => 'success',),
	//array('label'=>'Hapus Sasaran Daerah','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
	array('label'=>'Data Pengadaan Barang','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	);
	
	?>
	<section class='content-header'>
	<h1 class='page-head-line'>Update Laporan Pengadaan Barang dan Jasa</h1>
</section>
<section class='content'>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
</section>