<?php

/**
 * This is the model class for table "temp_evaluasi_rkpd".
 *
 * The followings are the available columns in table 'temp_evaluasi_rkpd':
 * @property string $id
 * @property integer $skpd
 * @property string $kode
 * @property string $urusan
 * @property string $bidang
 * @property string $program
 * @property string $kegiatan
 * @property string $sasaran
 * @property string $indikator_kinerja_program
 * @property string $indikator_keluaran_kegiatan
 * @property string $target_rpjmd_k
 * @property string $target_rpjmd_rp
 * @property string $realisasi_capaian_kinerja_rpjmd1_k
 * @property string $realisasi_capaian_kinerja_rpjmd1_rp
 * @property string $target_kinerja_rkpd_k
 * @property string $target_kinerja_rkpd_rp
 * @property string $realisasi_kinerja_triwulan_1_k
 * @property string $realisasi_kinerja_triwulan_1_rp
 * @property string $realisasi_kinerja_triwulan_2_k
 * @property string $realisasi_kinerja_triwulan_2_rp
 * @property string $realisasi_kinerja_triwulan_3_k
 * @property string $realisasi_kinerja_triwulan_3_rp
 * @property string $realisasi_kinerja_triwulan_4_k
 * @property string $realisasi_kinerja_triwulan_4_rp
 * @property string $realisasi_capaian_kinerja_rkpd_k
 * @property string $realisasi_capaian_kinerja_rkpd_rp
 * @property string $realisasi_capaian_kinerja_rpjmd_k
 * @property string $realisasi_capaian_kinerja_rpjmd_rp
 * @property string $target_capaian_kinerja_dan_realisasi_rpjmd_k
 * @property string $target_capaian_kinerja_dan_realisasi_rpjmd_rp
 * @property string $tahun_anggaran
 * @property string $triwulan
 * @property string $created_by
 * @property string $created_date
 * @property string $modified_by
 * @property string $modified_date
 */
