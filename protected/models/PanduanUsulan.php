<?php

/**
 * This is the model class for table "panduan_usulan".
 *
 * The followings are the available columns in table 'panduan_usulan':
 * @property integer $id
 * @property integer $jenis_usulan
 * @property string $nama_usulan
 * @property string $harga
 * @property string $satuan
 * @property string $created_date
 * @property string $created_by
 * @property string $mod_date
 * @property string $mod_by
 */
class PanduanUsulan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'panduan_usulan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jenis_usulan, nama_usulan, harga, satuan,    ', 'required'),
			array('jenis_usulan', 'numerical', 'integerOnly'=>true),
			array('nama_usulan', 'length', 'max'=>200),
			array('harga', 'length', 'max'=>20),
			array('satuan, created_by, mod_by', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, jenis_usulan, nama_usulan, harga, satuan, created_date, created_by, mod_date, mod_by', 'safe', 'on'=>'search'),
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
			'usulan_'=>array(self::BELONGS_TO, 'Usulan', 'jenis_usulan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'jenis_usulan' => 'Jenis Usulan',
			'nama_usulan' => 'Nama Usulan',
			'harga' => 'Harga',
			'satuan' => 'Satuan',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('jenis_usulan',$this->jenis_usulan);
		$criteria->compare('nama_usulan',$this->nama_usulan,true);
		$criteria->compare('harga',$this->harga,true);
		$criteria->compare('satuan',$this->satuan,true);
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
	 * @return PanduanUsulan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
