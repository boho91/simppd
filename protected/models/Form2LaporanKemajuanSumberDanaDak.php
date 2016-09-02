<?php

/**
 * This is the model class for table "form2_laporan_kemajuan_sumber_dana_dak".
 *
 * The followings are the available columns in table 'form2_laporan_kemajuan_sumber_dana_dak':
 * @property string $id
 * @property string $urusan
 * @property string $skpd
 * @property string $bidang
 * @property integer $program
 * @property integer $kegiatan
 * @property string $pmk
 * @property string $tgl_pmk
 * @property string $juknis
 * @property string $tgl_juknis
 * @property string $penyusunan_rencana_kerja
 * @property string $tgl_penyusunan_rencana_kerja
 * @property string $penetapan_dpa
 * @property string $tgl_penetapan_dpa
 * @property string $sk_penetapan_pelaksanaan_kegiatan
 * @property string $tgl_sk_penetapan_pelaksanaan_kegiatan
 * @property string $tgl_pelaksanaan_tender
 * @property string $pelaksanaan_tender
 * @property string $persiapan_pekerjaan_swakelola
 * @property string $tgl_persiapan_pekerjaan_swakelola
 * @property string $pelaksanaan_pekerjaan_kontrak
 * @property string $tgl_pelaksanaan_pekerjaan_kontrak
 * @property string $pelaksanaan_pekerjaan_swakelola
 * @property string $tgl_pelaksanaan_pekerjaan_swakelola
 * @property string $penerbitan_spp
 * @property string $tgl_penerbitan_spp
 * @property string $penerbitan_spm
 * @property string $tgl_penerbitan_spm
 * @property string $penerbitan_sp2d
 * @property string $tgl_penerbitan_sp2d
 * @property string $tahun
 * @property integer $bulan
 * @property string $created_by
 * @property string $created_date
 * @property string $mod_by
 * @property string $mod_date
 * @property integer $is_perubahan
 * @property integer $id_dpa
 */
