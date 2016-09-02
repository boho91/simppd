<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Kegiatan Musrenbang Kecamatan'),
		
    )
);
$this->menu=array(
//array('label'=>'List KegiatanMusrenbang','url'=>array('index')),
array('label'=>'Tambah Usulan Musrenbang Kecamatan','url'=>array('create'),'buttonType'=> 'link','context' => 'info','htmlOptions'=>array('id'=>'btn_tambah')),
);

Yii::app()->clientScript->registerScript('search', "
$('#btn_tambah').click(function(){
	waitingDialog.show();
	$.post('index.php?r=kegiatanMusrenbang/modalForm',function(evt){
		$('#dialog2 #modal_content').html(evt);
		$('#dialog2 #tombolaksi').html('Tambah');
		waitingDialog.hide();
		$('#dialog2').modal('show'); 
		
	});
	
	return false;
});

$('#kegiatan-musrenbang-grid #tidakLanjut').click(function(){
	waitingDialog.show();
	url = $(this).attr('href');
	$.post(url,function(evt){
		$.fn.yiiGridView.update('kegiatan-musrenbang-grid');
		waitingDialog.hide();
		
	});
	
	return false;
});
$('#kegiatan-musrenbang-grid #lanjut').click(function(){
	waitingDialog.show();
	url = $(this).attr('href');
	$.post(url,function(evt){
		$.fn.yiiGridView.update('kegiatan-musrenbang-grid');
		waitingDialog.hide();
		
	});
	
	return false;
});
$('#dialog2 #tombolaksi').click(function(){
	$(this).parent().parent().find('form').submit();
	return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('kegiatan-musrenbang-grid', {
data: $(this).serialize()
});
return false;
});
");
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#kegiatan-musrenbang-grid #tidakLanjut').click(function(){
	waitingDialog.show();
	url = $(this).attr('href');
	$.post(url,function(evt){
		$.fn.yiiGridView.update('kegiatan-musrenbang-grid');
		waitingDialog.hide();
		
	});
	
	return false;
});
$('#kegiatan-musrenbang-grid #lanjut').click(function(){
	waitingDialog.show();
	url = $(this).attr('href');
	$.post(url,function(evt){
		$.fn.yiiGridView.update('kegiatan-musrenbang-grid');
		waitingDialog.hide();
		
	});
	
	return false;
});
}
");
?>
<section class="content-header">
<h1>Data Usulan Musrenbang Kecamatan</h1>

<p>
	<small>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</small>
</p>
	<?php
$this->breadcrumbs=array(
		'Kegiatan Musrenbang'=>array('index'),
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
'id'=>'kegiatan-musrenbang-grid',
'dataProvider'=>$model->search(),
'afterAjaxUpdate' => 'reinstallDatePicker',
'filter'=>$model,
/*'rowCssClassExpression' => '
        ( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] ) .
        ( $data->status ? " ".str_replace(" ", "", $data->status): " ".str_replace(" ", "", $data->status))
    ',*/
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
			'name'=>'kd_skpd',
			'value'=>'$data->skpd_->nama_skpd',
			'filter'=> CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')), 'id', 'nama_skpd'),
			'visible'=>Yii::app()->user->isAdminBappeda()
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'kd_skpd',
			'value'=>'$data->skpd_->nama_skpd',
			'filter'=> '',
			'visible'=>!Yii::app()->user->isAdminBappeda()
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'kecamatan',
			'value'=>'$data->kecamatan_->kecamatan',
			'filter'=> CHtml::listData(Kecamatan::model()->findAll(array('order'=>'kecamatan')), 'id', 'kecamatan'),
		),
		
		//'kd_bidang',
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'prioritas_daerah',
			'value'=>'$data->prioritas_daerah_->prioritas',
			'filter'=> CHtml::listData(PrioritasDaerah::model()->findAll(array('order'=>'prioritas')), 'id', 'prioritas'),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'uraian',
			'value'=>'$data->uraian',
			'filter'=> '',
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'pagu1',
			'value'=>'$data->pagu1',
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'pagu2',
			'value'=>'$data->pagu2',
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'tahun',
			'value'=>'$data->tahun',
			'filter'=>'',
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'sumber_usulan',
			'value'=>'$data->sumber_usulan',
			'filter'=> CHtml::listData(KegiatanMusrenbang::model()->findAll(array('order'=>'sumber_usulan','group'=>'sumber_usulan','condition'=>'tahun="'.Yii::app()->session['tahun_perencanaan'].'"')), 'sumber_usulan', 'sumber_usulan'),
		),
		/*array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'foto',
			'value'=>'CHtml::link("[lihat foto]", Yii::app()->createUrl("kegiatanMusrenbang/foto",array("id"=>$data->id)))',
			//'value' => 'CHtml::image(Yii::app()->baseUrl . "/foto/" . $data->foto)',
			
			
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
array(
'class'=>'booster.widgets.TbButtonColumn',
'template'=>'{view}{update}{add}{tolak}{delete}',
'htmlOptions'=>array('width'=>100),
'buttons'=>array(
	'add'=>array(
		'label'=>'',
		'imageUrl'=>false, 
		//'label'=>'Terima',
		'url'=>'Yii::app()->createUrl("kegiatanMusrenbang/lanjutkan", array("id"=>$data->id))',
		'options'=>array('id'=>'lanjut','class'=>'fa fa-thumbs-o-up','title'=>'Terima usulan dan lanjutkan ke Musrenbang Kabupaten/Kota'),
		'visible'=>'($data->status == "" or $data->status=="tidak lanjut")',
	),
	'tolak'=>array(
		'label'=>'',
		'imageUrl'=>false, 
		//'label'=>'Terima',
		'url'=>'Yii::app()->createUrl("kegiatanMusrenbang/tidakLanjut", array("id"=>$data->id))',
		'options'=>array('id'=>'tidakLanjut','class'=>'fa fa-thumbs-o-down ','title'=>'Jangan lanjutkan usulan ke Musrenbang Kabupaten/Kota'),
		'visible'=>'($data->status == "lanjut")',
	),

),
),
),
)); ?>

</section>
