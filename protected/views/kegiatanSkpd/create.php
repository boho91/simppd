<?php
/*$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Kegiatan Skpd'=> array('admin'),
        'Tambah Data',
),
		
    )
);
*/
$this->menu=array(
//array('label'=>'List KegiatanSkpd','url'=>array('index'),'buttonType'=> 'link','context' => 'danger',),
array('label'=>'Data Kegiatan Skpd','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">

</section>
<section class="content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?></section>