
<script>
jQuery(function($) {
	function reinstallScript(id, data) {
	$('#kegiatan-musrenbang-tolak-grid #undo').click(function(){
		
			url = $(this).attr('href');
			waitingDialog.show();
			$.post(url,function(evt){
				$.fn.yiiGridView.update('kegiatan-musrenbang-grid');
				$.fn.yiiGridView.update('kegiatan-musrenbang-tolak-grid');
				waitingDialog.hide();
			});
		
		return false;
	});
	}
	jQuery('[data-toggle=popover]').popover();
	jQuery('[data-toggle=tooltip]').tooltip();
	$('#dialog2 #tombolaksi').hide();
	
	jQuery('#kegiatan-musrenbang-tolak-grid').yiiGridView({'ajaxUpdate':['kegiatan-musrenbang-tolak-grid'],'ajaxVar':'ajax','pagerClass':'no-class','loadingClass':'grid-view-loading','filterClass':'filters','tableClass':'items table','selectableRows':1,'enableHistory':false,'updateSelector':'{page}, {sort}','filterSelector':'{filter}','pageVar':'KegiatanMusrenbang_page','afterAjaxUpdate':function() {
			
			reinstallScript();
		}});
	
	jQuery('#yw2').tab('show');
	reinstallScript();
});
	
</script>
<section class="content-header">
<h5> Data Kegiatan Musrenbang Kota yang Dihapus</h5>
</section>
<section class="content">
<?php 	
	$this->widget('booster.widgets.TbGridView',array(
					'id'=>'kegiatan-musrenbang-tolak-grid',
					'afterAjaxUpdate' => 'reinstallScript',
					'dataProvider'=>$model->searchDitolak(),
					//'afterAjaxUpdate' => 'reinstallDatePicker',
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
								//'filter'=> CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')), 'id', 'nama_skpd'),
								'visible'=>Yii::app()->user->isAdminBappeda(),
								'filter'=>'',
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
								'name'=>'uraian',
								'value'=>'$data->uraian',
								//'filter'=> '',
								//'visible'=>!Yii::app()->user->isAdminBappeda()
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'kecamatan',
								'value'=>'$data->kecamatan_->kecamatan',
								'filter'=>'',
								//'filter'=> CHtml::listData(Kecamatan::model()->findAll(array('order'=>'kecamatan')), 'id', 'kecamatan'),
							),
							
							//'kd_bidang',
							
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
								'filter'=>'',
								//'filter'=> CHtml::listData(KegiatanMusrenbang::model()->findAll(array('order'=>'sumber_usulan','group'=>'sumber_usulan','condition'=>'tahun="'.Yii::app()->session['tahun_perencanaan'].'"')), 'sumber_usulan', 'sumber_usulan'),
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'keterangan_status_usulan',
								'value'=>'$data->keterangan_status_usulan',
								'filter'=>'',
								//'filter'=> CHtml::listData(KegiatanMusrenbang::model()->findAll(array('order'=>'sumber_usulan','group'=>'sumber_usulan','condition'=>'tahun="'.Yii::app()->session['tahun_perencanaan'].'"')), 'sumber_usulan', 'sumber_usulan'),
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
						'template'=>'{undo}',
						'htmlOptions'=>array('width'=>100),
						'buttons'=>array(
							'undo'=>array(
								'label'=>'',
								'imageUrl'=>false, 
								'url'=>'Yii::app()->createUrl("kegiatanMusrenbangKota/undoMusrenbang", array("id"=>$data->id))',
								'options'=>array('id'=>'undo','class'=>'fa fa-reply','title'=>'Undo'),
								//'visible'=>'($data->sumber_usulan == "Bukan Renstra" AND $data->status_verifikasi=="Diizinkan") or ($data->sumber_usulan=="Renstra")',
							),
							
						),
						),
					),
					))?> 
</section>