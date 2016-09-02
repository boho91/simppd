<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Kua Perubahan'),
		
    )
);
$this->menu=array(
//array('label'=>'List Kua','url'=>array('index')),
array('label'=>'Tambah Kua Perubahan','url'=>array('create'),'buttonType'=> 'link','context' => 'info','htmlOptions'=>array('id'=>'btn_tambah')),
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
$.fn.yiiGridView.update('kua-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Data Kua Perubahan</h1>

<p>
	<small>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
	</small>
</p>

</section>
<section class="content">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'kua-grid',
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
			'htmlOptions'=>array('width'=>250),
			'type'=>'raw',
			'name'=>'kegiatan',
			'value'=>'$data->kegiatan_->kegiatan',
			'filter'=> '',
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'pagu_sebelum_perubahan',
			'sortable' => true,
			'value' => 'CHtml::encode(number_format($data->pagu_sebelum_perubahan))',
			'editable' => array(
			'url' => $this->createUrl('kuaPerubahan/gridUpdate'),
				'placement' => 'right',
				'name'=>"pagu_sebelum_perubahan",
				'options' => array(
				 
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kua-grid");
				}',
				),
				'inputclass' => 'col-md-3'
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'pagu_setelah_perubahan',
			'sortable' => true,
			'value' => 'CHtml::encode(number_format($data->pagu_setelah_perubahan))',
			'editable' => array(
			'url' => $this->createUrl('kuaPerubahan/gridUpdate'),
				'placement' => 'right',
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"pagu_setelah_perubahan",
				'inputclass' => 'col-md-3',
				'options' => array(
				 
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("kua-grid");
				}',
				),
			)
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'selisih',
			'value'=>'$data->selisih',
			//'footer'=>"".$model->selisihDariTotal(Yii::app()->session['tahun_perencanaan']),
		),
		/*
		'pagu_tahun_n_min_1',
		'pagu_tahun_n',
		'created_by',
		'created_date',
		'mod_by',
		'mod_date',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
),
),
)); ?>
</section>
