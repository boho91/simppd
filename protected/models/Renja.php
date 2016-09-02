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
class Renja extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $dana1,$dana2,$pagu_tahun_akhir,$sumDana1,$sumDana2,$sumPaguPro1,$sumPaguPro2,$pagu_tahun_awal,$jenis_usulan,$jumlahRka,$jumlahRkaRp,$capaian_program_rka,$lokasi_renja,$lokasi_kegiatan_rka,$pagu_prakiraan_maju_rka,$pagu_prakiraan_maju_rka_rp;
	public function afterFind() {
        parent::afterFind();
        $this->dana1 = AplikasiKomponen::uang($this->kebutuhan_dana);
		$this->jumlahRkaRp = AplikasiKomponen::uang($this->jumlahRka);
		$this->pagu_prakiraan_maju_rka_rp = AplikasiKomponen::uang($this->pagu_prakiraan_maju_rka);
		$this->dana2 = AplikasiKomponen::uang($this->kebutuhan_dana_a2);
		$this->pagu_tahun_awal = AplikasiKomponen::uang($this->pagu_tahun_awal);
		$this->pagu_tahun_akhir = AplikasiKomponen::uang($this->pagu_tahun_akhir);
		if($this->sumber_usulan!="Bukan Renstra")
			$this->status_verifikasi="";
		if($this->kelurahan!="")
			$this->lokasi_renja=$this->kelurahan_->kelurahan;
		elseif($this->kecamatan!="")
			$this->lokasi_renja=$this->kecamatan_->kecamatan;
		else
			$this->lokasi_renja=$this->lokasi_kegiatan;
        return;
    }
	public function totalPaguTahunAktif()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('t.tahun',Yii::app()->session['tahun_perencanaan']);
		
		if(!Yii::app()->user->isAdminBappeda())
		{
			$criteria->compare('t.skpd',Yii::app()->user->account->skpd);
		}
		$criteria->select="SUM(IF(a.kebutuhan_dana_setelah_perubahan IS NULL, t.kebutuhan_dana, a.kebutuhan_dana_setelah_perubahan)) as kebutuhan_dana";
		$criteria->join = "LEFT JOIN renja_perubahan a ON a.urusan=t.urusan AND a.bidang=t.bidang AND a.program = t.program AND a.kegiatan=t.kegiatan AND a.skpd=t.skpd AND a.tahun=t.tahun";
		$model = $this->find($criteria);
		
		return $model->kebutuhan_dana;
	}
	public function totalPaguTahunAwalRenja($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='t.tahun="'.$tahun.'" AND((t.sumber_usulan="Bukan Renstra" AND t.status_verifikasi="Diizinkan") OR t.sumber_usulan="Renstra")';
		$criteria->group = "t.tahun";
		$criteria->select = "SUM(IF(a.kebutuhan_dana_setelah_perubahan IS NULL, t.kebutuhan_dana, (t.kebutuhan_dana+(a.kebutuhan_dana_setelah_perubahan-t.kebutuhan_dana)))) as pagu_tahun_awal";
		$criteria->join = "LEFT JOIN renja_perubahan a ON a.urusan=t.urusan AND a.bidang=t.bidang AND a.program = t.program AND a.kegiatan=t.kegiatan AND a.skpd=t.skpd AND a.tahun=t.tahun";
		$model = $this->find($criteria);
		return $model->pagu_tahun_awal;
	}
	public function totalPaguTahunAwal($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='t.tahun="'.$tahun.'"  AND((t.sumber_usulan="Bukan Renstra" AND t.status_verifikasi="Diizinkan") OR t.sumber_usulan="Renstra")';
		$criteria->group = "t.tahun";
		$criteria->select = "SUM(kebutuhan_dana) as pagu_tahun_awal";
		$model = $this->find($criteria);
		return $model->pagu_tahun_awal;
	}
	public function totalPaguTahunAkhir($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'" AND((sumber_usulan="Bukan Renstra" AND status_verifikasi="Diizinkan") OR sumber_usulan="Renstra")';
		$criteria->group = "tahun";
		$criteria->select = "SUM(kebutuhan_dana_a2) as pagu_tahun_awal";
		$model = $this->find($criteria);
		return $model->pagu_tahun_awal;
	}
	
	public function totalPaguPerBidang($tahun,$skpd,$urusan,$bidang)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'" AND skpd="'.$skpd.'" AND urusan ="'.$urusan.'" AND bidang="'.$bidang.'"';
		$criteria->group = "bidang";
		$criteria->select = "SUM(kebutuhan_dana) as kebutuhan_dana,SUM(kebutuhan_dana_a2) as kebutuhan_dana_a2";
		$model = $this->find($criteria);
		$model->kebutuhan_dana = $model->kebutuhan_dana*1;
		$model->kebutuhan_dana_a2 = $model->kebutuhan_dana_a2*1;
		return $model->kebutuhan_dana."|".$model->kebutuhan_dana_a2;
	}
	
	public function totalPaguPerProgram($tahun,$skpd,$urusan,$bidang, $program)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'" AND skpd="'.$skpd.'" AND urusan ="'.$urusan.'" AND bidang="'.$bidang.'" AND program="'.$program.'"';
		$criteria->group = "bidang";
		$criteria->select = "SUM(kebutuhan_dana) as kebutuhan_dana,SUM(kebutuhan_dana_a2) as kebutuhan_dana_a2";
		$model = $this->find($criteria);
		$model->kebutuhan_dana = $model->kebutuhan_dana*1;
		$model->kebutuhan_dana_a2 = $model->kebutuhan_dana_a2*1;
		return $model->kebutuhan_dana."|".$model->kebutuhan_dana_a2;
	}
	
	public function totalPaguBidangFinal($tahun,$skpd,$urusan,$bidang)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'" AND skpd="'.$skpd.'" AND urusan ="'.$urusan.'" AND bidang="'.$bidang.'"  AND status_forum_skpd="Terima"';
		$criteria->group = "bidang";
		$criteria->select = "SUM(kebutuhan_dana) as kebutuhan_dana,SUM(kebutuhan_dana_a2) as kebutuhan_dana_a2";
		$model = $this->find($criteria);
		$model->kebutuhan_dana = $model->kebutuhan_dana*1;
		$model->kebutuhan_dana_a2 = $model->kebutuhan_dana_a2*1;
		return $model->kebutuhan_dana."|".$model->kebutuhan_dana_a2;
	}
	
	public function totalPaguProgramFinal($tahun,$skpd,$urusan,$bidang, $program)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'" AND skpd="'.$skpd.'" AND urusan ="'.$urusan.'" AND bidang="'.$bidang.'" AND program="'.$program.'" AND status_forum_skpd="Terima"';
		$criteria->group = "bidang";
		$criteria->select = "SUM(kebutuhan_dana) as kebutuhan_dana,SUM(kebutuhan_dana_a2) as kebutuhan_dana_a2";
		$model = $this->find($criteria);
		$model->kebutuhan_dana = $model->kebutuhan_dana*1;
		$model->kebutuhan_dana_a2 = $model->kebutuhan_dana_a2*1;
		return $model->kebutuhan_dana."|".$model->kebutuhan_dana_a2;
	}
	
	public function totalPaguBidangTolak($tahun,$skpd,$urusan,$bidang)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'" AND skpd="'.$skpd.'" AND urusan ="'.$urusan.'" AND bidang="'.$bidang.'" AND status_forum_skpd="Tolak"';
		$criteria->group = "bidang";
		$criteria->select = "SUM(kebutuhan_dana) as kebutuhan_dana,SUM(kebutuhan_dana_a2) as kebutuhan_dana_a2";
		$model = $this->find($criteria);
		$model->kebutuhan_dana = $model->kebutuhan_dana*1;
		$model->kebutuhan_dana_a2 = $model->kebutuhan_dana_a2*1;
		return $model->kebutuhan_dana."|".$model->kebutuhan_dana_a2;
	}
	
	public function totalPaguProgramTolak($tahun,$skpd,$urusan,$bidang, $program)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'" AND skpd="'.$skpd.'" AND urusan ="'.$urusan.'" AND bidang="'.$bidang.'" AND program="'.$program.'" AND status_forum_skpd="Tolak"';
		$criteria->group = "bidang";
		$criteria->select = "SUM(kebutuhan_dana) as kebutuhan_dana,SUM(kebutuhan_dana_a2) as kebutuhan_dana_a2";
		$model = $this->find($criteria);
		$model->kebutuhan_dana = $model->kebutuhan_dana*1;
		$model->kebutuhan_dana_a2 = $model->kebutuhan_dana_a2*1;
		return $model->kebutuhan_dana."|".$model->kebutuhan_dana_a2;
	}
	
	public function tableName()
	{
		return 'renja';
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
			array('urusan, bidang, program, kegiatan,kebutuhan_dana, skpd, tahun,  lokasi_kegiatan, sumber_dana', 'required'),
			array('urusan, bidang,kecamatan,kelurahan, program, kegiatan, skpd, sumber_dana', 'numerical', 'integerOnly'=>true),
			array('kebutuhan_dana, kebutuhan_dana_a2,alasan_tolak_renja,status_forum_skpd,keterangan_forum_skpd', 'length', 'max'=>100),
			array('created_by, mod_by,indikator_kinerja', 'length', 'max'=>200),
			array('sumber_usulan', 'length', 'max'=>100),
			array('status_verifikasi', 'length', 'max'=>100),
			array('foto', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, urusan, bidang, program, kegiatan, skpd, indikator_kinerja, sasaran_kegiatan, lokasi_kegiatan, target_capaian_kinerja, kebutuhan_dana, sumber_dana, catatan_penting, target_capaian_kinerja_a2, kebutuhan_dana_a2, created_by, created_date, mod_by, mod_date, sumber_usulan, status_verifikasi, keterangan, alasan_tolak_renja', 'safe', 'on'=>'search'),
			array('id, urusan, bidang, program, kegiatan, skpd, indikator_kinerja,status_forum_skpd, sasaran_kegiatan, lokasi_kegiatan, target_capaian_kinerja, kebutuhan_dana, sumber_dana, catatan_penting, target_capaian_kinerja_a2, kebutuhan_dana_a2, created_by, created_date, mod_by, mod_date, sumber_usulan, status_verifikasi, keterangan, alasan_tolak_renja', 'safe', 'on'=>'searchForumSKPD'),
		);
	}
	public function getBySkpdKegiatan($skpd,$kegiatan,$program,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd = '".$skpd."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND tahun='".$tahun."' AND((sumber_usulan='Bukan Renstra' AND status_verifikasi='Diizinkan') OR sumber_usulan='Renstra')";
		$model = $this->model()->find($criteria);
		return $model;
	}
	public function getRenja($skpd,$program,$kegiatan,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd = '".$skpd."' AND program='".$program."' AND kegiatan='".$kegiatan."' AND tahun='".$tahun."' AND((sumber_usulan='Bukan Renstra' AND status_verifikasi='Diizinkan') OR sumber_usulan='Renstra')";
		$model = $this->model()->find($criteria);
		return $model;
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
			'kelurahan_'=>array(self::BELONGS_TO, 'Kelurahan', 'kelurahan'),
			'kecamatan_'=>array(self::BELONGS_TO, 'Kecamatan', 'kecamatan'),
			'urusan_'=>array(self::BELONGS_TO, 'Urusan', 'urusan'),
			'program_'=>array(self::BELONGS_TO, 'Program', 'program'),
			'bidang_'=>array(self::BELONGS_TO, 'Bidang', 'bidang'),
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
			'indikator_kinerja' => 'Indikator Kinerja Program/Kegiatan',
			'sasaran_kegiatan' => 'Sasaran Kegiatan',
			'lokasi_kegiatan' => 'Lokasi Kegiatan',
			'target_capaian_kinerja' => 'Target Capaian Kinerja',
			'kebutuhan_dana' => ' Kebutuhan Dana/ Pagu Indikatif ',
			'dana1' => ' Kebutuhan Dana/ Pagu Indikatif ',
			'pagu_tahun_awal' => ' Kebutuhan Dana/ Pagu Indikatif ',
			'sumber_dana' => 'Sumber Dana',
			'catatan_penting' => 'Catatan Penting',
			'target_capaian_kinerja_a2' => 'Target Capaian Kinerja Prakiraan Maju',
			'kebutuhan_dana_a2' => 'Kebutuhan Dana Prakiraan Maju',
			'dana2' => 'Kebutuhan Dana Prakiraan Maju',
			'pagu_tahun_akhir' => 'Kebutuhan Dana Prakiraan Maju',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
			'mod_by' => 'Mod By',
			'mod_date' => 'Mod Date',
			'sumber_usulan' => 'Sumber Usulan',
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
		$criteria->compare('indikator_kinerja',$this->indikator_kinerja,true);
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('sasaran_kegiatan',$this->sasaran_kegiatan,true);
		$criteria->compare('lokasi_kegiatan',$this->lokasi_kegiatan);
		$criteria->compare('target_capaian_kinerja',$this->target_capaian_kinerja,true);
		$criteria->compare('kebutuhan_dana',$this->kebutuhan_dana,true);
		$criteria->compare('sumber_dana',$this->sumber_dana);
		$criteria->compare('catatan_penting',$this->catatan_penting,true);
		$criteria->compare('target_capaian_kinerja_a2',$this->target_capaian_kinerja_a2);
		$criteria->compare('kebutuhan_dana_a2',$this->kebutuhan_dana_a2,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('sumber_usulan',$this->sumber_usulan,true);
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
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('indikator_kinerja',$this->indikator_kinerja,true);
		$criteria->compare('sasaran_kegiatan',$this->sasaran_kegiatan,true);
		$criteria->compare('lokasi_kegiatan',$this->lokasi_kegiatan);
		$criteria->compare('target_capaian_kinerja',$this->target_capaian_kinerja,true);
		$criteria->compare('kebutuhan_dana',$this->kebutuhan_dana,true);
		$criteria->compare('sumber_dana',$this->sumber_dana);
		$criteria->compare('catatan_penting',$this->catatan_penting,true);
		$criteria->compare('target_capaian_kinerja_a2',$this->target_capaian_kinerja_a2);
		$criteria->compare('kebutuhan_dana_a2',$this->kebutuhan_dana_a2,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('sumber_usulan',$this->sumber_usulan,true);
		$criteria->compare('status_verifikasi',$this->status_verifikasi,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('alasan_tolak_renja',$this->alasan_tolak_renja);
		$criteria->group='skpd';
		
		$criteria->select="t.*,SUM(kebutuhan_dana) as pagu_tahun_awal,SUM(kebutuhan_dana_a2) as pagu_tahun_akhir";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
            'pageSize'=>'25'
		)
		));
	}
	
	
	public function searchPerUrusan()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		
		$criteria=new CDbCriteria;
		$criteria->condition='tahun="'.Yii::app()->session['tahun_perencanaan'].'" AND((sumber_usulan="Bukan Renstra" AND status_verifikasi="Diizinkan") OR sumber_usulan="Renstra")';
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->group='urusan';
		
		$criteria->select="t.*,SUM(kebutuhan_dana) as pagu_tahun_awal,SUM(kebutuhan_dana_a2) as pagu_tahun_akhir";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
            'pageSize'=>'25'
		)
		));
	}
	public function searchPerBidang()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		
		$criteria=new CDbCriteria;
		$criteria->condition='tahun="'.Yii::app()->session['tahun_perencanaan'].'" AND((sumber_usulan="Bukan Renstra" AND status_verifikasi="Diizinkan") OR sumber_usulan="Renstra")';
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->group='bidang';
		
		$criteria->select="t.*,SUM(kebutuhan_dana) as pagu_tahun_awal,SUM(kebutuhan_dana_a2) as pagu_tahun_akhir";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
            'pageSize'=>'25'
		)
		));
	}
	public function searchPerKegiatan()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		
		$criteria=new CDbCriteria;
		$criteria->condition='tahun="'.Yii::app()->session['tahun_perencanaan'].'" AND((sumber_usulan="Bukan Renstra" AND status_verifikasi="Diizinkan") OR sumber_usulan="Renstra")';
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->group='kegiatan';
		
		$criteria->select="t.*,SUM(kebutuhan_dana) as pagu_tahun_awal,SUM(kebutuhan_dana_a2) as pagu_tahun_akhir";
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
		$criteria->condition='t.tahun="'.Yii::app()->session['tahun_perencanaan'].'" AND((t.sumber_usulan="Bukan Renstra" AND t.status_verifikasi="Diizinkan") OR t.sumber_usulan="Renstra")';
		$criteria->compare('t.urusan',$this->urusan);
		$criteria->compare('t.urusan',$this->urusan);
		$criteria->compare('t.bidang',$this->bidang);
		$criteria->compare('t.program',$this->program);
		$criteria->compare('t.tahun',$this->tahun);
		$criteria->compare('t.skpd',$this->skpd);
		$criteria->compare('t.kegiatan',$this->kegiatan);
		$criteria->group=$group;
		$criteria->join = "LEFT JOIN renja_perubahan a ON a.urusan=t.urusan AND a.bidang=t.bidang AND a.program = t.program AND a.kegiatan=t.kegiatan AND a.skpd=t.skpd AND a.tahun=t.tahun";
		$criteria->select="t.*,SUM(IF(a.kebutuhan_dana_setelah_perubahan IS NULL, t.kebutuhan_dana, (t.kebutuhan_dana+(a.kebutuhan_dana_setelah_perubahan-t.kebutuhan_dana))))  as pagu_tahun_awal,SUM(t.kebutuhan_dana_a2) as pagu_tahun_akhir";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
            'pageSize'=>'25'
		)
		));
		
	}
	public function GroupPerCOnditionWithRka($group)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		
		$criteria=new CDbCriteria;
		$criteria->condition='t.tahun="'.Yii::app()->session['tahun_perencanaan'].'" AND((t.sumber_usulan="Bukan Renstra" AND t.status_verifikasi="Diizinkan") OR t.sumber_usulan="Renstra")';
		$criteria->compare('t.urusan',$this->urusan);
		$criteria->compare('t.urusan',$this->urusan);
		$criteria->compare('t.bidang',$this->bidang);
		$criteria->compare('t.program',$this->program);
		$criteria->compare('t.tahun',$this->tahun);
		$criteria->compare('t.skpd',$this->skpd);
		$criteria->compare('t.kegiatan',$this->kegiatan);
		$criteria->group=$group;
		$criteria->join = "LEFT JOIN renja_perubahan a ON a.urusan=t.urusan AND a.bidang=t.bidang AND a.program = t.program AND a.kegiatan=t.kegiatan AND a.skpd=t.skpd AND a.tahun=t.tahun";
		$criteria->join .= " LEFT JOIN (SELECT *,SUM(harga_satuan*volume) as jumlah_rka FROM rka WHERE status_verifikasi<>'Tolak' GROUP BY kegiatan,skpd) b ON b.urusan=t.urusan AND b.bidang=t.bidang AND b.program = t.program AND b.kegiatan=t.kegiatan AND b.skpd=t.skpd AND b.tahun=t.tahun";
		$criteria->join .= " LEFT JOIN (SELECT *,SUM(harga_satuan*volume) as jumlah_rka_perubahan FROM rka_perubahan WHERE status_verifikasi<>'Tolak' GROUP BY kegiatan,skpd) c ON c.urusan=t.urusan AND c.bidang=t.bidang AND c.program = t.program AND c.kegiatan=t.kegiatan AND c.skpd=t.skpd AND c.tahun=t.tahun";
		$criteria->select="t.*,CASE WHEN c.pagu_prakiraan_maju IS NOT NULL THEN c.pagu_prakiraan_maju ELSE b.pagu_prakiraan_maju END AS pagu_prakiraan_maju_rka,CASE WHEN c.lokasi_kegiatan IS NOT NULL THEN c.lokasi_kegiatan ELSE b.lokasi_kegiatan END AS lokasi_kegiatan_rka,CASE WHEN c.jumlah_rka_perubahan IS NOT NULL THEN c.capaian_program ELSE b.capaian_program END AS capaian_program_rka,CASE WHEN c.jumlah_rka_perubahan IS NOT NULL THEN c.jumlah_rka_perubahan ELSE b.jumlah_rka END AS jumlahRka,SUM(IF(a.kebutuhan_dana_setelah_perubahan IS NULL, t.kebutuhan_dana, (t.kebutuhan_dana+(a.kebutuhan_dana_setelah_perubahan-t.kebutuhan_dana))))  as pagu_tahun_awal,SUM(t.kebutuhan_dana_a2) as pagu_tahun_akhir";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
            'pageSize'=>'25'
		)
		));
		
	}
	public function GroupPerTahun($tahun)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		
		/*$criteria=new CDbCriteria;
		$criteria->condition='tahun="'.Yii::app()->session['tahun_perencanaan'].'"';
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->group=$group;
		$criteria->join = "LEFT JOIN renja_perubahan a ON a.urusan=t.urusan AND a.bidang=t.bidang AND a.program=t.program AND a.kegiatan=t.kegiatan AND a.skpd=t.skpd AND a.tahun=t.tahun";
		$criteria->select="t.*,IF(a.kebutuhan_dana_setelah_perubahan>0, a.kebutuhan_dana_setelah_perubahan, t.kebutuhan_dana)) as pagu_tahun_awal,SUM(kebutuhan_dana_a2) as pagu_tahun_akhir";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
            'pageSize'=>'25'
		)
		));
		*/
		$count=Yii::app()->db->createCommand('SELECT COUNT(skpd) FROM renja WHERE tahun="'.$this->tahun.'" ')->queryScalar();
		$sql='SELECT a.nama_skpd,t.skpd,t.urusan,t.bidang,SUM(t.kebutuhan_dana_a2) as pagu_tahun_akhir,t.program,t.kegiatan,t.tahun,SUM(t.kebutuhan_dana) AS pagu_tahun_awal
				FROM (
				SELECT 
				t.skpd,t.urusan,t.bidang,t.kebutuhan_dana_a2,t.program,t.kegiatan,t.tahun,
				IF(a.kebutuhan_dana_setelah_perubahan>0, a.kebutuhan_dana_setelah_perubahan, t.kebutuhan_dana) as kebutuhan_dana
				FROM `renja` `t` LEFT JOIN renja_perubahan a ON a.urusan=t.urusan AND a.bidang=t.bidang AND a.program=t.program AND a.kegiatan=t.kegiatan AND a.skpd=t.skpd AND a.tahun=t.tahun 
				
				WHERE  t.tahun="'.$tahun.'" 
				) t
				LEFT JOIN skpd a ON a.id = t.skpd';
		$rawData = Yii::app()->db->createCommand($sql);
		$dataProvider=new CSqlDataProvider($rawData, array(
                                'totalItemCount'=>$count,
                                'sort'=>array(
									'attributes'=>array(
									'skpd', 'pagu_tahun_akhir', 'pagu_tahun_awal', 'urusan',
									),
                                ),
                                'pagination'=>array(
											'pageSize'=>10,
                                ),
                ));
                
        return $dataProvider;
	}
	public function searchForumSKPD()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition='status_forum_skpd="Terima" AND ((sumber_usulan = "Bukan Renstra" AND status_verifikasi="Diizinkan") or (sumber_usulan="Renstra")) AND tahun="'.Yii::app()->session['tahun_perencanaan'].'"';
		$criteria->compare('id',$this->id,true);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('indikator_kinerja',$this->indikator_kinerja,true);
		$criteria->compare('sasaran_kegiatan',$this->sasaran_kegiatan,true);
		$criteria->compare('lokasi_kegiatan',$this->lokasi_kegiatan);
		$criteria->compare('target_capaian_kinerja',$this->target_capaian_kinerja,true);
		$criteria->compare('kebutuhan_dana',$this->kebutuhan_dana,true);
		$criteria->compare('sumber_dana',$this->sumber_dana);
		$criteria->compare('catatan_penting',$this->catatan_penting,true);
		$criteria->compare('target_capaian_kinerja_a2',$this->target_capaian_kinerja_a2);
		$criteria->compare('kebutuhan_dana_a2',$this->kebutuhan_dana_a2,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('sumber_usulan',$this->sumber_usulan,true);
		$criteria->compare('status_verifikasi',$this->status_verifikasi,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('alasan_tolak_renja',$this->alasan_tolak_renja);
		$criteria->compare('status_forum_skpd',$this->alasan_tolak_renja);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
            'pageSize'=>'25'
		)
		));
	}
	public function searchForumSKPDDitolak()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition='status_forum_skpd="Tolak" AND ((sumber_usulan = "Bukan Renstra" AND status_verifikasi="Diizinkan") or (sumber_usulan="Renstra")) AND tahun="'.Yii::app()->session['tahun_perencanaan'].'"';
		$criteria->compare('id',$this->id,true);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('indikator_kinerja',$this->indikator_kinerja,true);
		$criteria->compare('sasaran_kegiatan',$this->sasaran_kegiatan,true);
		$criteria->compare('lokasi_kegiatan',$this->lokasi_kegiatan);
		$criteria->compare('target_capaian_kinerja',$this->target_capaian_kinerja,true);
		$criteria->compare('kebutuhan_dana',$this->kebutuhan_dana,true);
		$criteria->compare('sumber_dana',$this->sumber_dana);
		$criteria->compare('catatan_penting',$this->catatan_penting,true);
		$criteria->compare('target_capaian_kinerja_a2',$this->target_capaian_kinerja_a2);
		$criteria->compare('kebutuhan_dana_a2',$this->kebutuhan_dana_a2,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('sumber_usulan',$this->sumber_usulan,true);
		$criteria->compare('status_verifikasi',$this->status_verifikasi,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('alasan_tolak_renja',$this->alasan_tolak_renja);
		$criteria->compare('status_forum_skpd',$this->alasan_tolak_renja);
		
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
