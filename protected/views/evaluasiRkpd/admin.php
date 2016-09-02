<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Evaluasi Rkpd'),
		
    )
);
$this->menu=array(
//array('label'=>'List EvaluasiRkpd','url'=>array('index')),
array('label'=>'Tambah Evaluasi Rkpd','url'=>array('create'),'buttonType'=> 'link','context' => 'info'),
);

Yii::app()->clientScript->registerScript('search', "
$('#btn_tambah').click(function(){
	waitingDialog.show();
	$.post('index.php?r=evaluasiRkpd/modalForm&skpd=".$model->skpd."',function(evt){
		$('#dialog2 #modal_content').html(evt);
		$('#dialog2 #tombolaksi').html('Tambah');
		waitingDialog.hide();
		$('#dialog2').modal('show'); 
		
	});
	
	return false;
});
$('#dialog2 #tombolaksi').click(function(){
	$(this).parent().parent().find('form').submit();
	return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('evaluasi-rkpd-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Data Evaluasi Rkpd</h1>

<p>
	<small>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</small>
</p>
	<?php
$this->breadcrumbs=array(
		'Evaluasi Rkpd'=>array('index'),
		'Manage',
	);?>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'evaluasi-rkpd-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
			'id',
		'skpd',
		'kode',
		'urusan',
		'bidang',
		'program',
		/*
		'kegiatan',
		'sasaran',
		'indikator_kinerja_program',
		'indikator_keluaran_kegiatan',
		'target_rpjmd_k',
		'target_rpjmd_rp',
		'realisasi_capaian_kinerja_rpjmd1_k',
		'realisasi_capaian_kinerja_rpjmd1_rp',
		'target_kinerja_rkpd_k',
		'target_kinerja_rkpd_rp',
		'realisasi_kinerja_triwulan_1_k',
		'realisasi_kinerja_triwulan_1_rp',
		'realisasi_kinerja_triwulan_2_k',
		'realisasi_kinerja_triwulan_2_rp',
		'realisasi_kinerja_triwulan_3_k',
		'realisasi_kinerja_triwulan_3_rp',
		'realisasi_kinerja_triwulan_4_k',
		'realisasi_kinerja_triwulan_4_rp',
		'realisasi_capaian_kinerja_rkpd_k',
		'realisasi_capaian_kinerja_rkpd_rp',
		'realisasi_capaian_kinerja_rpjmd_k',
		'realisasi_capaian_kinerja_rpjmd_rp',
		'target_capaian_kinerja_dan_realisasi_rpjmd_k',
		'target_capaian_kinerja_dan_realisasi_rpjmd_rp',
		'tahun_anggaran',
		'triwulan',
		'created_by',
		'created_date',
		'modified_by',
		'modified_date',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
),
),
)); ?>
</section>
