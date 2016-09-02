<?php
 class AplikasiKomponen extends CApplicationComponent {
 public static function uang_dalam_juta($nominal)
 {
    return number_format($nominal/1000000,0,",",".");
 }
 public static function pesan_belum_dibaca()
 {
	 $criteria = new CDbCriteria;
	 $criteria->compare('receiver_id',Yii::app()->user->account->id);
	 $criteria->compare('is_read',0);
	 $pesan = Message::model()->findAll($criteria);
	 return $pesan;
 }
public static function hapus_notif($id_notif)
{
	$pesan = Pemberitahuan::model()->findByPk($id_notif);
	$pesan->status=1;
	$pesan->save();
}
public static function totalAnggaranRenstraTahunIni()
{
	return Renstra::model()->totalPaguTahunAktif();
}
public static function realisasiKeuanganDauTertinggi($tahun,$bulan)
{
	return RealisasiFisikDanKeuanganDauDpa::model()->realisasiKeuanganTertinggi($tahun,$bulan);
}
public static function realisasiKeuanganDauTerendah($tahun,$bulan)
{
	return RealisasiFisikDanKeuanganDauDpa::model()->realisasiKeuanganTerendah($tahun,$bulan);
}
public static function rataanRealisasiKeuanganDau($tahun,$bulan)
{
	return RealisasiFisikDanKeuanganDauDpa::model()->rataanRealisasiKeuangan($tahun,$bulan);
}
public static function realisasiKeuanganDakTertinggi($tahun,$bulan)
{
	return RealisasiFisikDanKeuanganDakDpa::model()->realisasiKeuanganTertinggi($tahun,$bulan);
}
public static function realisasiKeuanganDakTerendah($tahun,$bulan)
{
	return RealisasiFisikDanKeuanganDakDpa::model()->realisasiKeuanganTerendah($tahun,$bulan);
}
public static function rataanRealisasiKeuanganDak($tahun,$bulan)
{
	return RealisasiFisikDanKeuanganDakDpa::model()->rataanRealisasiKeuangan($tahun,$bulan);
}

public static function realisasiKeuanganEvaluasiRkpdTertinggi($tahun,$bulan)
{
	return EvaluasiRkpd::model()->realisasiKeuanganTertinggi($tahun,$bulan);
}
public static function realisasiKeuanganEvaluasiRkpdTerendah($tahun,$bulan)
{
	return EvaluasiRkpd::model()->realisasiKeuanganTerendah($tahun,$bulan);
}
public static function rataanRealisasiKeuanganEvaluasiRkpd($tahun,$bulan)
{
	return EvaluasiRkpd::model()->rataanRealisasiKeuangan($tahun,$bulan);
}


public static function totalAnggaranKuaTahunIni()
{
	return Kua::model()->totalPaguTahunAktif();
}
public static function totalAnggaranRenjaTahunIni()
{
	return Renja::model()->totalPaguTahunAktif();
}
public static function totalAnggaranPpasTahunIni()
{
	return Ppas::model()->totalPaguTahunAktif();
}
 public static function substrhtml($str,$start,$len){

    $keterangan_singkat = strip_tags($str);
	return $keterangan_singkat = substr($keterangan_singkat,0,30)."...";

}
 public static function css_print()
 {
	 $css= '<style>
			@page {
				size: 216mm 356mm;	
				
			}
			body {line-height:1.5;font-family: Arial, Helvetica, sans-serif;color:#000;background:none;font-size:10px;}
			.container {background:none;}
			hr {background:#ccc;color:#ccc;width:100%;height:2px;margin:2em 0;padding:0;border:none;}
			hr.space {background:#fff;color:#fff;visibility:hidden;}
			h1, h2, h3, h4, h5, h6 {font-family:Arial, "Lucida Grande", sans-serif;}
			code {font:.9em "Courier New", Monaco, Courier, monospace;}
			a img {border:none;}
			p img.top {margin-top:0;}
			blockquote {margin:1.5em;padding:1em;font-style:italic;font-size:.9em;}
			.small {font-size:.9em;}
			.large {font-size:1.1em;}
			.quiet {color:#999;}
			.hide {display:none;}
			a:link, a:visited {background:transparent;font-weight:700;text-decoration:underline;}
			a:link:after, a:visited:after {content:" (" attr(href) ")";font-size:90%;}
			h1 
			{
				text-align:center;
				font-size:14px;
				font-weight:bold;
			}
			table 
			{
				border-spacing: 0;
				border-collapse: collapse;
				width:100%;
				
			}
			th{
				text-align:center;
				
			}
			table td,table th{
				
				padding:4px;
				border-collapse: collapse;
			}
			.td
			{
				border-spacing: 0px;
			}
			.tanda_tangan
			{
				margin-top:50px;
			}
			</style>';
	return $css;
 }
public static function uang($nominal)
{
	return  "Rp. ".number_format( $nominal , 0 , '' , '.' ) . ",-";
	//return number_format($nominal);
}
public static function TanggalIndo($date){
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2)*1;

	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
	return($result);
}
public static function ijin_perubahan_dpa_murni()
{
	$setting = Setting::model()->find();
	if($setting->ijinkan_input_dpa_murni=="Ya")
		return true;
	return false;
}
public static function ijin_perubahan_dpa_perubahan()
{
	$setting = Setting::model()->find();
	if($setting->ijinkan_input_dpa_perubahan=="Ya")
		return true;
	return false;
}
public static function ijin_perubahan_renja()
{
	$setting = Setting::model()->find();
	if($setting->ijinkan_perubahan_renja=="Ya")
		return true;
	return false;
}
 public static function tandaTangan()
 {
	
	if(Yii::app()->user->isAdminBappeda())
	{
		$setting = Yii::app()->user->account->skpd_;
		$string = '<div class="tanda_tangan" style="margin-top:20px;margin-left:80%">
					<table align=right>
						<tr><td>Pematangsiantar, '.AplikasiKomponen::TanggalIndo(date("Y-m-d")).'</td> </tr>
						<tr><td>KEPALA BAPPEDA</td> </tr>
						<tr><td>KOTA PEMATANGSIANTAR</td> </tr>
						<tr><td></td> </tr>
						<tr><td></td> </tr>
						<tr><td></td> </tr>
						<tr><td></td> </tr>
						<tr><td></td> </tr>
						<tr><td>'.$setting->nama_penanda_tangan_dokumen.'</td> </tr>
						<tr><td>'.$setting->pangkat_penanda_tangan_dokumen.'</td> </tr>
						<tr><td>Nip. '.$setting->nip_penanda_tangan_dokumen.'</td> </tr>
					</table>
				</div>';
	}else
	{
		$setting = Skpd::model()->findByPk(Yii::app()->user->account->skpd);
		$string = '<div class="tanda_tangan" style="position:absolute;bottom:40px; left:90px">
					<table align=right>
						<tr><td>Pematangsiantar, '.AplikasiKomponen::TanggalIndo(date("Y-m-d")).'</td> </tr>
						<tr><td width=250>KEPALA '.$setting->nama_skpd.'</td> </tr>
						<tr><td>KOTA PEMATANGSIANTAR</td> </tr>
						<tr><td></td> </tr>
						<tr><td></td> </tr>
						<tr><td></td> </tr>
						<tr><td></td> </tr>
						<tr><td></td> </tr>
						<tr><td>'.$setting->nama_penanda_tangan_dokumen.'</td> </tr>
						<tr><td>'.$setting->pangkat_penanda_tangan_dokumen.'</td> </tr>
						<tr><td>Nip. '.$setting->nip_penanda_tangan_dokumen.'</td> </tr>
					</table>
				</div>';
	}
	return $string;
 }
  public static function tandaTanganSKPD()
 {
	 $model= Skpd::model()->findByPk(Yii::app()->user->account->skpd);
	 $string = '<div class="tanda_tangan" style="position:absolute;bottom:20px; right:0px">
				<table>
					<tr><td>Pematangsiantar, '.date("d M Y").'</td> </tr>
					<tr><td>KEPALA '.Yii::app()->user->account->skpd_->nama_skpd.'</td> </tr>
					<tr><td>KOTA PEMATANGSIANTAR</td> </tr>
					<tr><td></td> </tr>
					<tr><td></td> </tr>
					<tr><td></td> </tr>
					<tr><td></td> </tr>
					<tr><td></td> </tr>
					<tr><td>'.$model->nama_penanda_tangan_dokumen.'</td> </tr>
					<tr><td>'.$model->pangkat_penanda_tangan_dokumen.'</td> </tr>
					<tr><td>Nip. '.$model->nip_penanda_tangan_dokumen.'</td> </tr>
				</table>
			</div>';
	return $string;
 }
}
?>