<?php

/**
 * This is the model class for table "renstra".
 *
 * The followings are the available columns in table 'renstra':
 * @property string $tujuan
 * @property string $id
 * @property integer $urusan
 * @property integer $bidang
 * @property integer $program
 * @property integer $kegiatan
 * @property integer $skpd
 * @property integer $sasaran_pembangunan
 * @property string $indikator_sasaran
 * @property string $kode
 * @property string $indikator_kinerja_program_dan_kegiatan
 * @property string $capaian_tahun_awal
 * @property string $target_tahun_1
 * @property string $pagu_tahun_1
 * @property string $target_tahun_2
 * @property string $pagu_tahun_2
 * @property string $target_tahun_3
 * @property string $pagu_tahun_3
 * @property string $target_tahun_4
 * @property string $pagu_tahun_4
 * @property string $target_tahun_5
 * @property string $pagu_tahun_5
 * @property string $target_akhir
 * @property string $pagu_akhir
 * @property string $lokasi
 * @property string $created_by
 * @property string $created_date
 * @property string $mod_by
 * @property string $mod_date
 */
class Renstra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $pagu1,$pagu2,$pagu3,$pagu4,$pagu5,$pagu6,$p1,$p2,$p3,$p4,$p5,$pakhir;
	public function tableName()
	{
		return 'renstra';
	}
	public function totalPaguTahunAktif()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('id_rpjmd',Yii::app()->session['id_rpjmd']);
		
		if(!Yii::app()->user->isAdminBappeda())
		{
			$criteria->compare('skpd',Yii::app()->user->account->skpd);
		}
		$criteria->select="SUM(pagu_tahun_1) as pagu_tahun_1,SUM(pagu_tahun_2) as pagu_tahun_2,SUM(pagu_tahun_3) as pagu_tahun_3,SUM(pagu_tahun_4) as pagu_tahun_4,SUM(pagu_tahun_5) as pagu_tahun_5";
		$model = $this->find($criteria);
		$periodeRpjmd = Rpjmd::model()->getPeriodeRpjmd(Yii::app()->session['id_rpjmd']);
		switch($periodeRpjmd)
		{
			case 1:
				return $model->pagu_tahun_1;
			break;
			case 2:
				return $model->pagu_tahun_2;
			break;
			case 3:
				return $model->pagu_tahun_3;
			break;
			case 4:
				return $model->pagu_tahun_4;
			break;
			case 5:
				return $model->pagu_tahun_5;
			break;
		}
		return 0;
	}
	public function totalPagu1($id_rpjmd)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='id_rpjmd="'.$id_rpjmd.'"';
		$criteria->group = "id_rpjmd";
		$criteria->select = "SUM(pagu_tahun_1) as p1";
		$model = $this->find($criteria);
		return $model->p1;
	}
	public function totalPagu2($id_rpjmd)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='id_rpjmd="'.$id_rpjmd.'"';
		$criteria->group = "id_rpjmd";
		$criteria->select = "SUM(pagu_tahun_2) as p1";
		$model = $this->find($criteria);
		return $model->p1;
	}
	public function totalPagu3($id_rpjmd)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='id_rpjmd="'.$id_rpjmd.'"';
		$criteria->group = "id_rpjmd";
		$criteria->select = "SUM(pagu_tahun_3) as p1";
		$model = $this->find($criteria);
		return $model->p1;
	}
	public function totalPagu4($id_rpjmd)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='id_rpjmd="'.$id_rpjmd.'"';
		$criteria->group = "id_rpjmd";
		$criteria->select = "SUM(pagu_tahun_4) as p1";
		$model = $this->find($criteria);
		return $model->p1;
	}
	public function totalPagu5($id_rpjmd)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='id_rpjmd="'.$id_rpjmd.'"';
		$criteria->group = "id_rpjmd";
		$criteria->select = "SUM(pagu_tahun_5) as p1";
		$model = $this->find($criteria);
		return $model->p1;
	}
	public function totalPaguAkhir($id_rpjmd)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='id_rpjmd="'.$id_rpjmd.'"';
		$criteria->group = "id_rpjmd";
		$criteria->select = "SUM(pagu_akhir) as p1";
		$model = $this->find($criteria);
		return $model->p1;
	}
	public function totalPaguPerProgram($tahun_perencanaan,$skpd,$sasaran_pembangunan)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun_perencanaan="'.$tahun_perencanaan.'" AND skpd="'.$skpd.'" AND sasaran_pembangunan="'.$sasaran_pembangunan.'" ';
		$criteria->group = "sasaran_pembangunan";
		$criteria->select = "SUM(pagu_tahun_1) as pagu_tahun_1,SUM(pagu_tahun_2) as pagu_tahun_2,SUM(pagu_tahun_3) as pagu_tahun_3,SUM(pagu_tahun_4) as pagu_tahun_4,SUM(pagu_tahun_5) as pagu_tahun_5, SUM(pagu_akhir) as pagu_akhir";
		$model = $this->find($criteria);
		$model->pagu_tahun_1 = $model->pagu_tahun_1*1;
		$model->pagu_tahun_2 = $model->pagu_tahun_2*1;
		$model->pagu_tahun_3 = $model->pagu_tahun_3*1;
		$model->pagu_tahun_4 = $model->pagu_tahun_4*1;
		$model->pagu_tahun_5 = $model->pagu_tahun_5*1;
		$model->pagu_akhir = $model->pagu_akhir*1;
		
		return $model->pagu_tahun_1."|".$model->pagu_tahun_2."|".$model->pagu_tahun_3."|".$model->pagu_tahun_4."|".$model->pagu_tahun_5."|".$model->pagu_akhir;
	}
	
	public function afterFind() {
        parent::afterFind();
        $this->pagu1 = AplikasiKomponen::uang($this->pagu_tahun_1);
		$this->pagu2 = AplikasiKomponen::uang($this->pagu_tahun_2);
		$this->pagu3 = AplikasiKomponen::uang($this->pagu_tahun_3);
		$this->pagu4 = AplikasiKomponen::uang($this->pagu_tahun_4);
		$this->pagu5 = AplikasiKomponen::uang($this->pagu_tahun_5);
		$this->pagu6 = AplikasiKomponen::uang($this->pagu_akhir);
		$this->p1 = AplikasiKomponen::uang($this->p1);
		$this->p2 = AplikasiKomponen::uang($this->p2);
		$this->p3 = AplikasiKomponen::uang($this->p3);
		$this->p4 = AplikasiKomponen::uang($this->p4);
		$this->p5 = AplikasiKomponen::uang($this->p5);
		$this->pakhir = AplikasiKomponen::uang($this->pakhir);
        return;
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
		$this->id_rpjmd = Yii::app()->session['id_rpjmd'];
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
			//array('tujuan, urusan, bidang, program, kegiatan, skpd, sasaran_pembangunan, indikator_sasaran, kode, indikator_kinerja_program_dan_kegiatan, capaian_tahun_awal, target_tahun_1, pagu_tahun_1, target_tahun_2, pagu_tahun_2, target_tahun_3, pagu_tahun_3, target_tahun_4, pagu_tahun_4, target_tahun_5, pagu_tahun_5, target_akhir, pagu_akhir, lokasi', 'required'),
			array('tujuan,  urusan, bidang, program,tahun_perencanaan, kegiatan, skpd, sasaran_pembangunan, indikator_sasaran, indikator_kinerja_program_dan_kegiatan,  lokasi', 'required'),
			array('urusan, bidang, program, kegiatan, skpd, sasaran_pembangunan', 'numerical', 'integerOnly'=>true),
			array('kode, created_by, mod_by', 'length', 'max'=>100),
			array('pagu_tahun_1, pagu_tahun_2, pagu_tahun_3, pagu_tahun_4, pagu_tahun_5, pagu_akhir', 'length', 'max'=>20),
			array('foto', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tujuan, id, sasaran, urusan, bidang, program, kegiatan, skpd, sasaran_pembangunan, indikator_sasaran, kode, indikator_kinerja_program_dan_kegiatan, capaian_tahun_awal, target_tahun_1, pagu_tahun_1, target_tahun_2, pagu_tahun_2, target_tahun_3, pagu_tahun_3, target_tahun_4, pagu_tahun_4, target_tahun_5, pagu_tahun_5, target_akhir, pagu_akhir, lokasi, created_by, created_date, mod_by, mod_date', 'safe', 'on'=>'search'),
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
			'tujuanskpd_'=>array(self::BELONGS_TO, 'TujuanSkpd', 'tujuan'),
			'sasaranskpd_'=>array(self::BELONGS_TO, 'SasaranSkpd', 'sasaran'),
			'urusan_'=>array(self::BELONGS_TO, 'Urusan', 'urusan'),'bidang_'=>array(self::BELONGS_TO, 'Bidang', 'bidang'),
			'program_'=>array(self::BELONGS_TO, 'Program', 'program'),
			'sasaran_daerah_'=>array(self::BELONGS_TO, 'SasaranDaerah', 'sasaran_pembangunan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tujuan' => 'Tujuan',
			'tahun_perencanaan'=>'Tahun',
			'id' => 'ID',
			'pagu1'=>'Pagu Tahun-1',
			'pagu2'=>'Pagu Tahun-2',
			'pagu3'=>'Pagu Tahun-3',
			'pagu4'=>'Pagu Tahun-4',
			'pagu5'=>'Pagu Tahun-5',
			'pagu6'=>'Pagu Akhir Tahun Perencanaan',
			'p1'=>'Pagu Tahun-1',
			'p2'=>'Pagu Tahun-2',
			'p3'=>'Pagu Tahun-3',
			'p4'=>'Pagu Tahun-4',
			'p5'=>'Pagu Tahun-5',
			'pakhir'=>'Pagu Akhir Tahun Perencanaan',
			'urusan' => 'Urusan',
			'bidang' => 'Bidang',
			'program' => 'Program',
			'kegiatan' => 'Kegiatan',
			'skpd' => 'SKPD Penanggungjawab',
			'sasaran_pembangunan' => 'Sasaran Pembangunan',
			'indikator_sasaran' => 'Indikator Sasaran',
			'kode' => 'Kode',
			'indikator_kinerja_program_dan_kegiatan' => 'Indikator Kinerja Program (outcome) dan Kegiatan (output)',
			'capaian_tahun_awal' => 'Data Capaian pada Tahun Awal Perencanaan',
			'target_tahun_1' => 'Target Tahun 1',
			'pagu_tahun_1' => 'Pagu Tahun 1',
			'target_tahun_2' => 'Target Tahun 2',
			'pagu_tahun_2' => 'Pagu Tahun 2',
			'target_tahun_3' => 'Target Tahun 3',
			'pagu_tahun_3' => 'Pagu Tahun 3',
			'target_tahun_4' => 'Target Tahun 4',
			'pagu_tahun_4' => 'Pagu Tahun 4',
			'target_tahun_5' => 'Target Tahun 5',
			'pagu_tahun_5' => 'Pagu Tahun 5',
			'target_akhir' => 'Target Akhir',
			'pagu_akhir' => 'Pagu Akhir',
			'lokasi' => 'Lokasi',
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

		$criteria->compare('tujuan',$this->tujuan,true);
		$criteria->compare('id_rpjmd',$this->id_rpjmd);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('sasaran_pembangunan',$this->sasaran_pembangunan);
		$criteria->compare('indikator_sasaran',$this->indikator_sasaran,true);
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('indikator_kinerja_program_dan_kegiatan',$this->indikator_kinerja_program_dan_kegiatan,true);
		$criteria->compare('capaian_tahun_awal',$this->capaian_tahun_awal,true);
		$criteria->compare('target_tahun_1',$this->target_tahun_1,true);
		$criteria->compare('pagu_tahun_1',$this->pagu_tahun_1,true);
		$criteria->compare('target_tahun_2',$this->target_tahun_2,true);
		$criteria->compare('pagu_tahun_2',$this->pagu_tahun_2,true);
		$criteria->compare('target_tahun_3',$this->target_tahun_3,true);
		$criteria->compare('pagu_tahun_3',$this->pagu_tahun_3,true);
		$criteria->compare('target_tahun_4',$this->target_tahun_4,true);
		$criteria->compare('pagu_tahun_4',$this->pagu_tahun_4,true);
		$criteria->compare('target_tahun_5',$this->target_tahun_5,true);
		$criteria->compare('pagu_tahun_5',$this->pagu_tahun_5,true);
		$criteria->compare('target_akhir',$this->target_akhir,true);
		$criteria->compare('pagu_akhir',$this->pagu_akhir,true);
		$criteria->compare('lokasi',$this->lokasi,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('tahun_perencanaan',$this->tahun_perencanaan);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
            'pageSize'=>'25'
		)
		));
	}
	public function searchPerSKpd()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition='id_rpjmd="'.Yii::app()->session['id_rpjmd'].'"';
		$criteria->compare('id',$this->id,true);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('tahun_perencanaan',$this->tahun_perencanaan);
		
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('sasaran_pembangunan',$this->sasaran_pembangunan);

		$criteria->compare('pagu_tahun_1',$this->pagu_tahun_1);
		$criteria->compare('pagu_tahun_2',$this->pagu_tahun_2);
		$criteria->compare('pagu_tahun_4',$this->pagu_tahun_4);
		$criteria->compare('pagu_tahun_3',$this->pagu_tahun_3);
		$criteria->compare('pagu_tahun_5',$this->pagu_tahun_5);
		$criteria->compare('pagu_akhir',$this->pagu_akhir);
		$criteria->group='skpd';
		
		$criteria->select="t.*,SUM(pagu_tahun_1) as p1,SUM(pagu_tahun_2) as p2,SUM(pagu_tahun_3) as p3,SUM(pagu_tahun_4) as p4,SUM(pagu_tahun_5) as p5,SUM(pagu_akhir) as pakhir";
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
		$criteria->compare('id',$this->id,true);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('tahun_perencanaan',$this->tahun_perencanaan);
		
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('sasaran_pembangunan',$this->sasaran_pembangunan);

		$criteria->compare('pagu_tahun_1',$this->pagu_tahun_1);
		$criteria->compare('pagu_tahun_2',$this->pagu_tahun_2);
		$criteria->compare('pagu_tahun_4',$this->pagu_tahun_4);
		$criteria->compare('pagu_tahun_3',$this->pagu_tahun_3);
		$criteria->compare('pagu_tahun_5',$this->pagu_tahun_5);
		$criteria->compare('pagu_akhir',$this->pagu_akhir);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
            'pageSize'=>'25'
		)
		));
	}
	public function GroupPerCOndition($group)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		
		$criteria=new CDbCriteria;
		$criteria->condition='t.tahun_perencanaan="'.Yii::app()->session['tahun_perencanaan'].'"';
		$criteria->compare('t.urusan',$this->urusan);
		$criteria->compare('t.urusan',$this->urusan);
		$criteria->compare('t.bidang',$this->bidang);
		$criteria->compare('t.program',$this->program);
		$criteria->compare('t.tahun_perencanaan',$this->tahun_perencanaan);
		$criteria->compare('t.skpd',$this->skpd);
		$criteria->compare('t.kegiatan',$this->kegiatan);
		$criteria->group=$group;
		$criteria->select="t.*";
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
	 * @return Renstra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
