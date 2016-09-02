<?php 
Yii::app()->clientScript->registerScript('bantuan', "
$('#help').click(function(){
	$('#bantuan').toggle();
	return false;
});
jQuery('#LaporanPengadaanBarangJasa_jenis_belanja').change(function() {
	waitingDialog.show();
	jenis_belanja = $(this).val();
	if(jenis_belanja=='Belanja Langsung')
	{
		$('#jenis_belanja_langsung').show();
		$('#jenis_belanja_tidak_langsung').hide();
	}else if(jenis_belanja == 'Belanja Tidak Langsung')
	{
		$('#jenis_belanja_langsung').hide();
		$('#jenis_belanja_tidak_langsung').show();
	}
		
	waitingDialog.hide();
});
");
?>
	
	
	<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
		'id'=>'laporan-pengadaan-barang-jasa-form',
		'enableAjaxValidation'=>false,
	)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php 
	if(!Yii::app()->user->isOperatorDinas())
	{
	?>
	<div class='col-md-5'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'skpd'); ?> 
	<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
                            'id','nama_skpd'),
							
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Skpd---',
                            )); 
     ?> 
	</div>
	</div>
	<?php }?>
	<div class='col-md-5'>
	<?php echo $form->textFieldGroup($model,'uraian_kegiatan',array('widgetOptions'=>array('htmlOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Diisi dengan nama pengadaan sesuai dengan DPA SKPD", 'data-content'=>"Default popover",'class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->textFieldGroup($model,'tahun',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='col-md-5'>
		<?php echo $form->dropDownListGroup($model,'proses_pengadaan', array('widgetOptions'=>array('data'=>array(""=>"Pilih Proses Pengadaan","Pelelangan Umum"=>"Pelelangan Umum","Pelelangan Terbatas"=>"Pelelangan Terbatas","Pemilihan Langsung"=>"Pemilihan Langsung","Penunjukan Langsung"=>"Penunjukan Langsung",), 'htmlOptions'=>array('class'=>'input-large')))); ?>
	</div>
	<!--<div class='col-md-5'>
		<?php echo $form->dropDownListGroup($model,'jenis_belanja', array('widgetOptions'=>array('data'=>array(""=>"Pilih Jenis Belanja","Belanja Langsung"=>"Belanja Langsung","Belanja Tidak Langsung"=>"Belanja Tidak Langsung",), 'htmlOptions'=>array('class'=>'input-large')))); ?>
	</div>

	<div class='col-md-5' style='display:none' id='jenis_belanja_langsung'>
		<?php echo $form->dropDownListGroup($model,'jenis_belanja_langsung', array('widgetOptions'=>array('data'=>array(""=>"Pilih Jenis Belanja Langsung","Belanja Pegawai"=>"Belanja Pegawai","Belanja Barang dan Jasa"=>"Belanja Barang dan Jasa","Belanja Modal"=>"Belanja Modal"), 'htmlOptions'=>array('class'=>'input-large')))); ?>
	</div>
	<div class='col-md-5' style='display:none' id='jenis_belanja_tidak_langsung'>
		<?php echo $form->dropDownListGroup($model,'jenis_belanja_tidak_langsung', array('widgetOptions'=>array('data'=>array(""=>"Pilih Jenis Belanja Tidak Langsung","Belanja Pegawai"=>"Belanja Pegawai","Belanja bunga"=>"Belanja bunga","Belanja subsidi"=>"Belanja subsidi","Belanja hibah"=>"Belanja hibah","Bantuan sosial"=>"Bantuan sosial","Belanja bagi hasil"=>"Belanja bagi hasil","Bantuan keuangan"=>"Bantuan keuangan","Belanja tidak terduga"=>"Belanja tidak terduga"), 'htmlOptions'=>array('class'=>'input-large')))); ?>
	</div>
	<div class='clear'></div>-->
	<div class='col-md-5'>
		<?php echo $form->dropDownListGroup($model,'triwulan', array('widgetOptions'=>array('data'=>array(""=>"Pilih Triwulan","Triwulan I"=>"Triwulan I","Triwulan II"=>"Triwulan II","Triwulan III"=>"Triwulan III","Triwulan IV"=>"Triwulan IV",), 'htmlOptions'=>array('id'=>'triwulan','required'=>'required','class'=>'input-large')))); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->textFieldGroup($model,'volume',array('widgetOptions'=>array('htmlOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Di isi dengan banyaknya jumlah kegiatan pengadaan barang dan jasa sesuai dengan DPA SKPD", 'data-content'=>"Default popover",'class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->textFieldGroup($model,'satuan',array('widgetOptions'=>array('htmlOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Di isi dengan jenis satuan sesuai dengan DPA SKPD", 'data-content'=>"Default popover",'class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class='col-md-5'>
	<div class='form-group'>
		<label>Biaya</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "biaya",
						'htmlOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Di isi dengan jumlah anggaran yang ada untuk kegiatan tersebut sesuai dengan DPA SKPD", 'data-content'=>"Default popover",'class'=>'form-control ','maxlength'=>20,'placeholder'=>'')
						));
		
		?>
	</div>
	</div>
	<div class='col-md-5'>
	<?php echo $form->datePickerGroup($model,'tgl_proses_pengadaan',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Di isi dengan tanggal mulai dilaksanakannya kegiatan", 'data-content'=>"Default popover",'class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->datePickerGroup($model,'tanda_tangan_kontrak',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Di isi dengan tanggal penandatanganan kontrak", 'data-content'=>"Default popover",'class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->datePickerGroup($model,'pelaksanaan',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Di isi dengan tanggal mulai dilaksanakannya kegiatan", 'data-content'=>"Default popover",'class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->datePickerGroup($model,'pho',array('widgetOptions'=>array('options'=>array('format'=>'yyyy-mm-dd'),'htmlOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Di isi dengan tanggal pada saat PHO ditandatangani", 'data-content'=>"Default popover",'class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->textAreaGroup($model,'keterangan', array('widgetOptions'=>array('htmlOptions'=>array( 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-12'>
	<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
		<br><br>
	</div>
	</div>
<?php $this->endWidget(); ?>
<div class='clear'></div>
