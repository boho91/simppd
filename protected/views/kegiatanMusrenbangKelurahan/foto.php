<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'foto-form',
	'enableAjaxValidation'=>false,
)); ?>

<section class="content-header">
<h1>Foto Usulan Musrenbang Kelurahan</h1>
</section>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
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
               'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
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
