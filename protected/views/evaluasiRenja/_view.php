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

	<b><?php echo CHtml::encode($data->getAttributeLabel('skpd')); ?>:</b>
	<?php echo CHtml::encode($data->skpd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun')); ?>:</b>
	<?php echo CHtml::encode($data->tahun); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('kesesuaian')); ?>:</b>
	<?php echo CHtml::encode($data->kesesuaian); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evaluasi')); ?>:</b>
	<?php echo CHtml::encode($data->evaluasi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tindak_lanjut')); ?>:</b>
	<?php echo CHtml::encode($data->tindak_lanjut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hasil_tindak_lanjut')); ?>:</b>
	<?php echo CHtml::encode($data->hasil_tindak_lanjut); ?>
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

	*/ ?>

</div>