<?php
/* @var $this SpmController */
/* @var $model Spm */
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
		<?php echo $form->label($model,'kd_pelayanan_dasar'); ?>
		<?php echo $form->textField($model,'kd_pelayanan_dasar',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'indikator'); ?>
		<?php echo $form->textField($model,'indikator',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nilai'); ?>
		<?php echo $form->textField($model,'nilai'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'batas_waktu'); ?>
		<?php echo $form->textField($model,'batas_waktu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kd_skpd'); ?>
		<?php echo $form->textField($model,'kd_skpd'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->