<?php

/**
 * This is the model class for table "rka".
 *
 * The followings are the available columns in table 'rka':
 * @property string $id
 * @property integer $tahun
 * @property integer $urusan
 * @property integer $bidang
 * @property integer $program
 * @property integer $kegiatan
 * @property integer $skpd
 * @property string $uraian
 * @property string $sub_uraian
 * @property string $created_by
 * @property string $created_date
 * @property string $mod_by
 * @property string $mod_date
 * @property integer $parent_id
 * @property integer $parentCategory
 * @property string $item
 * @property integer $volume
 * @property string $satuan
 * @property string $harga_satuan
 */
class RkaPerubahan extends CActiveRecord
{
	
	public $pagu1,$nama_program,$nama_kegiatan,$totalPerUraian,$totalPerSubUraian,$totalPerItem,$alokasiAnggaran,$uraianKegiatan,$harga_satuan_kegiatan,$totalPerKegiatan,$totalPerProgram;
	public function afterFind() {
        parent::afterFind();
		$this->pagu1 = AplikasiKomponen::uang($this->pagu1);
		$this->totalPerItem= $this->harga_satuan * $this->volume;
		if($this->level == "parent1")
		{
			$this->uraianKegiatan = $this->rekening_belanja->uraian;
			$this->nama_program = $this->kegiatan_->program_->program;
			$this->nama_kegiatan = $this->kegiatan_->kegiatan;
			$this->harga_satuan_kegiatan = $this->harga_satuan_parent1($this->id);
		}elseif($this->level == "parent2")
		{
			$this->uraianKegiatan = $this->rekening_belanja->uraian;
			$this->harga_satuan_kegiatan = $this->harga_satuan_parent2($this->id);
			//$this->harga_satuan_kegiatan = $this->harga_satuan_per_uraian($this->id);
		}elseif($this->level == "parent3")
		{
			$this->uraianKegiatan = $this->rekening_belanja->uraian;
			$this->harga_satuan_kegiatan = $this->harga_satuan_parent3($this->id);
			//$this->harga_satuan_kegiatan = $this->harga_satuan_per_uraian($this->id);
		}elseif($this->level == "parent4")
		{
			$this->uraianKegiatan = $this->rekening_belanja->uraian;
			$this->harga_satuan_kegiatan = $this->harga_satuan_parent4($this->id);
			//$this->harga_satuan_kegiatan = $this->harga_satuan_per_uraian($this->id);
		}elseif($this->level == "uraian")
		{
			$this->uraianKegiatan = $this->rekening_belanja->uraian;
			$this->harga_satuan_kegiatan = $this->harga_satuan_per_uraian($this->id);
		}else if($this->level == "sub uraian")
		{
			$this->uraianKegiatan = $this->sub_uraian;
			$this->harga_satuan_kegiatan = $this->harga_satuan_per_sub_uraian($this->id);
		}else if($this->level == "item")
		{
			$this->uraianKegiatan = $this->item;
			$this->harga_satuan_kegiatan = $this->totalPerItem;
		}
		
        return;
    }
	
