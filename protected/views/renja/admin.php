<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Renja'),
		
    )
);
$this->menu=array(
//array('label'=>'List Renja','url'=>array('index')),
array('label'=>'Tambah Renja','url'=>array('create'),'buttonType'=> 'link','context' => 'info','htmlOptions'=>array('id'=>'btn_tambah')),
);

Yii::app()->clientScript->registerScript('search', "
$('#btn_tambah').click(function(){
	waitingDialog.show();
	$.post('index.php?r=renja/modalForm',function(evt){
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
$.fn.yiiGridView.update('renja-grid', {
data: $(this).serialize()
});
return false;
});
function reinstallScript(id, data) {
$('#renja-grid #verifikasi').click(function(){
	waitingDialog.show();
	url = $(this).attr('href');
	$.post(url,function(evt){
		$('#dialog2 #modal_content').html(evt);
		$('#dialog2 #tombolaksi').html('Tambah');
		waitingDialog.hide();
		$('#dialog2').modal('show'); 
	});
	
	return false;
});
}
reinstallScript();
");
?>
<section class="content-header">
<h1>Data Renja</h1>

</section>
<section class="content">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'renja-grid',
'afterAjaxUpdate' => 'reinstallScript',
'dataProvider'=>$model->search(),
'filter'=>$model,
'rowCssClassExpression' => '
        ( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] ) .
        ( $data->sumber_usulan ? " ".str_replace(" ", "", $data->sumber_usulan."".$data->status_verifikasi): " ".str_replace(" ", "", $data->sumber_usulan."".$data->status_verifikasi))
    ',
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
			'value'=>'$data->skpd_->nama_skpd',
			'filter'=> CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')), 'id', 'nama_skpd'),
			'visible'=>Yii::app()->user->isAdminBappeda()
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'skpd',
			'value'=>'$data->skpd_->nama_skpd',
			'filter'=> '',
			'visible'=>!Yii::app()->user->isAdminBappeda()
		),
		'kegiatan_.program_.program',
		'kegiatan_.kegiatan',
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'dana1',
			'value'=>'$data->dana1',
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'dana2',
			'value'=>'$data->dana2',
		),
		'indikator_kinerja',
		'sasaran_kegiatan',
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'status_verifikasi',
			'value'=>'$data->status_verifikasi',
			'filter'=> '',
		),
		/*
		
		
		'lokasi_kegiatan',
		'target_capaian_kinerja',
		'kebutuhan_dana',
		'sumber_dana',
		'catatan_penting',
		'target_capaian_kinerja_a2',
		'kebutuhan_dana_a2',
		'created_by',
		'created_date',
		'mod_by',
		'mod_date',
		'sumber_usulan',
		'status_verifikasi',
		'keterangan',
		'alasan_tolak_renja',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'template'=>'{view}{update}{verifikasi}{delete}',
'htmlOptions'=>array('width'=>100),
'buttons'=>array(
	'verifikasi'=>array(
		'label'=>'',
		'imageUrl'=>false, 
		//'label'=>'Terima',
		'url'=>'Yii::app()->createUrl("renja/verifikasi", array("id"=>$data->id))',
		'options'=>array('id'=>'verifikasi','class'=>'glyphicon glyphicon-fire','title'=>'Verifikasi Data Renja tidak sesuai Renstra'),
		'visible'=>'($data->sumber_usulan == "Bukan Renstra")',
	),
),
),
),
)); ?>
</section>
