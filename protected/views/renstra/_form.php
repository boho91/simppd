<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'renstra-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    )
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php // echo $form->errorSummary($model); ?>
	<?php echo $form->hiddenField($model,'tahun_perencanaan'); ?>
	<?php echo $form->hiddenField($model,'program'); ?>
	<?php echo $form->hiddenField($model,'skpd'); ?>
	<?php echo $form->hiddenField($model,'urusan'); ?>
	<?php echo $form->hiddenField($model,'bidang'); ?>
	<?php echo $form->hiddenField($model,'kegiatan'); ?>
	

	
	
	<div class='col-md-5'>
	<?php echo $form->textAreaGroup($model,'tujuan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<?php // echo $form->labelEx($model,'tujuan'); ?> 
	<?php /* echo $form->dropdownList($model,'tujuan',CHtml::listData(Misi::model()->findAll(),
                            'id','misi'),
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Tujuan---',
                            'ajax'=>array(
                            'type'=>'POST', //request type
                            'url'=>CController::createUrl('sasarandaerah/drowdown_sasaran'), //url to call.
                                //Style: CController::createUrl('currentController/methodToCall')
                            'update'=>'#Renstra_sasaran_pembangunan',
                            // 'data'=>'js:$(this).serialize()',
                             'data'=>array('misi'=>'js:this.value'),
                                //leave out the data key to pass all form values through
                            ))); */
                      ?>
	
	
	<div class='clear'></div>
	<div class='col-md-13'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'sasaran_pembangunan'); ?> 
		<?php echo $form->dropdownList($model,'sasaran_pembangunan',CHtml::listData(SasaranDaerah::model()->findAll(),
                            'id','sasaran_daerah'),
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Sasaran Daerah---',
                           )); 
                      ?>
		
		</div>
		</div>
		
	
	<div class='clear'></div>
	<div class='col-md-5'>
	<?php echo $form->textAreaGroup($model,'indikator_sasaran', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	<?php // echo $form->textFieldGroup($model,'kode',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>100)))); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->textAreaGroup($model,'indikator_kinerja_program_dan_kegiatan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-5'>
	<?php echo $form->textAreaGroup($model,'capaian_tahun_awal', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='clear'></div>
	<fieldset>
		<legend>Target Kinerja Program dan Kerangka Pendanaan</legend>
		<div class='col-md-5'>
			<?php echo $form->textAreaGroup($model,'target_tahun_1', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>50, 'class'=>'span8')))); ?>
		</div>
		<div class='col-md-5'>
		<div class='form-group'>
		<label>Pagu Tahun -1</label>
		<?php
		$this->widget("FormatCurrency",
					array(
						"model" => $model,
						"attribute" => "pagu_tahun_1",
						'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'')
						));
		
		?>
		</div>
		</div>
		<div class='clear'></div>
		<div class='col-md-5'>
			<?php echo $form->textAreaGroup($model,'target_tahun_2', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>50, 'class'=>'span8')))); ?>
		</div>
		<div class='col-md-5'>
			<div class='form-group'>
			<label>Pagu Tahun -2</label>
			<?php
			$this->widget("FormatCurrency",
						array(
							"model" => $model,
							"attribute" => "pagu_tahun_2",
							'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'')
							));
			
			?>
			</div>
		</div>
		<div class='clear'></div>
		<div class='col-md-5'>
			<?php echo $form->textAreaGroup($model,'target_tahun_3', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>50, 'class'=>'span8')))); ?>
		</div>
		<div class='col-md-5'>
			<div class='form-group'>
			<label>Pagu Tahun -3</label>
			<?php
			$this->widget("FormatCurrency",
						array(
							"model" => $model,
							"attribute" => "pagu_tahun_3",
							'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'')
							));
			
			?>
			</div>
		</div>
		<div class='clear'></div>
		<div class='col-md-5'>
			<?php echo $form->textAreaGroup($model,'target_tahun_4', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>50, 'class'=>'span8')))); ?>
		</div>
		<div class='col-md-5'>
			<div class='form-group'>
			<label>Pagu Tahun-4</label>
			<?php
			$this->widget("FormatCurrency",
						array(
							"model" => $model,
							"attribute" => "pagu_tahun_4",
							'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'')
							));
			
			?>
			</div>
		</div>
		<div class='clear'></div>
		<div class='col-md-5'>
			<?php echo $form->textAreaGroup($model,'target_tahun_5', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>50, 'class'=>'span8')))); ?>
		</div>
		<div class='col-md-5'>
			<div class='form-group'>
			<label>Pagu Tahun-5</label>
			<?php
			$this->widget("FormatCurrency",
						array(
							"model" => $model,
							"attribute" => "pagu_tahun_5",
							'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'')
							));
			
			?>
			</div>
		</div>
		<div class='clear'></div>
		<div class='col-md-5'>
			<?php echo $form->textAreaGroup($model,'target_akhir', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>1, 'cols'=>50, 'class'=>'span8')))); ?>
		</div>
		<div class='col-md-5'>
			<div class='form-group'>
			<label>Pagu Tahun Akhir Perencanaan</label>
			<?php
			$this->widget("FormatCurrency",
						array(
							"model" => $model,
							"attribute" => "pagu_akhir",
							'htmlOptions'=>array('class'=>'form-control ','maxlength'=>20,'placeholder'=>'')
							));
			
			?>
			</div>
		</div>
	</fieldset>
	<div class='col-md-5'>
	<?php echo $form->textAreaGroup($model,'lokasi', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	
<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
