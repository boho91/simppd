<aside style="min-height: 2104px;" class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="image" >
                            <img src="img/Logo_Kota_PematangSiantar.png" style="width:75% !important;height:175px !important; display:block; margin:auto" class="img-thumbnail" alt="User Image">
                        </div>
                        
                    </div>
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
					<?php 
		$this->widget('zii.widgets.CMenu',array(
			'htmlOptions'=>array('class'=>'sidebar-menu'),
			'submenuHtmlOptions'=>array('class'=>'treeview-menu'),
			'itemCssClass'=>'item-test',
			'encodeLabel'=>false,
			'items'=>array(
				array('label'=>' <i class="fa fa-dashboard"></i> Dashboard', 'url'=>array('/site/index')),
				
			//	array('label'=>'<i class="fa fa-bar-chart-o"></i> Musrenbang RPJMD <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                  //      'items'=>array(
					//		array('label'=>'<i class="fa fa-angle-double-right"></i> Rencana Program Prioritas', 'url'=>array('/musrenbangkegiatanRpjmd/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
					//		array('label'=>'<i class="fa fa-angle-double-right"></i> Rencana Program Prioritas', 'url'=>array('/musrenbangkegiatanRpjmd/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
					//	), 'visible'=>!Yii::app()->user->isGuest ),
				array('label'=>'<i class="fa fa-bar-chart-o"></i> RPJMD <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Visi', 'url'=>array('/rpjmd/admin')),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Misi', 'url'=>array('/misi/admin')),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Prioritas Pembangunan', 'url'=>array('/prioritasDaerah/admin')),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Sasaran Daerah', 'url'=>array('/sasaranDaerah/admin')),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Rencana Program Prioritas', 'url'=>array('/kegiatanRpjmd/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Rencana Program Prioritas', 'url'=>array('/kegiatanRpjmd/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
						), 'visible'=>!Yii::app()->user->isGuest ),
				array('label'=>'<i class="fa fa-bar-chart-o"></i> Evaluasi <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Realisasi Renstra', 'url'=>array('/evaluasiRenstra/adminSkpd'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Evaluasi Kesesuaian Renja-RKA', 'url'=>array('/evaluasiRenja/adminSkpd'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Evaluasi RKPD', 'url'=>array('/evaluasiRkpd/adminSkpd'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Realisasi Fisik & Keuangan DAU', 'url'=>array('/RealisasiFisikDanKeuanganDauDpa/adminSkpd'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Realisasi Fisik & Keuangan DAK', 'url'=>array('/RealisasiFisikDanKeuanganDakDpa/adminSkpd'),'visible'=>!Yii::app()->user->isGuest),
						), 'visible'=>!Yii::app()->user->isGuest ),
				array('label'=>'<i class="fa fa-bar-chart-o"></i> Renstra <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
						 // 	array('label'=>'<i class="fa fa-angle-double-right"></i> Tujuan SKPD', 'url'=>array('/tujuanskpd/admin','skpd'=>Yii::app()->user->account->skpd)),
						 // 	array('label'=>'<i class="fa fa-angle-double-right"></i> Sasaran SKPD', 'url'=>array('/sasaranskpd/admin','skpd'=>Yii::app()->user->account->skpd)),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Renstra', 'url'=>array('/renstra/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Renstra', 'url'=>array('/renstra/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							
						), 'visible'=>!Yii::app()->user->isGuest ),
				
				array('label'=>'<i class="fa fa-laptop"></i> Musrenbang Kelurahan <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Musrenbang Kelurahan', 'url'=>array('/kegiatanMusrenbangKelurahan/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Musrenbang Kelurahan', 'url'=>array('/kegiatanMusrenbangKelurahan/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							), 'visible'=>!Yii::app()->user->isGuest ),
				array('label'=>'<i class="fa fa-laptop"></i> Musrenbang Kecamatan <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Musrenbang Kecamatan', 'url'=>array('/kegiatanMusrenbang/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Musrenbang Kecamatan', 'url'=>array('/kegiatanMusrenbang/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							
						), 'visible'=>!Yii::app()->user->isGuest ),
				
				array('label'=>'<i class="fa fa-laptop"></i> Forum SKPD <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Forum SKPD', 'url'=>array('/forumSkpd/index','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Forum SKPD', 'url'=>array('/forumSkpd/index'),'visible'=>Yii::app()->user->isAdminBappeda()),
						), 'visible'=>!Yii::app()->user->isGuest ),
				array('label'=>'<i class="fa fa-laptop"></i> Pokok Pikiran DPRD <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Pokok Pikiran DPRD', 'url'=>array('/pokokpikirandprd/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Pokok Pikiran DPRD', 'url'=>array('/pokokpikirandprd/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							), 'visible'=>!Yii::app()->user->isGuest ),
				//array('label'=>'<i class="fa fa-laptop"></i> Konsultasi Publik <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        //'items'=>array(
						//	array('label'=>'<i class="fa fa-angle-double-right"></i> Data Konsultasi Publik', 'url'=>array('/konsultasiPublik/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
						//	array('label'=>'<i class="fa fa-angle-double-right"></i> Data Konsultasi Publik', 'url'=>array('/konsultasiPublik/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
						//	), 'visible'=>!Yii::app()->user->isGuest ),
						
				array('label'=>'<i class="fa fa-bar-chart-o"></i> Renja <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Renja', 'url'=>array('/renja/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Renja', 'url'=>array('/renja/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Renja Perubahan', 'url'=>array('/renjaPerubahan/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Renja Perubahan', 'url'=>array('/renjaPerubahan/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
					
						), 'visible'=>!Yii::app()->user->isGuest ),
						
				array('label'=>'<i class="fa fa-laptop"></i> Jalur Perencanaan <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Partisipatif', 'url'=>array('/partisipatif/','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Partisipatif', 'url'=>array('/partisipatif/'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Teknokratis', 'url'=>array('/teknokratis/','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Teknokratis', 'url'=>array('/teknokratis/'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Politis', 'url'=>array('/politis/','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Politis', 'url'=>array('/politis/'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Bottom-Up', 'url'=>array('/bottomup/','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Bottom-Up', 'url'=>array('/bottomup/'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Top-Down', 'url'=>array('/topdown/','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Top-Down', 'url'=>array('/topdown/'),'visible'=>Yii::app()->user->isAdminBappeda()),
							
						), 'visible'=>!Yii::app()->user->isGuest ),
				
				array('label'=>'<i class="fa fa-laptop"></i> Musrenbang Kota <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Musrenbang Kota', 'url'=>array('/kegiatanMusrenbangKota/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Musrenbang Kota', 'url'=>array('/kegiatanMusrenbangKota/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							
						), 'visible'=>!Yii::app()->user->isGuest ),
						
				
			//	array('label'=>'<i class="fa fa-bar-chart-o"></i> Musrenbang RKPD <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                   //     'items'=>array(
					//		array('label'=>'<i class="fa fa-angle-double-right"></i> Data Musrenbang RKPD', 'url'=>array('/musrenbangrkpd/admin')),
					//		), 'visible'=>!Yii::app()->user->isGuest ),
				
				
				array('label'=>'<i class="fa fa-bar-chart-o"></i> RKPD <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Draf RKPD', 'url'=>array('/renja/adminSkpd','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'<i class="fa fa-angle-double-right"></i> RKPD Perubahan', 'url'=>array('/renjaPerubahan/adminSkpd'),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Export Draft RKPD ', 'url'=>array('/rkpd/draftexc'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Cetak Draft RKPD ', 'url'=>array('/rkpd/draftpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Export RKPD FINAL ', 'url'=>array('/rkpd/finalexc'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Cetak RKPD FINAL ', 'url'=>array('/rkpd/finalpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Export RKPD TOLAK ', 'url'=>array('/rkpd/tolakexc'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Cetak RKPD TOLAK ', 'url'=>array('/rkpd/tolakpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							
						), 'visible'=>!Yii::app()->user->isGuest ),
								
				array('label'=>'<i class="fa fa-bar-chart-o"></i> KUA-PPAS <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data KUA', 'url'=>array('/kua/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data KUA', 'url'=>array('/kua/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data KUA Perubahan', 'url'=>array('/kuaPerubahan/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data KUA Perubahan', 'url'=>array('/kuaPerubahan/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data PPAS', 'url'=>array('/ppas/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data PPAS', 'url'=>array('/ppas/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data PPAS Perubahan', 'url'=>array('/ppasPerubahan/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data PPAS Perubahan', 'url'=>array('/ppasPerubahan/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							
						), 'visible'=>!Yii::app()->user->isGuest ),
				
				
				array('label'=>'<i class="fa fa-bar-chart-o"></i> RKA-DPA <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data RKA', 'url'=>array('/rka/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data RKA', 'url'=>array('/rka/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data RKA Perubahan', 'url'=>array('/rkaPerubahan/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data RKA Perubahan', 'url'=>array('/rkaPerubahan/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data DPA', 'url'=>array('/dpa/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data DPA', 'url'=>array('/dpa/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data DPA Perubahan', 'url'=>array('/dpaPerubahan/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data DPA Perubahan', 'url'=>array('/dpaPerubahan/adminSkpd'),'visible'=>Yii::app()->user->isAdminBappeda()),
						), 'visible'=>!Yii::app()->user->isGuest ),
				
				array('label'=>'<i class="fa fa-bar-chart-o"></i> Pengadaan Barang dan Jasa <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Pengadaan', 'url'=>array('/laporanPengadaanBarangJasa/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Rekapitulasi', 'url'=>array('/laporanPengadaanBarangJasa/summary','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Cetak Data', 'url'=>array('/laporanPengadaanBarangJasa/laporan','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isGuest),
						), 'visible'=>!Yii::app()->user->isGuest ),
				array('label'=>'<i class="fa fa-bar-chart-o"></i> Panduan Usulan <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Panduan Usulan', 'url'=>array('/panduanUsulan/admin','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data Panduan Usulan', 'url'=>array('/panduanUsulan/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							), 'visible'=>!Yii::app()->user->isGuest ),
				array('label'=>'<i class="fa fa-laptop"></i> Peta Usulan<i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Peta Usulan', 'url'=>array('/peta/','skpd'=>Yii::app()->user->account->skpd),'visible'=>!Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Peta USulan', 'url'=>array('/peta/'),'visible'=>Yii::app()->user->isAdminBappeda()),
							), 'visible'=>!Yii::app()->user->isGuest ),
				array('label'=>'<i class="fa fa-laptop"></i> SPM<i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Data SPM', 'url'=>array('/spm/admin','skpd'=>Yii::app()->user->account->skpd)),
							
						), 'visible'=>!Yii::app()->user->isGuest ),
				array('label'=>'<i class="fa fa-folder"></i> Setting <i class="fa fa-angle-left pull-right"></i>', 'url'=>'#','itemOptions'=>array('data-toggle'=>"tooltip", 'data-placement'=>"right", 'title'=>"", 'data-content'=>"Default popover",'class'=>'treeview','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'<i class="fa fa-angle-double-right"></i> Foto Musrenbang', 'url'=>array('/upload/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Sumber Dana', 'url'=>array('/sumberDana/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Kecamatan', 'url'=>array('/kecamatan/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Kelurahan', 'url'=>array('/kelurahan/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Urusan', 'url'=>array('/urusan/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Bidang', 'url'=>array('/bidang/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Program', 'url'=>array('/program/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Kegiatan', 'url'=>array('/kegiatan/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Kegiatan SKPD', 'url'=>array('/kegiatanSkpd/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> SKPD', 'url'=>array('/skpd/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Rekening Belanja', 'url'=>array('/rekeningBelanja/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Jenis Kegiatan', 'url'=>array('/jenisKegiatan/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> Usulan', 'url'=>array('/usulan/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
							array('label'=>'<i class="fa fa-angle-double-right"></i> User', 'url'=>array('/user/admin'),'visible'=>Yii::app()->user->isAdminBappeda()),
						), 'visible'=>Yii::app()->user->isAdminBappeda() ),
				array('label'=>'<i class="glyphicon glyphicon-globe"></i> Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'<i class="fa fa-power-off"></i> Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			),
		)); ?>
                 <!--   <ul class="sidebar-menu">
                    
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Charts</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a style="margin-left: 10px;" href="index.php?r=Site/Morris"><i class="fa fa-angle-double-right"></i> Morris</a></li>
                                <li><a style="margin-left: 10px;" href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                                <li><a style="margin-left: 10px;" href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>
                            </ul>
                        </li>
						<li>
                            <a href="index.php?r=Site/Widgets">
                                <i class="fa fa-th"></i> <span>Widgets</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                          
                        </li>
                    </ul> -->
                </section>
                <!-- /.sidebar -->
            </aside>