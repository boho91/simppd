<?php

/**
 * This is the model class for table "laporan_pengadaan_barang_jasa".
 *
 * The followings are the available columns in table 'laporan_pengadaan_barang_jasa':
 * @property integer $id
 * @property integer $skpd
 * @property string $uraian_kegiatan
 * @property string $volume
 * @property string $satuan
 * @property string $biaya
 * @property string $proses_pengadaan
 * @property string $tanda_tangan_kontrak
 * @property string $pelaksanaan
 * @property string $pho
 * @property string $keterangan
 */
class LaporanPengadaanBarangJasa extends CActiveRecord
{
	public $jenis_file;
	public $pelelangan_umum,$pelelangan_terbatas,$pemilihan_langsung,$penunjukan_langsung;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LaporanPengadaanBarangJasa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'laporan_pengadaan_barang_jasa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('skpd, uraian_kegiatan,triwulan,tgl_proses_pengadaan, volume, satuan, biaya, proses_pengadaan,tahun', 'required'),
			array('skpd,tahun,biaya', 'numerical', 'integerOnly'=>true),
			array('uraian_kegiatan,triwulan,jenis_file,jenis_belanja_langsung,jenis_belanja_tidak_langsung, volume, satuan, biaya,proses_pengadaan, tanda_tangan_kontrak, pelaksanaan, pho', 'length', 'max'=>255),
			array('keterangan', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, skpd, uraian_kegiatan, volume, satuan, tahun,biaya, proses_pengadaan, tanda_tangan_kontrak, pelaksanaan, pho, keterangan', 'safe', 'on'=>'search'),
			array('id, skpd, uraian_kegiatan, volume, satuan, tahun,biaya, proses_pengadaan, tanda_tangan_kontrak, pelaksanaan, pho, keterangan', 'safe', 'on'=>'summary_per_skpd'),
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
			'tahun' => 'Tahun Kegiatan',
			'uraian_kegiatan' => 'Uraian Kegiatan',
			'volume' => 'Volume',
			'satuan' => 'Satuan',
			'biaya' => 'Biaya',
			'tgl_proses_pengadaan'=>'Tanggal Proses Pengadaan',
			'proses_pengadaan' => 'Proses Pengadaan',
			'tanda_tangan_kontrak' => 'Tanda Tangan Kontrak',
			'pelaksanaan' => 'Pelaksanaan',
			'pho' => 'PPHP',
			'keterangan' => 'Keterangan',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('uraian_kegiatan',$this->uraian_kegiatan,true);
		$criteria->compare('volume',$this->volume,true);
		$criteria->compare('satuan',$this->satuan,true);
		$criteria->compare('proses_pengadaan',$this->proses_pengadaan,true);
		$criteria->compare('tanda_tangan_kontrak',$this->tanda_tangan_kontrak,true);
		$criteria->compare('pelaksanaan',$this->pelaksanaan,true);
		$criteria->compare('pho',$this->pho,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('triwulan',$this->triwulan);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'tahun DESC',
			),
		));
	}
	public function summary_per_skpd()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		//if(!isset($this->tahun) || $this->tahun == "")
			//$this->tahun = date("Y");
		
		
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('id',$this->id);
		$criteria->select = "t.skpd,t.triwulan,t.tahun,(SELECT SUM(biaya) FROM laporan_pengadaan_barang_jasa WHERE proses_pengadaan='Pelelangan Umum' AND tahun=t.tahun AND skpd=t.skpd) AS pelelangan_umum ,SUM(biaya) AS biaya";
		$criteria->select .=",(SELECT SUM(biaya) FROM laporan_pengadaan_barang_jasa WHERE proses_pengadaan='Pelelangan Terbatas' AND tahun=t.tahun AND skpd=t.skpd) AS pelelangan_terbatas";
		$criteria->select .=",(SELECT SUM(biaya) FROM laporan_pengadaan_barang_jasa WHERE proses_pengadaan='Pemilihan Langsung' AND tahun=t.tahun AND skpd=t.skpd) AS pemilihan_langsung";
		$criteria->select .=",(SELECT SUM(biaya) FROM laporan_pengadaan_barang_jasa WHERE proses_pengadaan='Penunjukan Langsung' AND tahun=t.tahun AND skpd=t.skpd) AS penunjukan_langsung";
		$criteria->compare('penunjukan_langsung',$this->penunjukan_langsung);
		$criteria->compare('skpd',$this->skpd);
		$criteria->compare('uraian_kegiatan',$this->uraian_kegiatan,true);
		$criteria->compare('volume',$this->volume,true);
		$criteria->compare('satuan',$this->satuan,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('proses_pengadaan',$this->proses_pengadaan,true);
		$criteria->compare('tanda_tangan_kontrak',$this->tanda_tangan_kontrak,true);
		$criteria->compare('pelaksanaan',$this->pelaksanaan,true);
		$criteria->compare('pho',$this->pho,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('triwulan',$this->triwulan);
		$criteria->group = "skpd,triwulan";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'tahun DESC',
			),
		));
	}
	public function getTotal($records, $column)
	{
		$total = 0;
		foreach ($records as $record) {
			$total += $record->$column;
		}
		return $total;
	}
	public function detail_per_skpd()
	{
		$criteria=new CDbCriteria;
		
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('skpd',$this->skpd);
		$criteria->select = "t.skpd,t.tahun,(SELECT SUM(biaya) FROM laporan_pengadaan_barang_jasa WHERE proses_pengadaan='Pelelangan Umum' AND tahun=t.tahun AND skpd=t.skpd) AS pelelangan_umum ,SUM(biaya) AS biaya";
		$criteria->select .=",(SELECT SUM(biaya) FROM laporan_pengadaan_barang_jasa WHERE proses_pengadaan='Pelelangan Terbatas' AND tahun=t.tahun AND skpd=t.skpd) AS pelelangan_terbatas";
		$criteria->select .=",(SELECT SUM(biaya) FROM laporan_pengadaan_barang_jasa WHERE proses_pengadaan='Pemilihan Langsung' AND tahun=t.tahun AND skpd=t.skpd) AS pemilihan_langsung";
		$criteria->select .=",(SELECT SUM(biaya) FROM laporan_pengadaan_barang_jasa WHERE proses_pengadaan='Penunjukan Langsung' AND tahun=t.tahun AND skpd=t.skpd) AS penunjukan_langsung";
		$criteria->group = "skpd,tahun";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'tahun DESC',
			),
		));
	}
}