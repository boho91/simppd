<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'panduan-usulan-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary(	$model); ?>



	<div class='col-md-4'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'jenis_usulan'); ?> 
		<?php echo $form->dropdownList($model,'jenis_usulan',CHtml::listData(Usulan::model()->findAll(array('order'=>'usulan')),
								'id','usulan'),
								
								array(
								'class'=>'form-control',
								'id'=>'usulan',
								'prompt'=>'---Pilih Usulan---',
								)); 
		 ?> 
		</div>
		</div>

	<?php echo $form->textFieldGroup($model,'nama_usulan',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>


	<div class='clear'></div>
	<div class='col-md-5'>
	<div class='form-group'>
		<label>Harga</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "harga",
						'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'')
						));
		
		?>
		<?php $form->error($model,'harga')?>
	</div>
	</div>
	<?php echo $form->textFieldGroup($model,'satuan',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>


	
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>