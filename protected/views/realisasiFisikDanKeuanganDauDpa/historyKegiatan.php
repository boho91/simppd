<?php

Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
$.fn.yiiGridView.update('realisasi-fisik-dan-keuangan-dau-dpa-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">


</section>
<section class="content">
<?php 
$jenis_dpa = $jenis;
$this->widget('booster.widgets.TbGridView',array(
'id'=>'realisasi-fisik-dan-keuangan-dau-dpa-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		
		array(
			'name'=>'bulan',
			'value'=>'$data->bulan_->bulan',
			'filter'=>''
		),
		array(
			'name'=>'manfaat_kegiatan',
			'filter'=>''
		),
		array(
			'name'=>'kendala',
			'filter'=>''
		),
		array(
			'name'=>'tindak_lanjut',
			'filter'=>''
		),
		array(
			'name'=>'pihak_pembantu',
			'filter'=>''
		),
		array(
			'name'=>'tahun',
			'filter'=>''
		),
		array(
			'name'=>'created_date',
			'filter'=>'',
			'value'=>'AplikasiKomponen::TanggalIndo($data->created_date)',
		
		),
		/*
		'urusan',
		'bidang',
		'program',
		'kegiatan',
		'harga_satuan',
		'volume',
		'kontrak',
		'swakelola',
		'created_date',
		'created_by',
		'mod_date',
		'mod_by',
		*/
array(
	'class'=>'booster.widgets.TbButtonColumn',
	'htmlOptions'=>array('width'=>100),
	'template'=>'{delete}'
),
),
)); ?>
</section>
