<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urusan')); ?>:</b>
	<?php echo CHtml::encode($data->urusan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skpd')); ?>:</b>
	<?php echo CHtml::encode($data->skpd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bidang')); ?>:</b>
	<?php echo CHtml::encode($data->bidang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('program')); ?>:</b>
	<?php echo CHtml::encode($data->program); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pmk')); ?>:</b>
	<?php echo CHtml::encode($data->pmk); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_pmk')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_pmk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('juknis')); ?>:</b>
	<?php echo CHtml::encode($data->juknis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_juknis')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_juknis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penyusunan_rencana_kerja')); ?>:</b>
	<?php echo CHtml::encode($data->penyusunan_rencana_kerja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_penyusunan_rencana_kerja')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_penyusunan_rencana_kerja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penetapan_dpa')); ?>:</b>
	<?php echo CHtml::encode($data->penetapan_dpa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_penetapan_dpa')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_penetapan_dpa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sk_penetapan_pelaksanaan_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->sk_penetapan_pelaksanaan_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_sk_penetapan_pelaksanaan_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_sk_penetapan_pelaksanaan_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_pelaksanaan_tender')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_pelaksanaan_tender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelaksanaan_tender')); ?>:</b>
	<?php echo CHtml::encode($data->pelaksanaan_tender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('persiapan_pekerjaan_swakelola')); ?>:</b>
	<?php echo CHtml::encode($data->persiapan_pekerjaan_swakelola); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_persiapan_pekerjaan_swakelola')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_persiapan_pekerjaan_swakelola); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelaksanaan_pekerjaan_kontrak')); ?>:</b>
	<?php echo CHtml::encode($data->pelaksanaan_pekerjaan_kontrak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_pelaksanaan_pekerjaan_kontrak')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_pelaksanaan_pekerjaan_kontrak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelaksanaan_pekerjaan_swakelola')); ?>:</b>
	<?php echo CHtml::encode($data->pelaksanaan_pekerjaan_swakelola); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_pelaksanaan_pekerjaan_swakelola')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_pelaksanaan_pekerjaan_swakelola); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penerbitan_spp')); ?>:</b>
	<?php echo CHtml::encode($data->penerbitan_spp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_penerbitan_spp')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_penerbitan_spp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penerbitan_spm')); ?>:</b>
	<?php echo CHtml::encode($data->penerbitan_spm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_penerbitan_spm')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_penerbitan_spm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('penerbitan_sp2d')); ?>:</b>
	<?php echo CHtml::encode($data->penerbitan_sp2d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_penerbitan_sp2d')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_penerbitan_sp2d); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun')); ?>:</b>
	<?php echo CHtml::encode($data->tahun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bulan')); ?>:</b>
	<?php echo CHtml::encode($data->bulan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mod_by')); ?>:</b>
	<?php echo CHtml::encode($data->mod_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mod_date')); ?>:</b>
	<?php echo CHtml::encode($data->mod_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_perubahan')); ?>:</b>
	<?php echo CHtml::encode($data->is_perubahan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dpa')); ?>:</b>
	<?php echo CHtml::encode($data->id_dpa); ?>
	<br />

	*/ ?>

</div>