	public function totalPagu1($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition='tahun="'.$tahun.'"';
		$criteria->group = "tahun";
		$criteria->select = "SUM(volume * harga_satuan) as pagu1";
		$model = $this->find($criteria);
		if($model->pagu1=="")
			$model->pagu1=0;
		return $model->pagu1;
	}
	public function harga_satuan_parent4($id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "d.id IS NOT NULL AND t.id = ".$id."";
		$criteria->join = "LEFT JOIN rka_perubahan c ON t.id = c.parent_id LEFT JOIN rka_perubahan d ON c.id = d.parent_id  LEFT JOIN rka_perubahan e ON d.id = e.parent_id ";
		$criteria->select = "SUM(e.harga_satuan * e.volume) as totalPerUraian";
		$model = $this->find($criteria);
		if($model->totalPerUraian=="")
			$model->totalPerUraian=0;
		return $model->totalPerUraian;
	}
	public function harga_satuan_parent3($id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "d.id IS NOT NULL AND t.id = ".$id."";
		$criteria->join = "LEFT JOIN rka_perubahan c ON t.id = c.parent_id LEFT JOIN rka_perubahan d ON c.id = d.parent_id  LEFT JOIN rka_perubahan e ON d.id = e.parent_id  LEFT JOIN rka_perubahan f ON e.id = f.parent_id ";
		$criteria->select = "SUM(f.harga_satuan * f.volume) as totalPerUraian";
		$model = $this->find($criteria);
		if($model->totalPerUraian=="")
			$model->totalPerUraian=0;
		return $model->totalPerUraian;
	}
	public function harga_satuan_parent2($id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "d.id IS NOT NULL AND t.id = ".$id."";
		$criteria->join = "LEFT JOIN rka_perubahan c ON t.id = c.parent_id LEFT JOIN rka_perubahan d ON c.id = d.parent_id  LEFT JOIN rka_perubahan e ON d.id = e.parent_id  LEFT JOIN rka_perubahan f ON e.id = f.parent_id  LEFT JOIN rka_perubahan g ON f.id = g.parent_id ";
		$criteria->select = "SUM(g.harga_satuan * g.volume) as totalPerUraian";
		$model = $this->find($criteria);
		if($model->totalPerUraian=="")
			$model->totalPerUraian=0;
		return $model->totalPerUraian;
	}
	public function harga_satuan_parent1($id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "d.id IS NOT NULL AND t.id = ".$id."";
		$criteria->join = "LEFT JOIN rka_perubahan c ON t.id = c.parent_id LEFT JOIN rka_perubahan d ON c.id = d.parent_id  LEFT JOIN rka_perubahan e ON d.id = e.parent_id  LEFT JOIN rka_perubahan f ON e.id = f.parent_id  LEFT JOIN rka_perubahan g ON f.id = g.parent_id   LEFT JOIN rka_perubahan h ON g.id = h.parent_id ";
		$criteria->select = "SUM(h.harga_satuan * h.volume) as totalPerUraian";
		$model = $this->find($criteria);
		if($model->totalPerUraian=="")
			$model->totalPerUraian=0;
		return $model->totalPerUraian;
	}
	public function getPaguPerKegiatan($skpd,$kegiatan,$program,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd ='".$skpd."' AND program='".$program."' AND kegiatan = '".$kegiatan."' AND tahun = '".$tahun."'";
		$criteria->select = "SUM(volume * harga_satuan) as totalPerKegiatan";
		$criteria->group ="skpd";
		$model = $this->find($criteria);
		if($model->totalPerKegiatan=="")
			$model->totalPerKegiatan=0;
		return $model->totalPerKegiatan;
	}
	public function getPaguPerProgram($skpd,$urusan,$program,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd ='".$skpd."' AND program='".$program."' AND urusan = '".$urusan."' AND tahun = '".$tahun."'";
		$criteria->select = "SUM(volume * harga_satuan) as totalPerProgram";
		$criteria->group ="program";
		$model = RkaPerubahan::model()->find($criteria);
		if($model->totalPerProgram=="")
			$model->totalPerProgram=0;
		return $model->totalPerProgram;
	}
	
	public function getPaguPerSkpd($skpd,$tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "skpd ='".$skpd."' AND tahun = '".$tahun."'";
		$criteria->select = "SUM(volume * harga_satuan) as totalPerKegiatan";
		$criteria->group ="skpd";
		$model = RkaPerubahan::model()->find($criteria);
		if($model->totalPerKegiatan=="")
			$model->totalPerKegiatan=0;
		return $model->totalPerKegiatan;
	}
	
