<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'kegiatan-musrenbang-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('target'=>"_BLANK")
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	
	<?php // echo $form->hiddenField($model,'kd_prog'); ?>
	<?php  // echo $form->hiddenField($model,'kd_skpd'); ?>
	<?php // echo $form->hiddenField($model,'kd_bidang'); ?>
	<?php // echo $form->hiddenField($model,'kd_prog'); ?>
	<?php // echo $form->hiddenField($model,'kd_kegiatan'); ?>
		
	<div class='col-md-4'>
	<div class="form-group">
		<?php echo $form->labelEx($model,'tahun'); ?> 
				<select required  name="KegiatanMusrenbangKota[tahun]"  id="tahun" class="form-control">
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
		<?php echo $form->labelEx($model,'kd_skpd'); ?> 
		<?php echo $form->dropdownList($model,'kd_skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
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
		<?php echo $form->labelEx($model,'sumber_dana'); ?> 
		<?php echo $form->dropdownList($model,'sumber_dana',CHtml::listData(SumberDana::model()->findAll(array('order'=>'sumber_dana')),
								'id','sumber_dana'),
								
								array(
								'class'=>'form-control',
								'prompt'=>'---Pilih Sumber Dana---',
								)); 
		 ?> 
		</div>
		</div>
		
			
<div class="form-actions col-md-12">
	<?php  $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Cetak Pdf' : 'Cetak File Pdf',
			'url'=>'index.php?r=kegiatanMusrenbang/CetakUsulanPdf&tahun='.$tahun.'&kd_skpd='.$kd_skpd.'&sumber_dana='.$sumber_dana.''
		)); ?>
		
</div>

<?php $this->endWidget(); ?>
