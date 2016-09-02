<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'renstra-form',
	'enableAjaxValidation'=>false,
	'action'=>array('rkaPerubahan/admin','skpd'=>$model->skpd)
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php 
echo "<script>
$('#program').change(function(){
	program = $(this).val();
	skpd = $('#skpd').val();
	$.post('index.php?r=kegiatanSkpd/drowdown_kegiatan',{program:program,skpd:skpd},function(evt){
		$('#kegiatan').html(evt);
	});
});
$('#skpd').change(function(){
	skpd = $('#skpd').val();
	$.post('index.php?r=kegiatanSkpd/drowdown_program',{skpd:skpd},function(evt){
		$('#program').html(evt);
	});
});
</script>
";
echo $form->errorSummary($model); ?>
	<div class='col-md-2'>
	<?php echo $form->textFieldGroup($model,'tahun',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')))); ?>
	</div>
	<?php 
	if(Yii::app()->user->isAdminBappeda())
	{
		?>
		<div class='col-md-8'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'skpd'); ?> 
		<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
								'id','nama_skpd'),
								
								array(
								'id'=>'skpd',
								'class'=>'form-control',
								'prompt'=>'---Pilih SKPD---',
								)); 
		 ?> 
		</div>
		</div>
		
		<?php
	}else
	{
		?>
		<div class='col-md-8'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'skpd'); ?> 
		<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
								'id','nama_skpd'),
								
								array(
								
								'disabled'=>'disabled',
								'class'=>'form-control',
								'prompt'=>'---Pilih SKPD---',
								)); 
		 ?> 
		<?php echo $form->hiddenField($model,'skpd',array('id'=>'skpd')); ?>
		</div>
		</div>
		<?php
	}
	?>
	
	<?php// echo $form->hiddenField($model,'skpd',array('id'=>'skpd')); ?>
	<div class='clear'></div>
	<?php 
	if(Yii::app()->user->isAdminBappeda())
	{
		?>
		<div class='col-md-10'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'program'); ?> 
		<?php echo $form->dropdownList($model,'program',CHtml::listData(KegiatanSkpd::model()->findAll(array('group'=>'program')),
								'program','nama_program'),
								array(
								'id'=>'program',
								'class'=>'form-control',
								'prompt'=>'---Pilih Program---',
							   )); 
			?>
		
		
		</div>
	</div>
		
		<?php
	}else
	{
		?>
		<div class='col-md-10'>
		<div class='form-group'>
		<?php echo $form->labelEx($model,'program'); ?> 
		<?php echo $form->dropdownList($model,'program',CHtml::listData(KegiatanSkpd::model()->findAll(array('condition'=>'skpd="'.$model->skpd.'"','group'=>'program')),
								'program','nama_program'),
								array(
								'id'=>'program',
								'class'=>'form-control',
								'prompt'=>'---Pilih Program---',
							   )); 
			?>
		
		
		</div>
		</div>
		<?php
	}
	?>
	
	<div class='clear'></div>
	<div class='col-md-10'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'kegiatan'); ?> 
	<?php echo $form->dropdownList($model,'kegiatan',CHtml::listData(Kegiatan::model()->findAll(array('order'=>'kegiatan')),
                            'id','namaKegiatan'),
							
                            array(
							'id'=>'kegiatan',
							'class'=>'form-control',
                            'prompt'=>'---Pilih Kegiatan---',
                            )); 
     ?> 
	</div>
	</div>
	<div class='clear'></div>
	<div class='col-md-10'>
	<?php 
	$this->widget(
    'booster.widgets.TbSelect2',
		array(
			'asDropDownList' => false,
			'name' => 'clevertech',
			'options' => array(
				'tags' => array('clever', 'is', 'better', 'clevertech'),
				'placeholder' => 'type clever, or is, or just type!',
				'width' => '40%',
				'tokenSeparators' => array(',', ' ')
			)
		)
	);
	?>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'id_rekening_belanja'); ?> 
	
	<?php echo $form->dropdownList($model,'id_rekening_belanja',CHtml::listData(RekeningBelanja::model()->findAll(array('order'=>'kode1,kode2,kode3,kode4,kode5')),
                            'idSelectBox','uraian','codes'),
							
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Uraian---',
								'options'=>array(0=>array('disabled'=>'disabled')),
                            )); 
     ?> 
	</div>
	</div>


<?php $this->endWidget(); ?>
<div class='clear'></div>
<?php 
    //echo CHtml::beginForm('/', 'post', array('id' => 'issue-574-checker-form'));
    /*$this->widget(
        'booster.widgets.TbSelect2',
        array(
            'name' => 'group_id_list',
            'data' => CHtml::listData(RekeningBelanja::model()->findAll(),
                            'idSelectBox','uraian','codes'),
			'options'=>array(0=>array('disabled'=>'disabled')),
            'htmlOptions' => array(
                //'multiple' => 'multiple',
            ),
        )
    );*/
  //  echo CHtml::endForm();
    
	?>
<link rel="stylesheet" type="text/css" href="/file_kerja/sippd/assets/f6b12612/select2/select2.css" />
<script type="text/javascript" src="/file_kerja/sippd/assets/f6b12612/select2/select2.min.js"></script>
<script>jQuery('#group_id_list').select2({'width':'resolve'});</script>