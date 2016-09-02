<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'bidang-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	<div class='col-md-7'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'urusan'); ?> 
	<?php echo $form->dropdownList($model,'urusan',CHtml::listData(Urusan::model()->findAll(array('order'=>'id')),
                            'id','urusan'),
							
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Urusan---',
                            )); 
     ?> 
	</div>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
	<?php echo $form->textFieldGroup($model,'kode_bidang',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
	<?php echo $form->textFieldGroup($model,'bidang',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>
	</div>
	<div class='clear'></div>
<?php $this->endWidget(); ?>