	public function getPaguPerTahun($tahun)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "tahun = '".$tahun."'";
		$criteria->select = "SUM(plafon_anggaran) as plafon_anggaran";
		$criteria->group ="skpd";
		$model = PpasPerubahan::model()->find($criteria);
		if($model->plafon_anggaran=="")
			$model->plafon_anggaran=0;
		return $model->plafon_anggaran;
	}
	public function harga_satuan_per_sub_uraian($id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "parent_id = $id AND level = 'item'";
		$criteria->group = "parent_id";
		$criteria->select = "SUM(harga_satuan * volume) as totalPerSubUraian";
		$model = $this->find($criteria);
		if($model->totalPerSubUraian=="")
			$model->totalPerSubUraian=0;
		return $model->totalPerSubUraian;
	}

	public function harga_satuan_per_uraian($id)
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "d.id IS NOT NULL AND t.id = ".$id."";
		$criteria->join = "LEFT JOIN rka_perubahan c ON t.id = c.parent_id LEFT JOIN rka_perubahan d ON c.id = d.parent_id";
		$criteria->select = "SUM(d.harga_satuan * d.volume) as totalPerUraian";
		$model = $this->find($criteria);
		if($model->totalPerUraian=="")
			$model->totalPerUraian=0;
		return $model->totalPerUraian;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'rka_perubahan';
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
			array('tahun, urusan, bidang, program, kegiatan,id_rekening_belanja, skpd', 'required'),
			array('tahun, urusan, bidang, program,pagu_prakiraan_maju, kegiatan, skpd, parent_id, parentCategory, volume', 'numerical', 'integerOnly'=>true),
			array('created_by,capaian_program,target_capaian_program,masukan,target_masukan,keluaran,target_keluaran,hasil,target_hasil,sasaran_kegiatan,sumber_dana,lokasi_kegiatan, mod_by, satuan,level,status_verifikasi', 'length', 'max'=>100),
			array('harga_satuan,sub_uraian,item,volume,satuan', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tahun, urusan, bidang, program, kegiatan, skpd, uraian, sub_uraian, created_by, created_date, mod_by, mod_date, parent_id, parentCategory, item, volume, satuan, harga_satuan', 'safe', 'on'=>'search'),
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
			'rekening_belanja'=>array(self::BELONGS_TO, 'RekeningBelanja', 'id_rekening_belanja'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_rekening_belanja'=>"Rekening Belanja",
			'tahun' => 'Tahun',
			'totalPerItem'=>'Jumlah',
			'harga_satuan_kegiatan'=>'Jumlah',
			'totalPerSubUraian'=>'Jumlah',
			'totalPerUraian'=>'Jumlah',
			'urusan' => 'Urusan',
			'bidang' => 'Bidang',
			'program' => 'Program',
			'kegiatan' => 'Kegiatan',
			'skpd' => 'Skpd',
			'uraian' => 'Uraian',
			'pagu1'=>'Jumlah',
			'sub_uraian' => 'Sub Uraian',
			'created_by' => 'Created By',
			'created_date' => 'Created Date',
			'mod_by' => 'Mod By',
			'mod_date' => 'Mod Date',
			'parent_id' => 'Parent',
			'parentCategory' => 'Parent Category',
			'item' => 'Item',
			'volume' => 'Volume',
			'satuan' => 'Satuan',
			'harga_satuan' => 'Harga Satuan',
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
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('sub_uraian',$this->sub_uraian,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('parentCategory',$this->parentCategory);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('volume',$this->volume);
		$criteria->compare('satuan',$this->satuan,true);
		$criteria->compare('harga_satuan',$this->harga_satuan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'25'
			),
			'sort'=>array(
				'defaultOrder'=>'id ASC,parent_id ASC',
			)
		));
	}
	public function searchParent()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = "parent_id=0";
		$criteria->compare('id',$this->id,true);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('sub_uraian',$this->sub_uraian,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('parentCategory',$this->parentCategory);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('volume',$this->volume);
		$criteria->compare('satuan',$this->satuan,true);
		$criteria->compare('harga_satuan',$this->harga_satuan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>'25'
			),
			//'sort'=>array(
			//	'defaultOrder'=>'parent_id ASC',
			//)
		));
	}
	public function searchPerSKpd()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		//$criteria->condition='tahun="Terima"';
		$criteria->condition='tahun="'.Yii::app()->session['tahun_perencanaan'].'"';
		$criteria->select="t.*,SUM(volume * harga_satuan) as pagu1";
		$criteria->group = "skpd";
		//$criteria->condition = "parent_id=0";
		$criteria->compare('id',$this->id,true);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('urusan',$this->urusan);
		$criteria->compare('bidang',$this->bidang);
		$criteria->compare('program',$this->program);
		$criteria->compare('kegiatan',$this->kegiatan);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('sub_uraian',$this->sub_uraian,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('parentCategory',$this->parentCategory);
		$criteria->compare('item',$this->item,true);
		$criteria->compare('volume',$this->volume);
		$criteria->compare('satuan',$this->satuan,true);
		$criteria->compare('harga_satuan',$this->harga_satuan,true);
		
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
	 * @return Rka the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
