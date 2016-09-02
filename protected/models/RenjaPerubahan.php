<?php

/**
 * This is the model class for table "renja".
 *
 * The followings are the available columns in table 'renja':
 * @property string $id
 * @property integer $urusan
 * @property integer $bidang
 * @property integer $program
 * @property integer $kegiatan
 * @property integer $skpd
 * @property string $indikator_kinerja
 * @property string $sasaran_kegiatan
 * @property integer $lokasi_kegiatan
 * @property string $target_capaian_kinerja
 * @property string $kebutuhan_dana
 * @property integer $sumber_dana
 * @property string $catatan_penting
 * @property integer $target_capaian_kinerja_a2
 * @property string $kebutuhan_dana_a2
 * @property string $created_by
 * @property string $created_date
 * @property string $mod_by
 * @property string $mod_date
 * @property string $sumber_usulan
 * @property string $status_verifikasi
 * @property string $keterangan
 * @property integer $alasan_tolak_renja
 */
class RenjaPerubahan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $dana1,$dana2,$selisih,$selisihTotal,$pagu_tahun_akhir,$pagu_tahun_awal,$jenis_usulan,$pagu_perubahan;
	public function afterFind() {
        parent::afterFind();
		$this->selisihTotal = AplikasiKomponen::uang($this->pagu_perubahan - $this->pagu_tahun_awal);
        $this->dana1 = AplikasiKomponen::uang($this->kebutuhan_dana);
		$this->selisih = AplikasiKomponen::uang($this->kebutuhan_dana_setelah_perubahan - $this->kebutuhan_dana);
		$this->dana2 = AplikasiKomponen::uang($this->kebutuhan_dana_setelah_perubahan);
		$this->pagu_tahun_awal = AplikasiKomponen::uang($this->pagu_tahun_awal);
		$this->pagu_perubahan = AplikasiKomponen::uang($this->pagu_perubahan);

        return;
    }
	public function totalPaguPerubahan($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'"';
		$criteria->group = "tahun";
		$criteria->select = "SUM(kebutuhan_dana_setelah_perubahan) as pagu_tahun_awal";
		$model = $this->find($criteria);
		return $model->pagu_tahun_awal;
	}
	public function totalSelisihPagu($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'"';
		$criteria->group = "tahun";
		$criteria->select = "SUM(kebutuhan_dana_setelah_perubahan)-SUM(kebutuhan_dana) as pagu_tahun_awal";
		$model = $this->find($criteria);
		return $model->pagu_tahun_awal;
	}
	public function totalPaguTahunAwal($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'"';
		$criteria->group = "tahun";
		$criteria->select = "SUM(kebutuhan_dana) as pagu_tahun_awal";
		$model = $this->find($criteria);
		return $model->pagu_tahun_awal;
	}
	public function totalPaguPerBidang($tahun,$skpd,$urusan,$bidang)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'" AND skpd="'.$skpd.'" AND urusan ="'.$urusan.'" AND bidang="'.$bidang.'"  AND status_forum_skpd="Terima"';
		$criteria->group = "bidang";
		$criteria->select = "SUM(kebutuhan_dana) as kebutuhan_dana,SUM(kebutuhan_dana_setelah_perubahan) as kebutuhan_dana_setelah_perubahan";
		$model = $this->find($criteria);
		$model->kebutuhan_dana = $model->kebutuhan_dana*1;
		$model->kebutuhan_dana_setelah_perubahan = $model->kebutuhan_dana_setelah_perubahan*1;
		return $model->kebutuhan_dana."|".$model->kebutuhan_dana_setelah_perubahan;
	}
	
	public function totalPaguPerProgram($tahun,$skpd,$urusan,$bidang, $program)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'" AND skpd="'.$skpd.'" AND urusan ="'.$urusan.'" AND bidang="'.$bidang.'" AND program="'.$program.'" AND status_forum_skpd="Terima"';
		$criteria->group = "bidang";
		$criteria->select = "SUM(kebutuhan_dana) as kebutuhan_dana,SUM(kebutuhan_dana_setelah_perubahan) as kebutuhan_dana_setelah_perubahan";
		$model = $this->find($criteria);
		$model->kebutuhan_dana = $model->kebutuhan_dana*1;
		$model->kebutuhan_dana_setelah_perubahan = $model->kebutuhan_dana_setelah_perubahan*1;
		return $model->kebutuhan_dana."|".$model->kebutuhan_dana_setelah_perubahan;
	}
	public function tableName()
	{
		return 'renja_perubahan';
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
			array('urusan, bidang,program, kegiatan, skpd, tahun, sasaran_kegiatan, lokasi_kegiatan, kebutuhan_dana_setelah_perubahan, sumber_dana', 'required'),
			array('urusan, bidang,kecamatan,kelurahan, program, kegiatan, skpd, sumber_dana', 'numerical', 'integerOnly'=>true),
			array('kebutuhan_dana,keterangan,target,uraian, status_forum_skpd,keterangan_forum_skpd', 'length', 'max'=>100),
			array('created_by, mod_by,status_renja', 'length', 'max'=>100),
			array('status_verifikasi', 'length', 'max'=>100),
			array('foto', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, urusan, bidang, program, kegiatan, skpd,  sasaran_kegiatan, lokasi_kegiatan, target_capaian_kinerja, kebutuhan_dana, sumber_dana,   created_by, created_date, mod_by, mod_date,  status_verifikasi, keterangan, alasan_tolak_renja', 'safe', 'on'=>'search'),
			array('id, urusan, bidang, program, kegiatan, skpd, status_forum_skpd, sasaran_kegiatan, lokasi_kegiatan, target_capaian_kinerja, kebutuhan_dana, sumber_dana,  created_by, created_date, mod_by, mod_date, status_verifikasi, keterangan, alasan_tolak_renja', 'safe', 'on'=>'searchForumSKPD'),
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
			'kegiatan_'=>array(self::BELONGS_TO, 'Kegiatan', 'kegiatan'),
			'skpd_'=>array(self::BELONGS_TO, 'Skpd', 'skpd'),
			'sumber_dana_'=>array(self::BELONGS_TO, 'SumberDana', 'sumber_dana'),
			'kecamatan_'=>array(self::BELONGS_TO, 'Kecamatan', 'kecamatan'),
			'kelurahan_'=>array(self::BELONGS_TO, 'Kelurahan', 'kelurahan'),
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
			'sasaran_kegiatan' => 'Sasaran Kegiatan',
			'lokasi_kegiatan' => 'Lokasi Kegiatan',
			'kebutuhan_dana' => ' Kebutuhan Dana/ Pagu Indikatif ',
			'dana1' => ' Kebutuhan Dana/ Pagu Indikatif ',
			'pagu_tahun_awal' => ' Kebutuhan Dana/ Pagu Indikatif ',
			'sumber_dana' => 'Sumber Dana',
			'catatan_penting' => 'Catatan Penting',
			'dana2' => 'Kebutuhan Dana Setelah Perubahan',
			'pagu_tahun_akhir' => 'Kebutuhan Dana Setelah Perubahan',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
			'mod_by' => 'Mod By',
			'mod_date' => 'Mod Date',
			'status_verifikasi' => 'Status Verifikasi',
			'keterangan' => 'Keterangan',
			'alasan_tolak_renja' => 'Alasan Tolak Renja',
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
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('lokasi_kegiatan',$this->lokasi_kegiatan);
		$criteria->compare('target_capaian_kinerja',$this->target_capaian_kinerja,true);
		$criteria->compare('kebutuhan_dana',$this->kebutuhan_dana,true);
		$criteria->compare('sumber_dana',$this->sumber_dana);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('status_verifikasi',$this->status_verifikasi,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('alasan_tolak_renja',$this->alasan_tolak_renja);
		
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
		$criteria->condition='tahun="'.Yii::app()->session['tahun_perencanaan'].'"';
		$criteria->compare('id',$this->id,true);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('lokasi_kegiatan',$this->lokasi_kegiatan);
		$criteria->compare('target_capaian_kinerja',$this->target_capaian_kinerja,true);
		$criteria->compare('kebutuhan_dana',$this->kebutuhan_dana,true);
		$criteria->compare('sumber_dana',$this->sumber_dana);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('status_verifikasi',$this->status_verifikasi,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('alasan_tolak_renja',$this->alasan_tolak_renja);
		$criteria->group='skpd';
		
		$criteria->select="t.*,SUM(kebutuhan_dana) as pagu_tahun_awal,SUM(kebutuhan_dana_setelah_perubahan) as pagu_perubahan";
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
	 * @return Renja the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
