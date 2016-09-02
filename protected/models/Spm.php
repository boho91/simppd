<?php

/**
 * This is the model class for table "spm".
 *
 * The followings are the available columns in table 'spm':
 * @property string $id
 * @property string $kd_pelayanan_dasar
 * @property string $indikator
 * @property integer $nilai
 * @property integer $batas_waktu
 * @property integer $kd_skpd
 * @property string $created_date
 * @property string $created_by
 * @property string $mod_date
 * @property string $mod_by
 */
class Spm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'spm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kd_pelayanan_dasar, indikator, nilai, batas_waktu, kd_skpd', 'required'),
			array('nilai, batas_waktu, kd_skpd', 'numerical', 'integerOnly'=>true),
			array('kd_pelayanan_dasar', 'length', 'max'=>20),
			array('indikator', 'length', 'max'=>255),
			array('created_by, mod_by', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, kd_pelayanan_dasar, indikator, nilai, batas_waktu, kd_skpd, created_date, created_by, mod_date, mod_by', 'safe', 'on'=>'search'),
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
		'pelayanan_dasar_'=>array(self::BELONGS_TO, 'PelayananDasar', 'kd_pelayanan_dasar'),
		'skpd_'=>array(self::BELONGS_TO, 'skpd', 'kd_skpd'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kd_pelayanan_dasar' => 'Pelayanan Dasar',
			'indikator' => 'Indikator',
			'nilai' => 'Nilai (%)',
			'batas_waktu' => 'Batas Waktu Pencapaian',
			'kd_skpd' => 'SKPD Penanggungjawab',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'mod_date' => 'Mod Date',
			'mod_by' => 'Mod By',
		);
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
		$criteria->compare('kd_pelayanan_dasar',$this->kd_pelayanan_dasar,true);
		$criteria->compare('indikator',$this->indikator,true);
		$criteria->compare('nilai',$this->nilai);
		$criteria->compare('batas_waktu',$this->batas_waktu);
		$criteria->compare('kd_skpd',$this->kd_skpd);
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
	 * @return Spm the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
