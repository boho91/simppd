<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('SPM'),
		
    )
);
$this->menu=array(
//array('label'=>'List Desa','url'=>array('index')),
array('label'=>'Tambah SPM','url'=>array('create'),'buttonType'=> 'link','context' => 'info',),
array('label'=>'Cetak SPM','url'=>array('spmpdf'),'buttonType'=> 'link','context' => 'success','htmlOptions'=>array('target'=>'_BLANK')),
array('label'=>'Export SPM','url'=>array('spmexcel'),'buttonType'=> 'link','context' => 'warning','htmlOptions'=>array('target'=>'_BLANK')),
);

Yii::app()->clientScript->registerScript('search', "
$('#btn_tambah').click(function(){
	waitingDialog.show();
	$.post('index.php?r=spm/modalForm',function(evt){
		$('#dialog2 #modal_content').html(evt);
		$('#dialog2 #tombolaksi').html('Tambah');
		waitingDialog.hide();
		$('#dialog2').modal('show'); 
		
	});
	
	return false;
});


$('.search-form form').submit(function(){
$.fn.yiiGridView.update('spm-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Data SPM</h1>

<p>
	<small>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</small>
</p>
	<?php
$this->breadcrumbs=array(
		'SPM'=>array('index'),
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
'id'=>'spm-grid',
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
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'kd_pelayanan_dasar',
			'value'=>'$data->pelayanan_dasar_->pelayanan_dasar',
			'filter'=> CHtml::listData(PelayananDasar::model()->findAll(array('order'=>'pelayanan_dasar')), 'id', 'pelayanan_dasar'),
			'visible'=>Yii::app()->user->isAdminBappeda()
		),
		'indikator',
		'nilai',
		'batas_waktu',
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
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
),
),
)); ?>
</section>
