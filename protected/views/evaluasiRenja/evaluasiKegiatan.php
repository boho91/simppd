<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
	array(
        'links' => array(
						'Evaluasi Renja'=> array('admin'),
						$modelSkpd->nama_skpd=>array('adminUrusan','skpd'=>$modelSkpd->id),
						$modelProgram->bidang_->urusan_->urusan=>array('adminBidang','skpd'=>$modelSkpd->id,'urusan'=>$modelProgram->bidang_->urusan_->id),
						$modelProgram->bidang_->bidang=>array('adminProgram','skpd'=>$modelSkpd->id,'urusan'=>$modelProgram->bidang_->urusan_->id,'bidang'=>$modelProgram->bidang_->id),
						$modelProgram->program=>array('adminKegiatan','skpd'=>$modelSkpd->id,'urusan'=>$modelProgram->bidang_->urusan_->id,'bidang'=>$modelProgram->bidang_->id,'program'=>$modelProgram->id),
						$modelKegiatan->kegiatan_->kegiatan,
						),		
    )
    
);


Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
$.fn.yiiGridView.update('kegiatan-musrenbang-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<section class="content-header">
<h1>Evaluasi Kesesuaian Renja Terhadap RKA SKPD</h1>

</section>
<section class="content">
<div class='col-md-7'>
<div class="CGridViewContainer">

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'kegiatan-musrenbang-grid',
'dataProvider'=>$model->GroupPerCOnditionWithRka("kegiatan"),
'filter'=>$model,
'rowCssClassExpression' => '($data->kegiatan==$_GET[kegiatan] ? "aktif": "")',
'columns'=>array(
	array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		
		
		//'kd_bidang',
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>250),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'kegiatan',
			'value' => 'CHtml::link($data->kegiatan_->kegiatan, Yii::app()->createUrl("evaluasiRenja/evaluasiKegiatan",array("skpd"=>$data->skpd,"urusan"=>$data->urusan,"bidang"=>$data->bidang,"program"=>$data->program,"kegiatan"=>$data->kegiatan)))',
		),
		array(
			'name'=>'indikator_kinerja',
			'header'=>'Indikator Kinerja Renja',
			'htmlOptions'=>array('width'=>150),
			'filter'=>'',
		),
		array(
			'name'=>'capaian_program_rka',
			'header'=>'Indikator Kinerja RKA',
			'htmlOptions'=>array('width'=>150),
			'filter'=>'',
		),
		array(
			'name'=>'lokasi_renja',
			'header'=>'Lokasi Renja',
			'htmlOptions'=>array('width'=>150),
			'filter'=>'',
		),
		array(
			'name'=>'lokasi_kegiatan_rka',
			'header'=>'Lokasi RKA',
			'htmlOptions'=>array('width'=>150),
			'filter'=>'',
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'pagu_tahun_awal',
			'value'=>'$data->pagu_tahun_awal',
			//'footer'=>"".$model->fetchTotalPagu($model->searchPerUrusan()->getData()),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'jumlahRka',
			'value'=>'$data->jumlahRkaRp',
			//'footer'=>"".$model->fetchTotalPaguAkhir($model->searchPerUrusan()->getData()),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'pagu_tahun_akhir',
			'value'=>'$data->pagu_tahun_akhir',
			//'footer'=>"".$model->fetchTotalPaguAkhir($model->searchPerUrusan()->getData()),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'header'=>'Pagu Prakiraan Maju RKA',
			'name'=>'pagu_prakiraan_maju_rka_rp',
			'value'=>'$data->pagu_prakiraan_maju_rka_rp',
			//'footer'=>"".$model->fetchTotalPaguAkhir($model->searchPerUrusan()->getData()),
		),
		
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'tahun',
			'value'=>'$data->tahun',
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

),
)); ?>
</div>
</div>
<div class="col-md-5">
	<!-- Warning box -->
	<div class="box box-warning">
		<div class="box-header">
			<h3 class="box-title"><?php echo $modelKegiatan->kegiatan_->kegiatan?></h3>
			<div class="box-tools pull-right">
				
			</div>
		</div>
		<div class="box-body">
		<h4 class="box-title">Evaluasi Renja Terhadap RKA</h4>
		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th>Kesesuaian Terhadap RKA</th>
				<th>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'select',
						'model' => $modelEvaluasi,
						'attribute' => 'kesesuaian', // $model->name will be editable
						'source'=>$this->createUrl('EvaluasiRenja/getKesesuaian'),
						'url' => $this->createUrl('evaluasiRenja/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"kesesuaian",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'bottom',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</th>

			</tr>
			<tr>
				<th>#</th>
				<th>Evaluasi</th>
				<th>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'textarea',
						'model' => $modelEvaluasi,
						'attribute' => 'evaluasi', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRenja/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"evaluasi",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'left',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</th>

			</tr>
			<tr>
				<th>#</th>
				<th>Tindak Lanjut</th>
				<th>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'textarea',
						'model' => $modelEvaluasi,
						'attribute' => 'tindak_lanjut', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRenja/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"tindak_lanjut",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'left',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</th>

			</tr>
			<tr>
				<th>#</th>
				<th>Hasil Tindak Lanjut</th>
				<th>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'textarea',
						'model' => $modelEvaluasi,
						'attribute' => 'hasil_tindak_lanjut', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRenja/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"hasil_tindak_lanjut",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'left',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</th>

			</tr>
			</thead>
		
		</table>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div>
</section>
