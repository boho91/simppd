<?php

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Laporan Pengadaan Barang Jasa'=> array('admin'),
        'Detail Per SKPD',
),
		
    )
);
$this->menu=array(
	//array('label'=>'List Sasaran Daerah','url'=>array('index')),
	array('label'=>'Tambah Data','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
	//array('label'=>'Hapus Sasaran Daerah','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
	array('label'=>'Data Pengadaan Barang','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
	array('label'=>'Rekapitulasi Per SKPD','url'=>array('summary'),'buttonType'=> 'link','context' => 'warning',),
	);
?>
<?php 
Yii::app()->clientScript->registerScript('search', "
$('#help').click(function(){
	return false;
});
$('#btn_tambah').click(function(){
	$('.modal-header h2').html('Form Laporan Pengadaan Barang dan Jasa');
	//$('#dialog').modal('show'); 
	//return false;
});
$('#hapus').click(function() {
	if(confirm('Yakin ingin menghapus data ini?'))
	{
		$.fn.yiiGridView.update('laporan-pengadaan-barang-jasa-grid', {
			type:'POST',
			url:$(this).attr('href'),
			success:function(data) {
				$('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
				$.fn.yiiGridView.update('laporan-pengadaan-barang-jasa-grid');
			}
		})
		return false;
	}else 
	{
		return false;
	}
});
$('#laporan-pengadaan-barang-jasa-form').submit(function(){
	waitingDialog.show();
	
	$.fn.yiiGridView.update('laporan-pengadaan-barang-jasa-grid', {
								type:'POST',
								url: 'index.php?r=laporanPengadaanBarangJasa/create',
								data:$(this).serialize(),
								success:function(data) {
									$('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
										$.fn.yiiGridView.update('laporan-pengadaan-barang-jasa-grid');
										waitingDialog.hide();
										$('#dialog').modal('hide');
										clear_form();
									}
							})
	return false;
});
function clear_form()
{
	$('#laporan-pengadaan-barang-jasa-form input').val('');
	$('#laporan-pengadaan-barang-jasa-form textarea').val('');
}
");
?>
<section class='content-header'>

<h1 class="page-head-line">Laporan Detail Pengadaan Barang dan Jasa Per SKPD</h1>
</section>
<section class='content'>
<?php echo CHtml::beginForm(array('export')); ?>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'laporan-pengadaan-barang-jasa-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(
			'header'=>'No.',
			'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		array(
			'class'=>'CDataColumn',
			'type'=>'raw',
			'header'=>'SKPD',
			'htmlOptions'=>array('width'=>'230'),
			'name'=>'skpd',
			'value'=>'$data->skpd_->nama_skpd',
			'filter'=> CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')), 'id', 'nama_skpd'),
		),
		array(
			'class'=>'CDataColumn',
			'type'=>'raw',
			'header'=>'Tahun',
			'htmlOptions'=>array('width'=>'70'),
			'name'=>'tahun',
			'value'=>'$data->tahun',
			'filter'=> CHtml::listData(LaporanPengadaanBarangJasa::model()->findAll(array('order'=>'tahun','group'=>'tahun')), 'tahun', 'tahun'),
		),
		array(
			'class'=>'CDataColumn',
			'type'=>'raw',
			'header'=>'Triwulan',
			'htmlOptions'=>array('width'=>'70'),
			'name'=>'triwulan',
			'value'=>'$data->triwulan',
			'filter'=> CHtml::listData(LaporanPengadaanBarangJasa::model()->findAll(array('order'=>'triwulan','group'=>'triwulan')), 'triwulan', 'triwulan'),
		),
		'proses_pengadaan',
		'uraian_kegiatan',
		'volume',
		'satuan',
		array(
		'name'=>'biaya',
		'value'=>'AplikasiKomponen::uang($data->biaya)',
		'footer'=>'<strong>'.number_format($model->getTotal($model->search()->getData(), 'biaya')).'</strong>',
		),
		/*
		'proses_pengadaan',
		'tanda_tangan_kontrak',
		'pelaksanaan',
		'pho',
		'keterangan',
		*/
		array(
		'header' => ' ',
		'name' => 'nama',
		'htmlOptions'=>array('class'=>'car_name'),
		'value'=>function($data,$row) use ($outsideVariable){
			echo '<div class="btn-group pull-right"><button type="button" name="yt1" data-toggle="dropdown" class="btn btn-info dropdown-toggle"><i class="glyphicon glyphicon-cog"></i> Aksi <span class="caret"></span></button>
			<ul class="dropdown-menu">';
			echo '<li><a href="'.Yii::app()->createUrl("laporanPengadaanBarangJasa/view", array("id"=>$data->id)).'"  class="remove-item"><i class="fa fa-eye"></i> &nbsp; Detail </a></li>
				<li class="divider"><a href="#"></a></li>
				<li><a href="'.Yii::app()->createUrl("laporanPengadaanBarangJasa/update", array("id"=>$data->id)).'"  class="remove-item" ><i class="fa fa-pencil"></i> &nbsp; Edit </a></li>
				<li class="divider"><a href="#"></a></li>
				<li><a href="'.Yii::app()->createUrl("laporanPengadaanBarangJasa/delete", array("id"=>$data->id)).'"  class="remove-item" id="hapus"><i class="fa fa-trash"></i> &nbsp; Hapus </a></li>
				</ul>
			</div>';
											
			},
			'filter'=>'',
		),
),
)); ?>
<div class='form-group alert alert-warning'>
<div class="btn-group ">
<?php echo CHtml::submitButton('Export PDF', array('class'=>'btn btn-success','icon'=>'fa fa-print','name' => 'PDF')); ?>
<?php echo CHtml::submitButton('Export Excel', array('class'=>'btn btn-info','icon'=>'fa fa-file-excel-o','name' => 'Excel')); ?>

</div>
</div>
<?php echo CHtml::endForm(); ?>
</section>