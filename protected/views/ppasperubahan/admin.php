<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('PPAS Perubahan'),
		
    )
);
$this->menu=array(
//array('label'=>'List Ppas','url'=>array('index')),
array('label'=>'Tambah PPAS Perubahan','url'=>array('create'),'buttonType'=> 'link','context' => 'info','htmlOptions'=>array('id'=>'btn_tambah')),
);

Yii::app()->clientScript->registerScript('search', "
$('#btn_tambah').click(function(){
		waitingDialog.show();
		$.post('index.php?r=ppasperubahan/modalForm',function(evt){
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
<h1>Data PPAS Perubahan</h1>

<p>
	<small>You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
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
			'name' => 'target',
			'sortable' => true,
			'editable' => array(
			'url' => $this->createUrl('ppasPerubahan/gridUpdate'),
				'placement' => 'right',
				'name'=>"target",
				'options' => array(
				 
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("ppas-grid");
				}',
				),
				'inputclass' => 'col-md-3'
			)
		),
		
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'sasaran',
			'sortable' => true,
			'editable' => array(
			'url' => $this->createUrl('ppasPerubahan/gridUpdate'),
				'placement' => 'right',
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"sasaran",
				'inputclass' => 'col-md-3',
				'options' => array(
				 
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("ppas-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'plafon_anggaran',
			//'value'=>'$data->plafon_anggaran2',
			'value' => 'CHtml::encode(number_format($data->plafon_anggaran))',
			'sortable' => true,
			'editable' => array(
			'url' => $this->createUrl('ppasPerubahan/gridUpdate'),
				'placement' => 'right',
				'name'=>"plafon_anggaran",
				'inputclass' => 'col-md-3',
				//'htmlOptions'=>array('data-value'=>'$data->plafon_anggaran2'),
				'options' => array(
				 
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("ppas-grid");
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'plafon_anggaran_setelah_perubahan',
			//'value'=>'$data->plafon_anggaran2',
			'value' => 'CHtml::encode(number_format($data->plafon_anggaran_setelah_perubahan))',
			'sortable' => true,
			'editable' => array(
			'url' => $this->createUrl('ppasPerubahan/gridUpdate'),
				'placement' => 'right',
				'name'=>"plafon_anggaran_setelah_perubahan",
				'inputclass' => 'col-md-3',
				//'htmlOptions'=>array('data-value'=>'$data->plafon_anggaran2'),
				'options' => array(
				 
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("ppas-grid");
				}',
				),
			)
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'selisih',
			'value'=>'$data->selisih',
			'filter'=> '',
			//'visible'=>Yii::app()->user->isAdminBappeda()
		),
       /* array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'plafon_anggaran',
			'value'=>'$data->plafon_anggaran2',
			//'filter'=> '',
		),*/
		/*
		'target',
		'plafon_anggaran',
		'skpd',
		'created_by',
		'created_date',
		'mod_by',
		'mod_date',
		'id_musrenbang_kota',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
),
),
)); ?>
</section>
