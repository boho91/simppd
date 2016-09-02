<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'rka-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('target'=>"_BLANK")
	
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<div class='col-md-4'>
	<div class="form-group">
		<?php echo $form->labelEx($model,'tahun'); ?> 
				<select required  name="RkaPerubahan[tahun]"  id="tahun" class="form-control">
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
	
	<div class='col-md-4'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'skpd'); ?> 
		<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
								'id','nama_skpd'),
								
								array(
								'class'=>'form-control',
								'prompt'=>'---Pilih SKPD---',
								)); 
		 ?> 
		</div>
		</div>
	<div class='col-md-4'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'urusan'); ?> 
		<?php echo $form->dropdownList($model,'urusan',CHtml::listData(Urusan::model()->findAll(array('order'=>'urusan')),
								'id','urusan'),
								
								array(
								'class'=>'form-control',
								'prompt'=>'---Pilih urusan---',
								)); 
		 ?> 
		</div>
		</div>

	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Export' : 'Export',
			'url'=>'index.php?r=rkaperubahan/CetakExcel&tahun='.$tahun.'&urusan='.$urusan.'&skpd='.$skpd.''
		)); ?>
</div>

<?php $this->endWidget(); ?>
