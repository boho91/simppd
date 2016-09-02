<?php
/* @var $this ResesDprdController */
/* @var $data ResesDprd */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skpd')); ?>:</b>
	<?php echo CHtml::encode($data->skpd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usulan')); ?>:</b>
	<?php echo CHtml::encode($data->usulan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sumber_dana')); ?>:</b>
	<?php echo CHtml::encode($data->sumber_dana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('mod_by')); ?>:</b>
	<?php echo CHtml::encode($data->mod_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mod_date')); ?>:</b>
	<?php echo CHtml::encode($data->mod_date); ?>
	<br />

	*/ ?>

</div>