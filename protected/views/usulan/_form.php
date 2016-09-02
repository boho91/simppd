<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'usulan-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    )
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php //echo $form->errorSummary($model); ?>
	<?php //echo $form->textFieldGroup($model,'tahun',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php// echo $form->textFieldGroup($model,'kd_skpd',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	
	
	<div class='col-md-5'>
	<?php echo $form->textFieldGroup($model,'usulan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
