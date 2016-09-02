<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Kegiatan Rpjmd'),
		
    )
);
$this->menu=array(
//array('label'=>'List Renstra','url'=>array('index')),
array('label'=>'Tambah Rencana Program RPJMD','url'=>array('#'),'buttonType'=> 'link','context' => 'info','htmlOptions'=>array('id'=>'btn_tambah')),
);

Yii::app()->clientScript->registerScript('search', "
$('#btn_tambah').click(function(){
	waitingDialog.show();
	$.post('index.php?r=kegiatanRpjmd/modalForm&skpd=".$model->skpd."',function(evt){
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
$.fn.yiiGridView.update('kegiatan-rpjmd-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>INDIKASI RENCANA PROGRAM PRIORITAS YANG DISERTAI KEBUTUHAN </h1>

<p>
	
</p>

</section>
<section class="content">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'kegiatan-rpjmd-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>170),
			'type'=>'raw',
			'name'=>'skpd',
			'value'=>'$data->skpd_->nama_skpd',
			'filter'=> CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')), 'id', 'nama_skpd'),
			'visible'=>Yii::app()->user->isAdminBappeda()
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>200),
			'type'=>'raw',
			'name'=>'skpd',
			'value'=>'$data->skpd_->nama_skpd',
			'filter'=> '',
			'visible'=>!Yii::app()->user->isAdminBappeda()
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'kegiatan',
			'value'=>'$data->kegiatan_->kegiatan',
			'filter'=> CHtml::listData(Kegiatan::model()->findAll(array('order'=>'kegiatan')), 'id', 'kegiatan'),
			//'visible'=>Yii::app()->user->isAdminBappeda()
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'indikator_kinerja',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"indikator_kinerja",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'kondisi_kinerja_awal',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"kondisi_kinerja_awal",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'dana_tahun1',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'value' => 'CHtml::encode(number_format($data->dana_tahun1))',
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"dana_tahun1",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'target_tahun1',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"target_tahun1",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'dana_tahun2',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'value' => 'CHtml::encode(number_format($data->dana_tahun2))',
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"dana_tahun2",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'target_tahun2',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"target_tahun2",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'dana_tahun3',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'value' => 'CHtml::encode(number_format($data->dana_tahun3))',
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"dana_tahun3",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'target_tahun3',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"target_tahun3",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'dana_tahun4',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'value' => 'CHtml::encode(number_format($data->dana_tahun4))',
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"dana_tahun4",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'target_tahun4',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"target_tahun4",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'dana_tahun5',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'value' => 'CHtml::encode(number_format($data->dana_tahun5))',
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"dana_tahun5",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'target_tahun5',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"target_tahun5",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'dana_akhir',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'value' => 'CHtml::encode(number_format($data->dana_akhir))',
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"dana_akhir",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'target_akhir',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"target_akhir",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'satuan_target_kinerja',
			'sortable' => true,
			'filter'=> '',
			
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
			'type' => 'text',
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"satuan_target_kinerja",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'id_rpjmd',
			'sortable' => true,
			'filter'=> '',
			
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
			'type' => 'select',
			'source'=>$this->createUrl('rpjmd/getvalues'),
			'url' => $this->createUrl('kegiatanRpjmd/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"id_rpjmd",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'left',
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kegiatan-rpjmd-grid");
				}',
				),
			)
		),
		
		/*
		'tahun',
		'indikator_kinerja',
		'kondisi_kinerja_awal',
		'id_rpjmd',
		'target_tahun1',
		'dana_tahun1',
		'target_tahun2',
		'dana_tahun2',
		'target_tahun3',
		'dana_tahun3',
		'target_tahun4',
		'dana_tahun4',
		'target_tahun5',
		'dana_tahun5',
		'target_akhir',
		'dana_akhir',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'template'=>'{delete}',
'htmlOptions'=>array('width'=>100),
),
),
)); ?>
</section>
