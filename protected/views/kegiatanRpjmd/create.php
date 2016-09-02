<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Kegiatan Rpjmd'=> array('admin'),
        'Tambah Data',
),
		
    )
);

$this->menu=array(
//array('label'=>'List KegiatanRpjmd','url'=>array('index'),'buttonType'=> 'link','context' => 'danger',),
array('label'=>'Data Kegiatan Rpjmd','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>Form Kegiatan Rpjmd</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?></section>