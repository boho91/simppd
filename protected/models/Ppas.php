<?php

/**
 * This is the model class for table "ppas".
 *
 * The followings are the available columns in table 'ppas':
 * @property string $id
 * @property integer $urusan
 * @property integer $bidang
 * @property integer $program
 * @property integer $kegiatan
 * @property string $sasaran
 * @property string $target
 * @property string $plafon_anggaran
 * @property integer $skpd
 * @property string $created_by
 * @property string $created_date
 * @property string $mod_by
 * @property string $mod_date
 * @property integer $id_musrenbang_kota
 */
class Ppas extends CActiveRecord
{
	public $pagu1,$plafon_anggaran2,$sumAnggaran,$anggaran;
	public function totalPagu($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'"';
		$criteria->group = "tahun";
		$criteria->select = "SUM(plafon_anggaran) as pagu1";
		$model = $this->find($criteria);
		return $model->pagu1;
	}
	public function totalPaguTahunAktif()
	{
		$criteria = new CDbCriteria;
		$criteria->compare('t.tahun',Yii::app()->session['tahun_perencanaan']);
		
		if(!Yii::app()->user->isAdminBappeda())
		{
			$criteria->compare('t.skpd',Yii::app()->user->account->skpd);
		}
		$criteria->select="SUM(IF(a.plafon_anggaran_setelah_perubahan IS NULL, t.plafon_anggaran, a.plafon_anggaran_setelah_perubahan)) as plafon_anggaran";
		$criteria->join = "LEFT JOIN ppas_perubahan a ON a.urusan=t.urusan AND a.bidang=t.bidang AND a.program = t.program AND a.kegiatan=t.kegiatan AND a.skpd=t.skpd AND a.tahun=t.tahun";
		$model = $this->find($criteria);
		
		return $model->plafon_anggaran;
	}
	public function afterFind() {
        parent::afterFind();
      //  $this->pagu2 = AplikasiKomponen::uang($this->pagu_tahun_2);
		$this->sumAnggaran = AplikasiKomponen::uang($this->sumAnggaran);
		$this->pagu1 = AplikasiKomponen::uang($this->pagu1);
		$this->plafon_anggaran2 = AplikasiKomponen::uang($this->plafon_anggaran);
		$this->anggaran = AplikasiKomponen::uang($this->anggaran);
        return;
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ppas';
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
			array('urusan, bidang, program, kegiatan,  plafon_anggaran, skpd', 'required'),
			array('urusan, bidang, program, kegiatan, skpd,tahun, id_musrenbang_kota', 'numerical', 'integerOnly'=>true),
			array('plafon_anggaran,sasaran, target', 'length', 'max'=>20),
			array('created_by, mod_by', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, urusan, bidang, program, kegiatan, sasaran, target, plafon_anggaran, skpd, created_by, created_date, mod_by, mod_date, id_musrenbang_kota', 'safe', 'on'=>'search'),
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
			'sasaran' => 'Sasaran',
			'target' => 'Target',
			'plafon_anggaran2'=>'Plafon Anggaran Sementara',
			'pagu1'=>'Plafon Anggaran Sementara',
			'plafon_anggaran' => 'Plafon Anggaran Sementara',
			'skpd' => 'Skpd',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
			'mod_by' => 'Mod By',
			'mod_date' => 'Mod Date',
			'id_musrenbang_kota' => 'Id Musrenbang Kota',
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
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('id_musrenbang_kota',$this->id_musrenbang_kota);
		$criteria->compare('tahun',$this->tahun);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
            'pageSize'=>'25'
		)
		));
	}
	
	public function getPaguPerSkpd($skpd,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd ='".$skpd."' AND tahun = '".$tahun."'";
		$criteria->select = "SUM(plafon_anggaran) as plafon_anggaran";
		$criteria->group ="skpd";
		$model = Ppas::model()->find($criteria);
		if($model->plafon_anggaran=="")
			$model->plafon_anggaran=0;
		return $model->plafon_anggaran;
	}
	public function getPaguPerTahun($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "tahun = '".$tahun."'";
		$criteria->select = "SUM(plafon_anggaran) as plafon_anggaran";
		$criteria->group ="skpd";
		$model = Ppas::model()->find($criteria);
		if($model->plafon_anggaran=="")
			$model->plafon_anggaran=0;
		return $model->plafon_anggaran;
	}
	public function getPaguPerKegiatan($skpd,$kegiatan,$program,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd ='".$skpd."' AND program='".$program."' AND kegiatan = '".$kegiatan."' AND tahun = '".$tahun."'";
		$criteria->select = "SUM(plafon_anggaran) as plafon_anggaran";
		$criteria->group ="skpd";
		$model = Ppas::model()->find($criteria);
		if($model->plafon_anggaran=="")
			$model->plafon_anggaran=0;
		return $model->plafon_anggaran;
	}
	public function searchPerSKpd()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		//$criteria->condition='tahun="Terima"';
		$criteria->condition='tahun="'.Yii::app()->session['tahun_perencanaan'].'"';
		$criteria->select="t.*,SUM(plafon_anggaran) as pagu1";
		$criteria->group = "skpd";
		$criteria->compare('id',$this->id,true);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('sasaran',$this->sasaran,true);
		$criteria->compare('target',$this->target,true);
		$criteria->compare('plafon_anggaran',$this->plafon_anggaran,true);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('id_musrenbang_kota',$this->id_musrenbang_kota);
		
		//$critera->select="t.*,SUM(pagu_tahun_1) as pagu_tahun_awal,SUM(pagu_tahun_2) as pagu_tahun_akhir";
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
	 * @return Ppas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
