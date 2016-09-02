<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Forum SKPD'),
		
    )
);
$this->menu=array(
//array('label'=>'List Renja','url'=>array('index')),
	array('label'=>'Lihat Data yang dihapus','url'=>array('history'),'buttonType'=> 'link','context' => 'info','htmlOptions'=>array('id'=>'history')),
	array('label'=>'Simpan Hasil Forum SKPD','url'=>array('#'),'buttonType'=> 'link','context' => 'success','htmlOptions'=>array('id'=>'simpan_perubahan','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Simpan data perubahan pada forum SKPD agar data tersedia pada Musrenbang Kota", 'data-content'=>"Default popover",),'visible'=>Yii::app()->user->isAdminBappeda()),
	array('label'=>'Simpan Hasil Forum SKPD','url'=>array('#'),'buttonType'=> 'link','context' => 'success','htmlOptions'=>array('id'=>'simpan_perubahan_skpd','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Simpan data perubahan pada forum SKPD agar data tersedia pada Musrenbang Kota", 'data-content'=>"Default popover",),'visible'=>!Yii::app()->user->isAdminBappeda()),
);
?>
<?php 
Yii::app()->clientScript->registerScript('search', "
	$('#simpan_perubahan').click(function(){
			url = $(this).attr('href');
			waitingDialog.show();
			$.post('index.php?r=KegiatanMusrenbangKota/migrasiData&tahun=".Yii::app()->session['tahun_perencanaan']."',function(evt){
				//$('#dialog2 #modal_content').html(evt);
				
				//$('#dialog2 #tombolaksi').html('Tambah');
				waitingDialog.hide();
				//$('#dialog2').modal('show'); 
			});
		return false;
	});
	$('#simpan_perubahan_skpd').click(function(){
			url = $(this).attr('href');
			waitingDialog.show();
			$.post('index.php?r=KegiatanMusrenbangKota/migrasiDataSkpd&skpd=".Yii::app()->user->account->skpd."&tahun=".Yii::app()->session['tahun_perencanaan']."',function(evt){
				//$('#dialog2 #modal_content').html(evt);
				
				//$('#dialog2 #tombolaksi').html('Tambah');
				waitingDialog.hide();
				//$('#dialog2').modal('show'); 
			});
		return false;
	});
	$('#history').click(function(){
			url = $(this).attr('href');
			waitingDialog.show();
			$.post(url,function(evt){
				$('#dialog2 #modal_content').html(evt);
				
				$('#dialog2 #tombolaksi').html('Tambah');
				waitingDialog.hide();
				$('#dialog2').modal('show'); 
			});
		return false;
	});
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
	$('#renja-grid #verifikasiRenja').click(function(){
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
<h1> Forum SKPD</h1>
</section>
<section class="content">
<?php 
    $this->widget(
        'booster.widgets.TbTabs',
        array(
            'type' => 'tabs', // 'tabs' or 'pills'
            'tabs' => array(
                array(
                    'label' => 'Usulan Musrenbang',
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
                    'active' => true
                ),
                array('label' => 'Renja', 'content' => 
						'<br><div class="alert alert-warning">Data Renja yang tidak sesuai Renstra dan belum atau tidak disetujui Bappeda tidak ditampilkan di Forum SKPD</div>'.
						$this->widget('booster.widgets.TbGridView',array(
						'id'=>'renja-grid',
						'dataProvider'=>$modelRenja->searchForumSKPD(),
						'afterAjaxUpdate' => 'reinstallScript',
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
									//'filter'=>'',
									'name'=>'uraian',
									'value'=>'$data->uraian',
								),
								array(
									'class'=>'CDataColumn',
									'htmlOptions'=>array('width'=>150),
									'type'=>'raw',
									'filter'=>'',
									'name'=>'dana1',
									'value'=>'$data->dana1',
								),
								array(
									'class'=>'CDataColumn',
									'htmlOptions'=>array('width'=>150),
									'type'=>'raw',
									'filter'=>'',
									'name'=>'dana2',
									'value'=>'$data->dana2',
								),
								'indikator_kinerja',
								'sasaran_kegiatan',
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
						'template'=>'{view}{verifikasi}',
						'htmlOptions'=>array('width'=>100),
						'buttons'=>array(
							'verifikasi'=>array(
								'label'=>'',
								'imageUrl'=>false, 
								'url'=>'Yii::app()->createUrl("forumSkpd/VerifikasiRenja", array("id"=>$data->id))',
								'options'=>array('id'=>'verifikasiRenja','class'=>'glyphicon glyphicon-trash','title'=>'Data akan dihapus dari forum SKPD namun data masih akan ada di data Renja.'),
								//'visible'=>'($data->sumber_usulan == "Bukan Renstra" AND $data->status_verifikasi=="Diizinkan") or ($data->sumber_usulan=="Renstra")',
							),
							'view'=>array(
								'label'=>'',
								'imageUrl'=>false, 
								'url'=>'Yii::app()->createUrl("renja/view", array("id"=>$data->id))',
								'options'=>array('class'=>'glyphicon glyphicon-eye','title'=>'Detail'),
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