class TempEvaluasiRkpd extends CActiveRecord
{
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'temp_evaluasi_rkpd';
	}
	public function beforeSave() {
		if ($this->isNewRecord)
		{
			$this->created_by = Yii::app()->user->id;
			$this->created_date = date("Y-m-d H:i:s");
			$this->sasaran = Renja::model()->getRenja($this->skpd,$this->program,$this->kegiatan,$this->tahun_anggaran)->sasaran_kegiatan;
			$this->indikator_kinerja_program = Renja::model()->getRenja($this->skpd,$this->program,$this->kegiatan,$this->tahun_anggaran)->indikator_kinerja;
			//$this->target_rpjmd_k = KegiatanRpjmd::model()->getRpjmd($this->skpd,$this->program,$this->kegiatan,Yii::app()->session['id_rpjmd'])->indikator_kinerja;
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
			array('skpd, urusan, bidang, program,kegiatan', 'required'),
			array('skpd', 'numerical', 'integerOnly'=>true),
			array('kode, urusan, bidang, program,mod_by,mod_date,created_by,created_date, kegiatan, sasaran, indikator_kinerja_program, indikator_keluaran_kegiatan, target_rpjmd_k, target_rpjmd_rp, realisasi_capaian_kinerja_rpjmd1_k, realisasi_capaian_kinerja_rpjmd1_rp, target_kinerja_rkpd_k, target_kinerja_rkpd_rp, realisasi_kinerja_triwulan_1_k, realisasi_kinerja_triwulan_1_rp, realisasi_kinerja_triwulan_2_k, realisasi_kinerja_triwulan_2_rp, realisasi_kinerja_triwulan_3_k, realisasi_kinerja_triwulan_3_rp, realisasi_kinerja_triwulan_4_k, realisasi_kinerja_triwulan_4_rp, realisasi_capaian_kinerja_rkpd_k, realisasi_capaian_kinerja_rkpd_rp, realisasi_capaian_kinerja_rpjmd_k, realisasi_capaian_kinerja_rpjmd_rp, target_capaian_kinerja_dan_realisasi_rpjmd_k, target_capaian_kinerja_dan_realisasi_rpjmd_rp, tahun_anggaran, created_by, modified_by', 'length', 'max'=>255),
			array('triwulan', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, skpd, kode, urusan, bidang, program, kegiatan, sasaran, indikator_kinerja_program, indikator_keluaran_kegiatan, target_rpjmd_k, target_rpjmd_rp, realisasi_capaian_kinerja_rpjmd1_k, realisasi_capaian_kinerja_rpjmd1_rp, target_kinerja_rkpd_k, target_kinerja_rkpd_rp, realisasi_kinerja_triwulan_1_k, realisasi_kinerja_triwulan_1_rp, realisasi_kinerja_triwulan_2_k, realisasi_kinerja_triwulan_2_rp, realisasi_kinerja_triwulan_3_k, realisasi_kinerja_triwulan_3_rp, realisasi_kinerja_triwulan_4_k, realisasi_kinerja_triwulan_4_rp, realisasi_capaian_kinerja_rkpd_k, realisasi_capaian_kinerja_rkpd_rp, realisasi_capaian_kinerja_rpjmd_k, realisasi_capaian_kinerja_rpjmd_rp, target_capaian_kinerja_dan_realisasi_rpjmd_k, target_capaian_kinerja_dan_realisasi_rpjmd_rp, tahun_anggaran, triwulan, created_by, created_date, modified_by, modified_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'skpd' => 'Skpd',
			'kode' => 'Kode',
			'urusan' => 'Urusan',
			'bidang' => 'Bidang',
			'program' => 'Program',
			'kegiatan' => 'Kegiatan',
			'sasaran' => 'Sasaran',
			'indikator_kinerja_program' => 'Indikator Kinerja Program',
			'indikator_keluaran_kegiatan' => 'Indikator Keluaran Kegiatan',
			'target_rpjmd_k' => 'Target Rpjmd K',
			'target_rpjmd_rp' => 'Target Rpjmd Rp',
			'realisasi_capaian_kinerja_rpjmd1_k' => 'Realisasi Capaian Kinerja Rpjmd1 K',
			'realisasi_capaian_kinerja_rpjmd1_rp' => 'Realisasi Capaian Kinerja Rpjmd1 Rp',
			'target_kinerja_rkpd_k' => 'Target Kinerja Rkpd K',
			'target_kinerja_rkpd_rp' => 'Target Kinerja Rkpd Rp',
			'realisasi_kinerja_triwulan_1_k' => 'Realisasi Kinerja Triwulan 1 K',
			'realisasi_kinerja_triwulan_1_rp' => 'Realisasi Kinerja Triwulan 1 Rp',
			'realisasi_kinerja_triwulan_2_k' => 'Realisasi Kinerja Triwulan 2 K',
			'realisasi_kinerja_triwulan_2_rp' => 'Realisasi Kinerja Triwulan 2 Rp',
			'realisasi_kinerja_triwulan_3_k' => 'Realisasi Kinerja Triwulan 3 K',
			'realisasi_kinerja_triwulan_3_rp' => 'Realisasi Kinerja Triwulan 3 Rp',
			'realisasi_kinerja_triwulan_4_k' => 'Realisasi Kinerja Triwulan 4 K',
			'realisasi_kinerja_triwulan_4_rp' => 'Realisasi Kinerja Triwulan 4 Rp',
			'realisasi_capaian_kinerja_rkpd_k' => 'Realisasi Capaian Kinerja Rkpd K',
			'realisasi_capaian_kinerja_rkpd_rp' => 'Realisasi Capaian Kinerja Rkpd Rp',
			'realisasi_capaian_kinerja_rpjmd_k' => 'Realisasi Capaian Kinerja Rpjmd K',
			'realisasi_capaian_kinerja_rpjmd_rp' => 'Realisasi Capaian Kinerja Rpjmd Rp',
			'target_capaian_kinerja_dan_realisasi_rpjmd_k' => 'Target Capaian Kinerja Dan Realisasi Rpjmd K',
			'target_capaian_kinerja_dan_realisasi_rpjmd_rp' => 'Target Capaian Kinerja Dan Realisasi Rpjmd Rp',
			'tahun_anggaran' => 'Tahun Anggaran',
			'triwulan' => 'Triwulan',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
			'modified_by' => 'Modified By',
			'modified_date' => 'Modified Date',
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
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('urusan',$this->urusan,true);
		$criteria->compare('bidang',$this->bidang,true);
		$criteria->compare('program',$this->program,true);
		$criteria->compare('kegiatan',$this->kegiatan,true);
		$criteria->compare('sasaran',$this->sasaran,true);
		$criteria->compare('indikator_kinerja_program',$this->indikator_kinerja_program,true);
		$criteria->compare('indikator_keluaran_kegiatan',$this->indikator_keluaran_kegiatan,true);
		$criteria->compare('target_rpjmd_k',$this->target_rpjmd_k,true);
		$criteria->compare('target_rpjmd_rp',$this->target_rpjmd_rp,true);
		$criteria->compare('realisasi_capaian_kinerja_rpjmd1_k',$this->realisasi_capaian_kinerja_rpjmd1_k,true);
		$criteria->compare('realisasi_capaian_kinerja_rpjmd1_rp',$this->realisasi_capaian_kinerja_rpjmd1_rp,true);
		$criteria->compare('target_kinerja_rkpd_k',$this->target_kinerja_rkpd_k,true);
		$criteria->compare('target_kinerja_rkpd_rp',$this->target_kinerja_rkpd_rp,true);
		$criteria->compare('realisasi_kinerja_triwulan_1_k',$this->realisasi_kinerja_triwulan_1_k,true);
		$criteria->compare('realisasi_kinerja_triwulan_1_rp',$this->realisasi_kinerja_triwulan_1_rp,true);
		$criteria->compare('realisasi_kinerja_triwulan_2_k',$this->realisasi_kinerja_triwulan_2_k,true);
		$criteria->compare('realisasi_kinerja_triwulan_2_rp',$this->realisasi_kinerja_triwulan_2_rp,true);
		$criteria->compare('realisasi_kinerja_triwulan_3_k',$this->realisasi_kinerja_triwulan_3_k,true);
		$criteria->compare('realisasi_kinerja_triwulan_3_rp',$this->realisasi_kinerja_triwulan_3_rp,true);
		$criteria->compare('realisasi_kinerja_triwulan_4_k',$this->realisasi_kinerja_triwulan_4_k,true);
		$criteria->compare('realisasi_kinerja_triwulan_4_rp',$this->realisasi_kinerja_triwulan_4_rp,true);
		$criteria->compare('realisasi_capaian_kinerja_rkpd_k',$this->realisasi_capaian_kinerja_rkpd_k,true);
		$criteria->compare('realisasi_capaian_kinerja_rkpd_rp',$this->realisasi_capaian_kinerja_rkpd_rp,true);
		$criteria->compare('realisasi_capaian_kinerja_rpjmd_k',$this->realisasi_capaian_kinerja_rpjmd_k,true);
		$criteria->compare('realisasi_capaian_kinerja_rpjmd_rp',$this->realisasi_capaian_kinerja_rpjmd_rp,true);
		$criteria->compare('target_capaian_kinerja_dan_realisasi_rpjmd_k',$this->target_capaian_kinerja_dan_realisasi_rpjmd_k,true);
		$criteria->compare('target_capaian_kinerja_dan_realisasi_rpjmd_rp',$this->target_capaian_kinerja_dan_realisasi_rpjmd_rp,true);
		$criteria->compare('tahun_anggaran',$this->tahun_anggaran,true);
		$criteria->compare('triwulan',$this->triwulan,true);


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TempEvaluasiRkpd the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
