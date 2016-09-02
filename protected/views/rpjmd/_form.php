<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'visi-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	<div class='col-md-3'>
	<?php echo $form->textFieldGroup($model,'tahun_rpjmd',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','placeholder'=>'Isikan tahun awal RPJMD')))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'visi', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>
	<?php 
	echo $form->label($model,'keterangan');
	    $this->widget(
        'booster.widgets.TbCKEditor',
        array(
            'name' => 'Visi[keterangan]',
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
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
