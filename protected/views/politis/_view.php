<?php
/* @var $this PolitisController */
/* @var $data Politis */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kd_skpd')); ?>:</b>
	<?php echo CHtml::encode($data->kd_skpd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kd_urusan')); ?>:</b>
	<?php echo CHtml::encode($data->kd_urusan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kd_bidang')); ?>:</b>
	<?php echo CHtml::encode($data->kd_bidang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kd_prog')); ?>:</b>
	<?php echo CHtml::encode($data->kd_prog); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kd_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->kd_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun')); ?>:</b>
	<?php echo CHtml::encode($data->tahun); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('kunci')); ?>:</b>
	<?php echo CHtml::encode($data->kunci); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sasaran_daerah')); ?>:</b>
	<?php echo CHtml::encode($data->sasaran_daerah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prioritas_daerah')); ?>:</b>
	<?php echo CHtml::encode($data->prioritas_daerah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sasaran_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->sasaran_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mod_date')); ?>:</b>
	<?php echo CHtml::encode($data->mod_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mod_by')); ?>:</b>
	<?php echo CHtml::encode($data->mod_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uraian')); ?>:</b>
	<?php echo CHtml::encode($data->uraian); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kecamatan')); ?>:</b>
	<?php echo CHtml::encode($data->kecamatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kelurahan')); ?>:</b>
	<?php echo CHtml::encode($data->kelurahan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('volume')); ?>:</b>
	<?php echo CHtml::encode($data->volume); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('satuan')); ?>:</b>
	<?php echo CHtml::encode($data->satuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagu_indikatif')); ?>:</b>
	<?php echo CHtml::encode($data->pagu_indikatif); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagu_prakiraan_maju')); ?>:</b>
	<?php echo CHtml::encode($data->pagu_prakiraan_maju); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sumber_dana')); ?>:</b>
	<?php echo CHtml::encode($data->sumber_dana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urutan')); ?>:</b>
	<?php echo CHtml::encode($data->urutan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tolak_ukur_hasil_program')); ?>:</b>
	<?php echo CHtml::encode($data->tolak_ukur_hasil_program); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_hasil_program')); ?>:</b>
	<?php echo CHtml::encode($data->target_hasil_program); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tolak_ukur_keluaran_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->tolak_ukur_keluaran_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_keluaran_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->target_keluaran_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tolak_ukur_hasil_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->tolak_ukur_hasil_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_hasil_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->target_hasil_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sumber_usulan')); ?>:</b>
	<?php echo CHtml::encode($data->sumber_usulan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_usulan')); ?>:</b>
	<?php echo CHtml::encode($data->status_usulan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan_status_usulan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan_status_usulan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</b>
	<?php echo CHtml::encode($data->foto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latitude')); ?>:</b>
	<?php echo CHtml::encode($data->latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longitude')); ?>:</b>
	<?php echo CHtml::encode($data->longitude); ?>
	<br />

	*/ ?>

</div>