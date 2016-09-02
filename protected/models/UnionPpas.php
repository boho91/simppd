<?php

/**
 * This is the model class for table "union_ppas".
 *
 * The followings are the available columns in table 'union_ppas':
 * @property string $id
 * @property integer $urusan
 * @property integer $bidang
 * @property integer $program
 * @property integer $kegiatan
 * @property string $sasaran
 * @property string $target
 * @property string $plafon_anggaran
 * @property string $plafon_anggaran_setelah_perubahan
 * @property integer $skpd
 * @property string $created_by
 * @property string $created_date
 * @property string $mod_by
 * @property string $mod_date
 * @property integer $id_musrenbang_kota
 * @property integer $tahun
 * @property string $is_perubahan
 * @property string $status_ppas
 */
class UnionPpas extends CActiveRecord
{
	public function totalPaguTahunAktif()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('t.tahun',Yii::app()->session['tahun_perencanaan']);
		
		if(!Yii::app()->user->isAdminBappeda())
		{
			$criteria->compare('t.skpd',Yii::app()->user->account->skpd);
		}
		$criteria->select="SUM(IF(plafon_anggaran_setelah_perubahan =0, plafon_anggaran, plafon_anggaran_setelah_perubahan)) as plafon_anggaran";
		$model = $this->find($criteria);
		
		return $model->plafon_anggaran;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'union_ppas';
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sasaran, target', 'required'),
			array('urusan, bidang, program, kegiatan, skpd, id_musrenbang_kota, tahun', 'numerical', 'integerOnly'=>true),
			array('id, plafon_anggaran, plafon_anggaran_setelah_perubahan', 'length', 'max'=>20),
			array('created_by, mod_by', 'length', 'max'=>100),
			array('is_perubahan', 'length', 'max'=>14),
			array('status_ppas', 'length', 'max'=>111),
			array('created_date, mod_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, urusan, bidang, program, kegiatan, sasaran, target, plafon_anggaran, plafon_anggaran_setelah_perubahan, skpd, created_by, created_date, mod_by, mod_date, id_musrenbang_kota, tahun, is_perubahan, status_ppas', 'safe', 'on'=>'search'),
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
			'sasaran' => 'Sasaran',
			'target' => 'Target',
			'plafon_anggaran' => 'Plafon Anggaran',
			'plafon_anggaran_setelah_perubahan' => 'Plafon Anggaran Setelah Perubahan',
			'skpd' => 'Skpd',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
			'mod_by' => 'Mod By',
			'mod_date' => 'Mod Date',
			'id_musrenbang_kota' => 'Id Musrenbang Kota',
			'tahun' => 'Tahun',
			'is_perubahan' => 'Is Perubahan',
			'status_ppas' => 'Status Ppas',
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
		$criteria->compare('sasaran',$this->sasaran,true);
		$criteria->compare('target',$this->target,true);
		$criteria->compare('plafon_anggaran',$this->plafon_anggaran,true);
		$criteria->compare('plafon_anggaran_setelah_perubahan',$this->plafon_anggaran_setelah_perubahan,true);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('id_musrenbang_kota',$this->id_musrenbang_kota);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('is_perubahan',$this->is_perubahan,true);
		$criteria->compare('status_ppas',$this->status_ppas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UnionPpas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
