<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'ppas-form',
	'enableAjaxValidation'=>false,'htmlOptions'=>array('target'=>"_BLANK")
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php // echo $form->hiddenField($model,'tahun'); ?>
	<?php // echo $form->hiddenField($model,'program'); ?>
	<?php // echo $form->hiddenField($model,'skpd'); ?>
	<?php // echo $form->hiddenField($model,'urusan'); ?>
	<?php echo $form->hiddenField($model,'bidang'); ?>
	<?php echo $form->hiddenField($model,'kegiatan'); ?>
	
	<div class='col-md-4'>
	<div class="form-group">
		<?php echo $form->labelEx($model,'tahun'); ?> 
				<select required  name="Ppas[tahun]"  id="tahun" class="form-control">
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
		<?php echo $form->labelEx($model,'urusan'); ?> 
		<?php echo $form->dropdownList($model,'urusan',CHtml::listData(Urusan::model()->findAll(array('order'=>'urusan')),
								'id','urusan'),
								
								array(
								'class'=>'form-control',
								'prompt'=>'---Pilih Urusan---',
								)); 
		 ?> 
		</div>
		</div>
		
		<div class='col-md-4'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'skpd'); ?> 
		<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
								'id','nama_skpd'),
								
								array(
								'class'=>'form-control',
								'prompt'=>'---Pilih Skpd---',
								)); 
		 ?> 
		</div>
		</div>


<div class="form-actions col-md-12">
	<?php  $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Cetak Pdf' : 'Cetak File Pdf',
			'url'=>'index.php?r=ppas/PlafonperProgrampdf&tahun='.$tahun.'&urusan='.$urusan.' & skpd='.$skpd.''
		)); ?>

</div>

<?php $this->endWidget(); ?>
