
<section class="content-header">


</section>
<section class="content">
<?php 
$jenis_dpa = $jenis;
$this->widget('booster.widgets.TbGridView',array(
'id'=>'realisasi-fisik-dan-keuangan-dak-dpa-grid',
'dataProvider'=>$model->search(),
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		array(
			'type'=>'raw',
			'header'=>'Uraian',
			'value'=>function($data,$jenis_dpa)use ($jenis_dpa){
				if($jenis_dpa=="dpa")
					echo $data->dpa_->item;
				else
					echo $data->dpa_perubahan->item;
			}
		),
		array(
			'name'=>'bulan',
			'value'=>'$data->bulan_->bulan',
			'filter'=>''
		),
		array(
			'name'=>'volume',
			'filter'=>''
		),
		array(
			'name'=>'harga_satuan',
			'value'=>'AplikasiKomponen::uang($data->harga_satuan)',
			'filter'=>''
		),
		array(
			'name'=>'kontrak',
			'value'=>'AplikasiKomponen::uang($data->kontrak)',
			'filter'=>''
		),
		array(
			'name'=>'swakelola',
			'value'=>'AplikasiKomponen::uang($data->swakelola)',
			'filter'=>''
		),
		array(
			'name'=>'dana_pendamping',
			'value'=>'AplikasiKomponen::uang($data->dana_pendamping)',
			'filter'=>''
		),
		array(
			'name'=>'realisasi_fisik',
			'filter'=>''
		),
		array(
			'name'=>'realisasi_keuangan',
			'value'=>'AplikasiKomponen::uang($data->realisasi_keuangan)',
			'filter'=>''
		),
		array(
			'name'=>'kuasa_pengguna_anggaran',
			'filter'=>''
		),
		array(
			'name'=>'pejabat_pelaksana_kegiatan',
			'filter'=>''
		),
		array(
			'name'=>'tahun',
			'filter'=>''
		),
		array(
			'name'=>'penerima_manfaat',
			'filter'=>''
		),
		array(
			'name'=>'modifikasi_masalah',
			'filter'=>''
		),
		array(
			'name'=>'kesesuaian_sasaran_dan_lokasi_dengan_rkpd',
			'filter'=>''
		),
		array(
			'name'=>'kesesuaian_antara_dpa_dengan_juknis',
			'filter'=>''
		),
		array(
			'name'=>'created_date',
			'filter'=>'',
			'value'=>'AplikasiKomponen::TanggalIndo($data->created_date)',
		
		),
		/*
		'urusan',
		'bidang',
		'program',
		'kegiatan',
		'skpd',
		'harga_satuan',
		'volume',
		'kontrak',
		'swakelola',
		'created_date',
		'created_by',
		'mod_date',
		'mod_by',
		'is_perubahan',
		'kuasa_pengguna_anggaran',
		'pejabat_pelaksana_kegiatan',
		'penerima_manfaat',
		'dana_pendamping',
		'kesesuaian_sasaran_dan_lokasi_dengan_rkpd',
		'kesesuaian_antara_dpa_dengan_juknis',
		'modifikasi_masalah',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
'template'=>'{delete}',
),
),
)); ?>
</section>
