<?php
/* @var $this SpmController */
/* @var $data Spm */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kd_pelayanan_dasar')); ?>:</b>
	<?php echo CHtml::encode($data->kd_pelayanan_dasar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indikator')); ?>:</b>
	<?php echo CHtml::encode($data->indikator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai')); ?>:</b>
	<?php echo CHtml::encode($data->nilai); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('batas_waktu')); ?>:</b>
	<?php echo CHtml::encode($data->batas_waktu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kd_skpd')); ?>:</b>
	<?php echo CHtml::encode($data->kd_skpd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<?php /*
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