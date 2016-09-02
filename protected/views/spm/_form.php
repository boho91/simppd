<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'spm-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary(	$model); ?>



	<div class='col-md-7'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'kd_pelayanan_dasar'); ?> 
		<?php echo $form->dropdownList($model,'kd_pelayanan_dasar',CHtml::listData(PelayananDasar::model()->findAll(array('order'=>'pelayanan_dasar')),
								'id','pelayanan_dasar'),
								
								array(
								'class'=>'form-control',
								'id'=>'kd_pelayanan_dasar',
								'prompt'=>'---Pilih Pelayanan Dasar---',
								)); 
		 ?> 
		</div>
		</div>

		<div class='clear'></div>
		<div class='col-md-7'>
			<div class='form-group'>
				<?php echo $form->textAreaGroup($model,'indikator',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>200)))); ?>
			</div>
		</div>

	<div class='clear'></div>
	<div class='col-md-7'>
		<div class='form-group'>
			<?php echo $form->textFieldGroup($model,'nilai',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
		</div>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
		<div class='form-group'>
			<?php echo $form->labelEx($model,'batas_waktu'); ?> 
				<select required  name="Spm[batas_waktu]"  id="batas_waktu" class="form-control">
					<?php 
					$minyear = Rpjmd::model()->getMinYear()-5;
					$maxyear = Rpjmd::model()->getMaxYear()+5;
					for($a=$maxyear;$a>$minyear;$a--)
					{
						echo '<option value="'.($a).'">'.($a).'</option>';      
					}
					?>
					                                     
				</select></div>
	</div>
	<div class='clear'></div>
	<div class='col-md-7'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'kd_skpd'); ?> 
		<?php echo $form->dropdownList($model,'kd_skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
								'id','nama_skpd'),
								
								array(
								'class'=>'form-control',
								'id'=>'kd_skpd',
								'prompt'=>'---Pilih SKPD Penanggung Jawab---',
								)); 
		 ?> 
		</div>
		</div>
	
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>