<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Usulan Musrenbang Kota'=> array('adminSkpd'),
        'Lihat Data',),		
    )
);


?>
<section class="content-header">
<h1>View Foto Musrenbang Kota</h1>
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'foto',
		'tahun',
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'kd_skpd',
			'value'=>$model->skpd_->nama_skpd,
		
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'kelurahan',
			'value'=>$model->kelurahan_->kelurahan,
		
		),
		
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'kecamatan',
			'value'=>$model->kecamatan_->kecamatan,
			
		),
		
		array(
				'name'=>'foto',
                'type' => 'raw',
				'label'=>'Foto',
				'value' => CHtml::image(Yii::app()->baseUrl . "/foto/".$model->foto),
            ),
	
),
)); ?>
</section>