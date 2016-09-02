<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'rka-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php echo $form->hiddenField($model,'tahun'); ?>

	<?php echo $form->hiddenField($model,'urusan'); ?>

	<?php echo $form->hiddenField($model,'bidang'); ?>

	<?php echo $form->hiddenField($model,'program'); ?>

	<?php echo $form->hiddenField($model,'kegiatan'); ?>

	<?php echo $form->hiddenField($model,'skpd'); ?>

	<?php echo $form->hiddenField($model,'parent_id'); ?>
	<label>Item</label>
	<?php 
	 
	 $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'name'=>'item',
            'value'=>'',
            'source'=>CController::createUrl('/rkaPerubahan/AutoCompleteItem'),
            'options'=>array(
            'showAnim'=>'fold',         
            'minLength'=>'2',
            'select'=>'js:function( event, ui ) {
                       // $("#searchbox").val( ui.item.label );
                      //  $("#selectedvalue").val( ui.item.value );
                      //  return false;
                  }',
            ),
            'htmlOptions'=>array(
			'name'=>'RkaPerubahan[item]',
            //'onfocus' => 'js: this.value = null; $("#searchbox").val(null); $("#selectedvalue").val(null);',
            'class' => 'form-control',
            'placeholder' => "Item",
            ),
            ));

	?>
	<?php //echo $form->textFieldGroup($model,'item', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php echo $form->textFieldGroup($model,'volume',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'satuan',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
	<div class='form-group'>
		<label>Harga Satuan Rp.</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "harga_satuan",
						'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'')
						));
		
		?>
	</div>
	<div class='clear'></div>




<?php $this->endWidget(); ?>
<script type="text/javascript" src="js/jquery.formatCurrency-1.4.0.js"></script>
<script type="text/javascript">
/*<![CDATA[*/

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
		
/*]]>*/
</script>