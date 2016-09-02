<?php

/**
 * This is the model class for table "sumber_dana".
 *
 * The followings are the available columns in table 'sumber_dana':
 * @property integer $id
 * @property string $sumber_dana
 */
class SumberDana extends CActiveRecord
{
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
				'return $m->getAttributes(array(\'id\',\'sumber_dana\'));'), 
				$models);
	 
		/* Replace the keys in the new array with 'value' and 'text' */
		foreach($data as $k => $v )
		{
			$data[$k]['value'] = $data[$k]['id'];
			unset($data[$k]['id']);
	 
			$data[$k]['text'] = $data[$k]['sumber_dana'];
			unset($data[$k]['sumber_dana']);
		}
		return($data);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sumber_dana';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function findJenisSumberDana()
	{
		$criteira = new CDbCriteria;
		$criteria->group = "jenis_sumber_dana";
		$criteira->order = "jenis_sumber_dana";
		return $this->findAll($criteria);
	}
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sumber_dana', 'required'),
			array('sumber_dana,jenis_sumber_dana', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sumber_dana', 'safe', 'on'=>'search'),
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
			'sumber_dana' => 'Sumber Dana',
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
		$criteria->compare('sumber_dana',$this->sumber_dana,true);
		$criteria->compare('jenis_sumber_dana',$this->jenis_sumber_dana);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SumberDana the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
