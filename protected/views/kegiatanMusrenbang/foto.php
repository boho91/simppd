<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'kegiatan-musrenbang-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    )
)); ?>

<section class="content-header">
<h1>Upload Gambar Usulan Musrenbang Kecamatan</h1>

	<?php
$this->breadcrumbs=array(
		'Kegiatan Musrenbang'=>array('admin'),
		'Manage',
	);?>


</section>
<section class="content">
<?php //echo $form->errorSummary($model); ?>
	<?php //echo $form->textFieldGroup($model,'tahun',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php // echo $form->textFieldGroup($model,'kd_skpd',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	
	
		
		
		
	  <div class='col-md-5'>
	  <?php echo $form->labelEx($model,'foto'); ?>
	<?php
	
	$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'foto',
        'config'=>array(
               'action'=>Yii::app()->createUrl('kegiatanMusrenbang/upload'),
               'allowedExtensions'=>array("jpg","jpeg","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>3*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>0.2*1024*1024,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ alert('Gambar telah diupload'); }",
               'onSubmit' => "js:function(id, fileName){
    				// add filedescriton to post parameters:
    				this.params.filename = fileName;
				}",
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
	
	

        
	</div>

		
<div class="form-actions col-md-12">
	<?php  $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan Foto',
			'url'=>'index.php?r=kegiatanMusrenbang/CetakUsulanExcel&tahun='.$tahun.'&kecamatan='.$kecamatan.'&kd_urusan='.$kd_urusan.''
		)); ?>
		
</div>

<?php $this->endWidget(); ?>
</section>
