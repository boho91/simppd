<?php
/* @var $this TopDownController */
/* @var $model TopDown */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kd_skpd'); ?>
		<?php echo $form->textField($model,'kd_skpd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kd_urusan'); ?>
		<?php echo $form->textField($model,'kd_urusan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kd_bidang'); ?>
		<?php echo $form->textField($model,'kd_bidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kd_prog'); ?>
		<?php echo $form->textField($model,'kd_prog'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kd_kegiatan'); ?>
		<?php echo $form->textField($model,'kd_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kunci'); ?>
		<?php echo $form->textField($model,'kunci'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sasaran_daerah'); ?>
		<?php echo $form->textArea($model,'sasaran_daerah',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prioritas_daerah'); ?>
		<?php echo $form->textArea($model,'prioritas_daerah',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sasaran_kegiatan'); ?>
		<?php echo $form->textArea($model,'sasaran_kegiatan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keterangan'); ?>
		<?php echo $form->textArea($model,'keterangan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mod_date'); ?>
		<?php echo $form->textField($model,'mod_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mod_by'); ?>
		<?php echo $form->textField($model,'mod_by',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uraian'); ?>
		<?php echo $form->textArea($model,'uraian',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kecamatan'); ?>
		<?php echo $form->textField($model,'kecamatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kelurahan'); ?>
		<?php echo $form->textField($model,'kelurahan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'volume'); ?>
		<?php echo $form->textField($model,'volume',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'satuan'); ?>
		<?php echo $form->textField($model,'satuan',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pagu_indikatif'); ?>
		<?php echo $form->textField($model,'pagu_indikatif',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pagu_prakiraan_maju'); ?>
		<?php echo $form->textField($model,'pagu_prakiraan_maju',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sumber_dana'); ?>
		<?php echo $form->textField($model,'sumber_dana'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'urutan'); ?>
		<?php echo $form->textField($model,'urutan',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jenis_kegiatan'); ?>
		<?php echo $form->textField($model,'jenis_kegiatan',array('size'=>60,'maxlength'=>111)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tolak_ukur_hasil_program'); ?>
		<?php echo $form->textField($model,'tolak_ukur_hasil_program',array('size'=>60,'maxlength'=>111)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'target_hasil_program'); ?>
		<?php echo $form->textField($model,'target_hasil_program',array('size'=>60,'maxlength'=>111)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tolak_ukur_keluaran_kegiatan'); ?>
		<?php echo $form->textField($model,'tolak_ukur_keluaran_kegiatan',array('size'=>60,'maxlength'=>111)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'target_keluaran_kegiatan'); ?>
		<?php echo $form->textField($model,'target_keluaran_kegiatan',array('size'=>60,'maxlength'=>111)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tolak_ukur_hasil_kegiatan'); ?>
		<?php echo $form->textField($model,'tolak_ukur_hasil_kegiatan',array('size'=>60,'maxlength'=>111)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'target_hasil_kegiatan'); ?>
		<?php echo $form->textField($model,'target_hasil_kegiatan',array('size'=>60,'maxlength'=>111)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sumber_usulan'); ?>
		<?php echo $form->textField($model,'sumber_usulan',array('size'=>60,'maxlength'=>111)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_usulan'); ?>
		<?php echo $form->textField($model,'status_usulan',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keterangan_status_usulan'); ?>
		<?php echo $form->textArea($model,'keterangan_status_usulan',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'foto'); ?>
		<?php echo $form->textField($model,'foto',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'longitude'); ?>
		<?php echo $form->textField($model,'longitude',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->