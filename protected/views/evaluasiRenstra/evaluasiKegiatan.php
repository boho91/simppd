<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
	array(
        'links' => array(
						'Evaluasi Renstra'=> array('admin'),
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
<h1>Evaluasi  Renstra </h1>

</section>
<section class="content">
<div class='col-md-7'>
<div class="CGridViewContainer">

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'kegiatan-musrenbang-grid',
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
			'htmlOptions'=>array('width'=>250),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'kegiatan',
			'value' => 'CHtml::link($data->kegiatan_->kegiatan, Yii::app()->createUrl("evaluasiRenstra/evaluasiKegiatan",array("skpd"=>$data->skpd,"urusan"=>$data->urusan,"bidang"=>$data->bidang,"program"=>$data->program,"kegiatan"=>$data->kegiatan)))',
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'pagu1',
			'value'=>'$data->pagu1',
			//'footer'=>"".$model->totalPaguTahunAwalRenja(Yii::app()->session['tahun_perencanaan']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'filter'=>'',
			'name'=>'pagu2',
			'value'=>'$data->pagu2',
			//'footer'=>"".$model->totalPaguTahunAkhir(Yii::app()->session['tahun_perencanaan']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'filter'=>'',
			'name'=>'pagu3',
			//'footer'=>"".$model->totalPaguTahunAkhir(Yii::app()->session['tahun_perencanaan']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'name'=>'pagu4',
			'filter'=>'',
			//'footer'=>"".$model->totalPaguTahunAkhir(Yii::app()->session['tahun_perencanaan']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'filter'=>'',
			'name'=>'pagu5',
			//'footer'=>"".$model->totalPaguTahunAkhir(Yii::app()->session['tahun_perencanaan']),
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'filter'=>'',
			'name'=>'tahun_perencanaan',
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
		<h4 class="box-title">Realisasi Anggaran</h4>
		<table class="table">
			<thead>
			<tr>
				<th style="width: 21%">Tahun 1</th>
				<th style="width: 21%">Tahun 2</th>
				<th style="width: 21%">Tahun 3</th>
				<th style="width: 21%">Tahun 4</th>
				<th style="width: 21%">Tahun 5</th>
			</tr>
			</thead>
		<tbody>
			<tr class="odd">
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $modelEvaluasi,
						'attribute' => 'realisasi_anggaran_tahun1', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRenstra/gridUpdate'),
						'value' => 'CHtml::encode(number_format($modelEvaluasi->realisasi_anggaran_tahun1))',
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_anggaran_tahun1",
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
						'attribute' => 'realisasi_anggaran_tahun2', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRenstra/gridUpdate'),
						'value' => 'CHtml::encode(number_format($modelEvaluasi->realisasi_anggaran_tahun2))',
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_anggaran_tahun2",
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
						'attribute' => 'realisasi_anggaran_tahun3', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRenstra/gridUpdate'),
						'value' => 'CHtml::encode(number_format($modelEvaluasi->realisasi_anggaran_tahun3))',
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_anggaran_tahun3",
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
						'attribute' => 'realisasi_anggaran_tahun4', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRenstra/gridUpdate'),
						'value' => 'CHtml::encode(number_format($modelEvaluasi->realisasi_anggaran_tahun4))',
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_anggaran_tahun4",
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
						'attribute' => 'realisasi_anggaran_tahun5', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRenstra/gridUpdate'),
						'value' => 'CHtml::encode(number_format($modelEvaluasi->realisasi_anggaran_tahun5))',
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_anggaran_tahun5",
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
				<th style="width: 21%">Tahun 1</th>
				<th style="width: 21%">Tahun 2</th>
				<th style="width: 21%">Tahun 3</th>
				<th style="width: 21%">Tahun 4</th>
				<th style="width: 21%">Tahun 5</th>
			</tr>
			</thead>
		<tbody>
			<tr class="odd">
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $modelEvaluasi,
						'attribute' => 'realisasi_target_tahun1', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRenstra/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_target_tahun1",
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
						'attribute' => 'realisasi_target_tahun2', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRenstra/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_target_tahun2",
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
						'attribute' => 'realisasi_target_tahun3', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRenstra/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_target_tahun3",
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
						'attribute' => 'realisasi_target_tahun4', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRenstra/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_target_tahun4",
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
						'attribute' => 'realisasi_target_tahun5', // $model->name will be editable
						'url' => $this->createUrl('evaluasiRenstra/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"realisasi_target_tahun5",
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
