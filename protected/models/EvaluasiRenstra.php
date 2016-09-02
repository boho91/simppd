<?php

/**
 * This is the model class for table "evaluasi_renstra".
 *
 * The followings are the available columns in table 'evaluasi_renstra':
 * @property string $id
 * @property integer $urusan
 * @property integer $bidang
 * @property integer $program
 * @property integer $kegiatan
 * @property integer $skpd
 * @property integer $tahun
 * @property string $realisasi_target_tahun1
 * @property string $realisasi_anggaran_tahun1
 * @property string $realisasi_target_tahun2
 * @property string $realisasi_anggaran_tahun2
 * @property string $realisasi_target_tahun3
 * @property string $realisasi_anggaran_tahun3
 * @property string $realisasi_target_tahun4
 * @property string $realisasi_anggaran_tahun4
 * @property string $realisasi_target_tahun5
 * @property string $realisasi_anggaran_tahun5
 * @property string $created_by
 * @property string $created_date
 * @property string $mod_by
 * @property string $mod_date
 */
class EvaluasiRenstra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evaluasi_renstra';
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
			array('realisasi_target_tahun1, realisasi_target_tahun2, realisasi_target_tahun3, realisasi_target_tahun4, realisasi_target_tahun5', 'length', 'max'=>111),
			array('realisasi_anggaran_tahun1, realisasi_anggaran_tahun2, realisasi_anggaran_tahun3, realisasi_anggaran_tahun4, realisasi_anggaran_tahun5', 'length', 'max'=>20),
			array('created_by, mod_by', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, urusan, bidang, program, kegiatan, skpd, tahun, realisasi_target_tahun1, realisasi_anggaran_tahun1, realisasi_target_tahun2, realisasi_anggaran_tahun2, realisasi_target_tahun3, realisasi_anggaran_tahun3, realisasi_target_tahun4, realisasi_anggaran_tahun4, realisasi_target_tahun5, realisasi_anggaran_tahun5, created_by, created_date, mod_by, mod_date', 'safe', 'on'=>'search'),
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
			'realisasi_target_tahun1' => 'Realisasi Target Tahun1',
			'realisasi_anggaran_tahun1' => 'Realisasi Anggaran Tahun1',
			'realisasi_target_tahun2' => 'Realisasi Target Tahun2',
			'realisasi_anggaran_tahun2' => 'Realisasi Anggaran Tahun2',
			'realisasi_target_tahun3' => 'Realisasi Target Tahun3',
			'realisasi_anggaran_tahun3' => 'Realisasi Anggaran Tahun3',
			'realisasi_target_tahun4' => 'Realisasi Target Tahun4',
			'realisasi_anggaran_tahun4' => 'Realisasi Anggaran Tahun4',
			'realisasi_target_tahun5' => 'Realisasi Target Tahun5',
			'realisasi_anggaran_tahun5' => 'Realisasi Anggaran Tahun5',
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
		$criteria->compare('realisasi_target_tahun1',$this->realisasi_target_tahun1,true);
		$criteria->compare('realisasi_anggaran_tahun1',$this->realisasi_anggaran_tahun1,true);
		$criteria->compare('realisasi_target_tahun2',$this->realisasi_target_tahun2,true);
		$criteria->compare('realisasi_anggaran_tahun2',$this->realisasi_anggaran_tahun2,true);
		$criteria->compare('realisasi_target_tahun3',$this->realisasi_target_tahun3,true);
		$criteria->compare('realisasi_anggaran_tahun3',$this->realisasi_anggaran_tahun3,true);
		$criteria->compare('realisasi_target_tahun4',$this->realisasi_target_tahun4,true);
		$criteria->compare('realisasi_anggaran_tahun4',$this->realisasi_anggaran_tahun4,true);
		$criteria->compare('realisasi_target_tahun5',$this->realisasi_target_tahun5,true);
		$criteria->compare('realisasi_anggaran_tahun5',$this->realisasi_anggaran_tahun5,true);
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
	 * @return EvaluasiRenstra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
