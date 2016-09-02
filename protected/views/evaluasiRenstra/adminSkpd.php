<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Evaluasi Renstra'),
		
    )
);
$this->menu=array(
//array('label'=>'List EvaluasiRkpd','url'=>array('index')),

array('label'=>'Cetak Laporan','url'=>array('laporanPdf'),'buttonType'=> 'link','context' => 'info'),
array('label'=>'Download Excel','url'=>array('laporanExcel'),'buttonType'=> 'link','context' => 'warning'),
array('label'=>'Rekapitulasi','url'=>array('rekapitulasiPdf'),'buttonType'=> 'link','context' => 'success'),
array('label'=>'Download Rekapitulasi','url'=>array('rekapitulasiExcel'),'buttonType'=> 'link','context' => 'danger'),

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
<h1>Evaluasi Renstra </h1>

</section>
<section class="content">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'kegiatan-musrenbang-grid',
'dataProvider'=>$model->GroupPerCOndition("skpd"),
'filter'=>$model,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'skpd',
			'value' => 'CHtml::link($data->skpd_->nama_skpd, Yii::app()->createUrl("evaluasiRenstra/adminUrusan",array("skpd"=>$data->skpd)))',
			//'filter'=> CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')), 'id', 'nama_skpd'),
			//'visible'=>Yii::app()->user->isAdminBappeda(),
			'filter'=>'',
			//'footer'=>"Total "
		),
		//'kd_bidang',
		
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
