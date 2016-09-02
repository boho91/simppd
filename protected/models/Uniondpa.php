<?php

/**
 * This is the model class for table "uniondpa".
 *
 * The followings are the available columns in table 'uniondpa':
 * @property string $id
 * @property integer $tahun
 * @property integer $urusan
 * @property integer $bidang
 * @property integer $program
 * @property integer $kegiatan
 * @property integer $id_rekening_belanja
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
 * @property string $level
 * @property string $status_verifikasi
 * @property string $capaian_program
 * @property string $target_capaian_program
 * @property string $masukan
 * @property string $target_masukan
 * @property string $keluaran
 * @property string $target_keluaran
 * @property string $hasil
 * @property string $target_hasil
 * @property string $sasaran_kegiatan
 * @property string $sumber_dana
 * @property string $lokasi_kegiatan
 * @property string $jenis_sumber_dana
 * @property string $jenis_dpa
 */
class Uniondpa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'uniondpa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uraian, sub_uraian, item, capaian_program, target_capaian_program, masukan, target_masukan, keluaran, target_keluaran, hasil, target_hasil, sasaran_kegiatan, sumber_dana, lokasi_kegiatan', 'required'),
			array('tahun, urusan, bidang, program, kegiatan, id_rekening_belanja, skpd, parent_id, parentCategory, volume', 'numerical', 'integerOnly'=>true),
			array('id, harga_satuan, jenis_dpa', 'length', 'max'=>20),
			array('created_by, mod_by, satuan', 'length', 'max'=>100),
			array('level', 'length', 'max'=>10),
			array('status_verifikasi', 'length', 'max'=>16),
			array('jenis_sumber_dana', 'length', 'max'=>111),
			array('created_date, mod_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tahun, urusan, bidang, program, kegiatan, id_rekening_belanja, skpd, uraian, sub_uraian, created_by, created_date, mod_by, mod_date, parent_id, parentCategory, item, volume, satuan, harga_satuan, level, status_verifikasi, capaian_program, target_capaian_program, masukan, target_masukan, keluaran, target_keluaran, hasil, target_hasil, sasaran_kegiatan, sumber_dana, lokasi_kegiatan, jenis_sumber_dana, jenis_dpa', 'safe', 'on'=>'search'),
			array('id, tahun, urusan, bidang, program, kegiatan, id_rekening_belanja, skpd, uraian, sub_uraian, created_by, created_date, mod_by, mod_date, parent_id, parentCategory, item, volume, satuan, harga_satuan, level, status_verifikasi, capaian_program, target_capaian_program, masukan, target_masukan, keluaran, target_keluaran, hasil, target_hasil, sasaran_kegiatan, sumber_dana, lokasi_kegiatan, jenis_sumber_dana, jenis_dpa', 'safe', 'on'=>'GroupPerCOndition'),
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
			'tahun' => 'Tahun',
			'urusan' => 'Urusan',
			'bidang' => 'Bidang',
			'program' => 'Program',
			'kegiatan' => 'Kegiatan',
			'id_rekening_belanja' => 'Id Rekening Belanja',
			'skpd' => 'Skpd',
			'uraian' => 'Uraian',
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
			'level' => 'Level',
			'status_verifikasi' => 'Status Verifikasi',
			'capaian_program' => 'Capaian Program',
			'target_capaian_program' => 'Target Capaian Program',
			'masukan' => 'Masukan',
			'target_masukan' => 'Target Masukan',
			'keluaran' => 'Keluaran',
			'target_keluaran' => 'Target Keluaran',
			'hasil' => 'Hasil',
			'target_hasil' => 'Target Hasil',
			'sasaran_kegiatan' => 'Sasaran Kegiatan',
			'sumber_dana' => 'Sumber Dana',
			'lokasi_kegiatan' => 'Lokasi Kegiatan',
			'jenis_sumber_dana' => 'Jenis Sumber Dana',
			'jenis_dpa' => 'Jenis Dpa',
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
		$criteria->compare('id_rekening_belanja',$this->id_rekening_belanja);
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
		$criteria->compare('level',$this->level,true);
		$criteria->compare('status_verifikasi',$this->status_verifikasi,true);
		$criteria->compare('capaian_program',$this->capaian_program,true);
		$criteria->compare('target_capaian_program',$this->target_capaian_program,true);
		$criteria->compare('masukan',$this->masukan,true);
		$criteria->compare('target_masukan',$this->target_masukan,true);
		$criteria->compare('keluaran',$this->keluaran,true);
		$criteria->compare('target_keluaran',$this->target_keluaran,true);
		$criteria->compare('hasil',$this->hasil,true);
		$criteria->compare('target_hasil',$this->target_hasil,true);
		$criteria->compare('sasaran_kegiatan',$this->sasaran_kegiatan,true);
		$criteria->compare('sumber_dana',$this->sumber_dana,true);
		$criteria->compare('lokasi_kegiatan',$this->lokasi_kegiatan,true);
		$criteria->compare('jenis_sumber_dana',$this->jenis_sumber_dana,true);
		$criteria->compare('jenis_dpa',$this->jenis_dpa,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function GroupPerCOndition($group,$tahun,$skpd="",$urusan="",$bidang="",$program="")
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		
		$command = Yii::app()->db->createCommand()
			->select('b.kegiatan as nama_kegiatan,c.program as nama_program,d.bidang as nama_bidang,e.urusan as nama_urusan,a.nama_skpd,t.*,SUM(IF(t.jenis_dpa=0, t.volume*t.harga_satuan, 0)) as paguSebelumPerubahan,SUM(IF(t.jenis_dpa=1, t.volume*t.harga_satuan, 0)) as paguSetelahPerubahan')
			->from('uniondpa t')
			->join("skpd a","a.id=t.skpd")
			->join("kegiatan b","b.id=t.kegiatan")
			->join("program c","c.id=t.program")
			->join("bidang d","d.id=t.bidang")
			->join("urusan e","e.id=t.urusan")
			->group($group);
		if(!Yii::app()->user->isAdminBappeda())
		{
			$skpd=Yii::app()->user->account->skpd;
		}
		if($program!=""){
			$command ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Umum" AND t.program=:program AND t.bidang=:bidang AND t.urusan=:urusan AND skpd=:skpd',array(':program'=>$program,':bidang'=>$bidang,':urusan'=>$urusan,':skpd'=>$skpd));
		}elseif($bidang!=""){
			$command ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Umum" AND t.bidang=:bidang AND t.urusan=:urusan AND skpd=:skpd',array(':bidang'=>$bidang,':urusan'=>$urusan,':skpd'=>$skpd));
		}elseif($urusan!="")
		{
			$command ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Umum" AND t.urusan=:urusan AND skpd=:skpd',array(':urusan'=>$urusan,':skpd'=>$skpd));
		}elseif($skpd!="")
		{
			$command ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Umum" AND skpd=:skpd',array(':skpd'=>$skpd));
		}else 
		{
			$command ->where('tahun='.Yii::app()->session['tahun_perencanaan'].' AND jenis_sumber_dana="Dana Alokasi Umum"');
		}
		
		$modelcount = Yii::app()->db->createCommand()
			->select('COUNT(t.id)')
			->from('uniondpa t')
			->group($group);
		if(!Yii::app()->user->isAdminBappeda())
		{
			$skpd=Yii::app()->user->account->skpd;
		}
		if($program!=""){
			$modelcount ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Umum" AND t.program=:program AND t.bidang=:bidang AND t.urusan=:urusan AND skpd=:skpd',array(':program'=>$program,':bidang'=>$bidang,':urusan'=>$urusan,':skpd'=>$skpd));
		}elseif($bidang!=""){
			$modelcount ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Umum" AND t.bidang=:bidang AND t.urusan=:urusan AND skpd=:skpd',array(':bidang'=>$bidang,':urusan'=>$urusan,':skpd'=>$skpd));
		}elseif($urusan!="")
		{
			$modelcount ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Umum" AND t.urusan=:urusan AND skpd=:skpd',array(':urusan'=>$urusan,':skpd'=>$skpd));
		}elseif($skpd!="")
		{
			$modelcount ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Umum" AND skpd=:skpd',array(':skpd'=>$skpd));
		}else 
		{
			$modelcount ->where('tahun='.Yii::app()->session['tahun_perencanaan'].' AND jenis_sumber_dana="Dana Alokasi Umum"');
		}
		//->where('skpd=:skpd',array(':skpd'=>$skpd))
		$count=$modelcount->queryScalar();
		$dataProvider=new CSqlDataProvider($command, array(
                                'totalItemCount'=>$count,
								'keyField' => 'skpd',
                                'sort'=>array(
									'attributes'=>array(
									'skpd', 'pagu_sebelum_perubahan', 'paguSetelahPerubahan', 'tahun',
									),
                                ),
                                'pagination'=>array(
											'pageSize'=>'25'
                                ),
                ));
		return $dataProvider;
		
	}
	public function GroupPerCOnditionDak($group,$tahun,$skpd="",$urusan="",$bidang="",$program="")
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		
		$command = Yii::app()->db->createCommand()
			->select('b.kegiatan as nama_kegiatan,c.program as nama_program,d.bidang as nama_bidang,e.urusan as nama_urusan,a.nama_skpd,t.*,SUM(IF(t.jenis_dpa=0, t.volume*t.harga_satuan, 0)) as paguSebelumPerubahan,SUM(IF(t.jenis_dpa=1, t.volume*t.harga_satuan, 0)) as paguSetelahPerubahan')
			->from('uniondpa t')
			->join("skpd a","a.id=t.skpd")
			->join("kegiatan b","b.id=t.kegiatan")
			->join("program c","c.id=t.program")
			->join("bidang d","d.id=t.bidang")
			->join("urusan e","e.id=t.urusan")
			->group($group);
		if(!Yii::app()->user->isAdminBappeda())
		{
			$skpd=Yii::app()->user->account->skpd;
		}
		if($program!=""){
			$command ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Khusus" AND t.program=:program AND t.bidang=:bidang AND t.urusan=:urusan AND skpd=:skpd',array(':program'=>$program,':bidang'=>$bidang,':urusan'=>$urusan,':skpd'=>$skpd));
		}elseif($bidang!=""){
			$command ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Khusus" AND t.bidang=:bidang AND t.urusan=:urusan AND skpd=:skpd',array(':bidang'=>$bidang,':urusan'=>$urusan,':skpd'=>$skpd));
		}elseif($urusan!="")
		{
			$command ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Khusus" AND t.urusan=:urusan AND skpd=:skpd',array(':urusan'=>$urusan,':skpd'=>$skpd));
		}elseif($skpd!="")
		{
			$command ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Khusus" AND skpd=:skpd',array(':skpd'=>$skpd));
		}else 
		{
			$command ->where('tahun='.Yii::app()->session['tahun_perencanaan'].' AND jenis_sumber_dana="Dana Alokasi Khusus"');
		}
		
		$modelcount = Yii::app()->db->createCommand()
			->select('COUNT(t.id)')
			->from('uniondpa t')
			->group($group);
		if(!Yii::app()->user->isAdminBappeda())
		{
			$skpd=Yii::app()->user->account->skpd;
		}
		if($program!=""){
			$modelcount ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Khusus" AND t.program=:program AND t.bidang=:bidang AND t.urusan=:urusan AND skpd=:skpd',array(':program'=>$program,':bidang'=>$bidang,':urusan'=>$urusan,':skpd'=>$skpd));
		}elseif($bidang!=""){
			$modelcount ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Khusus" AND t.bidang=:bidang AND t.urusan=:urusan AND skpd=:skpd',array(':bidang'=>$bidang,':urusan'=>$urusan,':skpd'=>$skpd));
		}elseif($urusan!="")
		{
			$modelcount ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Khusus" AND t.urusan=:urusan AND skpd=:skpd',array(':urusan'=>$urusan,':skpd'=>$skpd));
		}elseif($skpd!="")
		{
			$modelcount ->where('tahun='.$tahun.' AND jenis_sumber_dana="Dana Alokasi Khusus" AND skpd=:skpd',array(':skpd'=>$skpd));
		}else 
		{
			$modelcount ->where('tahun='.Yii::app()->session['tahun_perencanaan'].' AND jenis_sumber_dana="Dana Alokasi Khusus"');
		}
		//->where('skpd=:skpd',array(':skpd'=>$skpd))
		$count=$modelcount->queryScalar();
		$dataProvider=new CSqlDataProvider($command, array(
                                'totalItemCount'=>$count,
								'keyField' => 'skpd',
                                'sort'=>array(
									'attributes'=>array(
									'skpd', 'pagu_sebelum_perubahan', 'paguSetelahPerubahan', 'tahun',
									),
                                ),
                                'pagination'=>array(
											'pageSize'=>'25'
                                ),
                ));
		return $dataProvider;
		
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Uniondpa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
