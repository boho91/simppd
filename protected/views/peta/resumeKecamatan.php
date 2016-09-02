
<section class="content-header">
</section>
<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'kecamatan_.kecamatan',
		'pagu1',
		'pagu2',
		
		'sumber_dana',
		
	
),
)); ?>
</section>