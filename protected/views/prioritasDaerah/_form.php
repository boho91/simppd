<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'prioritas-daerah-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	<div class='col-md-6'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'tahun_perencanaan'); ?> 
				<select required  name="PrioritasDaerah[tahun_perencanaan]"  id="tahun_perencanaan" class="form-control">
					<?php 
					$minyear = Rpjmd::model()->getMinYear()-1;
					$maxyear = Rpjmd::model()->getMaxYear()+5;
					for($a=$maxyear;$a>$minyear;$a--)
					{
						echo '<option value="'.($a).'">'.($a).'</option>';      
					}
					?>
					                                     
				</select>
	</div>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'prioritas', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>
	<?php echo $form->textFieldGroup($model,'prioritas_ke',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
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
