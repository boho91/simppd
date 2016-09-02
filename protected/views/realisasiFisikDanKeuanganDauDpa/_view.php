<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dpa')); ?>:</b>
	<?php echo CHtml::encode($data->id_dpa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_fisik')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_fisik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('realisasi_keuangan')); ?>:</b>
	<?php echo CHtml::encode($data->realisasi_keuangan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun')); ?>:</b>
	<?php echo CHtml::encode($data->tahun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bulan')); ?>:</b>
	<?php echo CHtml::encode($data->bulan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urusan')); ?>:</b>
	<?php echo CHtml::encode($data->urusan); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('bidang')); ?>:</b>
	<?php echo CHtml::encode($data->bidang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('program')); ?>:</b>
	<?php echo CHtml::encode($data->program); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kegiatan')); ?>:</b>
	<?php echo CHtml::encode($data->kegiatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harga_satuan')); ?>:</b>
	<?php echo CHtml::encode($data->harga_satuan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('volume')); ?>:</b>
	<?php echo CHtml::encode($data->volume); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kontrak')); ?>:</b>
	<?php echo CHtml::encode($data->kontrak); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('swakelola')); ?>:</b>
	<?php echo CHtml::encode($data->swakelola); ?>
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