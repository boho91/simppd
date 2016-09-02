<?php

/**
 * This is the model class for table "visi".
 *
 * The followings are the available columns in table 'visi':
 * @property integer $id
 * @property integer $tahun_rpjmd
 * @property string $visi
 * @property string $keterangan
 * @property string $created_date
 * @property string $created_by
 * @property string $mod_date
 * @property string $mod_by
 */
class Rpjmd extends CActiveRecord
{
	public $akhir_tahun_rpjmd;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rpjmd';
	}
	public function getPeriodeRpjmd($id)
	{
		$model = $this->findByPk($id);
		return Yii::app()->session['tahun_perencanaan']-$model->tahun_rpjmd +1;
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
	public function getData()
	{
		/* This function must return the data in exactly
		this format - using the same keys:
	 
		$data = array(
			array('value' => 1, 'text' => 'Cape Town'),
			array('value' => 2, 'text' => 'Still Bay'),
			array('value' => 3, 'text' => 'Johannesburg'),
			array('value' => 4, 'text' => 'Port Elisabeth'),
		); */
	 
		/* Get the towns */
		$criteria = new CDbCriteria;
		//$criteria->compare(bla bla bla);
		$models = $this->findAll($criteria);
	 
		/* Extract only the attributes that you need from the models
		   into a new array */
		$data = array_map(
			create_function('$m', 
				'return $m->getAttributes(array(\'id\',\'tahun_rpjmd\'));'), 
				$models);
	 
		/* Replace the keys in the new array with 'value' and 'text' */
		foreach($data as $k => $v )
		{
			$data[$k]['value'] = $data[$k]['id'];
			unset($data[$k]['id']);
	 
			$data[$k]['text'] = $data[$k]['tahun_rpjmd'];
			unset($data[$k]['tahun_rpjmd']);
		}
		return($data);
	}
	public function getIdByTahun($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = 'tahun_rpjmd<='.$tahun.' AND tahun_rpjmd+5>='.$tahun.'';
		$model = $this->find($criteria);
		return $model->id;
	}
	public function getMinYear()
	{
		$criteria = new CDbCriteria;
		$criteria->select = "MIN(tahun_rpjmd) as tahun_rpjmd";
		$model = $this->find($criteria);
		
		return $model->tahun_rpjmd;
	}
	public function getMaxYear()
	{
		$criteria = new CDbCriteria;
		$criteria->select = "MAX(tahun_rpjmd) as tahun_rpjmd";
		$model = $this->find($criteria);
		return $model->tahun_rpjmd;
	}
	public function afterFind() {
        parent::afterFind();
		
        $this->akhir_tahun_rpjmd = $this->tahun_rpjmd+5;
        return;
    }
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tahun_rpjmd, visi', 'required'),
			array('tahun_rpjmd', 'numerical', 'integerOnly'=>true),
			array('created_by, mod_by', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tahun_rpjmd, visi, keterangan, created_date, created_by, mod_date, mod_by', 'safe', 'on'=>'search'),
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
			'tahun_rpjmd' => 'Awal Tahun Rpjmd',
			'visi' => 'Visi',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('tahun_rpjmd',$this->tahun_rpjmd);
		$criteria->compare('visi',$this->visi,true);
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
	 * @return Visi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
