<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'renstra-form',
	'enableAjaxValidation'=>false,
	'action'=>array('ppas/create')
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php 
echo "<script>
$('#program').change(function(){
	program = $(this).val();
	skpd = $('#skpd').val();
	$.post('index.php?r=kegiatanSkpd/drowdown_kegiatan',{program:program,skpd:skpd},function(evt){
		$('#kegiatan').html(evt);
	});
});
$('#skpd').change(function(){
	skpd = $('#skpd').val();
	$.post('index.php?r=kegiatanSkpd/drowdown_program',{skpd:skpd},function(evt){
		$('#program').html(evt);
	});
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
		<div class='col-md-8'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'skpd'); ?> 
		<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
								'id','nama_skpd'),
								
								array(
								'id'=>'skpd',
								'class'=>'form-control',
								'prompt'=>'---Pilih SKPD---',
								)); 
		 ?> 
		</div>
		</div>
		
		<?php
	}else
	{
		?>
		<div class='col-md-8'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'skpd'); ?> 
		<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
								'id','nama_skpd'),
								
								array(
								
								'disabled'=>'disabled',
								'class'=>'form-control',
								'prompt'=>'---Pilih SKPD---',
								)); 
		 ?> 
		<?php echo $form->hiddenField($model,'skpd',array('id'=>'skpd')); ?>
		</div>
		</div>
		<?php
	}
	?>
	
	<div class='clear'></div>
	<?php 
	if(Yii::app()->user->isAdminBappeda())
	{
		?>
		<div class='col-md-10'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'program'); ?> 
		<?php echo $form->dropdownList($model,'program',CHtml::listData(KegiatanSkpd::model()->findAll(array('group'=>'program')),
								'program','nama_program'),
								array(
								'id'=>'program',
								'class'=>'form-control',
								'prompt'=>'---Pilih Program---',
							   )); 
			?>
		
		
		</div>
	</div>
		
		<?php
	}else
	{
		?>
		<div class='col-md-10'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'program'); ?> 
		<?php echo $form->dropdownList($model,'program',CHtml::listData(KegiatanSkpd::model()->findAll(array('condition'=>'skpd="'.$model->skpd.'"','group'=>'program')),
								'program','nama_program'),
								array(
								'id'=>'program',
								'class'=>'form-control',
								'prompt'=>'---Pilih Program---',
							   )); 
			?>
		
		
		</div>
		</div>
		<?php
	}
	?>
	
	<div class='clear'></div>
	<div class='col-md-10'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'kegiatan'); ?> 
	<?php echo $form->dropdownList($model,'kegiatan',CHtml::listData(Kegiatan::model()->findAll(array('order'=>'kegiatan')),
                            'id','namaKegiatan'),
							
                            array(
							'id'=>'kegiatan',
							'class'=>'form-control',
                            'prompt'=>'---Pilih Kegiatan---',
                            )); 
     ?> 
	</div>
	</div>
	<div class='clear'></div>
	


<?php $this->endWidget(); ?>
<div class='clear'></div>