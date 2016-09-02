<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'ppas-form',
	'enableAjaxValidation'=>false,'htmlOptions'=>array('target'=>"_BLANK")
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	
	<div class='col-md-4'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'kd_skpd'); ?> 
		<?php echo $form->dropdownList($model,'kd_skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
								'id','nama_skpd'),
								
								array(
								'class'=>'form-control',
								'prompt'=>'---Pilih SKPD---',
								)); 
		 ?> 
		</div>
		</div>	
	
<div class="form-actions col-md-12">
	<?php  $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Cetak Excel' : 'Cetak File Excel',
			'url'=>'index.php?r=spm/CetakSpmExcel&kd_skpd='.$kd_skpd.' '
		)); ?>

</div>

<?php $this->endWidget(); ?>