class Form2LaporanKemajuanSumberDanaDak extends CActiveRecord
{
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'form2_laporan_kemajuan_sumber_dana_dak';
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
	public function isExistKegiatan($skpd,$urusan,$bidang,$program,$kegiatan,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd='".$skpd."' AND urusan='".$urusan."' AND bidang='".$bidang."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND tahun_anggaran='".$tahun."'";
		$model = $this->find($criteria);
		if(sizeof($model)>0)
		{
			return true;
		}
		return false;
	}
	public function getByKegiatan($skpd,$urusan,$bidang,$program,$kegiatan,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd='".$skpd."' AND urusan='".$urusan."' AND bidang='".$bidang."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND tahun_anggaran='".$tahun."'";
		$model = $this->find($criteria);
		
		return $model;
	}
	public function getByDpa($skpd,$id_dpa,$is_perubahan,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->compare('id_dpa',$this->id_dpa);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('is_perubahan',$this->is_perubahan);
		$criteria->compare('tahun',$this->tahun);
		$model = $this->find($criteria);
		return $model;
	}
	public function IfExistByDpa($skpd,$id_dpa,$is_perubahan,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->compare('id_dpa',$id_dpa);
		$criteria->compare('skpd',$skpd);
		$criteria->compare('is_perubahan',$is_perubahan);
		$criteria->compare('tahun',$tahun);
		$model = $this->find($criteria);
		if(sizeof($model)>0)
			return true;
		else
			return false;
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('urusan, skpd, bidang, program, kegiatan, tahun,  is_perubahan, id_dpa', 'required'),
			array('program, kegiatan, bulan, is_perubahan, id_dpa', 'numerical', 'integerOnly'=>true),
			array('urusan,pmk, skpd,tgl_pmk,tgl_juknis,tgl_penyusunan_rencana_kerja, bidang,juknis,penyusunan_rencana_kerja,penetapan_dpa,sk_penetapan_pelaksanaan_kegiatan, tgl_penetapan_dpa,pelaksanaan_tender,tgl_sk_penetapan_pelaksanaan_kegiatan,tgl_pelaksanaan_tender,persiapan_pekerjaan_swakelola, tgl_persiapan_pekerjaan_swakelola, pelaksanaan_pekerjaan_kontrak, tgl_pelaksanaan_pekerjaan_kontrak, pelaksanaan_pekerjaan_swakelola, tgl_pelaksanaan_pekerjaan_swakelola, penerbitan_spp, tgl_penerbitan_spp, penerbitan_spm, tgl_penerbitan_spm, penerbitan_sp2d, tgl_penerbitan_sp2d, created_by, mod_by', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, urusan, skpd, bidang, program, kegiatan, pmk, tgl_pmk, juknis, tgl_juknis, penyusunan_rencana_kerja, tgl_penyusunan_rencana_kerja, penetapan_dpa, tgl_penetapan_dpa, sk_penetapan_pelaksanaan_kegiatan, tgl_sk_penetapan_pelaksanaan_kegiatan, tgl_pelaksanaan_tender, pelaksanaan_tender, persiapan_pekerjaan_swakelola, tgl_persiapan_pekerjaan_swakelola, pelaksanaan_pekerjaan_kontrak, tgl_pelaksanaan_pekerjaan_kontrak, pelaksanaan_pekerjaan_swakelola, tgl_pelaksanaan_pekerjaan_swakelola, penerbitan_spp, tgl_penerbitan_spp, penerbitan_spm, tgl_penerbitan_spm, penerbitan_sp2d, tgl_penerbitan_sp2d, tahun, bulan, created_by, created_date, mod_by, mod_date, is_perubahan, id_dpa', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'skpd_'=>array(self::BELONGS_TO, 'Skpd', 'skpd'),
			'kegiatan_'=>array(self::BELONGS_TO, 'Kegiatan', 'kegiatan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'urusan' => 'Urusan',
			'skpd' => 'SKPD',
			'bidang' => 'Bidang',
			'program' => 'Program',
			'kegiatan' => 'Kegiatan',
			'pmk' => 'PMK',
			'tgl_pmk' => 'Tanggal PMK',
			'juknis' => 'Juknis',
			'tgl_juknis' => 'Tanggal Juknis',
			'penyusunan_rencana_kerja' => 'Penyusunan Rencana Kerja',
			'tgl_penyusunan_rencana_kerja' => 'Tanggal Penyusunan Rencana Kerja',
			'penetapan_dpa' => 'Penetapan DPA',
			'tgl_penetapan_dpa' => 'Tanggal Penetapan DPA',
			'sk_penetapan_pelaksanaan_kegiatan' => 'Sk Penetapan Pelaksanaan Kegiatan',
			'tgl_sk_penetapan_pelaksanaan_kegiatan' => 'Tanggal SK Penetapan Pelaksanaan Kegiatan',
			'tgl_pelaksanaan_tender' => 'Tanggal Pelaksanaan Tender',
			'pelaksanaan_tender' => 'Pelaksanaan Tender',
			'persiapan_pekerjaan_swakelola' => 'Persiapan Pekerjaan Swakelola',
			'tgl_persiapan_pekerjaan_swakelola' => 'Tanggal Persiapan Pekerjaan Swakelola',
			'pelaksanaan_pekerjaan_kontrak' => 'Pelaksanaan Pekerjaan Kontrak',
			'tgl_pelaksanaan_pekerjaan_kontrak' => 'Tanggal Pelaksanaan Pekerjaan Kontrak',
			'pelaksanaan_pekerjaan_swakelola' => 'Pelaksanaan Pekerjaan Swakelola',
			'tgl_pelaksanaan_pekerjaan_swakelola' => 'Tanggal Pelaksanaan Pekerjaan Swakelola',
			'penerbitan_spp' => 'Penerbitan SPP',
			'tgl_penerbitan_spp' => 'Tanggal Penerbitan SPP',
			'penerbitan_spm' => 'Penerbitan SPM',
			'tgl_penerbitan_spm' => 'Tanggal Penerbitan SPM',
			'penerbitan_sp2d' => 'Penerbitan SP2D',
			'tgl_penerbitan_sp2d' => 'Tanggal Penerbitan SP2D',
			'tahun' => 'Tahun',
			'bulan' => 'Bulan',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
			'mod_by' => 'Mod By',
			'mod_date' => 'Mod Date',
			'is_perubahan' => 'Is Perubahan',
			'id_dpa' => 'Id Dpa',
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
		$criteria->compare('urusan',$this->urusan,true);
		$criteria->compare('skpd',$this->skpd,true);
		$criteria->compare('bidang',$this->bidang,true);
		$criteria->compare('program',$this->program);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('pmk',$this->pmk,true);
		$criteria->compare('tgl_pmk',$this->tgl_pmk,true);
		$criteria->compare('juknis',$this->juknis,true);
		$criteria->compare('tgl_juknis',$this->tgl_juknis,true);
		$criteria->compare('penyusunan_rencana_kerja',$this->penyusunan_rencana_kerja,true);
		$criteria->compare('tgl_penyusunan_rencana_kerja',$this->tgl_penyusunan_rencana_kerja,true);
		$criteria->compare('penetapan_dpa',$this->penetapan_dpa,true);
		$criteria->compare('tgl_penetapan_dpa',$this->tgl_penetapan_dpa,true);
		$criteria->compare('sk_penetapan_pelaksanaan_kegiatan',$this->sk_penetapan_pelaksanaan_kegiatan,true);
		$criteria->compare('tgl_sk_penetapan_pelaksanaan_kegiatan',$this->tgl_sk_penetapan_pelaksanaan_kegiatan,true);
		$criteria->compare('tgl_pelaksanaan_tender',$this->tgl_pelaksanaan_tender,true);
		$criteria->compare('pelaksanaan_tender',$this->pelaksanaan_tender,true);
		$criteria->compare('persiapan_pekerjaan_swakelola',$this->persiapan_pekerjaan_swakelola,true);
		$criteria->compare('tgl_persiapan_pekerjaan_swakelola',$this->tgl_persiapan_pekerjaan_swakelola,true);
		$criteria->compare('pelaksanaan_pekerjaan_kontrak',$this->pelaksanaan_pekerjaan_kontrak,true);
		$criteria->compare('tgl_pelaksanaan_pekerjaan_kontrak',$this->tgl_pelaksanaan_pekerjaan_kontrak,true);
		$criteria->compare('pelaksanaan_pekerjaan_swakelola',$this->pelaksanaan_pekerjaan_swakelola,true);
		$criteria->compare('tgl_pelaksanaan_pekerjaan_swakelola',$this->tgl_pelaksanaan_pekerjaan_swakelola,true);
		$criteria->compare('penerbitan_spp',$this->penerbitan_spp,true);
		$criteria->compare('tgl_penerbitan_spp',$this->tgl_penerbitan_spp,true);
		$criteria->compare('penerbitan_spm',$this->penerbitan_spm,true);
		$criteria->compare('tgl_penerbitan_spm',$this->tgl_penerbitan_spm,true);
		$criteria->compare('penerbitan_sp2d',$this->penerbitan_sp2d,true);
		$criteria->compare('tgl_penerbitan_sp2d',$this->tgl_penerbitan_sp2d,true);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare('bulan',$this->bulan);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('is_perubahan',$this->is_perubahan);
		$criteria->compare('id_dpa',$this->id_dpa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Form2LaporanKemajuanSumberDanaDak the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
