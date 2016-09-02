
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
	$('#renja-tolak-grid #undo').click(function(){
		
			url = $(this).attr('href');
			waitingDialog.show();
			$.post(url,function(evt){
				$.fn.yiiGridView.update('renja-tolak-grid');
				$.fn.yiiGridView.update('renja-grid');
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
	jQuery('#renja-tolak-grid').yiiGridView({'ajaxUpdate':['renja-tolak-grid'],'ajaxVar':'ajax','pagerClass':'no-class','loadingClass':'grid-view-loading','filterClass':'filters','tableClass':'items table','selectableRows':1,'enableHistory':false,'updateSelector':'{page}, {sort}','filterSelector':'{filter}','pageVar':'Renja_page','afterAjaxUpdate':function() {
				reinstallScript();
			}});
	jQuery('#yw2').tab('show');
	reinstallScript();
});
	
</script>
<section class="content-header">
<h5> Data Forum SKPD yang Dihapus</h5>
</section>
<section class="content">
<?php 
    $this->widget(
        'booster.widgets.TbTabs',
        array(
			'id'=>'history',
            'type' => 'tabs', // 'tabs' or 'pills'
            'tabs' => array(
                array(
                    'label' => 'Usulan Musrenbang',
                    'content' => 
					$this->widget('booster.widgets.TbGridView',array(
					'id'=>'kegiatan-musrenbang-tolak-grid',
					'dataProvider'=>$modelMusrenbang->searchForumSKPDDitolak(),
					//'afterAjaxUpdate' => 'reinstallDatePicker',
					'filter'=>$modelMusrenbang,
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
								'name'=>'keterangan_forum_skpd',
								'value'=>'$data->keterangan_forum_skpd',
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
								'url'=>'Yii::app()->createUrl("forumSkpd/undoMusrenbang", array("id"=>$data->id))',
								'options'=>array('id'=>'undo','class'=>'fa fa-reply','title'=>'Undo'),
								//'visible'=>'($data->sumber_usulan == "Bukan Renstra" AND $data->status_verifikasi=="Diizinkan") or ($data->sumber_usulan=="Renstra")',
							),
							
						),
						),
					),
					),true) ,
                    'active' => true
                ),
                array('label' => 'Renja', 'content' => 
						$this->widget('booster.widgets.TbGridView',array(
						'id'=>'renja-tolak-grid',
						'dataProvider'=>$modelRenja->searchForumSKPDDitolak(),
						'filter'=>$modelRenja,
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
									//'filter'=> CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')), 'id', 'nama_skpd'),
									'visible'=>Yii::app()->user->isAdminBappeda(),
									'filter'=>'',
								),
								array(
									'class'=>'CDataColumn',
									'htmlOptions'=>array('width'=>150),
									'type'=>'raw',
									'name'=>'skpd',
									'value'=>'$data->skpd_->nama_skpd',
									'filter'=> '',
									'visible'=>!Yii::app()->user->isAdminBappeda(),
									'filter'=>'',
								),
								array(
									'class'=>'CDataColumn',
									'htmlOptions'=>array('width'=>150),
									'type'=>'raw',
									//'filter'=>'',
									'name'=>'uraian',
									'value'=>'$data->uraian',
								//	'filter'=>'',
								),
								array(
									'class'=>'CDataColumn',
									'htmlOptions'=>array('width'=>150),
									'type'=>'raw',
									'filter'=>'',
									'name'=>'dana1',
									'value'=>'$data->dana1',
									'filter'=>'',
								),
								array(
									'class'=>'CDataColumn',
									'htmlOptions'=>array('width'=>150),
									'type'=>'raw',
									'filter'=>'',
									'name'=>'dana2',
									'value'=>'$data->dana2',
									'filter'=>'',
								),
								
								array(
									'class'=>'CDataColumn',
									'htmlOptions'=>array('width'=>150),
									'type'=>'raw',
									'name'=>'keterangan_forum_skpd',
									'value'=>'$data->keterangan_forum_skpd',
									'filter'=>'',
									//'filter'=> CHtml::listData(KegiatanMusrenbang::model()->findAll(array('order'=>'sumber_usulan','group'=>'sumber_usulan','condition'=>'tahun="'.Yii::app()->session['tahun_perencanaan'].'"')), 'sumber_usulan', 'sumber_usulan'),
								),
								/*array(
									'class'=>'CDataColumn',
									'htmlOptions'=>array('width'=>150),
									'type'=>'raw',
									'name'=>'status_verifikasi',
									'value'=>'$data->status_verifikasi',
									'filter'=> '',
								),
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
						'template'=>'{undo}',
						'htmlOptions'=>array('width'=>100),
						'buttons'=>array(
							'undo'=>array(
								'label'=>'',
								'imageUrl'=>false, 
								'url'=>'Yii::app()->createUrl("forumSkpd/undoRenja", array("id"=>$data->id))',
								'options'=>array('id'=>'undo','class'=>'fa fa-reply','title'=>'Undo'),
								//'visible'=>'($data->sumber_usulan == "Bukan Renstra" AND $data->status_verifikasi=="Diizinkan") or ($data->sumber_usulan=="Renstra")',
							),
							
						),
						),
						),
						),true)),
            ),
        )
    );
?>
</section>