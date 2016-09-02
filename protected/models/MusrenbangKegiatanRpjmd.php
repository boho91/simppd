<?php

/**
 * This is the model class for table "musrenbang_kegiatan_rpjmd".
 *
 * The followings are the available columns in table 'musrenbang_kegiatan_rpjmd':
 * @property string $id
 * @property integer $urusan
 * @property integer $bidang
 * @property integer $program
 * @property integer $kegiatan
 * @property integer $skpd
 * @property string $indikator_kinerja
 * @property string $kondisi_kinerja_awal
 * @property integer $id_rpjmd
 * @property string $target_tahun1
 * @property string $dana_tahun1
 * @property string $target_tahun2
 * @property string $dana_tahun2
 * @property string $target_tahun3
 * @property string $dana_tahun3
 * @property string $target_tahun4
 * @property string $dana_tahun4
 * @property string $target_tahun5
 * @property string $dana_tahun5
 * @property string $target_akhir
 * @property string $dana_akhir
 * @property string $status_verifikasi
 * @property string $alasan_tolak
 * @property string $created_date
 * @property string $created_by
 * @property string $mod_date
 * @property string $mod_by
 * @property string $satuan_target_kinerja
 */
class MusrenbangKegiatanRpjmd extends CActiveRecord
{
	public $pagu1,$pagu2,$pagu3,$pagu4,$pagu5,$pagu6,$p1,$p2,$p3,$p4,$p5,$pakhir;
	public function afterFind() {
        parent::afterFind();
        $this->pagu1 = AplikasiKomponen::uang($this->dana_tahun1);
		$this->pagu2 = AplikasiKomponen::uang($this->dana_tahun2);
		$this->pagu3 = AplikasiKomponen::uang($this->dana_tahun3);
		$this->pagu4 = AplikasiKomponen::uang($this->dana_tahun4);
		$this->pagu5 = AplikasiKomponen::uang($this->dana_tahun5);
		$this->pagu6 = AplikasiKomponen::uang($this->dana_akhir);
		$this->p1 = AplikasiKomponen::uang($this->p1);
		$this->p2 = AplikasiKomponen::uang($this->p2);
		$this->p3 = AplikasiKomponen::uang($this->p3);
		$this->p4 = AplikasiKomponen::uang($this->p4);
		$this->p5 = AplikasiKomponen::uang($this->p5);
		$this->pakhir = AplikasiKomponen::uang($this->dana_akhir);
        return;
    }
	public function getTargetRpjmdPerTahun($id_rpjmd,$skpd,$urusan,$bidang,$program,$kegiatan)
	{
		$periodeRpjmd = Rpjmd::model()->getPeriodeRpjmd($id_rpjmd);
		$criteria = new CDbCriteria;
		$criteria->compare('id_rpjmd',$id_rpjmd);
		
		if(!Yii::app()->user->isAdminBappeda())
		{
			$criteria->compare('skpd',Yii::app()->user->account->skpd);
		}
		$criteria->compare('urusan',$urusan);
		$criteria->compare('bidang',$bidang);
		$criteria->compare('program',$program);
		$criteria->compare('kegiatan',$kegiatan);
		$criteria->compare('skpd',$skpd);
		$criteria->select="satuan_target_kinerja,SUM(target_akhir) as target_akhir,SUM(target_tahun2) as target_tahun2,SUM(target_tahun3) as target_tahun3,SUM(target_tahun4) as target_tahun4,SUM(target_tahun5) as target_tahun5";
		$model = $this->find($criteria);
		return $model->target_akhir." ".$model->satuan_target_kinerja;
		/*
		switch($periodeRpjmd)
		{
			case 1:
				return ($model->target_tahun1." ".$model->satuan_target_kinerja);
			break;
			case 2:
				return ($model->target_tahun2." ".$model->satuan_target_kinerja);
			break;
			case 3:
				return ($model->target_tahun3." ".$model->satuan_target_kinerja);
			break;
			case 4:
				return ($model->target_tahun4." ".$model->satuan_target_kinerja);
			break;
			case 5:
				return ($model->target_tahun5." ".$model->satuan_target_kinerja);
			break;
		}
		*/
	}
	public function getTargetDanaRpjmdPerTahun($id_rpjmd,$skpd,$urusan,$bidang,$program,$kegiatan)
	{
		$periodeRpjmd = Rpjmd::model()->getPeriodeRpjmd($id_rpjmd);
		$criteria = new CDbCriteria;
		$criteria->compare('id_rpjmd',$id_rpjmd);
		
		if(!Yii::app()->user->isAdminBappeda())
		{
			$criteria->compare('skpd',Yii::app()->user->account->skpd);
		}
		$criteria->compare('urusan',$urusan);
		$criteria->compare('bidang',$bidang);
		$criteria->compare('program',$program);
		$criteria->compare('kegiatan',$kegiatan);
		$criteria->compare('skpd',$skpd);
		$criteria->select="SUM(dana_akhir) as dana_akhir,SUM(dana_tahun2) as dana_tahun2,SUM(dana_tahun3) as dana_tahun3,SUM(dana_tahun4) as dana_tahun4,SUM(dana_tahun5) as dana_tahun5";
		$model = $this->find($criteria);
		return $model->dana_akhir;
		switch($periodeRpjmd)
		{
			case 1:
				return $model->dana_tahun1;
			break;
			case 2:
				return $model->dana_tahun2;
			break;
			case 3:
				return $model->dana_tahun3;
			break;
			case 4:
				return $model->dana_tahun4;
			break;
			case 5:
				return $model->dana_tahun5;
			break;
		}
		
	}
	public function beforeSave() {
		if ($this->isNewRecord)
		{
			$this->created_by = Yii::app()->user->id;
			$this->created_date = date("Y-m-d H:i:s");
			$this->dana_akhir = $this->dana_tahun1+$this->dana_tahun2+$this->dana_tahun3+$this->dana_tahun4+$this->dana_tahun5;

			}else 
		{
			$this->mod_by = Yii::app()->user->id;
			$this->mod_date = date("Y-m-d H:i:s");
			$this->dana_akhir = $this->dana_tahun1+$this->dana_tahun2+$this->dana_tahun3+$this->dana_tahun4+$this->dana_tahun5;
		}
		return parent::beforeSave();
	}
	public function totalPagu1($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='id_rpjmd="'.$tahun.'"';
		$criteria->group = "id_rpjmd";
		$criteria->select = "SUM(dana_tahun1) as p1";
		$model = $this->find($criteria);
		return $model->p1;
	}
	public function totalPagu2($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='id_rpjmd="'.$tahun.'"';
		$criteria->group = "id_rpjmd";
		$criteria->select = "SUM(dana_tahun2) as p1";
		$model = $this->find($criteria);
		return $model->p1;
	}
	public function totalPagu3($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='id_rpjmd="'.$tahun.'"';
		$criteria->group = "id_rpjmd";
		$criteria->select = "SUM(dana_tahun3) as p1";
		$model = $this->find($criteria);
		return $model->p1;
	}
	public function totalPagu4($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='id_rpjmd="'.$tahun.'"';
		$criteria->group = "id_rpjmd";
		$criteria->select = "SUM(dana_tahun4) as p1";
		$model = $this->find($criteria);
		return $model->p1;
	}
	public function totalPagu5($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='id_rpjmd="'.$tahun.'"';
		$criteria->group = "id_rpjmd";
		$criteria->select = "SUM(dana_tahun5) as p1";
		$model = $this->find($criteria);
		return $model->p1;
	}
	public function totalPaguAkhir($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='id_rpjmd="'.$tahun.'"';
		$criteria->group = "id_rpjmd";
		$criteria->select = "SUM(dana_akhir) as p1";
		$model = $this->find($criteria);
		return $model->p1;
	}
	public function getRpjmd($skpd,$program,$kegiatan,$id_rpjmd)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd = '".$skpd."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND id_rpjmd='".$id_rpjmd."'";
		$model = $this->model()->find($criteria);
		return $model;
	}
	
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'musrenbang_kegiatan_rpjmd';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('urusan, bidang, program, kegiatan, skpd,id_rpjmd', 'required'),
			array('urusan, bidang, program, kegiatan, skpd, id_rpjmd', 'numerical', 'integerOnly'=>true),
			array('indikator_kinerja,kondisi_kinerja_awal', 'length', 'max'=>255),
			array('target_tahun1, dana_tahun1, target_tahun2, dana_tahun2, target_tahun3, dana_tahun3, target_tahun4, dana_tahun4, target_tahun5, dana_tahun5, target_akhir, dana_akhir', 'length', 'max'=>20),
			array('status_verifikasi', 'length', 'max'=>18),
			array('alasan_tolak, created_by, mod_by, satuan_target_kinerja', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, urusan, bidang, program, kegiatan, skpd, indikator_kinerja, kondisi_kinerja_awal, id_rpjmd, target_tahun1, dana_tahun1, target_tahun2, dana_tahun2, target_tahun3, dana_tahun3, target_tahun4, dana_tahun4, target_tahun5, dana_tahun5, target_akhir, dana_akhir, status_verifikasi, alasan_tolak, created_date, created_by, mod_date, mod_by, satuan_target_kinerja', 'safe', 'on'=>'search'),
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
		'skpd_'=>array(self::BELONGS_TO,'Skpd','skpd'),
		'kegiatan_'=>array(self::BELONGS_TO, 'Kegiatan', 'kegiatan'),
		'program_'=>array(self::BELONGS_TO, 'Program', 'program'),
		'bidang_'=>array(self::BELONGS_TO, 'Bidang', 'bidang'),
		'urusan_'=>array(self::BELONGS_TO,'Urusan','urusan'),
		
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
			'indikator_kinerja' => 'Indikator Kinerja',
			'kondisi_kinerja_awal' => 'Kondisi Kinerja Awal',
			'id_rpjmd' => 'Id Rpjmd',
			'target_tahun1' => 'Target Tahun1',
			'dana_tahun1' => 'Dana Tahun1',
			'target_tahun2' => 'Target Tahun2',
			'dana_tahun2' => 'Dana Tahun2',
			'target_tahun3' => 'Target Tahun3',
			'dana_tahun3' => 'Dana Tahun3',
			'target_tahun4' => 'Target Tahun4',
			'dana_tahun4' => 'Dana Tahun4',
			'target_tahun5' => 'Target Tahun5',
			'dana_tahun5' => 'Dana Tahun5',
			'target_akhir' => 'Target Akhir',
			'dana_akhir' => 'Dana Akhir',
			'status_verifikasi' => 'Status Verifikasi',
			'alasan_tolak' => 'Alasan Tolak',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'mod_date' => 'Mod Date',
			'mod_by' => 'Mod By',
			'satuan_target_kinerja' => 'Satuan Target Kinerja',
		);
	}
	
	public function getBySkpdKegiatan($skpd,$kegiatan,$program,$id_rpjmd)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd = '".$skpd."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND id_rpjmd='".$id_rpjmd."'";
		$model = $this->model()->find($criteria);
		return $model;
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
		$criteria->compare('indikator_kinerja',$this->indikator_kinerja,true);
		$criteria->compare('kondisi_kinerja_awal',$this->kondisi_kinerja_awal,true);
		$criteria->compare('id_rpjmd',$this->id_rpjmd);
		$criteria->compare('target_tahun1',$this->target_tahun1,true);
		$criteria->compare('dana_tahun1',$this->dana_tahun1,true);
		$criteria->compare('target_tahun2',$this->target_tahun2,true);
		$criteria->compare('dana_tahun2',$this->dana_tahun2,true);
		$criteria->compare('target_tahun3',$this->target_tahun3,true);
		$criteria->compare('dana_tahun3',$this->dana_tahun3,true);
		$criteria->compare('target_tahun4',$this->target_tahun4,true);
		$criteria->compare('dana_tahun4',$this->dana_tahun4,true);
		$criteria->compare('target_tahun5',$this->target_tahun5,true);
		$criteria->compare('dana_tahun5',$this->dana_tahun5,true);
		$criteria->compare('target_akhir',$this->target_akhir,true);
		$criteria->compare('dana_akhir',$this->dana_akhir,true);
		$criteria->compare('status_verifikasi',$this->status_verifikasi,true);
		$criteria->compare('alasan_tolak',$this->alasan_tolak,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('satuan_target_kinerja',$this->satuan_target_kinerja,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchPerSKpd()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition='id_rpjmd="'.Yii::app()->session['id_rpjmd'].'"';
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('indikator_kinerja',$this->indikator_kinerja,true);
		$criteria->compare('kondisi_kinerja_awal',$this->kondisi_kinerja_awal,true);
		$criteria->compare('id_rpjmd',$this->id_rpjmd);
		$criteria->compare('target_tahun1',$this->target_tahun1,true);
		$criteria->compare('dana_tahun1',$this->dana_tahun1,true);
		$criteria->compare('target_tahun2',$this->target_tahun2,true);
		$criteria->compare('dana_tahun2',$this->dana_tahun2,true);
		$criteria->compare('target_tahun3',$this->target_tahun3,true);
		$criteria->compare('dana_tahun3',$this->dana_tahun3,true);
		$criteria->compare('target_tahun4',$this->target_tahun4,true);
		$criteria->compare('dana_tahun4',$this->dana_tahun4,true);
		$criteria->compare('target_tahun5',$this->target_tahun5,true);
		$criteria->compare('dana_tahun5',$this->dana_tahun5,true);
		$criteria->compare('target_akhir',$this->target_akhir,true);
		$criteria->compare('dana_akhir',$this->dana_akhir,true);

		$criteria->group='skpd';
		
		$criteria->select="t.*,SUM(dana_tahun1) as p1,SUM(dana_tahun2) as p2,SUM(dana_tahun3) as p3,SUM(dana_tahun4) as p4,SUM(dana_tahun5) as p5,SUM(dana_akhir) as pakhir";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
            'pageSize'=>'25'
		)
		));
	}
	
	public function searchForumSKPD()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('indikator_kinerja',$this->indikator_kinerja,true);
		$criteria->compare('kondisi_kinerja_awal',$this->kondisi_kinerja_awal,true);
		$criteria->compare('id_rpjmd',$this->id_rpjmd);
		$criteria->compare('target_tahun1',$this->target_tahun1,true);
		$criteria->compare('dana_tahun1',$this->dana_tahun1,true);
		$criteria->compare('target_tahun2',$this->target_tahun2,true);
		$criteria->compare('dana_tahun2',$this->dana_tahun2,true);
		$criteria->compare('target_tahun3',$this->target_tahun3,true);
		$criteria->compare('dana_tahun3',$this->dana_tahun3,true);
		$criteria->compare('target_tahun4',$this->target_tahun4,true);
		$criteria->compare('dana_tahun4',$this->dana_tahun4,true);
		$criteria->compare('target_tahun5',$this->target_tahun5,true);
		$criteria->compare('dana_tahun5',$this->dana_tahun5,true);
		$criteria->compare('target_akhir',$this->target_akhir,true);
		$criteria->compare('dana_akhir',$this->dana_akhir,true);
	
		
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
	 * @return MusrenbangKegiatanRpjmd the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
