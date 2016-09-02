<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('RPJMD'),
		
    )
);
$this->menu=array(
//array('label'=>'List Renstra','url'=>array('index')),
array('label'=>'Tambah Rencana Program RPJMD','url'=>array('create'),'buttonType'=> 'link','context' => 'info','htmlOptions'=>array('id'=>'btn_tambah')),
);

Yii::app()->clientScript->registerScript('search', "
$('#btn_tambah').click(function(){
	waitingDialog.show();
	$.post('index.php?r=kegiatanRpjmd/modalForm',function(evt){
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
$.fn.yiiGridView.update('renstra-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Data RPJMD</h1>



</section>
<section class="content">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'kegiatan-musrenbang-grid',
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
			 'value' => 'CHtml::link($data->skpd_->nama_skpd, Yii::app()->createUrl("kegiatanRpjmd/admin",array("skpd"=>$data->skpd)))',
			//'filter'=> CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')), 'id', 'nama_skpd'),
			'visible'=>Yii::app()->user->isAdminBappeda(),
			'filter'=>'',
			'footer'=>'Total ',
		),
		//'kd_bidang',
		
		
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'p1',
			'value'=>'$data->p1',
			'footer'=>"".$model->totalPagu1(Yii::app()->session['id_rpjmd']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'p2',
			'value'=>'$data->p2',
			'footer'=>"".$model->totalPagu2(Yii::app()->session['id_rpjmd']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'p3',
			'value'=>'$data->p3',
			'footer'=>"".$model->totalPagu3(Yii::app()->session['id_rpjmd']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'p4',
			'value'=>'$data->p4',
			'footer'=>"".$model->totalPagu4(Yii::app()->session['id_rpjmd']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'p5',
			'value'=>'$data->p5',
			'footer'=>"".$model->totalPagu5(Yii::app()->session['id_rpjmd']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'pakhir',
			'value'=>'$data->pakhir',
			'footer'=>"".$model->totalPaguAkhir(Yii::app()->session['id_rpjmd']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'id_rpjmd',
			'value'=>'$data->rpjmd->tahun_rpjmd',
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
