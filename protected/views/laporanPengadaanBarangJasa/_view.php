<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skpd')); ?>:</b>
	<?php echo CHtml::encode($data->skpd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uraian_kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->uraian_kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('volume')); ?>:</b>
	<?php echo CHtml::encode($data->volume); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('satuan')); ?>:</b>
	<?php echo CHtml::encode($data->satuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('biaya')); ?>:</b>
	<?php echo CHtml::encode($data->biaya); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proses_pengadaan')); ?>:</b>
	<?php echo CHtml::encode($data->proses_pengadaan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tanda_tangan_kontrak')); ?>:</b>
	<?php echo CHtml::encode($data->tanda_tangan_kontrak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pelaksanaan')); ?>:</b>
	<?php echo CHtml::encode($data->pelaksanaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pho')); ?>:</b>
	<?php echo CHtml::encode($data->pho); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keterangan')); ?>:</b>
	<?php echo CHtml::encode($data->keterangan); ?>
	<br />

	*/ ?>

</div>