<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skpd')); ?>:</b>
	<?php echo CHtml::encode($data->skpd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode')); ?>:</b>
	<?php echo CHtml::encode($data->kode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urusan')); ?>:</b>
	<?php echo CHtml::encode($data->urusan); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sasaran')); ?>:</b>
	<?php echo CHtml::encode($data->sasaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indikator_kinerja_program')); ?>:</b>
	<?php echo CHtml::encode($data->indikator_kinerja_program); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indikator_keluaran_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->indikator_keluaran_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_rpjmd_k')); ?>:</b>
	<?php echo CHtml::encode($data->target_rpjmd_k); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_rpjmd_rp')); ?>:</b>
	<?php echo CHtml::encode($data->target_rpjmd_rp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_capaian_kinerja_rpjmd1_k')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_capaian_kinerja_rpjmd1_k); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_capaian_kinerja_rpjmd1_rp')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_capaian_kinerja_rpjmd1_rp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_kinerja_rkpd_k')); ?>:</b>
	<?php echo CHtml::encode($data->target_kinerja_rkpd_k); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_kinerja_rkpd_rp')); ?>:</b>
	<?php echo CHtml::encode($data->target_kinerja_rkpd_rp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_kinerja_triwulan_1_k')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_kinerja_triwulan_1_k); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_kinerja_triwulan_1_rp')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_kinerja_triwulan_1_rp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_kinerja_triwulan_2_k')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_kinerja_triwulan_2_k); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_kinerja_triwulan_2_rp')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_kinerja_triwulan_2_rp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_kinerja_triwulan_3_k')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_kinerja_triwulan_3_k); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_kinerja_triwulan_3_rp')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_kinerja_triwulan_3_rp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_kinerja_triwulan_4_k')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_kinerja_triwulan_4_k); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_kinerja_triwulan_4_rp')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_kinerja_triwulan_4_rp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_capaian_kinerja_rkpd_k')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_capaian_kinerja_rkpd_k); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_capaian_kinerja_rkpd_rp')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_capaian_kinerja_rkpd_rp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_capaian_kinerja_rpjmd_k')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_capaian_kinerja_rpjmd_k); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_capaian_kinerja_rpjmd_rp')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_capaian_kinerja_rpjmd_rp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_capaian_kinerja_dan_realisasi_rpjmd_k')); ?>:</b>
	<?php echo CHtml::encode($data->target_capaian_kinerja_dan_realisasi_rpjmd_k); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_capaian_kinerja_dan_realisasi_rpjmd_rp')); ?>:</b>
	<?php echo CHtml::encode($data->target_capaian_kinerja_dan_realisasi_rpjmd_rp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun_anggaran')); ?>:</b>
	<?php echo CHtml::encode($data->tahun_anggaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('triwulan')); ?>:</b>
	<?php echo CHtml::encode($data->triwulan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_by')); ?>:</b>
	<?php echo CHtml::encode($data->modified_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified_date')); ?>:</b>
	<?php echo CHtml::encode($data->modified_date); ?>
	<br />

	*/ ?>

</div>