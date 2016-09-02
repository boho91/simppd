<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'kegiatan-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	<div class='col-md-6'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'program'); ?> 
	<?php echo $form->dropdownList($model,'program',CHtml::listData(Program::model()->findAll(array('order'=>'program')),
                            'id','program'),
							
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Program---',
                            )); 
     ?> 
	</div>
	</div>
	<div class='clear'></div>
	
	<div class='col-md-6'>
	<?php echo $form->textFieldGroup($model,'kode_kegiatan',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'kegiatan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='clear'></div>
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
