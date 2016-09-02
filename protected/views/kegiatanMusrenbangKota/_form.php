<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'kegiatan-musrenbang-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    )
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php //echo $form->errorSummary($model); ?>
	<?php //echo $form->textFieldGroup($model,'tahun',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php// echo $form->textFieldGroup($model,'kd_skpd',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	
	<?php echo $form->hiddenField($model,'tahun'); ?>
	<?php echo $form->hiddenField($model,'kd_prog'); ?>
	<?php echo $form->hiddenField($model,'kd_skpd'); ?>
	<?php echo $form->hiddenField($model,'kd_urusan'); ?>
	<?php echo $form->hiddenField($model,'kd_bidang'); ?>
	<?php echo $form->hiddenField($model,'kd_prog'); ?>
	<?php echo $form->hiddenField($model,'kd_kegiatan'); ?>
	<div class='col-md-10'>
	<?php echo $form->textAreaGroup($model,'uraian', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<!--<div class='col-md-4'>
		<div class='form-group'>
		<?php echo $form->dropdownList($model,'kecamatan',CHtml::listData(Kecamatan::model()->findAll(),
                            'id','kecamatan'),
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Kecamatan---',
                            'ajax'=>array(
                            'type'=>'POST', //request type
                            'url'=>CController::createUrl('kelurahan/drowdown_kelurahan'), //url to call.
                                //Style: CController::createUrl('currentController/methodToCall')
                            'update'=>'#kelurahan',
                             'data'=>array('kecamatan'=>'js:this.value'),
                                //leave out the data key to pass all form values through
                            ))); 
                      ?>
		</div>
		</div>
	<div class='col-md-4'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'kelurahan'); ?> 
		<?php echo $form->dropdownList($model,'kelurahan',CHtml::listData(Kelurahan::model()->findAll(array('order'=>'kelurahan')),
								'id','kelurahan'),
								
								array(
								'class'=>'form-control',
								'id'=>'kelurahan',
								'prompt'=>'---Pilih kelurahan---',
								)); 
		 ?> 
		</div>
		</div>-->
	<div class='clear'></div>
	<div class='col-md-5'>
	<?php echo $form->textFieldGroup($model,'volume', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->textFieldGroup($model,'satuan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	
	<div class='clear'></div>
	<div class='col-md-5'>
		<div class='form-group'>
		<label>Pagu Indikatif</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "pagu_indikatif",
						'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'Pagu Tahun a')
						));
		
		?>
		</div>
		</div>
	<div class='col-md-5'>
		<div class='form-group'>
		<label>Pagu Prakiraan Maju</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "pagu_prakiraan_maju",
						'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'Pagu Tahun a+1')
						));
		
		?>
		</div>
		</div>

	<div class='clear'></div>
	<div class='col-md-5'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'sasaran_daerah'); ?> 
		<?php echo $form->dropdownList($model,'sasaran_daerah',CHtml::listData(SasaranDaerah::model()->findAll(array('condition'=>'tahun<='.Yii::app()->session['tahun_perencanaan'].' AND tahun+5>='.Yii::app()->session['tahun_perencanaan'].'','order'=>'sasaran_daerah')),
								'id','sasaran_daerah'),
								
								array(
								'class'=>'form-control',
								'prompt'=>'---Pilih Sasaran Daerah---',
								)); 
		 ?> 
		</div>
		</div>
	<div class='col-md-5'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'prioritas_daerah'); ?> 
		<?php echo $form->dropdownList($model,'prioritas_daerah',CHtml::listData(PrioritasDaerah::model()->findAll(array('condition'=>'tahun_perencanaan<='.Yii::app()->session['tahun_perencanaan'].' AND tahun_perencanaan+5>='.Yii::app()->session['tahun_perencanaan'].'','order'=>'prioritas')),
								'id','prioritas'),
								
								array(
								'class'=>'form-control',
								'prompt'=>'---Pilih Prioritas Pembangunan Daerah---',
								)); 
		 ?> 
		</div>
		</div>
	<div class='col-md-10'>
	<?php echo $form->textAreaGroup($model,'sasaran_kegiatan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='clear'></div>
	<fieldset class='col-md-10'>
		<legend>Indikator Hasil Program</legend>
		<div class='col-md-5'>
		<?php echo $form->textFieldGroup($model,'tolak_ukur_hasil_program', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
		</div>
		<div class='col-md-5'>
		<?php echo $form->textFieldGroup($model,'target_hasil_program', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
		</div>
	</fieldset>
	<div class='clear'></div>
	<fieldset class='col-md-10'>
		<legend>Indikator Keluaran Kegiatan</legend>
	<div class='col-md-5'>
	<?php echo $form->textFieldGroup($model,'tolak_ukur_keluaran_kegiatan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->textFieldGroup($model,'target_keluaran_kegiatan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	</fieldset>
	<div class='clear'></div>
	<fieldset class='col-md-10'>
		<legend>Indikator Hasil Kegiatan</legend>
		<div class='col-md-5'>
		<?php echo $form->textFieldGroup($model,'tolak_ukur_hasil_kegiatan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
		</div>
		<div class='col-md-5'>
		<?php echo $form->textFieldGroup($model,'target_hasil_kegiatan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
		</div>
	</fieldset>
	<div class='col-md-5'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'jenis_kegiatan'); ?> 
		<?php echo $form->dropdownList($model,'jenis_kegiatan',CHtml::listData(JenisKegiatan::model()->findAll(array('order'=>'jenis_kegiatan')),
								'id','jenis_kegiatan'),
								
								array(
								'class'=>'form-control',
								'prompt'=>'---Pilih Jenis Kegiatan---',
								)); 
		 ?> 
		</div>
		</div>
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
		
		<div class='col-md-7'>
		<?php echo $form->labelEx($model,'foto'); ?> 
      <?php
	$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'foto',
        'config'=>array(
               'action'=>Yii::app()->createUrl('upload/upload'),
               'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>3*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>0.2*1024*1024,// minimum file size in bytes
               //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
               //'messages'=>array(
               //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
               //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
               //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
               //                  'emptyError'=>"{file} is empty, please select files again without it.",
               //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
               //                 ),
               //'showMessage'=>"js:function(message){ alert(message); }"
              )
));
	
	?>

        <?php echo $form->error($model,'foto'); ?>
	</div>
		

<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
