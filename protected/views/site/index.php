<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
	
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           SIMPEPEDA PEMERINTAH KOTA PEMATANG SIANTAR
            <small>Tahun Perencanaan <?php echo Yii::app()->session['tahun_perencanaan']?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h4>
                            <?php echo AplikasiKomponen::uang(AplikasiKomponen::totalAnggaranRenstraTahunIni())?>
                        </h4>
                        <p>
                            Renstra
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-card"></i>
                    </div>
                    <a href="<?php echo Yii::app()->createUrl('renstra/adminSkpd')?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h4>
                            <?php echo AplikasiKomponen::uang(AplikasiKomponen::totalAnggaranRenjaTahunIni())?>
                        </h4>
                        <p>
                            Renja
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-bookmarks"></i>
                    </div>
                    <a href="<?php echo Yii::app()->createUrl('renja/adminSkpd')?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h4>
                            <?php echo AplikasiKomponen::uang(AplikasiKomponen::totalAnggaranPpasTahunIni())?>
                        </h4>
                        <p>
                            PPAS
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-list"></i>
                    </div>
                    <a href="<?php echo Yii::app()->createUrl('ppas/adminSkpd')?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h4>
                            <?php echo AplikasiKomponen::uang(AplikasiKomponen::totalAnggaranKuaTahunIni())?>
                        </h4>
                        <p>
                            KUA
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-list-outline"></i>
                    </div>
                    <a href="<?php echo Yii::app()->createUrl('kua/adminSkpd')?>" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->

        <!-- top row -->
        <div class="row">
            <div class="col-xs-12 connectedSortable">

            </div><!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-6 connectedSortable"> 
                <!-- Box (with bar chart) -->
                <div class="box box-danger" id="loading-example">
                    <div class="box-header">
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload" id='refresh_dau'><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div><!-- /. tools -->
                        <i class="ion ion-ios-speedometer"></i>

                        <h3 class="box-title">Realisasi DPA DAU</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
							<?php
                               $this->widget('booster.widgets.TbGridView',array(
								'id'=>'realisasi-fisik-dan-keuangan-dau-dpa-grid',
								'dataProvider'=>$modelDAU->skpdPelaporBulanIni(),
								'columns'=>array(
									array(
										'header'=>'No.',
										'htmlOptions'=>array('width'=>'50'),
										'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
										),
										array(
											'type'=>'raw',
											'header'=>'SKPD',
											'name'=>'skpd',
											'value'=>'$data->skpd_->nama_skpd'
										),
										
										array(
											'name'=>'realisasi_fisik',
											'filter'=>''
										),
										array(
											'name'=>'realisasi_keuangan',
											'value'=>'AplikasiKomponen::uang($data->realisasi_keuangan)',
											'filter'=>''
										),
										
								
								),
								)); ?>
                            </div>
                            
                        </div><!-- /.row - inside box -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <input type="text" class="knob" data-readonly="true" value="<?php echo AplikasiKomponen::realisasiKeuanganDauTertinggi(Yii::app()->session['tahun_perencanaan'],date('m')*1)?>" data-width="60" data-height="60" data-fgColor="#f56954"/>
                                <div class="knob-label">Realisasi Keuangan Tertinggi</div>
                            </div><!-- ./col -->
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <input type="text" class="knob" data-readonly="true" value="<?php echo AplikasiKomponen::realisasiKeuanganDauTerendah(Yii::app()->session['tahun_perencanaan'],date('m')*1)?>" data-width="60" data-height="60" data-fgColor="#00a65a"/>
                                <div class="knob-label">Realisasi Keuangan Terendah</div>
                            </div><!-- ./col -->
                            <div class="col-xs-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="<?php echo AplikasiKomponen::rataanRealisasiKeuanganDau(Yii::app()->session['tahun_perencanaan'],date('m')*1)?>" data-width="60" data-height="60" data-fgColor="#3c8dbc"/>
                                <div class="knob-label">Rata-rata Realisasi Keuangan </div>
                            </div><!-- ./col -->
                        </div><!-- /.row -->
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->        
				<div class="box box-info" id="loading-example">
                    <div class="box-header">
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload" id='refresh_rkpd'><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div><!-- /. tools -->
                        <i class="ion ion-ios-speedometer"></i>

                        <h3 class="box-title">Realisasi Evaluasi RKPD</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
							<?php
                               $this->widget('booster.widgets.TbGridView',array(
								'id'=>'realisasi-rkpd-grid',
								'dataProvider'=>$modelEvaluasiRkpd->skpdPelaporBulanIni(),
								'columns'=>array(
									array(
										'header'=>'No.',
										'htmlOptions'=>array('width'=>'50'),
										'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
										),
										array(
											'type'=>'raw',
											'header'=>'SKPD',
											'value'=>'$data->skpd_->nama_skpd'
										),
										
										array(
											'name'=>'realisasi_kinerja',
											'filter'=>''
										),
										array(
											'name'=>'realisasi_keuangan',
											'value'=>'AplikasiKomponen::uang($data->realisasi_keuangan)',
											'filter'=>''
										),
										
								
								),
								)); ?>
                            </div>
                            
                        </div><!-- /.row - inside box -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <input type="text" class="knob" data-readonly="true" value="<?php echo AplikasiKomponen::realisasiKeuanganEvaluasiRkpdTertinggi(Yii::app()->session['tahun_perencanaan'],date('m')*1)?>" data-width="60" data-height="60" data-fgColor="#f56954"/>
                                <div class="knob-label">Realisasi Keuangan Tertinggi</div>
                            </div><!-- ./col -->
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <input type="text" class="knob" data-readonly="true" value="<?php echo AplikasiKomponen::realisasiKeuanganEvaluasiRkpdTerendah(Yii::app()->session['tahun_perencanaan'],date('m')*1)?>" data-width="60" data-height="60" data-fgColor="#00a65a"/>
                                <div class="knob-label">Realisasi Keuangan Terendah</div>
                            </div><!-- ./col -->
                            <div class="col-xs-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="<?php echo AplikasiKomponen::rataanRealisasiKeuanganEvaluasiRkpd(Yii::app()->session['tahun_perencanaan'],date('m')*1)?>" data-width="60" data-height="60" data-fgColor="#3c8dbc"/>
                                <div class="knob-label">Rata-rata Realisasi Keuangan </div>
                            </div><!-- ./col -->
                        </div><!-- /.row -->
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->
            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-6 connectedSortable">
                
                <!-- Chat box -->
                <div class="box box-success" id="loading-example">
                    <div class="box-header">
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload" id='refresh_dak'><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        </div><!-- /. tools -->
                        <i class="ion ion-ios-speedometer"></i>

                        <h3 class="box-title">Realisasi DPA DAK</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
							<?php
                               $this->widget('booster.widgets.TbGridView',array(
								'id'=>'realisasi-fisik-dan-keuangan-dak-dpa-grid',
								'dataProvider'=>$modelDAK->skpdPelaporBulanIni(),
								'columns'=>array(
									array(
										'header'=>'No.',
										'htmlOptions'=>array('width'=>'50'),
										'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
										),
										array(
											'type'=>'raw',
											'header'=>'SKPD',
											'value'=>'$data->skpd_->nama_skpd'
										),
										
										array(
											'name'=>'realisasi_fisik',
											'filter'=>''
										),
										array(
											'name'=>'realisasi_keuangan',
											'value'=>'AplikasiKomponen::uang($data->realisasi_keuangan)',
											'filter'=>''
										),
										
								
								),
								)); ?>
                            </div>
                            
                        </div><!-- /.row - inside box -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <input type="text" class="knob" data-readonly="true" value="<?php echo AplikasiKomponen::realisasiKeuanganDakTertinggi(Yii::app()->session['tahun_perencanaan'],date('m')*1)?>" data-width="60" data-height="60" data-fgColor="#f56954"/>
                                <div class="knob-label">Realisasi Keuangan Tertinggi</div>
                            </div><!-- ./col -->
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <input type="text" class="knob" data-readonly="true" value="<?php echo AplikasiKomponen::realisasiKeuanganDakTerendah(Yii::app()->session['tahun_perencanaan'],date('m')*1)?>" data-width="60" data-height="60" data-fgColor="#00a65a"/>
                                <div class="knob-label">Realisasi Keuangan Terendah</div>
                            </div><!-- ./col -->
                            <div class="col-xs-4 text-center">
                                <input type="text" class="knob" data-readonly="true" value="<?php echo AplikasiKomponen::rataanRealisasiKeuanganDak(Yii::app()->session['tahun_perencanaan'],date('m')*1)?>" data-width="60" data-height="60" data-fgColor="#3c8dbc"/>
                                <div class="knob-label">Rata-rata Realisasi Keuangan </div>
                            </div><!-- ./col -->
                        </div><!-- /.row -->
                    </div><!-- /.box-footer -->
                </div><!-- /.box -->

                <!-- Calendar -->
                <div class="box box-warning">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>
                        <div class="box-title">Calendar</div>

                                                     
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar"></div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                    <div class="box-footer clearfix no-border">
                    </div>
                </div><!-- /.box -->

            </section><!-- right col -->
        </div><!-- /.row (main row) -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->
<script>
$("#refresh_dau").click(function(){
	$.fn.yiiGridView.update('realisasi-fisik-dan-keuangan-dau-dpa-grid');
	return false;
});
$("#refresh_dak").click(function(){
	$.fn.yiiGridView.update('realisasi-fisik-dan-keuangan-dak-dpa-grid');
	return false;
});
$("#refresh_rkpd").click(function(){
	$.fn.yiiGridView.update('realisasi-rkpd-grid');
	return false;
});
</script>
 <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>    