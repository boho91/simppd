<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Desa'=> array('admin'),
        'Tambah Data',
),
		
    )
);

$this->menu=array(
//array('label'=>'List Desa','url'=>array('index'),'buttonType'=> 'link','context' => 'danger',),
array('label'=>'Data Desa','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>Form Desa</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?></section>