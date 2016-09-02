<?php
/* @var $this PartisipatifController */
/* @var $model Partisipatif */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'partisipatif-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kd_skpd'); ?>
		<?php echo $form->textField($model,'kd_skpd'); ?>
		<?php echo $form->error($model,'kd_skpd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kd_urusan'); ?>
		<?php echo $form->textField($model,'kd_urusan'); ?>
		<?php echo $form->error($model,'kd_urusan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kd_bidang'); ?>
		<?php echo $form->textField($model,'kd_bidang'); ?>
		<?php echo $form->error($model,'kd_bidang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kd_prog'); ?>
		<?php echo $form->textField($model,'kd_prog'); ?>
		<?php echo $form->error($model,'kd_prog'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kd_kegiatan'); ?>
		<?php echo $form->textField($model,'kd_kegiatan'); ?>
		<?php echo $form->error($model,'kd_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun'); ?>
		<?php echo $form->error($model,'tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kunci'); ?>
		<?php echo $form->textField($model,'kunci'); ?>
		<?php echo $form->error($model,'kunci'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sasaran_daerah'); ?>
		<?php echo $form->textArea($model,'sasaran_daerah',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'sasaran_daerah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prioritas_daerah'); ?>
		<?php echo $form->textArea($model,'prioritas_daerah',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'prioritas_daerah'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sasaran_kegiatan'); ?>
		<?php echo $form->textArea($model,'sasaran_kegiatan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'sasaran_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keterangan'); ?>
		<?php echo $form->textArea($model,'keterangan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keterangan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'created_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mod_date'); ?>
		<?php echo $form->textField($model,'mod_date'); ?>
		<?php echo $form->error($model,'mod_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mod_by'); ?>
		<?php echo $form->textField($model,'mod_by',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'mod_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uraian'); ?>
		<?php echo $form->textArea($model,'uraian',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'uraian'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kecamatan'); ?>
		<?php echo $form->textField($model,'kecamatan'); ?>
		<?php echo $form->error($model,'kecamatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kelurahan'); ?>
		<?php echo $form->textField($model,'kelurahan'); ?>
		<?php echo $form->error($model,'kelurahan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'volume'); ?>
		<?php echo $form->textField($model,'volume',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'volume'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'satuan'); ?>
		<?php echo $form->textField($model,'satuan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'satuan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pagu_indikatif'); ?>
		<?php echo $form->textField($model,'pagu_indikatif',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'pagu_indikatif'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pagu_prakiraan_maju'); ?>
		<?php echo $form->textField($model,'pagu_prakiraan_maju',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'pagu_prakiraan_maju'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sumber_dana'); ?>
		<?php echo $form->textField($model,'sumber_dana'); ?>
		<?php echo $form->error($model,'sumber_dana'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'urutan'); ?>
		<?php echo $form->textField($model,'urutan',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'urutan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_kegiatan'); ?>
		<?php echo $form->textField($model,'jenis_kegiatan',array('size'=>60,'maxlength'=>111)); ?>
		<?php echo $form->error($model,'jenis_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tolak_ukur_hasil_program'); ?>
		<?php echo $form->textField($model,'tolak_ukur_hasil_program',array('size'=>60,'maxlength'=>111)); ?>
		<?php echo $form->error($model,'tolak_ukur_hasil_program'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'target_hasil_program'); ?>
		<?php echo $form->textField($model,'target_hasil_program',array('size'=>60,'maxlength'=>111)); ?>
		<?php echo $form->error($model,'target_hasil_program'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tolak_ukur_keluaran_kegiatan'); ?>
		<?php echo $form->textField($model,'tolak_ukur_keluaran_kegiatan',array('size'=>60,'maxlength'=>111)); ?>
		<?php echo $form->error($model,'tolak_ukur_keluaran_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'target_keluaran_kegiatan'); ?>
		<?php echo $form->textField($model,'target_keluaran_kegiatan',array('size'=>60,'maxlength'=>111)); ?>
		<?php echo $form->error($model,'target_keluaran_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tolak_ukur_hasil_kegiatan'); ?>
		<?php echo $form->textField($model,'tolak_ukur_hasil_kegiatan',array('size'=>60,'maxlength'=>111)); ?>
		<?php echo $form->error($model,'tolak_ukur_hasil_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'target_hasil_kegiatan'); ?>
		<?php echo $form->textField($model,'target_hasil_kegiatan',array('size'=>60,'maxlength'=>111)); ?>
		<?php echo $form->error($model,'target_hasil_kegiatan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sumber_usulan'); ?>
		<?php echo $form->textField($model,'sumber_usulan',array('size'=>60,'maxlength'=>111)); ?>
		<?php echo $form->error($model,'sumber_usulan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_usulan'); ?>
		<?php echo $form->textField($model,'status_usulan',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'status_usulan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keterangan_status_usulan'); ?>
		<?php echo $form->textArea($model,'keterangan_status_usulan',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keterangan_status_usulan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foto'); ?>
		<?php echo $form->textField($model,'foto',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'foto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'latitude'); ?>
		<?php echo $form->textField($model,'latitude',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'longitude'); ?>
		<?php echo $form->textField($model,'longitude',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'longitude'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->