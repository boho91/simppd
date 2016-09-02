<?php
/* @var $this UploadController */
/* @var $data Upload */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</b>
	<?php echo CHtml::encode($data->foto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_musrenbang_cam')); ?>:</b>
	<?php echo CHtml::encode($data->id_musrenbang_cam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_musrenbang_kel')); ?>:</b>
	<?php echo CHtml::encode($data->id_musrenbang_kel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_musrenbang_kota')); ?>:</b>
	<?php echo CHtml::encode($data->id_musrenbang_kota); ?>
	<br />


</div>