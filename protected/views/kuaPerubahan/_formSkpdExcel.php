<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'ppas-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('target'=>"_BLANK")
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php // echo $form->hiddenField($model,'tahun'); ?>
	<?php // echo $form->hiddenField($model,'program'); ?>
	<?php // echo $form->hiddenField($model,'skpd'); ?>
	<?php echo $form->hiddenField($model,'urusan'); ?>
	<?php echo $form->hiddenField($model,'bidang'); ?>
	<?php echo $form->hiddenField($model,'kegiatan'); ?>
	
	<div class='col-md-4'>
	<div class="form-group">
		<?php echo $form->labelEx($model,'tahun'); ?> 
				<select required  name="KuaPerubahan[tahun]"  id="tahun" class="form-control">
					<?php 
					$minyear = Rpjmd::model()->getMinYear();
					$maxyear = Rpjmd::model()->getMaxYear()+5;
					for($a=$maxyear;$a>$minyear;$a--)
					{
						echo '<option value="'.($a).'">'.($a).'</option>';      
					}
					?>
					                                     
				</select>
	</div>
	</div>


<div class="form-actions col-md-12">
	<?php  $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Cetak Excel' : 'Cetak File Excel',
			'url'=>'index.php?r=kuaPerubahan/PlafonperSkpdExcel&tahun='.$tahun.''
		)); ?>

</div>

<?php $this->endWidget(); ?>
