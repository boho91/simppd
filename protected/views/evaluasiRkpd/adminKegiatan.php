<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
	array(
        'links' => array(
						'Evaluasi Rkpd'=> array('admin'),
						$modelSkpd->nama_skpd=>array('adminUrusan','skpd'=>$modelSkpd->id),
						$modelProgram->bidang_->urusan_->urusan=>array('adminBidang','skpd'=>$modelSkpd->id,'urusan'=>$modelProgram->bidang_->urusan_->id),
						$modelProgram->bidang_->bidang=>array('adminProgram','skpd'=>$modelSkpd->id,'urusan'=>$modelProgram->bidang_->urusan_->id,'bidang'=>$modelProgram->bidang_->id),
						$modelProgram->program,
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
<h1>Evaluasi RKPD</h1>

</section>
<section class="content">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'kegiatan-musrenbang-grid',
'dataProvider'=>$model->GroupPerCOndition("kegiatan"),
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
			'name'=>'kegiatan',
			'value' => 'CHtml::link($data->kegiatan_->kegiatan, Yii::app()->createUrl("evaluasiRkpd/evaluasiKegiatan",array("skpd"=>$data->skpd,"urusan"=>$data->urusan,"bidang"=>$data->bidang,"program"=>$data->program,"kegiatan"=>$data->kegiatan)))',
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'pagu_tahun_awal',
			'value'=>'$data->pagu_tahun_awal',
			//'footer'=>"".$model->fetchTotalPagu($model->searchPerUrusan()->getData()),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'pagu_tahun_akhir',
			'value'=>'$data->pagu_tahun_akhir',
			//'footer'=>"".$model->fetchTotalPaguAkhir($model->searchPerUrusan()->getData()),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'tahun',
			'value'=>'$data->tahun',
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

),
)); ?>

</section>
