<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $password_md5
 * @property string $nama_lengkap
 * @property integer $skpd
 * @property string $email
 * @property string $nomor_telp
 * @property string $level
 */
class User extends CActiveRecord
{
	public function getFullName() {
		return $this->nama_lengkap;
	}
	public function beforeSave() {
	
		$this->password_md5 = md5($this->password);
		return parent::beforeSave();
	}
	
	public function getSuggest($q) {
		$c = new CDbCriteria();
		$c->addSearchCondition('username', $q, true, 'OR');
		$c->addSearchCondition('nama_lengkap', $q, true, 'OR');
		return $this->findAll($c);
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, password_md5, nama_lengkap, skpd, email, nomor_telp, level', 'required'),
			array('skpd', 'numerical', 'integerOnly'=>true),
			array('username, password, password_md5,status, nama_lengkap, email, nomor_telp', 'length', 'max'=>255),
			array('level', 'length', 'max'=>14),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, password_md5, nama_lengkap, skpd, email, nomor_telp, level', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'password_md5' => 'Password Md5',
			'nama_lengkap' => 'Nama Lengkap',
			'skpd' => 'Skpd',
			'email' => 'Email',
			'nomor_telp' => 'Nomor Telp',
			'level' => 'Level',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('password_md5',$this->password_md5,true);
		$criteria->compare('nama_lengkap',$this->nama_lengkap,true);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('status',$this->status);
		$criteria->compare('level',$this->level);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('nomor_telp',$this->nomor_telp,true);
		$criteria->compare('level',$this->level,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}