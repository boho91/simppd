<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'kegiatan-skpd-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<div id='pesan'></div>
<?php echo $form->errorSummary($model); ?>

	
	<div class='col-md-7'>
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
	<!--<div class='col-md-4'>
	<?php echo $form->textFieldGroup($model,'tahun',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->hiddenField($model,'tahun')?>
	</div>-->
	<div class='clear'></div>
	<div class='col-md-12' id='form_kegiatan'>
	<?php 
	$modelProgram = Program::model()->findAll(array('order'=>'program'));
	echo "<table class='table'>";
	echo "<tr><th></th><th></th><th><input id='select_all'type='checkbox'> Pilih Semua</th></tr>";
	foreach($modelProgram as $data)
	{
		$modelKegiatan = Kegiatan::model()->findAll(array('order'=>'kegiatan','condition'=>'program = "'.$data->id.'"'));
		
		echo "<tr><th>Program</th><th>".$data->program."</th><th></th></tr>";
		echo "<tr><th>Kegiatan</th><th></th><th></th></tr>";
		foreach($modelKegiatan as $item)
		{
			
			echo "<tr><td></td><td>".$item->kegiatan."</td><td><input type='checkbox' value='".$item->id."' name='kegiatan[]'></td></tr>";
		}
		
	}
	echo "</table>";
	?>
	</div>
	<div class='clear'></div>
	<!--
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>
-->
<?php $this->endWidget(); ?>
<script>
 $('#select_all').on('click',function(){
        if(this.checked){
            $('#form_kegiatan input:checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('#form_kegiatan input:checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    
</script>