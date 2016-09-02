<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'realisasi-fisik-dan-keuangan-dak-dpa-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'tahun'); ?>

	<?php echo $form->hiddenField($model,'bulan'); ?>

	<?php echo $form->hiddenField($model,'urusan'); ?>

	<?php echo $form->hiddenField($model,'bidang'); ?>

	<?php echo $form->hiddenField($model,'program'); ?>

	<?php echo $form->hiddenField($model,'kegiatan'); ?>
	
	<?php echo $form->hiddenField($model,'id_dpa'); ?>
	<div class='col-md-6'>
	<div class='form-group'>
	<?php echo $form->label($model,'bulan')?>
	<?php echo $form->dropdownList($model,'bulan',CHtml::listData(Bulan::model()->findAll(array('order'=>'id')),
                            'id','bulan'),
							
                            array(
							'class'=>'form-control',
							'id'=>'bulan',
							'required'=>'required',
                            'prompt'=>'---Pilih Bulan---',
                            )); 
     ?> 
	</div>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>
	<div class='form-group'>
		<label>Harga Satuan Rp.</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "harga_satuan",
						'htmlOptions'=>array('required'=>'required','value'=>$model->harga_satuan,'class'=>'form-control ','maxlength'=>20,'placeholder'=>'Harga Satuan')
						));
		
		?>
	</div>
	</div>
	<div class='col-md-6'>
	<?php echo $form->textFieldGroup($model,'volume',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'volume','required'=>'required','class'=>'span5')))); ?>
	</div>
	<div class='col-md-6'>
	<div class='form-group'>
		<label>Nilai Pekerjaan Kontak Rp.</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "kontrak",
						'htmlOptions'=>array('value'=>$model->kontrak,'class'=>'form-control ','maxlength'=>20,'placeholder'=>'Pekerjaan Kontrak')
						));
		
		?>
	</div>
	</div>
	<div class='col-md-6'>
	<div class='form-group'>
		<label>Nilai Pekerjaan Swakelola Rp.</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "swakelola",
						'htmlOptions'=>array('value'=>$model->swakelola,'class'=>'form-control ','maxlength'=>20,'placeholder'=>'Pekerjaan Swakelola')
						));
		
		?>
	</div>
	</div>
	<div class='col-md-6'>
	<div class='form-group'>
		<label>Dana Pendamping Rp.</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "dana_pendamping",
						'htmlOptions'=>array('required'=>'required','value'=>$model->dana_pendamping,'class'=>'form-control ','maxlength'=>20,'placeholder'=>'Realisasi Keuangan')
						));
		
		?>
	</div>
	</div>
	<div class='col-md-6'>
	<?php echo $form->textFieldGroup($model,'realisasi_fisik',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'realisasi_fisik','required'=>'required','class'=>'span5','maxlength'=>20)))); ?>
	</div>
	<div class='col-md-6'>
	<div class='form-group'>
		<label>Nilai Realisasi Keuangan Rp.</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "realisasi_keuangan",
						'htmlOptions'=>array('required'=>'required','value'=>$model->realisasi_keuangan,'class'=>'form-control ','maxlength'=>20,'placeholder'=>'Realisasi Keuangan')
						));
		
		?>
	</div>
	</div>
	
	<div class='col-md-6'>
	<?php echo $form->textFieldGroup($model,'kuasa_pengguna_anggaran',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'realisasi_fisik','class'=>'span5','maxlength'=>20)))); ?>
	</div>
	<div class='col-md-6'>
	<?php echo $form->textFieldGroup($model,'pejabat_pelaksana_kegiatan',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'realisasi_fisik','class'=>'span5','maxlength'=>20)))); ?>
	</div>
	<div class='col-md-12'>
	<?php echo $form->textAreaGroup($model,'penerima_manfaat', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>3, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	
	<div class='col-md-6'>
	<?php echo $form->dropDownListGroup($model,'kesesuaian_sasaran_dan_lokasi_dengan_rkpd', array('widgetOptions'=>array('data'=>array("Ya"=>"Ya","Tidak"=>"Tidak",), 'htmlOptions'=>array('class'=>'input-large')))); ?>
	</div>
	<div class='col-md-6'>
	<?php echo $form->dropDownListGroup($model,'kesesuaian_antara_dpa_dengan_juknis', array('widgetOptions'=>array('data'=>array("Ya"=>"Ya","Tidak"=>"Tidak",), 'htmlOptions'=>array('class'=>'input-large')))); ?>
	</div>
	<div class='col-md-12'>
	<?php echo $form->textAreaGroup($model,'modifikasi_masalah', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>3, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
<script type="text/javascript" src="js/jquery.formatCurrency-1.4.0.js"></script><script type="text/javascript">
/*<![CDATA[*/

		$(document).ready(function() {
		var options = {"colorize":true,"negativeFormat":"-%s%n","roundToDecimalPlace":0,"region":"en_us","decimalSymbol":",","digitGroupSymbol":"."};
		    $('#dana_pendamping_text').blur(function() {
		        $(this).formatCurrency(options);
		            }).keyup(function(e) {
		                        	var onblurOptions = options;
		                        	onblurOptions['roundToDecimalPlace'] = -1;
		                        	onblurOptions['eventOnDecimalsEntered'] = true;
		                        	$(this).formatCurrency(onblurOptions);
		                     $(this).parent().find('.currency_input').val($(this).asNumber());

		             });

			// initializing values
			$('#dana_pendamping_text').formatCurrency(options);
			
		});
		$(document).ready(function() {
		var options = {"colorize":true,"negativeFormat":"-%s%n","roundToDecimalPlace":0,"region":"en_us","decimalSymbol":",","digitGroupSymbol":"."};
		    $('#harga_satuan_text').blur(function() {
		        $(this).formatCurrency(options);
		            }).keyup(function(e) {
		                        	var onblurOptions = options;
		                        	onblurOptions['roundToDecimalPlace'] = -1;
		                        	onblurOptions['eventOnDecimalsEntered'] = true;
		                        	$(this).formatCurrency(onblurOptions);
		                     $(this).parent().find('.currency_input').val($(this).asNumber());

		             });

			// initializing values
			$('#harga_satuan_text').formatCurrency(options);
			
		});
		$(document).ready(function() {
		var options = {"colorize":true,"negativeFormat":"-%s%n","roundToDecimalPlace":0,"region":"en_us","decimalSymbol":",","digitGroupSymbol":"."};
		    $('#kontrak_text').blur(function() {
		        $(this).formatCurrency(options);
		            }).keyup(function(e) {
		                        	var onblurOptions = options;
		                        	onblurOptions['roundToDecimalPlace'] = -1;
		                        	onblurOptions['eventOnDecimalsEntered'] = true;
		                        	$(this).formatCurrency(onblurOptions);
		                     $(this).parent().find('.currency_input').val($(this).asNumber());

		             });

			// initializing values
			$('#kontrak_text').formatCurrency(options);
			
		});
		$(document).ready(function() {
		var options = {"colorize":true,"negativeFormat":"-%s%n","roundToDecimalPlace":0,"region":"en_us","decimalSymbol":",","digitGroupSymbol":"."};
		    $('#swakelola_text').blur(function() {
		        $(this).formatCurrency(options);
		            }).keyup(function(e) {
		                        	var onblurOptions = options;
		                        	onblurOptions['roundToDecimalPlace'] = -1;
		                        	onblurOptions['eventOnDecimalsEntered'] = true;
		                        	$(this).formatCurrency(onblurOptions);
		                     $(this).parent().find('.currency_input').val($(this).asNumber());

		             });

			// initializing values
			$('#swakelola_text').formatCurrency(options);
			
		});
		$(document).ready(function() {
		var options = {"colorize":true,"negativeFormat":"-%s%n","roundToDecimalPlace":0,"region":"en_us","decimalSymbol":",","digitGroupSymbol":"."};
		    $('#realisasi_keuangan_text').blur(function() {
		        $(this).formatCurrency(options);
		            }).keyup(function(e) {
		                        	var onblurOptions = options;
		                        	onblurOptions['roundToDecimalPlace'] = -1;
		                        	onblurOptions['eventOnDecimalsEntered'] = true;
		                        	$(this).formatCurrency(onblurOptions);
		                     $(this).parent().find('.currency_input').val($(this).asNumber());

		             });

			// initializing values
			$('#realisasi_keuangan_text').formatCurrency(options);
			
		});
/*]]>*/
</script>