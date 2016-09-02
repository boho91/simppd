<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Renja'=> array('admin','skpd'=>$model->skpd),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Renja','url'=>array('index')),
//array('label'=>'Tambah Renja','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Renja','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Renja','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Renja','url'=>array('admin','skpd'=>$model->skpd),'buttonType'=> 'link','context' => 'info',),
array('label'=>'Verifikasi','url'=>array('verifikasi','id'=>$model->id),'buttonType'=> 'link','context' => 'success','htmlOptions'=>array('id'=>'verifikasi')),
);
Yii::app()->clientScript->registerScript('vew', "
$('#verifikasi').click(function(){
	waitingDialog.show();
	url = $(this).attr('href');
	$.post(url,function(evt){
		$('#dialog2 #modal_content').html(evt);
		$('#dialog2 #tombolaksi').html('Tambah');
		waitingDialog.hide();
		$('#dialog2').modal('show'); 
	});
	
	return false;
});
");
?>
<section class="content-header">
<h1>View Renja</h1>
</section>
<section class="content">
<?php 
$this->widget('booster.widgets.TbAlert', array(
    'fade' => false,
    'closeText' => '&times;', // false equals no close link
    'events' => array(),
    'htmlOptions' => array(),
    'userComponentId' => 'user',
    
));
?>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'kegiatan_.program_.bidang_.urusan_.urusan',
		'kegiatan_.program_.bidang_.bidang',
		'kegiatan_.program_.program',
		'kegiatan_.kegiatan',
		'skpd_.nama_skpd',
		'indikator_kinerja',
		'sasaran_kegiatan',
		'uraian',
		'target_capaian_kinerja',
		'dana1',
		
		
		'target_capaian_kinerja_a2',
		'dana2',
		'sumber_dana_.sumber_dana',
		'lokasi_kegiatan',
		'kecamatan_.kecamatan',
		'kelurahan_.kelurahan',
		'catatan_penting',
		//'sumber_usulan',
		//'status_verifikasi',
		//'keterangan',
		//'alasan_tolak_renja',
),
)); ?>
</section>