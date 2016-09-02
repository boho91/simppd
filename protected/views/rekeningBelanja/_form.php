<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'rekening-belanja-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textAreaGroup($model,'uraian', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php //echo $form->textFieldGroup($model,'parent_id',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'kode1',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>

	<?php echo $form->textFieldGroup($model,'kode2',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>111)))); ?>

	<?php echo $form->textFieldGroup($model,'kode3',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>111)))); ?>

	<?php echo $form->textFieldGroup($model,'kode4',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>111)))); ?>

	<?php echo $form->textFieldGroup($model,'kode5',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>111)))); ?>

	<?php echo $form->textAreaGroup($model,'keterangan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
