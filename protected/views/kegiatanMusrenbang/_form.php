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
	<?php // echo $form->textFieldGroup($model,'kd_skpd',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	
	<?php echo $form->hiddenField($model,'tahun'); ?>
	<?php echo $form->hiddenField($model,'kd_prog'); ?>
	<?php echo $form->hiddenField($model,'kd_skpd'); ?>
	<?php echo $form->hiddenField($model,'kd_urusan'); ?>
	<?php echo $form->hiddenField($model,'kd_bidang'); ?>
	<?php echo $form->hiddenField($model,'kd_prog'); ?>
	<?php echo $form->hiddenField($model,'kd_kegiatan'); ?>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'uraian', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-4'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'kecamatan'); ?> 
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
								'prompt'=>'---Pilih Kelurahan---',
								)); 
		 ?> 
		</div>
		</div>
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
		<label>Pagu Tahun a (<?php echo $model->tahun?>)Rp.</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "pagu_tahun_1",
						'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'Pagu Tahun a')
						));
		
		?>
		</div>
		</div>
	<div class='col-md-5'>
		<div class='form-group'>
		<label>Pagu Tahun a+1 (<?php echo $model->tahun+1?>)Rp.</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "pagu_tahun_2",
						'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'Pagu Tahun a+1')
						));
		
		?>
		</div>
		</div>

	<div class='clear'></div>
	<div class='col-md-5'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'sasaran_daerah'); ?> 
		<?php echo $form->dropdownList($model,'sasaran_daerah',CHtml::listData(SasaranDaerah::model()->findAll(array('condition'=>'tahun-10<='.Yii::app()->session['tahun_perencanaan'].' AND tahun+10>='.Yii::app()->session['tahun_perencanaan'].'','order'=>'sasaran_daerah')),
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
		<?php echo $form->dropdownList($model,'prioritas_daerah',CHtml::listData(PrioritasDaerah::model()->findAll(array('condition'=>'tahun_perencanaan-5<='.Yii::app()->session['tahun_perencanaan'].' AND tahun_perencanaan+5>='.Yii::app()->session['tahun_perencanaan'].'','order'=>'prioritas')),
								'id','prioritas'),
								
								array(
								'class'=>'form-control',
								'prompt'=>'---Pilih Prioritas Pembangunan Daerah---',
								)); 
		 ?> 
		</div>
		</div>
	<div class='col-md-5'>
	<?php echo $form->textAreaGroup($model,'sasaran_kegiatan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
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

        


		
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
