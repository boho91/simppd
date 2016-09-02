<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('sasaran')); ?>:</b>
	<?php echo CHtml::encode($data->sasaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target')); ?>:</b>
	<?php echo CHtml::encode($data->target); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('plafon_anggaran')); ?>:</b>
	<?php echo CHtml::encode($data->plafon_anggaran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skpd')); ?>:</b>
	<?php echo CHtml::encode($data->skpd); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_musrenbang_kota')); ?>:</b>
	<?php echo CHtml::encode($data->id_musrenbang_kota); ?>
	<br />

	*/ ?>

</div>