<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Foto Musrenbang'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Sumber Dana','url'=>array('index')),
array('label'=>'Tambah Foto Musrenbang','url'=>array('upload'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Foto Musrenbang','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Sumber Dana','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Foto Musrenbang','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>View Foto Musrenbang</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		array(
				'name'=>'foto',
                'type' => 'raw',
				'label'=>'Foto',
				'value' => CHtml::image(Yii::app()->baseUrl . "/foto/".$model->foto,'alt',array('width'=>400,'height'=>400)),
            ),
),
)); ?>
</section>