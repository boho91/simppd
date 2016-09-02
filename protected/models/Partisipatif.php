<?php

/**
 * This is the model class for table "partisipatif".
 *
 * The followings are the available columns in table 'partisipatif':
 * @property string $id
 * @property integer $kd_skpd
 * @property integer $kd_urusan
 * @property integer $kd_bidang
 * @property integer $kd_prog
 * @property integer $kd_kegiatan
 * @property integer $tahun
 * @property integer $kunci
 * @property string $sasaran_daerah
 * @property string $prioritas_daerah
 * @property string $sasaran_kegiatan
 * @property string $keterangan
 * @property string $created_date
 * @property string $created_by
 * @property string $mod_date
 * @property string $mod_by
 * @property string $uraian
 * @property integer $kecamatan
 * @property integer $kelurahan
 * @property string $volume
 * @property string $satuan
 * @property string $pagu_indikatif
 * @property string $pagu_prakiraan_maju
 * @property integer $sumber_dana
 * @property string $urutan
 * @property string $jenis_kegiatan
 * @property string $tolak_ukur_hasil_program
 * @property string $target_hasil_program
 * @property string $tolak_ukur_keluaran_kegiatan
 * @property string $target_keluaran_kegiatan
 * @property string $tolak_ukur_hasil_kegiatan
 * @property string $target_hasil_kegiatan
 * @property string $sumber_usulan
 * @property string $status_usulan
 * @property string $keterangan_status_usulan
 * @property string $foto
 * @property string $latitude
 * @property string $longitude
 */
