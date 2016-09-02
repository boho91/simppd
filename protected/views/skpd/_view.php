<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_skpd')); ?>:</b>
	<?php echo CHtml::encode($data->nama_skpd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_telp')); ?>:</b>
	<?php echo CHtml::encode($data->no_telp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_penanda_tangan_dokumen')); ?>:</b>
	<?php echo CHtml::encode($data->nama_penanda_tangan_dokumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nip_penanda_tangan_dokumen')); ?>:</b>
	<?php echo CHtml::encode($data->nip_penanda_tangan_dokumen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pangkat_penanda_tangan_dokumen')); ?>:</b>
	<?php echo CHtml::encode($data->pangkat_penanda_tangan_dokumen); ?>
	<br />


</div>