<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Kua Perubahan'=> array('admin'),
        'Tambah Data Perubahan',
),
		
    )
);

$this->menu=array(
//array('label'=>'List Kua','url'=>array('index'),'buttonType'=> 'link','context' => 'danger',),
array('label'=>'Data Kua Perubahan','url'=>array('admin','skpd'=>$model->skpd),'buttonType'=> 'link','context' => 'info',),
);
?>
<section class="content-header">
<h1>Form Kua Perubahan</h1>
</section>
<section class="content">
<div class="col-md-10">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username"></h3>
              <h5 class="widget-user-desc"><?php echo $model->skpd_->nama_skpd?></h5>
            </div>
            <div class="widget-user-image">
              Tahun <?php echo $model->tahun?>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Urusan</h5>
                    <span class="description-text"><?php echo $model->kegiatan_->program_->bidang_->urusan_->urusan?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3 border-right">
                  <div class="description-block">
                    <h5 class="description-header">Bidang</h5>
                    <span class="description-text"><?php echo $model->kegiatan_->program_->bidang_->bidang?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                  <div class="description-block">
                    <h5 class="description-header">Program</h5>
                    <span class="description-text"><?php echo $model->kegiatan_->program_->program?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
				<div class="col-sm-3">
                  <div class="description-block">
                    <h5 class="description-header">Kegiatan</h5>
                    <span class="description-text"><?php echo $model->kegiatan_->kegiatan?></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
	<div class='clear'></div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?></section>