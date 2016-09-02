<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'kelurahan-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary(	$model); ?>
	<div class='col-md-7'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'kecamatan'); ?> 
	<?php echo $form->dropdownList($model,'kecamatan',CHtml::listData(Kecamatan::model()->findAll(),
                            'id','kecamatan'),
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Kecamatan---',
                            'ajax'=>array(
                            'type'=>'POST', //request type
                            'url'=>CController::createUrl('kelurahan/drowdown_kelurahan'), //url to call.
                                //Style: CController::createUrl('currentController/methodToCall')
                            'update'=>'#kelurahan',
                             'data'=>'js:$(this).serialize()',
                                //leave out the data key to pass all form values through
                            ))); 
                      ?>
	
	</div>
	</div>
	<div class='clear'></div>
	
	<div class='col-md-7'>
	<?php echo $form->textFieldGroup($model,'kelurahan',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'kelurahan','class'=>'span5','maxlength'=>100)))); ?>
	</div>
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
