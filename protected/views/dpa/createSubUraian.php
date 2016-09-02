<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'rka-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'tahun'); ?>

	<?php echo $form->hiddenField($model,'urusan'); ?>

	<?php echo $form->hiddenField($model,'bidang'); ?>

	<?php echo $form->hiddenField($model,'program'); ?>

	<?php echo $form->hiddenField($model,'kegiatan'); ?>

	<?php echo $form->hiddenField($model,'skpd'); ?>

	<?php echo $form->hiddenField($model,'parent_id'); ?>
	<?php 
	 $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name'=>'sub_uraian',
            'value'=>'',
            'source'=>CController::createUrl('/dpa/AutoCompleteSubUraian'),
            'options'=>array(
            'showAnim'=>'fold',         
            'minLength'=>'2',
            'select'=>'js:function( event, ui ) {
                       // $("#searchbox").val( ui.item.label );
                      //  $("#selectedvalue").val( ui.item.value );
                      //  return false;
                  }',
            ),
            'htmlOptions'=>array(
            //'onfocus' => 'js: this.value = null; $("#searchbox").val(null); $("#selectedvalue").val(null);',
            'class' => 'form-control',
			'name'=>'Dpa[sub_uraian]',
            'placeholder' => "Sub uraian",
            ),
            ));

	?>
	<?php //echo $form->textFieldGroup($model,'sub_uraian',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>



<?php $this->endWidget(); ?>
