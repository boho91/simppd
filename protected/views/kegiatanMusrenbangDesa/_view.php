<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('idkegiatan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idkegiatan),array('view','id'=>$data->idkegiatan)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun')); ?>:</b>
	<?php echo CHtml::encode($data->tahun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kunci')); ?>:</b>
	<?php echo CHtml::encode($data->kunci); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->timestamp); ?>
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

	*/ ?>

</div>