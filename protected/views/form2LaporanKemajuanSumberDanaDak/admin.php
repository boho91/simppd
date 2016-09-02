<script>
jQuery(document).on('click','#dialog2 .close',function() {
	location.reload();
	return false;
});
jQuery(document).on('click','.modal-footer button',function() {
	location.reload();
	return false;
});
</script>
<section class="content-header">

</section>
<section class="content">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'form2-laporan-kemajuan-sumber-dana-dak-grid',
'dataProvider'=>$model->search(),
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'pmk',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"pmk",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'tgl_pmk',
			'type' => 'date',
			'sortable' => true,
			
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"tgl_pmk",
				'format' => 'yyyy-mm-dd',
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'juknis',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"juknis",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'tgl_juknis',
			'type' => 'date',
			'sortable' => true,
			
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"tgl_juknis",
				'format' => 'yyyy-mm-dd',
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'penyusunan_rencana_kerja',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"penyusunan_rencana_kerja",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'tgl_penyusunan_rencana_kerja',
			'type' => 'date',
			'sortable' => true,
			
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"tgl_penyusunan_rencana_kerja",
				'format' => 'yyyy-mm-dd',
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'penetapan_dpa',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"penetapan_dpa",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'tgl_penetapan_dpa',
			'type' => 'date',
			'sortable' => true,
			
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"tgl_penetapan_dpa",
				'format' => 'yyyy-mm-dd',
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'sk_penetapan_pelaksanaan_kegiatan',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"sk_penetapan_pelaksanaan_kegiatan",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'tgl_sk_penetapan_pelaksanaan_kegiatan',
			'type' => 'date',
			'sortable' => true,
			
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"tgl_sk_penetapan_pelaksanaan_kegiatan",
				'format' => 'yyyy-mm-dd',
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'pelaksanaan_tender',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"pelaksanaan_tender",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'tgl_pelaksanaan_tender',
			'type' => 'date',
			'sortable' => true,
			
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"tgl_pelaksanaan_tender",
				'format' => 'yyyy-mm-dd',
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'persiapan_pekerjaan_swakelola',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"persiapan_pekerjaan_swakelola",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'tgl_persiapan_pekerjaan_swakelola',
			'type' => 'date',
			'sortable' => true,
			
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"tgl_persiapan_pekerjaan_swakelola",
				'format' => 'yyyy-mm-dd',
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'pelaksanaan_pekerjaan_kontrak',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"pelaksanaan_pekerjaan_kontrak",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'tgl_pelaksanaan_pekerjaan_kontrak',
			'type' => 'date',
			'sortable' => true,
			
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"tgl_pelaksanaan_pekerjaan_kontrak",
				'format' => 'yyyy-mm-dd',
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'pelaksanaan_pekerjaan_swakelola',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"pelaksanaan_pekerjaan_swakelola",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'tgl_pelaksanaan_pekerjaan_swakelola',
			'type' => 'date',
			'sortable' => true,
			
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"tgl_pelaksanaan_pekerjaan_swakelola",
				'format' => 'yyyy-mm-dd',
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'penerbitan_spp',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"penerbitan_spp",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'tgl_penerbitan_spp',
			'type' => 'date',
			'sortable' => true,
			
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"tgl_penerbitan_spp",
				'format' => 'yyyy-mm-dd',
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'penerbitan_spm',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"penerbitan_spm",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'tgl_penerbitan_spm',
			'type' => 'date',
			'sortable' => true,
			
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"tgl_penerbitan_spm",
				'format' => 'yyyy-mm-dd',
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'penerbitan_sp2d',
			'sortable' => true,
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"penerbitan_sp2d",
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'tgl_penerbitan_sp2d',
			'type' => 'date',
			'sortable' => true,
			
			'filter'=> '',
			'htmlOptions'=>array('width'=>10),
			'editable' => array(
				'url' => $this->createUrl('Form2LaporanKemajuanSumberDanaDak/gridUpdate'),
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"tgl_penerbitan_sp2d",
				'format' => 'yyyy-mm-dd',
				'inputclass' => 'col-md-3 ',
				'options' => array(
				'placement' => 'bottom',
				'success' => 'js: function(data) {
				}',
				),
			)
		),
		/*
		'tahun',
		'bulan',
		'created_by',
		'created_date',
		'mod_by',
		'mod_date',
		'is_perubahan',
		'id_dpa',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'htmlOptions'=>array('width'=>100),
'template'=>'{delete}',
),
),
)); ?>
<br><br><br>
</section>
