<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Politis'),
		
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
<h1> Jalur Perencanaan Politis</h1>
</section>
<section class="content">
<?php 
    $this->widget(
        'booster.widgets.TbTabs',
        array(
            'type' => 'tabs', // 'tabs' or 'pills'
            'tabs' => array(
					array(
                    'label' => 'Usulan Kegiatan RPJMD',
                    'content' => 
					$this->widget('booster.widgets.TbGridView',array(
					'id'=>'kegiatan-rjmd-grid',
					'dataProvider'=>$modelRpjmd->searchForumSKPD(),
					'afterAjaxUpdate' => 'reinstallScript',
					//'afterAjaxUpdate' => 'reinstallDatePicker',
					'filter'=>$modelRpjmd,
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
								'name'=>'program',
								'value'=>'$data->program_->program',
								'filter'=> CHtml::listData(Program::model()->findAll(array('order'=>'program')), 'id', 'program'),
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'kegiatan',
								'value'=>'$data->kegiatan_->kegiatan',
								'filter'=> CHtml::listData(Kegiatan::model()->findAll(array('order'=>'kegiatan')), 'id', 'kegiatan'),
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
								'name'=>'kondisi_kinerja_awal',
								'value'=>'$data->kondisi_kinerja_awal',
								//'filter'=> '',
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'filter'=>'',
								'name'=>'kondisi_kinerja_awal',
								'value'=>'$data->kondisi_kinerja_awal',
							),
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'target_tahun1',
								'value'=>'$data->target_tahun1',
								'filter'=>'',
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
								'name'=>'target_tahun2',
								'value'=>'$data->target_tahun2',
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
								'url'=>'Yii::app()->createUrl("kegiatanRpjmd/view", array("id"=>$data->id))',
								'options'=>array('class'=>'glyphicon glyphicon-eye','title'=>'Detail'),
								//'visible'=>'($data->sumber_usulan == "Bukan Renstra" AND $data->status_verifikasi=="Diizinkan") or ($data->sumber_usulan=="Renstra")',
							),
						),
					),
					),
					),true) ,
					'active' => true
                   
                ),
			
               
			
				
				
                
				
				
				
				
				
				
            ),
        )
    );
?>
</section>