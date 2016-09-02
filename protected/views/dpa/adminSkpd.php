<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Data DPA'),
		
    )
);
$this->menu=array(
//array('label'=>'List KegiatanMusrenbang','url'=>array('index')),
array('label'=>'Tambah DPA','url'=>array('create'),'buttonType'=> 'link','context' => 'info','htmlOptions'=>array('id'=>'btn_tambah')),
);

Yii::app()->clientScript->registerScript('search', "
$('#btn_tambah').click(function(){
	waitingDialog.show();
	$.post('index.php?r=dpa/modalForm',function(evt){
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
<h1>Data DPA</h1>

<p>
	<small>
	</small>
</p>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
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
			 'value' => 'CHtml::link($data->skpd_->nama_skpd, Yii::app()->createUrl("dpa/admin",array("skpd"=>$data->skpd)))',
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
			'name'=>'alokasiAnggaran',
			'value'=>function($data){
				echo AplikasiKomponen::uang(Rka::model()->getPaguPerSkpd($data->skpd,$data->tahun));
			},
			'footer'=>"".AplikasiKomponen::uang(Rka::model()->getPaguTotalPerTahun(Yii::app()->session['tahun_perencanaan'])),
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
