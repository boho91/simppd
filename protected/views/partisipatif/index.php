<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Partisipatif'),
		
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
<h1>Jalur Perencanaan Partisipatif</h1>
</section>
<section class="content">
<?php 
    $this->widget(
        'booster.widgets.TbTabs',
        array(
            'type' => 'tabs', // 'tabs' or 'pills'
            'tabs' => array(
					array(
                    'label' => 'Usulan Musrenbang Kelurahan',
                    'content' => 
					$this->widget('booster.widgets.TbGridView',array(
					'id'=>'kegiatan-musrenbang-kelurahan-grid',
					'dataProvider'=>$modelMusrenbangKelurahan->searchForumSKPD(),
					'afterAjaxUpdate' => 'reinstallScript',
					//'afterAjaxUpdate' => 'reinstallDatePicker',
					'filter'=>$modelMusrenbangKelurahan,
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
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'uraian',
								'value'=>'$data->uraian',
								//'filter'=> '',
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
								'filter'=> CHtml::listData(KegiatanMusrenbangKelurahan::model()->findAll(array('order'=>'sumber_usulan','group'=>'sumber_usulan','condition'=>'tahun="'.Yii::app()->session['tahun_perencanaan'].'"')), 'sumber_usulan', 'sumber_usulan'),
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
								'url'=>'Yii::app()->createUrl("kegiatanMusrenbangKelurahan/view", array("id"=>$data->id))',
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
                    'label' => 'Usulan Musrenbang Kecamatan',
                    'content' => 
					$this->widget('booster.widgets.TbGridView',array(
					'id'=>'kegiatan-musrenbang-grid',
					'dataProvider'=>$modelMusrenbang->searchForumSKPD(),
					'afterAjaxUpdate' => 'reinstallScript',
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
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'uraian',
								'value'=>'$data->uraian',
								//'filter'=> '',
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
								'filter'=> CHtml::listData(KegiatanMusrenbang::model()->findAll(array('order'=>'sumber_usulan','group'=>'sumber_usulan','condition'=>'tahun="'.Yii::app()->session['tahun_perencanaan'].'"')), 'sumber_usulan', 'sumber_usulan'),
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
					'template'=>'{view}{verifikasi}',
					'htmlOptions'=>array('width'=>100),
					'buttons'=>array(
							'verifikasi'=>array(
								'label'=>'',
								'imageUrl'=>false, 
								'url'=>'Yii::app()->createUrl("forumSkpd/VerifikasiMusrenbang", array("id"=>$data->id))',
								'options'=>array('id'=>'verifikasiMusrenbang','class'=>'glyphicon glyphicon-trash','title'=>'Data akan dihapus dari forum SKPD namun data masih akan ada di data Musrenbang.'),
								//'visible'=>'($data->sumber_usulan == "Bukan Renstra" AND $data->status_verifikasi=="Diizinkan") or ($data->sumber_usulan=="Renstra")',
							),
							'view'=>array(
								'label'=>'',
								'imageUrl'=>false, 
								'url'=>'Yii::app()->createUrl("kegiatanMusrenbang/view", array("id"=>$data->id))',
								'options'=>array('class'=>'glyphicon glyphicon-eye','title'=>'Detail'),
								//'visible'=>'($data->sumber_usulan == "Bukan Renstra" AND $data->status_verifikasi=="Diizinkan") or ($data->sumber_usulan=="Renstra")',
							),
						),
					),
					),
					),true) ,
                    
                ),
			
				
				array(
                    'label' => 'Usulan Musrenbang Kota',
                    'content' => 
					$this->widget('booster.widgets.TbGridView',array(
					'id'=>'kegiatan-musrenbang-kota-grid',
					'dataProvider'=>$modelMusrenbangKota->searchForumSKPD(),
					'afterAjaxUpdate' => 'reinstallScript',
					//'afterAjaxUpdate' => 'reinstallDatePicker',
					'filter'=>$modelMusrenbangKota,
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
							array(
								'class'=>'CDataColumn',
								'htmlOptions'=>array('width'=>150),
								'type'=>'raw',
								'name'=>'uraian',
								'value'=>'$data->uraian',
								//'filter'=> '',
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
								'filter'=> CHtml::listData(KegiatanMusrenbangKota::model()->findAll(array('order'=>'sumber_usulan','group'=>'sumber_usulan','condition'=>'tahun="'.Yii::app()->session['tahun_perencanaan'].'"')), 'sumber_usulan', 'sumber_usulan'),
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
								'url'=>'Yii::app()->createUrl("kegiatanMusrenbangKota/view", array("id"=>$data->id))',
								'options'=>array('class'=>'glyphicon glyphicon-eye','title'=>'Detail'),
								//'visible'=>'($data->sumber_usulan == "Bukan Renstra" AND $data->status_verifikasi=="Diizinkan") or ($data->sumber_usulan=="Renstra")',
							),
						),
					),
					),
					),true) ,
                    
                ),
				array(
                    'label' => 'Forum SKPD',),
				array(
                    'label' => 'Forum Konsultasi Publik',),
                
				
				
				
				
				
				
            ),
        )
    );
?>
</section>