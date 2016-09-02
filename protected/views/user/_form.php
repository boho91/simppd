<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	<div class='col-md-6'>	
	<?php echo $form->textFieldGroup($model,'username',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>	
	<?php echo $form->passwordFieldGroup($model,'password',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>	
	<?php echo $form->textFieldGroup($model,'nama_lengkap',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'skpd'); ?> 
		<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
								'id','nama_skpd'),
								
								array(
								'id'=>'skpd',
								'class'=>'form-control',
								'prompt'=>'---Pilih SKPD---',
								)); 
		 ?> 
		</div>
		</div>
	<div class='clear'></div>
	<div class='col-md-6'>	
	<?php echo $form->textFieldGroup($model,'email',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>	
	<?php echo $form->textFieldGroup($model,'nomor_telp',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>	
	<?php echo $form->dropDownListGroup($model,'level', array('widgetOptions'=>array('data'=>array("operator dinas"=>"operator dinas","admin bappeda"=>"admin bappeda",), 'htmlOptions'=>array('class'=>'input-large')))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>	
	<?php echo $form->dropDownListGroup($model,'status', array('widgetOptions'=>array('data'=>array("Aktif"=>"Aktif","Tidak Aktif"=>"Tidak Aktif",), 'htmlOptions'=>array('class'=>'input-large')))); ?>
	</div>
	<div class='clear'></div>
<div class="form-actions col-md-6">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
