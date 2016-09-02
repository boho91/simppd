<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Asd'=> array('admin'),
        'Tambah Data',
),
		
    )
);

$this->menu=array(
//array('label'=>'List Asd','url'=>array('index'),'buttonType'=> 'link','context' => 'danger',),
array('label'=>'Data Asd','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>Form Asd</h1>
</section>
<section class="content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?></section>