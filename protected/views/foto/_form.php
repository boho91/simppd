<?php
/* @var $this FotoController */
/* @var $model Foto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'foto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_musrenbang'); ?>
		<?php echo $form->textField($model,'id_musrenbang',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'id_musrenbang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jenis_musrenbang'); ?>
		<?php echo $form->textField($model,'jenis_musrenbang'); ?>
		<?php echo $form->error($model,'jenis_musrenbang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foto'); ?>
		<?php echo $form->textField($model,'foto',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'foto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->