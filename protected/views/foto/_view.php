<?php
/* @var $this FotoController */
/* @var $data Foto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_musrenbang')); ?>:</b>
	<?php echo CHtml::encode($data->id_musrenbang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_musrenbang')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_musrenbang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto')); ?>:</b>
	<?php echo CHtml::encode($data->foto); ?>
	<br />


</div>