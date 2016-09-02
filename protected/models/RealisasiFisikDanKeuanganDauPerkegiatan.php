<?php

/**
 * This is the model class for table "realisasi_fisik_dan_keuangan_dau_perkegiatan".
 *
 * The followings are the available columns in table 'realisasi_fisik_dan_keuangan_dau_perkegiatan':
 * @property string $id
 * @property integer $urusan
 * @property integer $bidang
 * @property integer $program
 * @property integer $kegiatan
 * @property string $pejabat_pelaksana_kegiatan
 * @property string $manfaat_kegiatan
 * @property string $lokasi_kegiatan
 * @property integer $skpd
 * @property string $kendala
 * @property string $tindak_lanjut
 * @property string $pihak_pembantu
 * @property string $kuasa_pengguna_anggaran
 * @property string $created_date
 * @property string $created_by
 * @property string $mod_date
 * @property string $mod_by
 */
class RealisasiFisikDanKeuanganDauPerkegiatan extends CActiveRecord
{
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
		return 'kendala_realisasi_fisik_dan_keuangan_dau';
	}
	public function isExistKegiatan($skpd,$urusan,$bidang,$program,$kegiatan,$tahun,$is_perubahan)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "is_perubahan='".$is_perubahan."' AND skpd='".$skpd."' AND urusan='".$urusan."' AND bidang='".$bidang."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND tahun='".$tahun."'";
		$model = $this->find($criteria);
		if(sizeof($model)>0)
		{
			return true;
		}
		return false;
	}
	public function getByKegiatan($skpd,$urusan,$bidang,$program,$kegiatan,$tahun,$is_perubahan)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "is_perubahan='".$is_perubahan."' AND skpd='".$skpd."' AND urusan='".$urusan."' AND bidang='".$bidang."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND tahun='".$tahun."'";
		$model = $this->find($criteria);
		
		return $model;
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('urusan, bidang, program, kegiatan, skpd', 'required'),
			array('urusan, bidang, program, kegiatan,is_perubahan,id_dpa, skpd,bulan', 'numerical', 'integerOnly'=>true),
			array('pihak_pembantu, kuasa_pengguna_anggaran,pejabat_pelaksana_kegiatan,kendala,tindak_lanjut,manfaat_kegiatan,lokasi_kegiatan, kuasa_pengguna_anggaran,created_by, mod_date', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, urusan, bidang, program, kegiatan, pejabat_pelaksana_kegiatan, manfaat_kegiatan, lokasi_kegiatan, skpd, kendala, tindak_lanjut, pihak_pembantu, kuasa_pengguna_anggaran, created_date, created_by, mod_date, mod_by', 'safe', 'on'=>'search'),
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
			'bulan_'=>array(self::BELONGS_TO, 'Bulan', 'bulan'),
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
			'bidang' => 'Bidang',
			'program' => 'Program',
			'kegiatan' => 'Kegiatan',
			'pejabat_pelaksana_kegiatan' => 'Pejabat Pelaksana Kegiatan',
			'manfaat_kegiatan' => 'Manfaat Kegiatan',
			'lokasi_kegiatan' => 'Lokasi Kegiatan',
			'skpd' => 'Skpd',
			'kendala' => 'Kendala',
			'tindak_lanjut' => 'Tindak Lanjut',
			'pihak_pembantu' => 'Pihak Pembantu',
			'kuasa_pengguna_anggaran' => 'Kuasa Pengguna Anggaran',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'mod_date' => 'Mod Date',
			'mod_by' => 'Mod By',
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
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('pejabat_pelaksana_kegiatan',$this->pejabat_pelaksana_kegiatan,true);
		$criteria->compare('manfaat_kegiatan',$this->manfaat_kegiatan,true);
		$criteria->compare('lokasi_kegiatan',$this->lokasi_kegiatan,true);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('is_perubahan',$this->is_perubahan);
		$criteria->compare('bulan',$this->bulan);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kendala',$this->kendala,true);
		$criteria->compare('tindak_lanjut',$this->tindak_lanjut,true);
		$criteria->compare('pihak_pembantu',$this->pihak_pembantu,true);
		$criteria->compare('kuasa_pengguna_anggaran',$this->kuasa_pengguna_anggaran,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RealisasiFisikDanKeuanganDauPerkegiatan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
