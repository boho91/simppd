<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tujuan-skpd-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class='col-md-7'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'skpd'); ?> 
	<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'id')),
                            'id','nama_skpd'),
							
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih SKPD---',
                            )); 
     ?> 
	</div>
	</div>
	<div class='clear'></div>
	
	<div class='col-md-7'>
	<?php echo $form->textAreaGroup($model,'tujuan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	

	

<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>