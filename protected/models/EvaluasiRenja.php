<?php

/**
 * This is the model class for table "evaluasi_renja".
 *
 * The followings are the available columns in table 'evaluasi_renja':
 * @property string $id
 * @property integer $urusan
 * @property integer $bidang
 * @property integer $program
 * @property integer $kegiatan
 * @property integer $skpd
 * @property integer $tahun
 * @property integer $kesesuaian
 * @property string $evaluasi
 * @property string $tindak_lanjut
 * @property string $hasil_tindak_lanjut
 * @property string $created_by
 * @property string $created_date
 * @property string $mod_by
 * @property string $mod_date
 */
class EvaluasiRenja extends CActiveRecord
{
	public function getDataKesesuaian()
	{
		
	 
		$data = array(
			array('value' => 'Ya', 'text' => 'Ya'),
			array('value' => 'Tidak', 'text' => 'Tidak'),
		); 
	 
		
		return($data);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evaluasi_renja';
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
	public function isExistKegiatan($skpd,$urusan,$bidang,$program,$kegiatan,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd='".$skpd."' AND urusan='".$urusan."' AND bidang='".$bidang."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND tahun='".$tahun."'";
		$model = $this->find($criteria);
		if(sizeof($model)>0)
		{
			return true;
		}
		return false;
	}
	public function getByKegiatan($skpd,$urusan,$bidang,$program,$kegiatan,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd='".$skpd."' AND urusan='".$urusan."' AND bidang='".$bidang."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND tahun='".$tahun."'";
		$model = $this->find($criteria);
		
		return $model;
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('urusan, bidang, program, kegiatan, skpd, tahun', 'required'),
			array('urusan, bidang, program, kegiatan, skpd, tahun', 'numerical', 'integerOnly'=>true),
			array('created_by, mod_by,kesesuaian', 'length', 'max'=>100),
			array('evaluasi, tindak_lanjut, hasil_tindak_lanjut','length','max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, urusan, bidang, program, kegiatan, skpd, tahun, kesesuaian, evaluasi, tindak_lanjut, hasil_tindak_lanjut, created_by, created_date, mod_by, mod_date', 'safe', 'on'=>'search'),
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
			'urusan' => 'Urusan',
			'bidang' => 'Bidang',
			'program' => 'Program',
			'kegiatan' => 'Kegiatan',
			'skpd' => 'Skpd',
			'tahun' => 'Tahun',
			'kesesuaian' => 'Kesesuaian',
			'evaluasi' => 'Evaluasi',
			'tindak_lanjut' => 'Tindak Lanjut',
			'hasil_tindak_lanjut' => 'Hasil Tindak Lanjut',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kesesuaian',$this->kesesuaian);
		$criteria->compare('evaluasi',$this->evaluasi,true);
		$criteria->compare('tindak_lanjut',$this->tindak_lanjut,true);
		$criteria->compare('hasil_tindak_lanjut',$this->hasil_tindak_lanjut,true);
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
	 * @return EvaluasiRenja the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
