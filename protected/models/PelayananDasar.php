<?php

/**
 * This is the model class for table "pelayanan_dasar".
 *
 * The followings are the available columns in table 'pelayanan_dasar':
 * @property string $id
 * @property string $pelayanan_dasar
 * @property string $created_date
 * @property string $created_by
 * @property string $mod_date
 * @property string $mod_by
 */
class PelayananDasar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pelayanan_dasar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pelayanan_dasar', 'required'),
			array('pelayanan_dasar', 'length', 'max'=>255),
			array('created_by, mod_by', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pelayanan_dasar, created_date, created_by, mod_date, mod_by', 'safe', 'on'=>'search'),
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
			'pelayanan_dasar' => 'Pelayanan Dasar',
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
		$criteria->compare('pelayanan_dasar',$this->pelayanan_dasar,true);
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
	 * @return PelayananDasar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
