<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uraian')); ?>:</b>
	<?php echo CHtml::encode($data->uraian); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode1')); ?>:</b>
	<?php echo CHtml::encode($data->kode1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode2')); ?>:</b>
	<?php echo CHtml::encode($data->kode2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode3')); ?>:</b>
	<?php echo CHtml::encode($data->kode3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode4')); ?>:</b>
	<?php echo CHtml::encode($data->kode4); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('kode5')); ?>:</b>
	<?php echo CHtml::encode($data->kode5); ?>
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