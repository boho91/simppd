<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php 
echo "<script>
jQuery(document).on('change','#program2',function() {
	waitingDialog.show();
	program = $(this).val();
	skpd = $('#skpd2').val();
	$.post('index.php?r=kegiatanSkpd/drowdown_kegiatan',{program:program,skpd:skpd},function(evt){
		$('#kegiatan2').html(evt);
		waitingDialog.hide();
	});
		
		return false;
});
jQuery(document).on('change','#skpd2',function() {
	waitingDialog.show();
	skpd = $('#skpd2').val();
	$.post('index.php?r=kegiatanSkpd/drowdown_program',{skpd:skpd},function(evt){
		$('#program2').html(evt);
		waitingDialog.hide();
	});
		
		return false;
});

</script>
";
echo $form->errorSummary($model); ?>
	<div class='col-md-2'>
	<?php echo $form->textFieldGroup($model,'tahun',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')))); ?>
	</div>
	<?php 
	if(Yii::app()->user->isAdminBappeda())
	{
		?>
		<div class='col-md-3'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'skpd'); ?> 
		<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
								'id','nama_skpd'),
								
								array(
								'id'=>'skpd2',
								'class'=>'form-control',
								'prompt'=>'---Pilih SKPD---',
								'required'=>'required',
								)); 
		 ?> 
		</div>
		</div>
		
		<?php
	}else
	{
		?>
		<div class='col-md-3'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'skpd'); ?> 
		<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
								'id','nama_skpd'),
								
								array(
								
								'disabled'=>'disabled',
								'class'=>'form-control',
								'required'=>'required',
								'prompt'=>'---Pilih SKPD---',
								)); 
		 ?> 
		<?php echo $form->hiddenField($model,'skpd',array('id'=>'skpd')); ?>
		</div>
		</div>
		<?php
	}
	?>
	
	<?php 
	if(Yii::app()->user->isAdminBappeda())
	{
		?>
		<div class='col-md-3'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'program'); ?> 
		<?php echo $form->dropdownList($model,'program',CHtml::listData(KegiatanSkpd::model()->findAll(array('group'=>'program')),
								'program','nama_program'),
								array(
								'id'=>'program2',
								'class'=>'form-control',
								'required'=>'required',
								'prompt'=>'---Pilih Program---',
							   )); 
			?>
		
		
		</div>
	</div>
		
		<?php
	}else
	{
		?>
		<div class='col-md-3'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'program'); ?> 
		<?php echo $form->dropdownList($model,'program',CHtml::listData(KegiatanSkpd::model()->findAll(array('condition'=>'skpd="'.$model->skpd.'"','group'=>'program')),
								'program','nama_program'),
								array(
								'id'=>'program2',
								'class'=>'form-control',
								'required'=>'required',
								'prompt'=>'---Pilih Program---',
							   )); 
			?>
		
		
		</div>
		</div>
		<?php
	}
	?>
	
	<div class='col-md-3'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'kegiatan'); ?> 
	<?php echo $form->dropdownList($model,'kegiatan',CHtml::listData(Kegiatan::model()->findAll(array('order'=>'kegiatan')),
                            'id','kegiatan'),
							
                            array(
							'id'=>'kegiatan2',
							'class'=>'form-control',
							'required'=>'required',
                            'prompt'=>'---Pilih Kegiatan---',
                            )); 
     ?> 
	</div>
	</div>
	<div class='clear'></div>
	
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'warning',
			'label'=>$model->isNewRecord ? 'Cari' : 'Cari',
		)); ?>
</div>

<?php $this->endWidget(); ?>
<div class='clear'></div>