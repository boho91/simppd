<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'renja-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    )
));

 ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
	<?php echo $form->hiddenField($model,'tahun'); ?>
	<?php echo $form->hiddenField($model,'program'); ?>
	<?php echo $form->hiddenField($model,'skpd'); ?>
	<?php echo $form->hiddenField($model,'urusan'); ?>
	<?php echo $form->hiddenField($model,'bidang'); ?>
	<?php echo $form->hiddenField($model,'kegiatan'); ?>
	<?php echo $form->hiddenField($model,'lokasi_kegiatan'); ?>
	<?php echo $form->hiddenField($model,'kecamatan'); ?>
	<?php echo $form->hiddenField($model,'kelurahan'); ?>
	<div class='col-md-5'>
	<?php echo $form->textAreaGroup($model,'uraian', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->textAreaGroup($model,'target', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->textAreaGroup($model,'sasaran_kegiatan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->textAreaGroup($model,'sasaran_kegiatan_setelah_perubahan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-12'>
	<div class='col-md-5'>
	<div class='form-group'>
		<label>Kebutuhan Dana Rp.</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "kebutuhan_dana",
						'htmlOptions'=>array('value'=>$renja->kebutuhan_dana,'class'=>'form-control ','maxlength'=>20,'placeholder'=>'')
						));
		
		?>
	<?php $form->error($model,'kebutuhan_dana')?>
	</div>
	</div>
	<div class='col-md-5'>
	<div class='form-group'>
		<label>Kebutuhan Dana Setelah Perubahan Rp.</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "kebutuhan_dana_setelah_perubahan",
						'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'')
						));
		
		?>
	</div>
	</div>
	<!--<div class='col-md-5'>
	<?php //echo $form->textAreaGroup($model,'uraian', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>-->
	<div class='col-md-5'>
	<?php echo $form->textAreaGroup($model,'target_capaian_kinerja', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-5'>
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
	
	
	<div class='clear'></div>
	<div class='col-md-10'>
	<?php echo $form->textAreaGroup($model,'keterangan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='clear'></div>
	<?php //echo $form->dropDownListGroup($model,'sumber_usulan', array('widgetOptions'=>array('data'=>array("Renstra"=>"Renstra","Bukan Renstra"=>"Bukan Renstra",), 'htmlOptions'=>array('class'=>'input-large')))); ?>
	<?php //echo $form->dropDownListGroup($model,'status_verifikasi', array('widgetOptions'=>array('data'=>array("Diizinkan"=>"Diizinkan","Tidak Diizinkan"=>"Tidak Diizinkan",), 'htmlOptions'=>array('class'=>'input-large')))); ?>

	<?php// echo $form->textAreaGroup($model,'keterangan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php //echo $form->textFieldGroup($model,'alasan_tolak_renja',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<div class='col-md-5'>
			<div class='form-group'>
			<?php echo $form->labelEx($model,'foto'); 
				echo $form->fileField($model, 'foto', array('size'=>60,'maxlength'=>555)); 
				echo $form->error($model, 'foto'); 
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
