<section class="content-header">
 <h1 >Form Laporan Pengadaan Barang dan Jasa</h1>
 </section>
<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Laporan Pengadaan Barang Jasa'=> array('admin'),
        'Cetak',),		
    )
);
 

 ?>
 

 <section class='content'>
 <div class="col-md-12">
                <!-- Info box -->
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"></h3>
                        <div class="box-tools pull-right">
                            <div class="label bg-aqua"></div>
                        </div>
                    </div>
                    <div class="box-body">
                        <?php 
						$form=$this->beginWidget('booster.widgets.TbActiveForm',array(
							'id'=>'rekapitulasi-laporan-kemajuan-fisik-dak-form',
							'enableAjaxValidation'=>false,
						));
						if(Yii::app()->user->isAdminBappeda())
						{?>
						<div class='col-md-6'>
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
							<?php echo $form->labelEx($model,'tahun'); ?> 
							<?php echo $form->dropdownList($model,'tahun',CHtml::listData(LaporanPengadaanBarangJasa::model()->findAll(array('order'=>'tahun','group'=>'tahun')),
													'tahun','tahun'),
													
													array(
													'class'=>'form-control',
													'prompt'=>'---Pilih Tahun---',
													'required'=>'required',
													'id'=>'tahun',
													)); 
							 ?> 
						</div>
						<div class='col-md-6'>
							<?php echo $form->dropDownListGroup($model,'triwulan', array('widgetOptions'=>array('data'=>array(""=>"Pilih Triwulan","Triwulan I"=>"Triwulan I","Triwulan II"=>"Triwulan II","Triwulan III"=>"Triwulan III","Triwulan IV"=>"Triwulan IV",), 'htmlOptions'=>array('required'=>'required','id'=>'triwulan','class'=>'input-large')))); ?>
						</div>
						<div class='col-md-6'>
							<?php echo $form->dropDownListGroup($model,'jenis_file', array('widgetOptions'=>array('data'=>array(""=>"Pilih Jenis File","Excel"=>"Excel","PDF"=>"PDF"), 'htmlOptions'=>array('required'=>'required','id'=>'triwulan','class'=>'input-large')))); ?>
						</div>
						<div class='clear'></div>
						<div class="form-actions col-md-12">
						<?php $this->widget('booster.widgets.TbButton', array(
								'buttonType'=>'submit',
								'context'=>'primary',
								'label'=>$model->isNewRecord ? 'Print' : 'Print',
							)); ?>
						</div><div class='clear'></div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <code></code>
                    </div><!-- /.box-footer-->
                </div><!-- /.box -->
	<div class='clear'></div>
	<?php $this->endWidget(); ?>
            </div>



</section>