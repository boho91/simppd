<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('SPM'=> array('admin'),
        'Tambah Data',
),
		
    )
);

$this->menu=array(
//array('label'=>'List Desa','url'=>array('index'),'buttonType'=> 'link','context' => 'danger',),
array('label'=>'Data SPM','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>Form SPM</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?></section>