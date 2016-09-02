<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'misi-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	<div class='col-md-6'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'tahun_rpjmd'); ?> 
	<?php echo $form->dropdownList($model,'tahun_rpjmd',CHtml::listData(Rpjmd::model()->findAll(array('order'=>'tahun_rpjmd')),
                            'id','tahun_rpjmd'),
							
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Tahun RPJMD---',
                            )); 
     ?> 
	</div>
	</div>
	<div class='clear'></div>
	
	<?php //echo $form->textFieldGroup($model,'tahun_rpjmd',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'misi', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	<?php 
	echo $form->label($model,'keterangan');
	    $this->widget(
        'booster.widgets.TbCKEditor',
        array(
            'name' => 'Misi[keterangan]',
			'value'=>$model->keterangan,
            'editorOptions' => array(
                // From basic `build-config.js` minus 'undo', 'clipboard' and 'about'
                'plugins' => 'basicstyles,toolbar,enterkey,entities,floatingspace,wysiwygarea,indentlist,link,list,dialog,dialogui,button,indent,fakeobjects'
            )
        )
    );
	?>
	</div>
	<div class='clear'></div>
<div class="form-actions col-md-12"><br>
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
