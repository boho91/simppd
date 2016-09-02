
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Evaluasi Rkpd'=> array('adminSkpd'),'Cetak Laporan Rekapitulasi'),
    )
);
$this->menu=array(
//array('label'=>'List EvaluasiRkpd','url'=>array('index')),
array('label'=>'Cetak Laporan','url'=>array('laporanPdf'),'buttonType'=> 'link','context' => 'info'),
array('label'=>'Download Excel','url'=>array('laporanExcel'),'buttonType'=> 'link','context' => 'warning'),
array('label'=>'Rekapitulasi','url'=>array('rekapitulasiPdf'),'buttonType'=> 'link','context' => 'success'),
array('label'=>'Download Rekapitulasi','url'=>array('rekapitulasiExcel'),'buttonType'=> 'link','context' => 'danger'),
);
 $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'form-laporan',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('target'=>"_BLANK")
)); ?>
<section class='content'>
<div class='col-md-9'>
	<div class="box box-info">
		<div class="box-header">
			<div class='col-md-12'><h2 class='page-head-line'>Form Laporan Evaluasi RKPD</h2>
			</div>
		</div>
	<div class="box-body">
                        <?php 
	if(Yii::app()->user->isAdminBappeda())
	{?>
	<div class='col-md-12'>
	<div class='form-group'>
	<?php echo $form->labelEx($model,'skpd'); ?> 
	<?php echo $form->dropdownList($model,'skpd',CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')),
                            'id','nama_skpd'),
							
                            array(
							'class'=>'form-control',
                            'prompt'=>'---Pilih Skpd---',
							'required'=>'required',
							'id'=>'skpd',
                            )); 
     ?> 
	</div>
	</div>
	<?php }?>
	<div class='clear'></div>
	<div class='col-md-6'>
		<?php echo $form->labelEx($model,'tahun_anggaran'); ?> 
		<?php echo $form->dropdownList($model,'tahun_anggaran',CHtml::listData(EvaluasiRkpd::model()->findAll(array('order'=>'tahun_anggaran','group'=>'tahun_anggaran')),
								'tahun_anggaran','tahun_anggaran'),
								
								array(
								'class'=>'form-control',
								'prompt'=>'---Pilih Tahun---',
								'required'=>'required',
								'id'=>'tahun',
								)); 
		 ?>
			<br>
	</div>
	<div class='col-md-6'>
		<br><?php //echo $form->dropDownListGroup($model,'triwulan', array('widgetOptions'=>array('data'=>array(""=>"Pilih Triwulan","Triwulan I"=>"Triwulan I","Triwulan II"=>"Triwulan II","Triwulan III"=>"Triwulan III","Triwulan IV"=>"Triwulan IV",), 'htmlOptions'=>array('required'=>'required','id'=>'triwulan','class'=>'input-large')))); ?>
	</div>
	<div class='clear'></div>
	<div class="form-actions col-md-12">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Print' : 'Print',
		)); ?>
		<?php $this->endWidget(); ?>
		<div class='clear'></div>
	</div><!-- /.box-body -->
<div class="box-footer">
</div><!-- /.box-footer-->
</div><!-- /.box -->
	
</div>
</div>
</section>


