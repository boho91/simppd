<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'kua-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	<?php echo $form->hiddenField($model,'tahun'); ?>
	<?php echo $form->hiddenField($model,'program'); ?>
	<?php echo $form->hiddenField($model,'skpd'); ?>
	<?php echo $form->hiddenField($model,'urusan'); ?>
	<?php echo $form->hiddenField($model,'bidang'); ?>
	<?php echo $form->hiddenField($model,'kegiatan'); ?>
	<div class='col-md-5'>
	<div class='form-group'>
		<label>PAGU INDIKATIF TAHUN N-1 Rp.</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "pagu_tahun_n_min_1",
						'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'')
						));
		
		?>
		<?php $form->error($model,'plafon_anggaran')?>
	</div>
	</div>
	<div class='clear'></div>
	<div class='col-md-5'>
	<div class='form-group'>
		<label>PAGU INDIKATIF TAHUN N Rp.</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "pagu_tahun_n",
						'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'')
						));
		
		?>
		<?php $form->error($model,'plafon_anggaran')?>
	</div>
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
