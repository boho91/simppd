<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Kegiatan Musrenbang Kota'),
		
    )
);
$this->menu=array(
//array('label'=>'List KegiatanMusrenbang','url'=>array('index')),
array('label'=>'Tambah Usulan Musrenbang Kota','url'=>array('create'),'buttonType'=> 'link','context' => 'info','htmlOptions'=>array('id'=>'btn_tambah')),
array('label'=>'Lihat Data yang dihapus','url'=>array('history'),'buttonType'=> 'link','context' => 'warning','htmlOptions'=>array('id'=>'history')),
array('label'=>'Simpan Hasil Musrenbang Kota','url'=>array('ppas/migrasi','skpd'=>$skpd),'buttonType'=> 'link','context' => 'success','htmlOptions'=>array('id'=>'migrasiData')),
);

Yii::app()->clientScript->registerScript('search', "
$('#migrasiData').click(function(){
			url = $(this).attr('href');
			waitingDialog.show();
			url = $(this).attr('href');
			$.post(url,function(evt){
				//$('#dialog2 #modal_content').html(evt);
				
				//$('#dialog2 #tombolaksi').html('Tambah');
				waitingDialog.hide();
				//$('#dialog2').modal('show'); 
			});
		return false;
});
function reinstallScript(id, data) {
    $('#kegiatan-musrenbang-grid #verifikasi').click(function(){
		if(confirm('Anda yakin?'))
		{
			url = $(this).attr('href');
			waitingDialog.show();
			$.post(url,function(evt){
				$('#dialog2 #modal_content').html(evt);
				
				$('#dialog2 #tombolaksi').html('Tambah');
				waitingDialog.hide();
				$('#dialog2').modal('show'); 
				
			});
		}
		return false;
	});
}
reinstallScript();
	$('#history').click(function(){
			url = $(this).attr('href');
			waitingDialog.show();
			$.post(url,function(evt){
				$('#dialog2 #modal_content').html(evt);
				
				$('#dialog2 #tombolaksi').html('Tambah');
				waitingDialog.hide();
				$('#dialog2').modal('show'); 
			});
		return false;
	});
	
	$('#btn_tambah').click(function(){
		waitingDialog.show();
		$.post('index.php?r=kegiatanMusrenbangKota/modalForm',function(evt){
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
	$.fn.yiiGridView.update('kegiatan-musrenbang-grid', {
	data: $(this).serialize()
	});
	return false;
	});
");
?>
<section class="content-header">
<h1>Data Usulan Musrenbang Kota</h1>

<p>
	<small>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</small>
</p>
	<?php
$this->breadcrumbs=array(
		'Usulan Musrenbang Kota'=>array('index'),
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
'afterAjaxUpdate' => 'reinstallScript',
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
		'uraian',
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
			'filter'=>'',
			'name'=>'foto',
			'value'=>'CHtml::link("[lihat foto]", Yii::app()->createUrl("kegiatanMusrenbangKota/foto",array("id"=>$data->id)))',
			//'value' => 'CHtml::image(Yii::app()->baseUrl . "/foto/" . $data->foto)',
			
			
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'sumber_usulan',
			'value'=>'$data->sumber_usulan',
			'filter'=> CHtml::listData(KegiatanMusrenbangKota::model()->findAll(array('order'=>'sumber_usulan','group'=>'sumber_usulan')), 'sumber_usulan', 'sumber_usulan'),
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
	'template'=>'{view}{update}{verifikasi}',
	'htmlOptions'=>array('width'=>100),
	'buttons'=>array(
		'verifikasi'=>array(
		'label'=>'',
		'imageUrl'=>false, 
		'url'=>'Yii::app()->createUrl("kegiatanMusrenbangKota/Verifikasi", array("id"=>$data->id))',
		'options'=>array('id'=>'verifikasi','class'=>'glyphicon glyphicon-trash','title'=>'Data akan dihapus dari Musrenbang Kota namun data masih akan ada di data Renja dan Musrenbang.'),
		//'visible'=>'($data->sumber_usulan == "Bukan Renstra" AND $data->status_verifikasi=="Diizinkan") or ($data->sumber_usulan=="Renstra")',
		),
	),
),
),
)); ?>

</section>
