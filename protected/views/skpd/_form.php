<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'skpd-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>	
	<div class='col-md-2'>
	<?php echo $form->textFieldGroup($model,'kode',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'bidang_urusan'); ?> 
	<?php echo $form->dropdownList($model,'bidang_urusan',CHtml::listData(Bidang::model()->findAll(),
                            'id','bidang'),
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Bidang Urusan---',
                            )); 
                      ?>
	
	</div>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
	<?php echo $form->textFieldGroup($model,'nama_skpd',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
	<?php echo $form->textAreaGroup($model,'alamat', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
	<?php echo $form->textFieldGroup($model,'no_telp',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
	<?php echo $form->textFieldGroup($model,'nama_penanda_tangan_dokumen',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
	<?php echo $form->textFieldGroup($model,'nip_penanda_tangan_dokumen',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
	<?php echo $form->textFieldGroup($model,'pangkat_penanda_tangan_dokumen',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
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
