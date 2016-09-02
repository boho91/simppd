<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Data KUA Perubahan'),
		
    )
);
$this->menu=array(
//array('label'=>'List KegiatanMusrenbang','url'=>array('index')),
array('label'=>'Tambah KUA Perubahan','url'=>array('create'),'buttonType'=> 'link','context' => 'info','htmlOptions'=>array('id'=>'btn_tambah')),
);

Yii::app()->clientScript->registerScript('search', "
$('#btn_tambah').click(function(){
	waitingDialog.show();
	$.post('index.php?r=kuaPerubahan/modalForm',function(evt){
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
$.fn.yiiGridView.update('ppas-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Data KUA Perubahan</h1>
<?php
$this->menu=array(
//array('label'=>'List KegiatanMusrenbang','url'=>array('index')),
array('label'=>'Tambah KUA','url'=>array('create'),'buttonType'=> 'link','context' => 'success','htmlOptions'=>array('id'=>'btn_tambah')),
array('label'=>'Cetak Plafon SKPD','url'=>array('plafonperskpdPdf'),'buttonType'=> 'link','context' => 'info'),
array('label'=>'Export Plafon SKPD','url'=>array('plafonperskpdExcel'),'buttonType'=> 'link','context' => 'warning'),
array('label'=>'Cetak Plafon Urusan','url'=>array('plafonperUrusanPdf'),'buttonType'=> 'link','context' => 'success'),
array('label'=>'Export Plafon Urusan','url'=>array('plafonperUrusanExcel'),'buttonType'=> 'link','context' => 'danger'),
);
?>
<p>
	<small>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</small>
</p>

</section>
<section class="content">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'ppas-grid',
'dataProvider'=>$model->searchPerSKpd(),
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
			 'value' => 'CHtml::link($data->skpd_->nama_skpd, Yii::app()->createUrl("kuaPerubahan/admin",array("skpd"=>$data->skpd)))',
			//'filter'=> CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')), 'id', 'nama_skpd'),
			'visible'=>Yii::app()->user->isAdminBappeda(),
			'footer'=>'Total',
			'filter'=>'',
		),
		//'kd_bidang',
		
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'pagu1',
			'value'=>'$data->pagu1',
			'footer'=>"".$model->totalPagu1(Yii::app()->session['tahun_perencanaan']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'pagu2',
			'value'=>'$data->pagu2',
			'footer'=>"".$model->totalPagu2(Yii::app()->session['tahun_perencanaan']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'selisihTotal',
			'value'=>'$data->selisihTotal',
			'footer'=>"".$model->selisihDariTotal(Yii::app()->session['tahun_perencanaan']),
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
/*array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
),*/
),
)); ?>

</section>
