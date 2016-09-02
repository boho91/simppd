<?php

/**
 * This is the model class for table "reses_dprd".
 *
 * The followings are the available columns in table 'reses_dprd':
 * @property integer $id
 * @property integer $skpd
 * @property string $usulan
 * @property integer $sumber_dana
 * @property string $keterangan
 * @property string $created_by
 * @property string $created_date
 * @property string $mod_by
 * @property string $mod_date
 */
class ResesDprd extends CActiveRecord
{
	public $jumlah_baris;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reses_dprd';
	}

	public function totalBaris($skpd)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='skpd="'.$skpd.'"';
		$criteria->select = "count(*) as jumlah_baris";
		$model = $this->find($criteria);
		return $model->jumlah_baris;
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
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('skpd, usulan, sumber_dana', 'required'),
			array('skpd, sumber_dana', 'numerical', 'integerOnly'=>true),
			array('usulan', 'length', 'max'=>500),
			array('created_by, mod_by', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, skpd, usulan, sumber_dana, keterangan, created_by, created_date, mod_by, mod_date', 'safe', 'on'=>'search'),
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
			'sumberdana_'=>array(self::BELONGS_TO, 'SumberDana', 'sumber_dana'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'skpd' => 'Skpd',
			'usulan' => 'Usulan',
			'sumber_dana' => 'Sumber Dana',
			'keterangan' => 'Keterangan',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
			'mod_by' => 'Mod By',
			'mod_date' => 'Mod Date',
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
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('usulan',$this->usulan,true);
		$criteria->compare('sumber_dana',$this->sumber_dana);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ResesDprd the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
