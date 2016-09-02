<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'realisasi-fisik-dan-keuangan-dau-dpa-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>


	

	<?php echo $form->hiddenField($model,'tahun'); ?>

	<?php echo $form->hiddenField($model,'bulan'); ?>

	<?php echo $form->hiddenField($model,'urusan'); ?>

	<?php echo $form->hiddenField($model,'bidang'); ?>

	<?php echo $form->hiddenField($model,'program'); ?>

	<?php echo $form->hiddenField($model,'kegiatan'); ?>
	<?php echo $form->hiddenField($model,'is_perubahan'); ?>
	<div class='col-md-6'>
	<div class='form-group'>
	<?php echo $form->label($model,'bulan')?>
	<?php echo $form->dropdownList($model,'bulan',CHtml::listData(Bulan::model()->findAll(array('order'=>'id')),
                            'id','bulan'),
							
                            array(
							'class'=>'form-control',
							'id'=>'bulan',
							'required'=>'required',
                            'prompt'=>'---Pilih Bulan---',
                            )); 
     ?> 
	</div>
	</div>
	<div class='clear'></div>
	
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'manfaat_kegiatan',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'manfaat_kegiatan','required'=>'required','class'=>'span5')))); ?>
	</div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'kendala',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'kendala','required'=>'required','class'=>'span5')))); ?>
	</div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'tindak_lanjut',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'manfaat_kegiatan','required'=>'required','class'=>'span5')))); ?>
	</div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'pihak_pembantu',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'kendala','required'=>'required','class'=>'span5')))); ?>
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
