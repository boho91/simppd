<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'renja-form',
	'enableAjaxValidation'=>false,
	'action'=>array('forumSKPD/VerifikasiMusrenbang','id'=>$model->id)
)); ?>


<?php 
echo "<script>
$('#dialog2 #tombolaksi').hide();
$('#status').change(function(){
	status = $(this).val();
	if(status=='Tolak')
	{
		$('#alasan_tolak').show();
	}else 
	{
		$('#alasan_tolak').hide();
		$('#alasan_tolak #txtAlasan').val('');
	}
});
$('#renja-form').submit(function(){
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
		$.fn.yiiGridView.update('kegiatan-musrenbang-grid');
	});
	return false;
});
</script>
";
 ?>
	<div id='status_aksi'></div>
	<div class='col-md-4'>
	<?php echo $form->dropDownListGroup($model,'status_forum_skpd', array('widgetOptions'=>array('data'=>array("Terima"=>"Terima","Tolak"=>"Tolak",), 'htmlOptions'=>array('id'=>'status','class'=>'input-large')))); ?>
	</div>
	<div class='clear'></div>
	<div id='alasan_tolak' class='col-md-12' <?php if($model->status_forum_skpd=="Terima") echo "style='display:none'"?>>
	<?php echo $form->textAreaGroup($model,'keterangan_forum_skpd', array('widgetOptions'=>array('htmlOptions'=>array('id'=>'txtAlasan','rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
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