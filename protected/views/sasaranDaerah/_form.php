<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'sasaran-daerah-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<div class='col-md-7'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'misi'); ?> 
	<?php echo $form->dropdownList($model,'misi',CHtml::listData(Misi::model()->findAll(array('order'=>'id')),
                            'id','misi'),
							
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Misi---',
                            )); 
     ?> 
	</div>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'prioritas_daerah'); ?> 
	<?php echo $form->dropdownList($model,'prioritas_daerah',CHtml::listData(PrioritasDaerah::model()->findAll(array('order'=>'id')),
                            'id','prioritas'),
							
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Prioritas Daerah---',
                            )); 
     ?> 
	</div>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
	<?php echo $form->textAreaGroup($model,'sasaran_daerah', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
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
