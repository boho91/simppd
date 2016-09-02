<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
	array(
        'links' => array(
						'Realisasi Fisik dan Keuangan DPA'=> array('admin'),
						$modelSkpd->nama_skpd=>array('adminUrusan','skpd'=>$modelSkpd->id),
						$modelProgram->bidang_->urusan_->urusan=>array('adminBidang','skpd'=>$modelSkpd->id,'urusan'=>$modelProgram->bidang_->urusan_->id),
						$modelProgram->bidang_->bidang=>array('adminProgram','skpd'=>$modelSkpd->id,'urusan'=>$modelProgram->bidang_->urusan_->id,'bidang'=>$modelProgram->bidang_->id),
						$modelProgram->program=>array('adminKegiatan','skpd'=>$modelSkpd->id,'urusan'=>$modelProgram->bidang_->urusan_->id,'bidang'=>$modelProgram->bidang_->id,'program'=>$modelProgram->id),
						$modelKegiatan->kegiatan_->kegiatan,
						),		
    )
    
);


Yii::app()->clientScript->registerScript('search', "

$('#rka-id #evaluasiDpa').click(function(){
	waitingDialog.show();
	url = $(this).attr('href');
	$.post(url,function(evt){
		$('#dialog2 #modal_content').html(evt);
		
		$('#dialog2 #tombolaksi').hide();
		waitingDialog.hide();
		$('#dialog2').modal('show'); 
		$('#dialog2 .modal-title').html('Form Realisasi Fisik Dan Keuangan DPA Sumber DAK');
	});
	
	return false;
});
$('#rka-id #historyDpa').click(function(){
	waitingDialog.show();
	url = $(this).attr('href');
	$.post(url,function(evt){
		$('#dialog2 #modal_content').html(evt);		
		$('#dialog2 #tombolaksi').hide();
		waitingDialog.hide();
		$('#dialog2').modal('show'); 
		$('#dialog2 .modal-title').html('Riwayat Realisasi Fisik Dan Keuangan DPA Sumber DAK');
	});
	
	return false;
});

/*$('#dialog2 #tombolaksi').click(function(){
	bulan = $(this).parent().parent().find('#bulan').val();
	harga_satuan = $(this).parent().parent().find('#harga_satuan_text').val();
	volume = $(this).parent().parent().find('#volume').val();
	realisasi_fisik = $(this).parent().parent().find('#realisasi_fisik').val();
	realisasi_keuangan = $(this).parent().parent().find('#realisasi_keuangan_text').val();
	if($.trim(bulan)=='' || $.trim(harga_satuan)=='' || $.trim(volume)=='' || $.trim(realisasi_fisik)=='' || $.trim(realisasi_keuangan)=='')
	{
		alert('Isi data dengan lengkap!');
	}else
		$(this).parent().parent().find('form').submit();
});*/
$('#rka-id #evaluasiDpaPerubahan').click(function(){
	waitingDialog.show();
	url = $(this).attr('href');
	$.post(url,function(evt){
		$('#dialog2 #modal_content').html(evt);
		$('#dialog2 #tombolaksi').hide();
		$('#dialog2 #tombolaksi').html('Tambah');
		waitingDialog.hide();
		$('#dialog2').modal('show'); 
		
	});
	
	return false;
});
$('#rka-id #form2').click(function(){
	waitingDialog.show();
	url = $(this).attr('href');
	$.post(url,function(evt){
		$('#dialog2 #modal_content').html(evt);
		$('#dialog2 #tombolaksi').hide();
		$('#dialog2 #tombolaksi').html('Tambah');
		waitingDialog.hide();
		$('#dialog2').modal('show'); 
		$('#dialog2 .modal-title').html('LAPORAN KEMAJUAN  DANA ALOKASI KHUSUS');
	});
	
	return false;
});
");
?>
<section class="content-header">
<h1>Realisasi Fisik dan Keuangan DPA Sumber Dana Alokasi Khusus</h1>

</section>
<section class="content">
<div class='col-md-12'>
<?php 
    $this->widget(
        'booster.widgets.TbTabs',
        array(
            'type' => 'tabs', // 'tabs' or 'pills'
            'tabs' => array(
               
                array('label' => 'DPA', 'active' => true, 'content' => 
				$this->widget('ext.SilcomTreeGridView.SilcomTreeGridView', array(
                'id'=>'rka-id',
				'enableSorting' => false,
                'treeViewOptions'=>array(
                    'initialState'=>'expanded',
                    'expandable'=>true,
                ),
				'ajaxUpdate' => false,
                'parentColumn'=>'parent_id',
				
                'dataProvider'=>$modelDpa->search(),
                'columns'=>
						array(
							array(
							'class'=>'CDataColumn',
							'htmlOptions'=>array('width'=>350),
							'type'=>'raw',
							'filter'=> '',
							'name'=>'uraianKegiatan',
							'value'=>'$data->uraianKegiatan',
							'filter'=> '',
						),
						array(
							'class'=>'CDataColumn',
							'htmlOptions'=>array('width'=>100),
							'type'=>'raw',
							'filter'=> '',
							'name'=>'nama_program',
							'value'=>'$data->nama_program',
							'filter'=> '',
						),
						array(
							'class'=>'CDataColumn',
							'htmlOptions'=>array('width'=>100),
							'type'=>'raw',
							'filter'=> '',
							'name'=>'nama_kegiatan',
							'value'=>'$data->nama_kegiatan',
							'filter'=> '',
						),
						array(
							'class'=>'CDataColumn',
							'htmlOptions'=>array('width'=>100),
							'type'=>'raw',
							'filter'=> '',
							'name'=>'volume',
							'filter'=> '',
						),
						array(
							'class'=>'CDataColumn',
							'htmlOptions'=>array('width'=>100),
							'type'=>'raw',
							'filter'=> '',
							'name'=>'harga_satuan',
							'value'=> 'AplikasiKomponen::uang($data->harga_satuan)',
							'filter'=> '',
						),
						array(
						'name' => 'harga_satuan_kegiatan',
						'filter'=>'',
						'htmlOptions'=>array('width'=>'120'),
						'value'=>'AplikasiKomponen::uang($data->harga_satuan_kegiatan)',
						),
						array(
						'header' => 'Realisasi Keuangan',
						'type'=>'raw',
						'filter'=>'',
						'htmlOptions'=>array('width'=>'120'),
						'value'=>function($data)
						{
							if($data->level=="item")
								echo AplikasiKomponen::uang(RealisasiFisikDanKeuanganDakDpa::model()->get_realisasi_keuangan($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program,$data->kegiatan,0,$data->id));
							elseif($data->level=="parent1")
								echo AplikasiKomponen::uang(RealisasiFisikDanKeuanganDakDpa::model()->get_realisasi_keuangan($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program,$data->kegiatan,0,null));
						}
						),
						array(
						'header' => 'Realisasi Fisik',
						'type'=>'raw',
						'filter'=>'',
						'htmlOptions'=>array('width'=>'120'),
						'value'=>function($data)
						{
							if($data->level=="item")
								echo RealisasiFisikDanKeuanganDakDpa::model()->get_realisasi_fisik($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program,$data->kegiatan,0,$data->id);
							elseif($data->level=="parent1")
								echo RealisasiFisikDanKeuanganDakDpa::model()->get_realisasi_fisik($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program,$data->kegiatan,0,null);
						}
						),
						array(
						'type'=>'raw',
						'value'=>function($data){
							if($data->level == "item")
							{
								?>
							 <div class="btn-group dropup">
							  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Menu <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
								<li><a id='evaluasiDpa' href="<?php echo Yii::app()->createUrl("RealisasiFisikDanKeuanganDakDpa/create", array("id"=>$data->id,"jenis"=>"dpa"))?>">Add Realisasi</a></li>
								<li><a id='historyDpa' href="<?php echo Yii::app()->createUrl("RealisasiFisikDanKeuanganDakDpa/history", array("id"=>$data->id,"jenis"=>"dpa"))?>">Riwayat  </a></li>
								<li><a id='form2' href="<?php echo Yii::app()->createUrl("form2LaporanKemajuanSumberDanaDak/admin", array("id"=>$data->id,"jenis"=>"dpa"))?>">Laporan Kemajuan</a></li>								
							  </ul>
							</div>
							<?php
							}
						}
						),
						/*array(
						'class'=>'booster.widgets.TbButtonColumn',
						'htmlOptions'=>array('width'=>'4'),
						//'cssClassExpression' => '$data->harga_satuan==0 ? \'parent_\' : \'\';', 
						'template'=>'{evaluasi}  {history}',
						'buttons'=>array
						(
							'evaluasi'=>array(
								'label'=>'',
								'imageUrl'=>false, 
								//'label'=>'Terima',
								'url'=>'Yii::app()->createUrl("RealisasiFisikDanKeuanganDauDpa/create", array("id"=>$data->id,"jenis"=>"dpa"))',
								'options'=>array('id'=>'evaluasiDpa','class'=>'glyphicon glyphicon-fire','title'=>'Realisasi Fisik dan Keuangan DPA'),
								'visible'=>'($data->level == "item")',
							),
							'history'=>array(
								'label'=>'',
								'imageUrl'=>false, 
								//'label'=>'Terima',
								'url'=>'Yii::app()->createUrl("RealisasiFisikDanKeuanganDauDpa/history", array("id"=>$data->id,"jenis"=>"dpa"))',
								'options'=>array('id'=>'historyDpa','class'=>'glyphicon glyphicon-th','title'=>'Lihat Riwayat Realisasi Fisik dan Keuangan DPA'),
								'visible'=>'($data->level == "item")',
							),
						),
					)*/
				)),true,true)
				),
                array('label' => 'DPA Perubahan', 'content' => 
				$this->widget('ext.SilcomTreeGridView.SilcomTreeGridView', array(
                'id'=>'rka-id',
				'enableSorting' => false,
                'treeViewOptions'=>array(
                    'initialState'=>'expanded',
                    'expandable'=>true,
                ),
				'ajaxUpdate' => false,
                'parentColumn'=>'parent_id',
                'dataProvider'=>$modelDpaPerubahan->search(),
                'columns'=>
						array(
							array(
							'class'=>'CDataColumn',
							'htmlOptions'=>array('width'=>350),
							'type'=>'raw',
							'filter'=> '',
							'name'=>'uraianKegiatan',
							'value'=>'$data->uraianKegiatan',
							'filter'=> '',
						),
						array(
							'class'=>'CDataColumn',
							'htmlOptions'=>array('width'=>100),
							'type'=>'raw',
							'filter'=> '',
							'name'=>'nama_program',
							'value'=>'$data->nama_program',
							'filter'=> '',
						),
						array(
							'class'=>'CDataColumn',
							'htmlOptions'=>array('width'=>100),
							'type'=>'raw',
							'filter'=> '',
							'name'=>'nama_kegiatan',
							'value'=>'$data->nama_kegiatan',
							'filter'=> '',
						),
						array(
							'class'=>'CDataColumn',
							'htmlOptions'=>array('width'=>100),
							'type'=>'raw',
							'filter'=> '',
							'name'=>'volume',
							'filter'=> '',
						),
						array(
							'class'=>'CDataColumn',
							'htmlOptions'=>array('width'=>100),
							'type'=>'raw',
							'filter'=> '',
							'name'=>'harga_satuan',
							'value'=> 'AplikasiKomponen::uang($data->harga_satuan)',
						),
						array(
							'name' => 'harga_satuan_kegiatan',
							'filter'=>'',
							'htmlOptions'=>array('width'=>'120'),
							'value'=>'AplikasiKomponen::uang($data->harga_satuan_kegiatan)',
						),
						array(
						'header' => 'Realisasi Keuangan',
						'type'=>'raw',
						'filter'=>'',
						'htmlOptions'=>array('width'=>'120'),
						'value'=>function($data)
						{
							if($data->level=="item")
								echo AplikasiKomponen::uang(RealisasiFisikDanKeuanganDakDpa::model()->get_realisasi_keuangan($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program,$data->kegiatan,1,$data->id));
							elseif($data->level=="parent1")
								echo AplikasiKomponen::uang(RealisasiFisikDanKeuanganDakDpa::model()->get_realisasi_keuangan($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program,$data->kegiatan,1,null));
						}
						),
						array(
						'header' => 'Realisasi Fisik',
						'type'=>'raw',
						'filter'=>'',
						'htmlOptions'=>array('width'=>'120'),
						'value'=>function($data)
						{
							if($data->level=="item")
								echo RealisasiFisikDanKeuanganDakDpa::model()->get_realisasi_fisik($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program,$data->kegiatan,1,$data->id);
							elseif($data->level=="parent1")
								echo RealisasiFisikDanKeuanganDakDpa::model()->get_realisasi_fisik($data->tahun,$data->skpd,$data->urusan,$data->bidang,$data->program,$data->kegiatan,1,null);
						}
						),
						array(
						'type'=>'raw',
						'value'=>function($data){
							if($data->level == "item")
							{
								?>
							 <div class="btn-group dropup">
							  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Menu <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu">
								<li><a id='evaluasiDpa' href="<?php echo Yii::app()->createUrl("RealisasiFisikDanKeuanganDakDpa/create", array("id"=>$data->id,"jenis"=>"dpa_perubahan"))?>">Add Realisasi</a></li>
								<li><a id='historyDpa' href="<?php echo Yii::app()->createUrl("RealisasiFisikDanKeuanganDakDpa/history", array("id"=>$data->id,"jenis"=>"dpa_perubahan"))?>">Riwayat  </a></li>
								<li><a id='form2' href="<?php echo Yii::app()->createUrl("form2LaporanKemajuanSumberDanaDak/admin", array("id"=>$data->id,"jenis"=>"dpa_perubahan"))?>">Laporan Kemajuan</a></li>								
							  </ul>
							</div>
							<?php
							}
						}
						),
						/*array(
						'class'=>'booster.widgets.TbButtonColumn',
						'htmlOptions'=>array('width'=>'4'),
						//'cssClassExpression' => '$data->harga_satuan==0 ? \'parent_\' : \'\';', 
						'template'=>'{evaluasi}  {history}',
						'buttons'=>array
						(
							'evaluasi'=>array(
								'label'=>'',
								'imageUrl'=>false, 
								//'label'=>'Terima',
								'url'=>'Yii::app()->createUrl("RealisasiFisikDanKeuanganDauDpa/create", array("id"=>$data->id,"jenis"=>"dpa_perubahan"))',
								'options'=>array('id'=>'evaluasiDpaPerubahan','class'=>'glyphicon glyphicon-fire','title'=>'Realisasi Fisik dan Keuangan DPA Perubahan'),
								'visible'=>'($data->level == "item")',
							),
							'history'=>array(
								'label'=>'',
								'imageUrl'=>false, 
								//'label'=>'Terima',
								'url'=>'Yii::app()->createUrl("RealisasiFisikDanKeuanganDauDpa/history", array("id"=>$data->id,"jenis"=>"dpa_perubahan"))',
								'options'=>array('id'=>'historyDpaPerubahan','class'=>'glyphicon glyphicon-th','title'=>'Lihat Riwayat Realisasi Fisik dan Keuangan DPA'),
								'visible'=>'($data->level == "item")',
							),
						),
					)*/
				)),true,true)
				),
            ),
        )
    );
?>
</div>

</section>
