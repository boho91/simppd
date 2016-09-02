<?php if(Yii::app()->user->hasFlash('messageModule')): ?>
	<div class="alert alert-message alert-success">
		<?php echo Yii::app()->user->getFlash('messageModule'); ?>
	</div>
<?php endif; ?>
