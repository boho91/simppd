<?php

/**
 * This is the model class for table "kegiatan_musrenbang".
 *
 * The followings are the available columns in table 'kegiatan_musrenbang':
 * @property string $idkegiatan
 * @property integer $kd_skpd
 * @property integer $kd_urusan
 * @property integer $kd_bidang
 * @property integer $kd_prog
 * @property integer $tahun
 * @property integer $kunci
 * @property string $timestamp
 * @property string $sasaran_daerah
 * @property string $prioritas_daerah
 * @property string $sasaran_kegiatan
 * @property string $keterangan
 * @property string $created_date
 * @property string $created_by
 * @property string $mod_date
 * @property string $mod_by
 */
class KegiatanMusrenbang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $pagu1,$pagu2,$pagu_tahun_awal,$pagu_tahun_akhir,$sumPagu1,$sumPagu2;
	public function afterFind() {
        parent::afterFind();
		//$this->sumPagu1 = AplikasiKomponen::uang($this->sumPagu1);
        $this->pagu2 = AplikasiKomponen::uang($this->pagu_tahun_2);
		$this->pagu1 = AplikasiKomponen::uang($this->pagu_tahun_1);
		$this->pagu_tahun_awal = AplikasiKomponen::uang($this->pagu_tahun_awal);
		$this->pagu_tahun_akhir = AplikasiKomponen::uang($this->pagu_tahun_akhir);
		$this->sumPagu1 = AplikasiKomponen::uang($this->sumPagu1);
		$this->sumPagu2 = AplikasiKomponen::uang($this->sumPagu2);
        return;
    }
	public function totalPaguPerBidangKec($tahun,$kecamatan,$bidang)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'" AND kecamatan="'.$kecamatan.'" AND kd_bidang ="'.$bidang.'"';
		$criteria->group = "kd_bidang";
		$criteria->select = "SUM(pagu_tahun_1) as pagu_tahun_1,SUM(pagu_tahun_2) as pagu_tahun_2";
		$model = $this->find($criteria);
		$model->pagu_tahun_1 = $model->pagu_tahun_1*1;
		$model->pagu_tahun_2 = $model->pagu_tahun_2*1;
		return $model->pagu_tahun_1."|".$model->pagu_tahun_2;
	}
	public function totalPaguPerProgramKec($tahun,$kecamatan,$bidang,$program)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'" AND kecamatan="'.$kecamatan.'" AND kd_bidang ="'.$bidang.'" AND kd_prog = "'.$program.'"';
		$criteria->group = "kd_bidang";
		$criteria->select = "SUM(pagu_tahun_1) as pagu_tahun_1,SUM(pagu_tahun_2) as pagu_tahun_2";
		$model = $this->find($criteria);
		$model->pagu_tahun_1 = $model->pagu_tahun_1*1;
		$model->pagu_tahun_2 = $model->pagu_tahun_2*1;
		return $model->pagu_tahun_1."|".$model->pagu_tahun_2;
	}
	public function tableName()
	{
		return 'kegiatan_musrenbang_kecamatan';
	}
	public function totalPaguTahunAwal($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'"';
		$criteria->group = "tahun";
		$criteria->select = "SUM(pagu_tahun_1) as pagu_tahun_awal";
		$model = $this->find($criteria);
		return $model->pagu_tahun_awal;
	}
	public function totalPaguTahunAkhir($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'"';
		$criteria->group = "tahun";
		$criteria->select = "SUM(pagu_tahun_2) as pagu_tahun_awal";
		$model = $this->find($criteria);
		return $model->pagu_tahun_awal;
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
			array('kd_urusan,uraian, kd_bidang, kd_prog, sasaran_daerah,sumber_usulan,pagu_tahun_1,kecamatan,kd_kegiatan, prioritas_daerah, sasaran_kegiatan', 'required'),
			array('kd_skpd, kd_urusan, kd_bidang,kelurahan,sumber_dana, kd_prog,pagu_tahun_2, tahun, kunci', 'numerical', 'integerOnly'=>true),
			array('created_by, mod_by,uraian,volume,satuan,urutan,status_forum_skpd,keterangan_forum_skpd', 'length', 'max'=>100),
			
			//array('foto', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, kd_skpd, kd_urusan, kd_bidang, kd_prog,kd_kegiatan, tahun,uraian, kunci,  sasaran_daerah, prioritas_daerah, sasaran_kegiatan, keterangan, created_date, created_by, mod_date, mod_by', 'safe', 'on'=>'search'),
			array('id, kd_skpd, kd_urusan, kd_bidang, kd_prog,kd_kegiatan, tahun, kunci,uraian,  sasaran_daerah, prioritas_daerah, sasaran_kegiatan, keterangan, created_date, created_by, mod_date, mod_by', 'safe', 'on'=>'searchPerSKpd'),
			array('id, kd_skpd, kd_urusan, kd_bidang, kd_prog,kd_kegiatan, tahun, status_forum_skpd,kunci,uraian,  sasaran_daerah, prioritas_daerah, sasaran_kegiatan, keterangan, created_date, created_by, mod_date, mod_by', 'safe', 'on'=>'searchForumSKPD'),
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
			'skpd_'=>array(self::BELONGS_TO, 'Skpd', 'kd_skpd'),
			'kegiatan_'=>array(self::BELONGS_TO, 'Kegiatan', 'kd_kegiatan'),
			'prioritas_daerah_'=>array(self::BELONGS_TO, 'PrioritasDaerah', 'prioritas_daerah'),
			'sasaran_daerah_'=>array(self::BELONGS_TO, 'SasaranDaerah', 'sasaran_daerah'),
			'kecamatan_'=>array(self::BELONGS_TO, 'Kecamatan', 'kecamatan'),
			'kelurahan_'=>array(self::BELONGS_TO, 'Kelurahan', 'kelurahan'),
			'sumber_dana_'=>array(self::BELONGS_TO, 'SumberDana', 'sumber_dana'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'kd_skpd' => ' Skpd',
			'pagu1'=>'Pagu Tahun a',
			'pagu2'=>'Pagu Tahun a+1',
			'kd_kegiatan'=>'Kegiatan',
			'kd_urusan' => ' Urusan',
			'kd_bidang' => ' Bidang',
			'kd_prog' => 'Program',
			'tahun' => 'Tahun',
			'kunci' => 'Kunci',
			'pagu_tahun_awal'=>'Pagu Tahun a',
			'pagu_tahun_akhir'=>'Pagu Tahun a+1',
			'sasaran_daerah' => 'Sasaran Daerah',
			'prioritas_daerah' => 'Prioritas Daerah',
			'sasaran_kegiatan' => 'Sasaran Kegiatan',
			'keterangan' => 'Keterangan',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'mod_date' => 'Mod Date',
			'mod_by' => 'Mod By',
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
		$criteria->compare('kd_skpd',$this->kd_skpd);
		$criteria->compare('kd_urusan',$this->kd_urusan);
		$criteria->compare('kd_bidang',$this->kd_bidang);
		$criteria->compare('kd_prog',$this->kd_prog);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kecamatan',$this->kecamatan);
		$criteria->compare('kunci',$this->kunci);
		$criteria->compare('kd_kegiatan',$this->kd_kegiatan);
		$criteria->compare('sasaran_daerah',$this->sasaran_daerah,true);
		$criteria->compare('prioritas_daerah',$this->prioritas_daerah,true);
		$criteria->compare('sasaran_kegiatan',$this->sasaran_kegiatan,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('sumber_usulan',$this->sumber_usulan);
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
		$criteria->compare('kd_skpd',$this->kd_skpd);
		$criteria->compare('kd_urusan',$this->kd_urusan);
		$criteria->compare('kd_bidang',$this->kd_bidang);
		$criteria->compare('kd_prog',$this->kd_prog);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kunci',$this->kunci);
		
		$criteria->compare('kd_kegiatan',$this->kd_kegiatan);
		$criteria->compare('sasaran_daerah',$this->sasaran_daerah,true);
		$criteria->compare('prioritas_daerah',$this->prioritas_daerah,true);
		$criteria->compare('sasaran_kegiatan',$this->sasaran_kegiatan,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('pagu_tahun_awal',$this->pagu_tahun_awal,true);
		$criteria->group='kd_skpd';
		
		$criteria->select="t.*,SUM(pagu_tahun_1) as pagu_tahun_awal,SUM(pagu_tahun_2) as pagu_tahun_akhir";
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
		$criteria->condition='status_forum_skpd="Terima"';
		$criteria->compare('id',$this->id,true);
		$criteria->compare('kd_skpd',$this->kd_skpd);
		$criteria->compare('kd_urusan',$this->kd_urusan);
		$criteria->compare('kd_bidang',$this->kd_bidang);
		$criteria->compare('kd_prog',$this->kd_prog);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kunci',$this->kunci);
		
		$criteria->compare('kd_kegiatan',$this->kd_kegiatan);
		$criteria->compare('sasaran_daerah',$this->sasaran_daerah,true);
		$criteria->compare('prioritas_daerah',$this->prioritas_daerah,true);
		$criteria->compare('sasaran_kegiatan',$this->sasaran_kegiatan,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('pagu_tahun_awal',$this->pagu_tahun_awal,true);
		$criteria->compare('status_forum_skpd',$this->pagu_tahun_awal,true);
		
		//$crit/a->select="t.*,SUM(pagu_tahun_1) as pagu_tahun_awal,SUM(pagu_tahun_2) as pagu_tahun_akhir";
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
		$criteria->condition='status_forum_skpd="Tolak"';
		$criteria->compare('id',$this->id,true);
		$criteria->compare('kd_skpd',$this->kd_skpd);
		$criteria->compare('kd_urusan',$this->kd_urusan);
		$criteria->compare('kd_bidang',$this->kd_bidang);
		$criteria->compare('kd_prog',$this->kd_prog);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kunci',$this->kunci);
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('kd_kegiatan',$this->kd_kegiatan);
		$criteria->compare('sasaran_daerah',$this->sasaran_daerah,true);
		$criteria->compare('prioritas_daerah',$this->prioritas_daerah,true);
		$criteria->compare('sasaran_kegiatan',$this->sasaran_kegiatan,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('pagu_tahun_awal',$this->pagu_tahun_awal,true);
		$criteria->compare('status_forum_skpd',$this->pagu_tahun_awal,true);
		
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
	 * @return KegiatanMusrenbang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
