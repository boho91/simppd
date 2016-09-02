<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
	array(
        'links' => array(
						'Evaluasi Renstra'=> array('admin'),
						$modelSkpd->nama_skpd=>array('adminUrusan','skpd'=>$modelSkpd->id),
						$modelBidang->urusan_->urusan=>array('adminBidang','skpd'=>$modelSkpd->id,'urusan'=>$modelBidang->urusan),
						$modelBidang->bidang,
						),		
    )
    
);


Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
$.fn.yiiGridView.update('kegiatan-musrenbang-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Evaluasi Renstra</h1>

</section>
<section class="content">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'kegiatan-musrenbang-grid',
'dataProvider'=>$model->GroupPerCOndition("program"),
'filter'=>$model,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		
		
		//'kd_bidang',
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'program',
			'value' => 'CHtml::link($data->kegiatan_->program_->program, Yii::app()->createUrl("evaluasiRenstra/adminKegiatan",array("skpd"=>$data->skpd,"urusan"=>$data->urusan,"bidang"=>$data->bidang,"program"=>$data->program)))',
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'pagu1',
			'value'=>'$data->pagu1',
			//'footer'=>"".$model->totalPaguTahunAwalRenja(Yii::app()->session['tahun_perencanaan']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'pagu2',
			'value'=>'$data->pagu2',
			//'footer'=>"".$model->totalPaguTahunAkhir(Yii::app()->session['tahun_perencanaan']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'filter'=>'',
			'name'=>'pagu3',
			//'footer'=>"".$model->totalPaguTahunAkhir(Yii::app()->session['tahun_perencanaan']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'name'=>'pagu4',
			'filter'=>'',
			//'footer'=>"".$model->totalPaguTahunAkhir(Yii::app()->session['tahun_perencanaan']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'filter'=>'',
			'name'=>'pagu5',
			//'footer'=>"".$model->totalPaguTahunAkhir(Yii::app()->session['tahun_perencanaan']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'filter'=>'',
			'name'=>'tahun_perencanaan',
		),
		/*
		'kunci',
		'timestamp',
		'sasaran_daerah',
		'prioritas_daerah',
		'sasaran_kegiatan',
		'keterangan',
		'created_date',
		'created_by',
		'mod_date',
		'mod_by',
		*/
/*array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
),*/
),
)); ?>

</section>
