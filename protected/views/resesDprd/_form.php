<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'reses-dprd-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary(	$model); ?>
	<div class='col-md-7'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'skpd'); ?> 
	<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(),
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
	<?php echo $form->textAreaGroup($model,'usulan',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'kelurahan','class'=>'span5','maxlength'=>500)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'sumber_dana'); ?> 
	<?php echo $form->dropdownList($model,'sumber_dana',CHtml::listData(SumberDana::model()->findAll(),
                            'id','sumber_dana'),
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Sumber Dana---',
                            )); 
                      ?>
	
	</div>
	</div>

	<div class='clear'></div>
	
	<div class='col-md-7'>
	<?php echo $form->textAreaGroup($model,'keterangan',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'kelurahan','class'=>'span5','maxlength'=>500)))); ?>
	</div>
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
