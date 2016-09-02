<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
	array(
        'links' => array(
						'Realisasi Fisik dan Keuangan DPA'=> array('admin'),
						$modelSkpd->nama_skpd
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
<h1>Realisasi Fisik dan Keuangan DPA Sumber Dana Alokasi Umum </h1>

</section>
<section class="content">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'kegiatan-musrenbang-grid',
'dataProvider'=>$model,
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
			'name'=>'urusan',
			'value' => 'CHtml::link($data[nama_urusan], Yii::app()->createUrl("RealisasiFisikDanKeuanganDauDpa/adminBidang",array("skpd"=>$data[skpd],"urusan"=>$data[urusan])))',
		),
		
		//'kd_bidang',
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'header'=>'Pagu Sebelum Perubahan',
			'filter'=>'',
			'name'=>'paguSebelumPerubahan',
			'value'=>'AplikasiKomponen::uang($data[paguSebelumPerubahan])',
			//'footer'=>"".$model->totalPaguTahunAwalRenja(Yii::app()->session['tahun_perencanaan']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'header'=>'Pagu Setelah Perubahan',
			'name'=>'paguSetelahPerubahan',
			'value'=>'AplikasiKomponen::uang($data[paguSetelahPerubahan])',
			//'footer'=>"".$model->totalPaguTahunAwalRenja(Yii::app()->session['tahun_perencanaan']),
		),
		
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'tahun',
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
