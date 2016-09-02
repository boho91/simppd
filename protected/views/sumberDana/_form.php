<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'sumber-dana-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	<div class='col-md-7'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'jenis_sumber_dana'); ?> 
	<?php echo $form->dropdownList($model,'jenis_sumber_dana',CHtml::listData(SumberDana::model()->findAll(array('order'=>'jenis_sumber_dana','group'=>'jenis_sumber_dana')),
                            'id','jenis_sumber_dana'),
                            array(
							'name'=>'jenis_sumber_dana',
							'class'=>'form-control',
                            'prompt'=>'---Pilih Jenis Sumber Dana---',
                            )); 
                      ?>
	
	</div>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
	<?php echo $form->textFieldGroup($model,'sumber_dana',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
