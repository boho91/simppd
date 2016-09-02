<?php

/**
 * This is the model class for table "kua".
 *
 * The followings are the available columns in table 'kua':
 * @property string $id
 * @property integer $urusan
 * @property integer $bidang
 * @property integer $program
 * @property integer $kegiatan
 * @property integer $skpd
 * @property string $pagu_setelah_perubahan
 * @property string $pagu_tahun_n
 * @property string $created_by
 * @property string $created_date
 * @property string $mod_by
 * @property string $mod_date
 */
class KuaPerubahan extends CActiveRecord
{
	public $pagu1,$pagu2,$pagu_tahun_n2,$pagu_tahun_n1,$selisihTotal,$selisih,$namaskpd,$perubahan,$persen_perubahan;
	public function afterFind() {
        parent::afterFind();
      //  $this->pagu2 = AplikasiKomponen::uang($this->pagu_tahun_2);
		$this->selisihTotal = AplikasiKomponen::uang($this->pagu2-$this->pagu1);
		$this->selisih = AplikasiKomponen::uang($this->pagu_setelah_perubahan-$this->pagu_sebelum_perubahan);
		$this->pagu1 = AplikasiKomponen::uang($this->pagu1);
		$this->pagu2 = AplikasiKomponen::uang($this->pagu2);
		$this->pagu_tahun_n1 = AplikasiKomponen::uang($this->pagu_sebelum_perubahan);
		$this->pagu_tahun_n2 = AplikasiKomponen::uang($this->pagu_setelah_perubahan);
        return;
    }
	/**
	 * @return string the associated database table name
	 */
	public function selisihDariTotal($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'"';
		$criteria->group = "tahun";
		$criteria->select = "SUM(pagu_setelah_perubahan)-SUM(pagu_sebelum_perubahan) as pagu2";
		$model = $this->find($criteria);
		return $model->pagu2;
	}
	public function totalPagu2($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'"';
		$criteria->group = "tahun";
		$criteria->select = "SUM(pagu_sebelum_perubahan) as pagu2";
		$model = $this->find($criteria);
		return $model->pagu2;
	}
	public function totalPagu1($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'"';
		$criteria->group = "tahun";
		$criteria->select = "SUM(pagu_setelah_perubahan) as pagu1";
		$model = $this->find($criteria);
		return $model->pagu1;
	}
	public function totalPaguPerBidang($tahun,$skpd,$bidang)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'" AND kd_skpd="'.$skpd.'" AND kd_bidang ="'.$bidang.'"';
		$criteria->group = "kd_bidang";
		$criteria->select = "SUM(pagu_sebelum_perubahan) as pagu_sebelum_perubahan,SUM(pagu_setelah_perubahan) as pagu_setelah_perubahan";
		$model = $this->find($criteria);
		$model->pagu_sebelum_perubahan = $model->pagu_sebelum_perubahan*1;
		$model->pagu_setelah_perubahan = $model->pagu_setelah_perubahan*1;
		return $model->pagu_sebelum_perubahan."|".$model->pagu_setelah_perubahan;
	}
	public function totalPaguPerSkpd($tahun,$skpd,$bidang,$program)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'" AND kd_skpd="'.$skpd.'" AND kd_bidang ="'.$bidang.'" AND kd_prog = "'.$program.'"';
		$criteria->group = "kd_bidang";
		$criteria->select = "SUM(pagu_sebelum_perubahan) as pagu_sebelum_perubahan,SUM(pagu_setelah_perubahan) as pagu_setelah_perubahan";
		$model = $this->find($criteria);
		$model->pagu_sebelum_perubahan = $model->pagu_sebelum_perubahan*1;
		$model->pagu_setelah_perubahan = $model->pagu_setelah_perubahan*1;
		return $model->pagu_sebelum_perubahan."|".$model->pagu_setelah_perubahan;
	}
	
	public function tableName()
	{
		return 'kua_perubahan';
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
			array('urusan, bidang, program, kegiatan, skpd,  pagu_setelah_perubahan', 'required'),
			array('urusan, bidang, program,pagu_sebelum_perubahan, kegiatan, tahun,skpd,id_musrenbang', 'numerical', 'integerOnly'=>true),
			array('pagu_setelah_perubahan,status_kua', 'length', 'max'=>20),
			array('created_by, mod_by,target,sasaran_kegiatan', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, urusan, bidang, program, kegiatan, skpd, pagu_setelah_perubahan, pagu_tahun_n, created_by, created_date, mod_by, mod_date', 'safe', 'on'=>'search'),
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
			'kegiatan_'=>array(self::BELONGS_TO, 'Kegiatan', 'kegiatan'),
			'urusan_'=>array(self::BELONGS_TO, 'Urusan', 'urusan'),
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
			'pagu_setelah_perubahan' => 'Pagu Setelah Perubahan',
			'pagu1' => 'Pagu Sebelum Perubahan',
			'pagu_tahun_n' => 'Pagu Sebelum Perubahan',
			'pagu_setelah_perubahan' => 'Pagu Sebelum Perubahan',
			'pagu_tahun_n2' => 'Pagu Setelah Perubahan',
			'pagu2' => 'Pagu Setelah Perubahan',
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
		$criteria->compare('pagu_setelah_perubahan',$this->pagu_setelah_perubahan,true);
		$criteria->compare('pagu_sebelum_perubahan',$this->pagu_sebelum_perubahan,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function searchPerSKpd()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		//$criteria->condition='tahun="Terima"';
		$criteria->condition='tahun="'.Yii::app()->session['tahun_perencanaan'].'"';
		$criteria->select="t.*,SUM(pagu_setelah_perubahan) as pagu2,SUM(pagu_sebelum_perubahan) as pagu1";
		$criteria->group = "skpd";
		$criteria->compare('id',$this->id,true);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('kegiatan',$this->kegiatan);
		
		$criteria->compare('pagu_sebelum_perubahan',$this->pagu_sebelum_perubahan,true);
		$criteria->compare('pagu_setelah_perubahan',$this->pagu_setelah_perubahan,true);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('id_musrenbang',$this->id_musrenbang);
		
		//$crit/a->select="t.*,SUM(pagu_tahun_1) as pagu_tahun_awal,SUM(pagu_tahun_2) as pagu_tahun_akhir";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
            'pageSize'=>'25'
		)
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kua the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
