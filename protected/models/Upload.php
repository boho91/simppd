<?php

/**
 * This is the model class for table "upload".
 *
 * The followings are the available columns in table 'upload':
 * @property integer $id
 * @property string $foto
 * @property string $id_musrenbang_cam
 * @property string $id_musrenbang_kel
 * @property string $id_musrenbang_kota
 */
class Upload extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'upload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('foto', 'required'),
			array('foto', 'length', 'max'=>300),
			array('id_musrenbang_cam, id_musrenbang_kel, id_musrenbang_kota', 'length', 'max'=>20),
			array('foto', 'file','types'=>'jpg, png, jpeg', 'allowEmpty'=>false),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, foto, id_musrenbang_cam, id_musrenbang_kel, id_musrenbang_kota', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'foto' => 'Foto',
			'id_musrenbang_cam' => 'Id Musrenbang Cam',
			'id_musrenbang_kel' => 'Id Musrenbang Kel',
			'id_musrenbang_kota' => 'Id Musrenbang Kota',
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
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('id_musrenbang_cam',$this->id_musrenbang_cam,true);
		$criteria->compare('id_musrenbang_kel',$this->id_musrenbang_kel,true);
		$criteria->compare('id_musrenbang_kota',$this->id_musrenbang_kota,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Upload the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
