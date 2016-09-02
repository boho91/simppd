<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'musrenbangkegiatanrpjmd-form',
	'enableAjaxValidation'=>false,
	'action'=>array('musrenbangkegiatanrpjmd/verifikasi','id'=>$model->id)
)); ?>


<?php 
echo "<script>
$('#dialog2 #tombolaksi').hide();
$('#status').change(function(){
	status = $(this).val();
	if(status=='Tidak Diizinkan')
	{
		$('#alasan_tolak').show();
	}else 
	{
		$('#alasan_tolak').hide();
		$('#alasan_tolak #txtAlasan').val('');
	}
});
$('#musrenbangkegiatanrpjmd-form').submit(function(){
	url = $(this).attr('action');
	data = $(this).serialize();
	$.post(url,data,function(evt){
		if(evt=='sukses')
		{
			$('#status_aksi').html('<div class=\'alert alert-success\'>Data berhasil disimpan!</div>');
		}else 
		{
			$('#status_aksi').html('<div class=\'alert alert-danger\'>Data gagal disimpan!</div>');
		}
		$.fn.yiiGridView.update('musrenbangkegiatanRpjmd-grid');
	});
	return false;
});
</script>
";
 ?>
	<div id='status_aksi'></div>
	<div class='col-md-4'>
	<?php echo $form->dropDownListGroup($model,'status_verifikasi', array('widgetOptions'=>array('data'=>array("Diizinkan"=>"Diizinkan","Tidak Diizinkan"=>"Tidak Diizinkan",), 'htmlOptions'=>array('id'=>'status','class'=>'input-large')))); ?>
	</div>
	<div class='clear'></div>
	<div id='alasan_tolak' class='col-md-12' <?php if($model->status_verifikasi=="Diizinkan") echo "style='display:none'"?>>
	<?php echo $form->textAreaGroup($model,'alasan_tolak', array('widgetOptions'=>array('htmlOptions'=>array('id'=>'txtAlasan','rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>

<div class="form-actions col-md-12" id='aksi'>
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'htmlOptions'=>array('id'=>'aksi'),
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>
<?php $this->endWidget(); ?>
<div class='clear'></div>