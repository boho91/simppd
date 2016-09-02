<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Evaluasi Rkpd'),
		
    )
);

$this->menu=array(
//array('label'=>'List EvaluasiRkpd','url'=>array('index')),
array('label'=>'Tambah Evaluasi Rkpd','url'=>array('create'),'buttonType'=> 'link','context' => 'info','htmlOptions'=>array('id'=>'btn_tambah')),
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
<h1> Evaluasi Rkpd</h1>

</section>
<section class="content">
<?php 
echo $renja->sasaran_kegiatan;
$this->widget('booster.widgets.TbGridView',array(
'id'=>'evaluasi-rkpd-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		
		'skpd_.nama_skpd',
		//'kode',
		'kegiatan_.program_.bidang_.urusan_.urusan',
		'kegiatan_.program_.bidang_.bidang',
		'kegiatan_.program_.program',
		
		'kegiatan_.kegiatan',
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'sasaran',
			'sortable' => true,
			'filter'=> '',
			
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
			'type' => 'text',
			'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"sasaran",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("evaluasi-rkpd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'indikator_kinerja_program',
			'sortable' => true,
			'filter'=> '',
			
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
			'type' => 'text',
			'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"indikator_kinerja_program",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("evaluasi-rkpd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'indikator_keluaran_kegiatan',
			'sortable' => true,
			'filter'=> '',
			
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
			'type' => 'text',
			'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"indikator_keluaran_kegiatan",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("evaluasi-rkpd-grid");
				}',
				),
			)
		),
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
	
		
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
),
),
)); ?>
</section>
