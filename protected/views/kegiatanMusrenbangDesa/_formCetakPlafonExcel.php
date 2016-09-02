<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'kegiatan-musrenbang-form',
	'enableAjaxValidation'=>false,'htmlOptions'=>array('target'=>"_BLANK")
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	
	<?php echo $form->hiddenField($model,'kd_prog'); ?>
	<?php echo $form->hiddenField($model,'kd_skpd'); ?>
	<?php echo $form->hiddenField($model,'kd_bidang'); ?>
	<?php echo $form->hiddenField($model,'kd_prog'); ?>
	<?php echo $form->hiddenField($model,'kd_kegiatan'); ?>
		
	<div class='col-md-4'>
	<div class="form-group">
		<?php echo $form->labelEx($model,'tahun'); ?> 
				<select required  name="KegiatanMusrenbangDesa[tahun]"  id="tahun" class="form-control">
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
		<?php echo $form->labelEx($model,'kd_urusan'); ?> 
		<?php echo $form->dropdownList($model,'kd_urusan',CHtml::listData(Urusan::model()->findAll(array('order'=>'urusan')),
								'id','urusan'),
								
								array(
								'class'=>'form-control',
								'prompt'=>'---Pilih Urusan---',
								)); 
		 ?> 
		</div>
		</div>
		
			
<div class="form-actions col-md-12">
	<?php  $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Cetak Excel' : 'Cetak File Excel',
			'url'=>'index.php?r=kegiatanMusrenbangDesa/CetakPlafonExcel&tahun='.$tahun.'&kd_urusan='.$kd_urusan.''
		)); ?>

</div>

<?php $this->endWidget(); ?>
