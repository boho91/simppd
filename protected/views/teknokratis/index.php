<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Teknokratis'),
		
    )
);

?>
<?php 
Yii::app()->clientScript->registerScript('search', "
	
	function reinstallScript(id, data) {
	$('#kegiatan-musrenbang-grid #verifikasiMusrenbang').click(function(){
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
");
?>
<section class="content-header">
<h1> Jalur Perencanaan Teknokratis</h1>
</section>
<section class="content">
<?php 
    $this->widget(
        'booster.widgets.TbTabs',
        array(
            'type' => 'tabs', // 'tabs' or 'pills'
            'tabs' => array(
					array(
                    'label' => 'Renja',
                    'content' => 
					$this->widget('booster.widgets.TbGridView',array(
					'id'=>'renja-grid',
					'dataProvider'=>$modelRenja->searchForumSKPD(),
					'afterAjaxUpdate' => 'reinstallScript',
					//'afterAjaxUpdate' => 'reinstallDatePicker',
					'filter'=>$modelRenja,
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
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'urusan',
								'value'=>'$data->urusan_->urusan',
								'filter'=> CHtml::listData(Urusan::model()->findAll(array('order'=>'urusan')), 'id', 'urusan'),
							),
							
							//'kd_bidang',
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'bidang',
								'value'=>'$data->bidang_->bidang',
								'filter'=> CHtml::listData(Bidang::model()->findAll(array('order'=>'bidang')), 'id', 'bidang'),
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'kelurahan',
								'value'=>'$data->kelurahan_->kelurahan',
								'filter'=> CHtml::listData(Kelurahan::model()->findAll(array('order'=>'kelurahan')), 'id', 'kelurahan'),
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'kecamatan',
								'value'=>'$data->kecamatan_->kecamatan',
								'filter'=> CHtml::listData(Kecamatan::model()->findAll(array('order'=>'kecamatan')), 'id', 'kecamatan'),
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'indikator_kinerja',
								'value'=>'$data->indikator_kinerja',
								//'filter'=> '',
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'sasaran_kegiatan',
								'value'=>'$data->sasaran_kegiatan',
								//'filter'=> '',
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'filter'=>'',
								'name'=>'target_capaian_kinerja',
								'value'=>'$data->target_capaian_kinerja',
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'dana1',
								'value'=>'$data->dana1',
								'filter'=>'',
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'dana2',
								'value'=>'$data->dana2',
								'filter'=>'',
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
					'template'=>'{view}',
					'htmlOptions'=>array('width'=>100),
					'buttons'=>array(
							
							'view'=>array(
								'label'=>'',
								'imageUrl'=>false, 
								'url'=>'Yii::app()->createUrl("Renja/view", array("id"=>$data->id))',
								'options'=>array('class'=>'glyphicon glyphicon-eye','title'=>'Detail'),
								//'visible'=>'($data->sumber_usulan == "Bukan Renstra" AND $data->status_verifikasi=="Diizinkan") or ($data->sumber_usulan=="Renstra")',
							),
						),
					),
					),
					),true) ,
					'active' => true
                   
                ),
				
				
				array(
                    'label' => 'Renstra',
                    'content' => 
					$this->widget('booster.widgets.TbGridView',array(
					'id'=>'renstra-grid',
					'dataProvider'=>$modelRenstra->searchForumSKPD(),
					'afterAjaxUpdate' => 'reinstallScript',
					//'afterAjaxUpdate' => 'reinstallDatePicker',
					'filter'=>$modelRenstra,
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
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'urusan',
								'value'=>'$data->urusan_->urusan',
								'filter'=> CHtml::listData(Urusan::model()->findAll(array('order'=>'urusan')), 'id', 'urusan'),
							),
							
							//'kd_bidang',
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'bidang',
								'value'=>'$data->bidang_->bidang',
								'filter'=> CHtml::listData(Bidang::model()->findAll(array('order'=>'bidang')), 'id', 'bidang'),
							),
							
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'indikator_kinerja_program_dan_kegiatan',
								'value'=>'$data->indikator_kinerja_program_dan_kegiatan',
								//'filter'=> '',
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'sasaran_pembangunan',
								'value'=>'$data->sasaran_pembangunan',
								//'filter'=> '',
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'filter'=>'',
								'name'=>'indikator_sasaran',
								'value'=>'$data->indikator_sasaran',
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'pagu1',
								'value'=>'$data->pagu1',
								'filter'=>'',
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'pagu2',
								'value'=>'$data->pagu2',
								'filter'=>'',
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'pagu3',
								'value'=>'$data->pagu3',
								'filter'=>'',
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'pagu4',
								'value'=>'$data->pagu4',
								'filter'=>'',
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'pagu5',
								'value'=>'$data->pagu5',
								'filter'=>'',
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
					'template'=>'{view}',
					'htmlOptions'=>array('width'=>100),
					'buttons'=>array(
							
							'view'=>array(
								'label'=>'',
								'imageUrl'=>false, 
								'url'=>'Yii::app()->createUrl("Renja/view", array("id"=>$data->id))',
								'options'=>array('class'=>'glyphicon glyphicon-eye','title'=>'Detail'),
								//'visible'=>'($data->sumber_usulan == "Bukan Renstra" AND $data->status_verifikasi=="Diizinkan") or ($data->sumber_usulan=="Renstra")',
							),
						),
					),
					),
					),true) ,
					
                   
                ),
			
   	
				
            ),
        )
    );
?>
</section>