<?php

/**
 * This is the model class for table "rekening_belanja".
 *
 * The followings are the available columns in table 'rekening_belanja':
 * @property string $id
 * @property string $uraian
 * @property integer $parent_id
 * @property string $kode1
 * @property string $kode2
 * @property string $kode3
 * @property string $kode4
 * @property string $kode5
 * @property string $keterangan
 * @property string $created_date
 * @property string $created_by
 * @property string $mod_date
 * @property string $mod_by
 */
class RekeningBelanja extends CActiveRecord
{
	public $codes,$idSelectBox;
	public function afterFind() {
        parent::afterFind();
      //  $this->pagu2 = AplikasiKomponen::uang($this->pagu_tahun_2);
		$this->codes = $this->kode1.".".$this->kode2.".".$this->kode3.".".$this->kode4.".".$this->kode5;
		if($this->kode5=="")
			$this->idSelectBox = 0;
		else 
			$this->idSelectBox = $this->id;
        return;
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rekening_belanja';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uraian,  kode1', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('kode1, created_by, mod_by', 'length', 'max'=>100),
			array('kode2, kode3, kode4, kode5', 'length', 'max'=>111),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, uraian, parent_id, kode1, kode2, kode3, kode4, kode5, keterangan, created_date, created_by, mod_date, mod_by', 'safe', 'on'=>'search'),
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
			'uraian' => 'Uraian',
			'parent_id' => 'Parent',
			'kode1' => 'Kode1',
			'kode2' => 'Kode2',
			'kode3' => 'Kode3',
			'kode4' => 'Kode4',
			'kode5' => 'Kode5',
			'keterangan' => 'Keterangan',
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
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('kode1',$this->kode1,true);
		$criteria->compare('kode2',$this->kode2,true);
		$criteria->compare('kode3',$this->kode3,true);
		$criteria->compare('kode4',$this->kode4,true);
		$criteria->compare('kode5',$this->kode5,true);
		$criteria->compare('keterangan',$this->keterangan,true);
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
	 * @return RekeningBelanja the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