class Partisipatif extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'partisipatif';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kd_skpd, kd_urusan, kd_bidang, kd_prog, kd_kegiatan, sasaran_daerah, prioritas_daerah, sasaran_kegiatan, keterangan, created_date, created_by, mod_date, mod_by, uraian, kecamatan, kelurahan, volume, satuan, pagu_indikatif, pagu_prakiraan_maju, sumber_dana, urutan, jenis_kegiatan, tolak_ukur_hasil_program, target_hasil_program, tolak_ukur_keluaran_kegiatan, target_keluaran_kegiatan, tolak_ukur_hasil_kegiatan, target_hasil_kegiatan, sumber_usulan, status_usulan, keterangan_status_usulan, foto, latitude, longitude', 'required'),
			array('kd_skpd, kd_urusan, kd_bidang, kd_prog, kd_kegiatan, tahun, kunci, kecamatan, kelurahan, sumber_dana', 'numerical', 'integerOnly'=>true),
			array('created_by, mod_by', 'length', 'max'=>100),
			array('volume, satuan, urutan', 'length', 'max'=>255),
			array('pagu_indikatif, pagu_prakiraan_maju', 'length', 'max'=>20),
			array('jenis_kegiatan, tolak_ukur_hasil_program, target_hasil_program, tolak_ukur_keluaran_kegiatan, target_keluaran_kegiatan, tolak_ukur_hasil_kegiatan, target_hasil_kegiatan, sumber_usulan', 'length', 'max'=>111),
			array('status_usulan', 'length', 'max'=>6),
			array('foto', 'length', 'max'=>200),
			array('latitude, longitude', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, kd_skpd, kd_urusan, kd_bidang, kd_prog, kd_kegiatan, tahun, kunci, sasaran_daerah, prioritas_daerah, sasaran_kegiatan, keterangan, created_date, created_by, mod_date, mod_by, uraian, kecamatan, kelurahan, volume, satuan, pagu_indikatif, pagu_prakiraan_maju, sumber_dana, urutan, jenis_kegiatan, tolak_ukur_hasil_program, target_hasil_program, tolak_ukur_keluaran_kegiatan, target_keluaran_kegiatan, tolak_ukur_hasil_kegiatan, target_hasil_kegiatan, sumber_usulan, status_usulan, keterangan_status_usulan, foto, latitude, longitude', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kd_skpd' => 'Kd Skpd',
			'kd_urusan' => 'Kd Urusan',
			'kd_bidang' => 'Kd Bidang',
			'kd_prog' => 'Kd Prog',
			'kd_kegiatan' => 'Kd Kegiatan',
			'tahun' => 'Tahun',
			'kunci' => 'Kunci',
			'sasaran_daerah' => 'Sasaran Daerah',
			'prioritas_daerah' => 'Prioritas Daerah',
			'sasaran_kegiatan' => 'Sasaran Kegiatan',
			'keterangan' => 'Keterangan',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'mod_date' => 'Mod Date',
			'mod_by' => 'Mod By',
			'uraian' => 'Uraian',
			'kecamatan' => 'Kecamatan',
			'kelurahan' => 'Kelurahan',
			'volume' => 'Volume',
			'satuan' => 'Satuan',
			'pagu_indikatif' => 'Pagu Indikatif',
			'pagu_prakiraan_maju' => 'Pagu Prakiraan Maju',
			'sumber_dana' => 'Sumber Dana',
			'urutan' => 'Urutan',
			'jenis_kegiatan' => 'Jenis Kegiatan',
			'tolak_ukur_hasil_program' => 'Tolak Ukur Hasil Program',
			'target_hasil_program' => 'Target Hasil Program',
			'tolak_ukur_keluaran_kegiatan' => 'Tolak Ukur Keluaran Kegiatan',
			'target_keluaran_kegiatan' => 'Target Keluaran Kegiatan',
			'tolak_ukur_hasil_kegiatan' => 'Tolak Ukur Hasil Kegiatan',
			'target_hasil_kegiatan' => 'Target Hasil Kegiatan',
			'sumber_usulan' => 'Sumber Usulan',
			'status_usulan' => 'Status Usulan',
			'keterangan_status_usulan' => 'Keterangan Status Usulan',
			'foto' => 'Foto',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
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
		$criteria->compare('kd_kegiatan',$this->kd_kegiatan);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('kunci',$this->kunci);
		$criteria->compare('sasaran_daerah',$this->sasaran_daerah,true);
		$criteria->compare('prioritas_daerah',$this->prioritas_daerah,true);
		$criteria->compare('sasaran_kegiatan',$this->sasaran_kegiatan,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('mod_by',$this->mod_by,true);
		$criteria->compare('uraian',$this->uraian,true);
		$criteria->compare('kecamatan',$this->kecamatan);
		$criteria->compare('kelurahan',$this->kelurahan);
		$criteria->compare('volume',$this->volume,true);
		$criteria->compare('satuan',$this->satuan,true);
		$criteria->compare('pagu_indikatif',$this->pagu_indikatif,true);
		$criteria->compare('pagu_prakiraan_maju',$this->pagu_prakiraan_maju,true);
		$criteria->compare('sumber_dana',$this->sumber_dana);
		$criteria->compare('urutan',$this->urutan,true);
		$criteria->compare('jenis_kegiatan',$this->jenis_kegiatan,true);
		$criteria->compare('tolak_ukur_hasil_program',$this->tolak_ukur_hasil_program,true);
		$criteria->compare('target_hasil_program',$this->target_hasil_program,true);
		$criteria->compare('tolak_ukur_keluaran_kegiatan',$this->tolak_ukur_keluaran_kegiatan,true);
		$criteria->compare('target_keluaran_kegiatan',$this->target_keluaran_kegiatan,true);
		$criteria->compare('tolak_ukur_hasil_kegiatan',$this->tolak_ukur_hasil_kegiatan,true);
		$criteria->compare('target_hasil_kegiatan',$this->target_hasil_kegiatan,true);
		$criteria->compare('sumber_usulan',$this->sumber_usulan,true);
		$criteria->compare('status_usulan',$this->status_usulan,true);
		$criteria->compare('keterangan_status_usulan',$this->keterangan_status_usulan,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Partisipatif the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
