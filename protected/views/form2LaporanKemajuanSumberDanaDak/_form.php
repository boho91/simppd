<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'form2-laporan-kemajuan-sumber-dana-dak-form',
	'enableAjaxValidation'=>false,
)); ?>


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
		<?php echo $form->textAreaGroup($model,'pmk', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'')))); ?>
	</div>
	<div class='col-md-4'>
		<?php echo $form->datePickerGroup($model,'tgl_pmk',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'juknis', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-4'>
	<?php echo $form->datePickerGroup($model,'tgl_juknis',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'penyusunan_rencana_kerja', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-4'>
	<?php echo $form->datePickerGroup($model,'tgl_penyusunan_rencana_kerja',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'penetapan_dpa', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-4'>
	<?php echo $form->datePickerGroup($model,'tgl_penetapan_dpa',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	<div class='clear'></div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'sk_penetapan_pelaksanaan_kegiatan', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-4'>
	<?php echo $form->datePickerGroup($model,'tgl_sk_penetapan_pelaksanaan_kegiatan',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'pelaksanaan_tender', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-4>
	<?php echo $form->datePickerGroup($model,'tgl_pelaksanaan_tender',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'persiapan_pekerjaan_swakelola', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-4'>
	<?php echo $form->datePickerGroup($model,'tgl_persiapan_pekerjaan_swakelola',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'pelaksanaan_pekerjaan_kontrak', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-4'>
	<?php echo $form->datePickerGroup($model,'tgl_pelaksanaan_pekerjaan_kontrak',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	<div class='col-md-6'>
	<?php echo $form->textAreaGroup($model,'pelaksanaan_pekerjaan_swakelola', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>
	</div>
	<div class='col-md-4'>
	<?php echo $form->datePickerGroup($model,'tgl_pelaksanaan_pekerjaan_swakelola',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	<?php echo $form->textAreaGroup($model,'penerbitan_spp', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php echo $form->datePickerGroup($model,'tgl_penerbitan_spp',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>

	<?php echo $form->textAreaGroup($model,'penerbitan_spm', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php echo $form->datePickerGroup($model,'tgl_penerbitan_spm',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>

	<?php echo $form->textAreaGroup($model,'penerbitan_sp2d', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>2, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php echo $form->datePickerGroup($model,'tgl_penerbitan_sp2d',array('widgetOptions'=>array('options'=>array(),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>


	

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
</div>

<?php $this->endWidget(); ?>
