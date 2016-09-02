<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
	array(
        'links' => array(
						'Evaluasi Rkpd'=> array('admin'),
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
<h1>Evaluasi RKPD</h1>

</section>
<section class="content">
<div class='col-md-5'>
<?php $box = $this->beginWidget(
    'booster.widgets.TbPanel',
    array(
        'title' => 'Kegiatan '.$modelProgram->program,
        'headerIcon' => 'th-list',
    	'padContent' => false,
        'htmlOptions' => array('class' => 'bootstrap-widget-table')
    )
);?>
<?php 
   $this->widget('booster.widgets.TbGridView',array(
			'id'=>'kegiatan-musrenbang-grid',
			'summaryText'=>'',
			'dataProvider'=>$model->GroupPerCOndition("kegiatan"),
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
						'htmlOptions'=>array('width'=>150),
						'type'=>'raw',
						'filter'=>'',
						'name'=>'kegiatan',
						'value' => 'CHtml::link($data->kegiatan_->kegiatan, Yii::app()->createUrl("evaluasiRkpd/evaluasiKegiatan",array("skpd"=>$data->skpd,"urusan"=>$data->urusan,"bidang"=>$data->bidang,"program"=>$data->program,"kegiatan"=>$data->kegiatan)))',
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
						'name'=>'pagu_tahun_akhir',
						'value'=>'$data->pagu_tahun_akhir',
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
			));
?>
<?php $this->endWidget(); ?>
</div>
<div class="col-md-7">
	<!-- Warning box -->
	<div class="box box-warning">
		<div class="box-header">
			<h3 class="box-title"><?php echo $modelKegiatan->kegiatan_->kegiatan?></h3>
			<div class="box-tools pull-right">
				
			</div>
		</div>
		<div class="box-body">
		<h4 class="box-title">Indikator Kinerja Program/Kegiatan</h4>
		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th>Outcome</th>
				<th>Output</th>
				<th>Satuan Kinerja <small>Ex. km, buku,perda, dll</small></th>
			</tr>
			</thead>
		<tbody>
			<tr class="odd">
				<td style="width: 60px"></td>
				<td style="width: 25%">
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $modelEvaluasi,
						'attribute' => 'indikator_kinerja_program', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"indikator_kinerja_program",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</td>
				<td style="width: 25%">
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $modelEvaluasi,
						'attribute' => 'indikator_keluaran_kegiatan', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"indikator_keluaran_kegiatan",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</td>
				<td style="width: 50%">
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $modelEvaluasi,
						'attribute' => 'satuan_kinerja', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"satuan_kinerja",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</td>
			</tr>
			</tbody>
		</table>
		<h4 class="box-title">Realisasi Anggaran</h4>
		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th style="width: 26%">Triwulan I</th>
				<th style="width: 26%">Triwulan II</th>
				<th style="width: 26%">Triwulan III</th>
				<th style="width: 26%">Triwulan IV</th>
			</tr>
			</thead>
		<tbody>
			<tr class="odd">
				<td style="width: 60px"></td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $modelEvaluasi,
						'attribute' => 'realisasi_kinerja_triwulan_1_rp', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
						'value' => 'CHtml::encode(number_format($modelEvaluasi->realisasi_kinerja_triwulan_1_rp))',
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_kinerja_triwulan_1_rp",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $modelEvaluasi,
						'attribute' => 'realisasi_kinerja_triwulan_2_rp', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
						'value' => 'CHtml::encode(number_format($modelEvaluasi->realisasi_kinerja_triwulan_2_rp))',
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_kinerja_triwulan_2_rp",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>
				</td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $modelEvaluasi,
						'attribute' => 'realisasi_kinerja_triwulan_3_rp', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
						'value' => 'CHtml::encode(number_format($modelEvaluasi->realisasi_kinerja_triwulan_3_rp))',
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_kinerja_triwulan_3_rp",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>
				</td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $modelEvaluasi,
						'attribute' => 'realisasi_kinerja_triwulan_4_rp', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
						'value' => 'CHtml::encode(number_format($modelEvaluasi->realisasi_kinerja_triwulan_4_rp))',
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_kinerja_triwulan_4_rp",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>
				</td>
			</tr>
			</tbody>
		</table>
		<h4 class="box-title">Realisasi Kinerja</h4>
		<table class="table">
			<thead>
			<tr>
				<th>#</th>
				<th style="width: 26%">Triwulan I</th>
				<th style="width: 26%">Triwulan II</th>
				<th style="width: 26%">Triwulan III</th>
				<th style="width: 26%">Triwulan IV</th>
			</tr>
			</thead>
		<tbody>
			<tr class="odd">
				<td style="width: 60px"></td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $modelEvaluasi,
						'attribute' => 'realisasi_kinerja_triwulan_1_k', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_kinerja_triwulan_1_k",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>
				</td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $modelEvaluasi,
						'attribute' => 'realisasi_kinerja_triwulan_2_k', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_kinerja_triwulan_2_k",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>
				</td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $modelEvaluasi,
						'attribute' => 'realisasi_kinerja_triwulan_3_k', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_kinerja_triwulan_3_k",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>
				</td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $modelEvaluasi,
						'attribute' => 'realisasi_kinerja_triwulan_4_k', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRkpd/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_kinerja_triwulan_4_k",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>
				</td>
			</tr>
			</tbody>
		</table>
		</div><!-- /.box-body -->
	</div><!-- /.box -->
</div>
</section>
