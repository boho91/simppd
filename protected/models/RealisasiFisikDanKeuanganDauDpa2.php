<?php

/**
 * This is the model class for table "realisasi_fisik_dan_keuangan_dau_dpa".
 *
 * The followings are the available columns in table 'realisasi_fisik_dan_keuangan_dau_dpa':
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
 * @property string $harga_satuan
 * @property integer $volume
 * @property string $kontrak
 * @property string $swakelola
 * @property string $created_date
 * @property string $created_by
 * @property string $mod_date
 * @property string $mod_by
 */
class RealisasiFisikDanKeuanganDauDpa extends CActiveRecord
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
		return 'realisasi_fisik_dan_keuangan_dau_dpa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dpa, realisasi_fisik, realisasi_keuangan, tahun, bulan, urusan, bidang, program, kegiatan, harga_satuan, volume', 'required'),
			array('tahun, bulan, urusan, bidang, program, kegiatan,skpd,is_perubahan, volume', 'numerical', 'integerOnly'=>true),
			array('id_dpa, realisasi_fisik, realisasi_keuangan, harga_satuan, kontrak, swakelola', 'length', 'max'=>20),
			array('created_by, mod_by,kuasa_pengguna_anggaran,pejabat_pelaksana_kegiatan', 'length', 'max'=>111),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_dpa, realisasi_fisik, realisasi_keuangan, tahun, bulan, urusan, bidang, program, kegiatan, harga_satuan, volume, kontrak, swakelola, created_date, created_by, mod_date, mod_by', 'safe', 'on'=>'search'),
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
			'dpa_'=>array(self::BELONGS_TO, 'Dpa', 'id_dpa'),
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
			'harga_satuan' => 'Harga Satuan',
			'volume' => 'Volume',
			'kontrak' => 'Kontrak',
			'swakelola' => 'Swakelola',
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
		$criteria->compare('id_dpa',$this->id_dpa);
		$criteria->compare('realisasi_fisik',$this->realisasi_fisik,true);
		$criteria->compare('realisasi_keuangan',$this->realisasi_keuangan,true);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('bulan',$this->bulan);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('harga_satuan',$this->harga_satuan,true);
		$criteria->compare('volume',$this->volume);
		$criteria->compare('is_perubahan',$this->is_perubahan);
		$criteria->compare('kontrak',$this->kontrak,true);
		$criteria->compare('swakelola',$this->swakelola,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->select="t.*,date(created_date) as created_date";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function isExistKegiatan($skpd,$urusan,$bidang,$program,$kegiatan,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd='".$skpd."' AND urusan='".$urusan."' AND bidang='".$bidang."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND tahun='".$tahun."'";
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
		$criteria->condition = "skpd='".$skpd."' AND urusan='".$urusan."' AND bidang='".$bidang."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND tahun='".$tahun."'";
		$model = $this->find($criteria);
		
		return $model;
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RealisasiFisikDanKeuanganDauDpa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
