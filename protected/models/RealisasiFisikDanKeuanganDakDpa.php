<?php

/**
 * This is the model class for table "realisasi_fisik_dan_keuangan_dak_dpa".
 *
 * The followings are the available columns in table 'realisasi_fisik_dan_keuangan_dak_dpa':
 * @property string $id
 * @property string $id_dpa
 * @property string $realisasi_fisik
 * @property string $realisasi_keuangan
 * @property integer $tahun
 * @property integer $bulan
 * @property integer $urusan
 * @property integer $bidang
 * @property integer $program
 * @property integer $kegiatan
 * @property integer $skpd
 * @property string $harga_satuan
 * @property integer $volume
 * @property string $kontrak
 * @property string $swakelola
 * @property string $created_date
 * @property string $created_by
 * @property string $mod_date
 * @property string $mod_by
 * @property integer $is_perubahan
 * @property string $kuasa_pengguna_anggaran
 * @property string $pejabat_pelaksana_kegiatan
 * @property string $penerima_manfaat
 * @property string $dana_pendamping
 * @property string $kesesuaian_sasaran_dan_lokasi_dengan_rkpd
 * @property string $kesesuaian_antara_dpa_dengan_juknis
 * @property string $modifikasi_masalah
 */
class RealisasiFisikDanKeuanganDakDpa extends CActiveRecord
{
	public $jenis_dpa,$uraian,$manfaat_kegiatan;
	public function afterFind() {
        parent::afterFind();
		if($this->jenis_dpa=="dpa")
		{
			$this->uraian = $this->dpa_->item;
		}else 
		{
			$this->uraian = $this->dpa_perubahan->item;
		}
		
        return;
    }
	public function beforeSave() {
		if ($this->isNewRecord)
		{
			$this->created_by = Yii::app()->user->id;
			$this->created_date = date("Y-m-d H:i:s");
		}else 
		{
			$this->mod_by = Yii::app()->user->id;
			$this->mod_date = date("Y-m-d H:i:s");
		}
		return parent::beforeSave();
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'realisasi_fisik_dan_keuangan_dak_dpa';
	}
	public function skpdPelaporBulanIni()
	{
		$criteria = new CDbCriteria;
		$criteria->select = "skpd,SUM(realisasi_keuangan) as realisasi_keuangan,ROUND(AVG(realisasi_fisik),2) as realisasi_fisik";
		$criteria->compare('bulan',date('m')*1);
		$criteria->compare('tahun',Yii::app()->session['tahun_perencanaan']);
		$criteria->group = "skpd";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function realisasiKeuanganTertinggi($tahun="",$bulan="")
	{
		
		$command = Yii::app()->db->createCommand()
			->select('MAX(persentase_keuangan)')
			->from('(SELECT skpd,ROUND((SUM(realisasi_keuangan) /SUM(harga_satuan*volume))*100,2) as persentase_keuangan FROM realisasi_fisik_dan_keuangan_dak_dpa WHERE bulan="'.$bulan.'" AND tahun="'.$tahun.'"  GROUP BY skpd,kegiatan) as t ');
		$persentase_keuangan=$command->queryScalar();
		return $persentase_keuangan;
	}
	public function realisasiKeuanganTerendah($tahun="",$bulan="")
	{
		
		$command = Yii::app()->db->createCommand()
			->select('MIN(persentase_keuangan)')
			->from('(SELECT skpd,ROUND((SUM(realisasi_keuangan) /SUM(harga_satuan*volume))*100,2) as persentase_keuangan FROM realisasi_fisik_dan_keuangan_dak_dpa WHERE bulan="'.$bulan.'" AND tahun="'.$tahun.'"  GROUP BY skpd,kegiatan) as t ');
		$persentase_keuangan=$command->queryScalar();
		return $persentase_keuangan;
	}
	public function rataanRealisasiKeuangan($tahun="",$bulan="")
	{
		
		$command = Yii::app()->db->createCommand()
			->select('AVG(persentase_keuangan)')
			->from('(SELECT skpd,ROUND((SUM(realisasi_keuangan) /SUM(harga_satuan*volume))*100,2) as persentase_keuangan FROM realisasi_fisik_dan_keuangan_dak_dpa WHERE bulan="'.$bulan.'" AND tahun="'.$tahun.'"  GROUP BY skpd,kegiatan) as t ');
		$persentase_keuangan=$command->queryScalar();
		return $persentase_keuangan;
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dpa, realisasi_fisik, realisasi_keuangan, tahun, bulan, urusan, bidang, program, kegiatan, skpd, harga_satuan, volume, kontrak, swakelola, is_perubahan', 'required'),
			array('tahun, bulan, urusan, bidang, program, kegiatan, skpd, volume, is_perubahan', 'numerical', 'integerOnly'=>true),
			array('id_dpa, realisasi_fisik, realisasi_keuangan, harga_satuan, kontrak, swakelola, dana_pendamping', 'length', 'max'=>20),
			array('created_by, mod_by, kuasa_pengguna_anggaran, pejabat_pelaksana_kegiatan', 'length', 'max'=>111),
			array('penerima_manfaat, kesesuaian_sasaran_dan_lokasi_dengan_rkpd, modifikasi_masalah', 'length', 'max'=>500),
			array('kesesuaian_sasaran_dan_lokasi_dengan_rkpd, kesesuaian_antara_dpa_dengan_juknis', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_dpa, realisasi_fisik, realisasi_keuangan, tahun, bulan, urusan, bidang, program, kegiatan, skpd, harga_satuan, volume, kontrak, swakelola, created_date, created_by, mod_date, mod_by, is_perubahan, kuasa_pengguna_anggaran, pejabat_pelaksana_kegiatan, penerima_manfaat, dana_pendamping, kesesuaian_sasaran_dan_lokasi_dengan_rkpd, kesesuaian_antara_dpa_dengan_juknis, modifikasi_masalah', 'safe', 'on'=>'search'),
		);
	}
	public function get_realisasi_keuangan($tahun,$skpd,$urusan,$bidang,$program,$kegiatan,$is_perubahan,$id_dpa)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		
		$criteria=new CDbCriteria;
		$criteria->condition='tahun="'.Yii::app()->session['tahun_perencanaan'].'"';
		$criteria->compare('urusan',$urusan);
		$criteria->compare('bidang',$bidang);
		$criteria->compare('program',$program);
		$criteria->compare('tahun',$tahun);
		$criteria->compare('kegiatan',$kegiatan);
		$criteria->compare('is_perubahan',$is_perubahan);
		$criteria->compare('id_dpa',$id_dpa);
		$criteria->select="SUM(realisasi_keuangan) as realisasi_keuangan";
		$model = $this->find($criteria);
		return $model->realisasi_keuangan;
	}
	public function get_realisasi_fisik($tahun,$skpd,$urusan,$bidang,$program,$kegiatan,$is_perubahan,$id_dpa)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		
		$criteria=new CDbCriteria;
		$criteria->condition='tahun="'.Yii::app()->session['tahun_perencanaan'].'"';
		$criteria->compare('urusan',$urusan);
		$criteria->compare('bidang',$bidang);
		$criteria->compare('program',$program);
		$criteria->compare('tahun',$tahun);
		$criteria->compare('kegiatan',$kegiatan);
		$criteria->compare('is_perubahan',$is_perubahan);
		$criteria->compare('id_dpa',$id_dpa);
		$criteria->select="AVG(realisasi_fisik) as realisasi_fisik";
		$model = $this->find($criteria);
		return $model->realisasi_fisik;
	}
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'dpa_'=>array(self::BELONGS_TO, 'Dpa', 'id_dpa'),
			'skpd_'=>array(self::BELONGS_TO, 'Skpd', 'skpd'),
			'bulan_'=>array(self::BELONGS_TO, 'Bulan', 'bulan'),
			'dpa_perubahan'=>array(self::BELONGS_TO, 'DpaPerubahan', 'id_dpa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_dpa' => 'Id Dpa',
			'realisasi_fisik' => 'Realisasi Fisik',
			'realisasi_keuangan' => 'Realisasi Keuangan',
			'tahun' => 'Tahun',
			'bulan' => 'Bulan',
			'urusan' => 'Urusan',
			'bidang' => 'Bidang',
			'program' => 'Program',
			'kegiatan' => 'Kegiatan',
			'skpd' => 'Skpd',
			'harga_satuan' => 'Harga Satuan',
			'volume' => 'Volume',
			'kontrak' => 'Kontrak',
			'swakelola' => 'Swakelola',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'mod_date' => 'Mod Date',
			'mod_by' => 'Mod By',
			'is_perubahan' => 'Is Perubahan',
			'kuasa_pengguna_anggaran' => 'Kuasa Pengguna Anggaran',
			'pejabat_pelaksana_kegiatan' => 'Pejabat Pelaksana Kegiatan',
			'penerima_manfaat' => 'Penerima Manfaat',
			'dana_pendamping' => 'Dana Pendamping',
			'kesesuaian_sasaran_dan_lokasi_dengan_rkpd' => 'Kesesuaian Sasaran Dan Lokasi Dengan Rkpd',
			'kesesuaian_antara_dpa_dengan_juknis' => 'Kesesuaian Antara Dpa Dengan Juknis',
			'modifikasi_masalah' => 'Modifikasi Masalah',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('id_dpa',$this->id_dpa,true);
		$criteria->compare('realisasi_fisik',$this->realisasi_fisik,true);
		$criteria->compare('realisasi_keuangan',$this->realisasi_keuangan,true);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('bulan',$this->bulan);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('harga_satuan',$this->harga_satuan,true);
		$criteria->compare('volume',$this->volume);
		$criteria->compare('kontrak',$this->kontrak,true);
		$criteria->compare('swakelola',$this->swakelola,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('is_perubahan',$this->is_perubahan);
		$criteria->compare('kuasa_pengguna_anggaran',$this->kuasa_pengguna_anggaran,true);
		$criteria->compare('pejabat_pelaksana_kegiatan',$this->pejabat_pelaksana_kegiatan,true);
		$criteria->compare('penerima_manfaat',$this->penerima_manfaat,true);
		$criteria->compare('dana_pendamping',$this->dana_pendamping,true);
		$criteria->compare('kesesuaian_sasaran_dan_lokasi_dengan_rkpd',$this->kesesuaian_sasaran_dan_lokasi_dengan_rkpd,true);
		$criteria->compare('kesesuaian_antara_dpa_dengan_juknis',$this->kesesuaian_antara_dpa_dengan_juknis,true);
		$criteria->compare('modifikasi_masalah',$this->modifikasi_masalah,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RealisasiFisikDanKeuanganDakDpa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
}
