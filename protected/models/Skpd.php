<?php

/**
 * This is the model class for table "skpd".
 *
 * The followings are the available columns in table 'skpd':
 * @property integer $id
 * @property string $nama_skpd
 * @property string $alamat
 * @property string $no_telp
 * @property string $nama_penanda_tangan_dokumen
 * @property string $nip_penanda_tangan_dokumen
 * @property string $pangkat_penanda_tangan_dokumen
 */
class Skpd extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $kode_skpd;
	public function afterFind() {
        parent::afterFind();
      //  $this->pagu2 = AplikasiKomponen::uang($this->pagu_tahun_2);
		$this->kode_skpd = $this->bidang_urusan_->urusan_->kode_urusan.".".$this->bidang_urusan_->kode_bidang.".".$this->kode;
		
        return;
    }
	public function tableName()
	{
		return 'skpd';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_skpd, alamat, no_telp, nama_penanda_tangan_dokumen,bidang_urusan, nip_penanda_tangan_dokumen, pangkat_penanda_tangan_dokumen', 'required'),
			array('nama_skpd, no_telp, nama_penanda_tangan_dokumen,kode, nip_penanda_tangan_dokumen, pangkat_penanda_tangan_dokumen', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama_skpd, alamat, no_telp, nama_penanda_tangan_dokumen, nip_penanda_tangan_dokumen, pangkat_penanda_tangan_dokumen', 'safe', 'on'=>'search'),
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
			'bidang_urusan_'=>array(self::BELONGS_TO, 'Bidang', 'bidang_urusan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama_skpd' => 'Nama Skpd',
			'alamat' => 'Alamat',
			'no_telp' => 'No Telp',
			'nama_penanda_tangan_dokumen' => 'Nama Penanda Tangan Dokumen',
			'nip_penanda_tangan_dokumen' => 'Nip Penanda Tangan Dokumen',
			'pangkat_penanda_tangan_dokumen' => 'Pangkat Penanda Tangan Dokumen',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('bidang_urusan',$this->bidang_urusan);
		$criteria->compare('nama_skpd',$this->nama_skpd,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('nama_penanda_tangan_dokumen',$this->nama_penanda_tangan_dokumen,true);
		$criteria->compare('nip_penanda_tangan_dokumen',$this->nip_penanda_tangan_dokumen,true);
		$criteria->compare('pangkat_penanda_tangan_dokumen',$this->pangkat_penanda_tangan_dokumen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Skpd the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
