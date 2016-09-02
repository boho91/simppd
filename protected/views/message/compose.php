<section class="content-header">
<?php $this->pageTitle=Yii::app()->name . ' - '.MessageModule::t("Compose Message"); ?>
<?php
	$this->breadcrumbs=array(
		MessageModule::t("Messages"),
		MessageModule::t("Compose"),
	);
?>

<?php $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_flash') ?>
</section>

<section class="content">

<?php $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_navigation'); ?>
	<div class="col-md-12 message-content">
		<h2><?php echo MessageModule::t('Compose New Message'); ?></h2>

		<div class="form">
			<?php $form = $this->beginWidget('CActiveForm', array(
				'id'=>'message-form',
				'enableAjaxValidation'=>false,
			)); ?>

			<p class="note"><?php echo MessageModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-message block-message error')); ?>
		
			
			<div class="input form-group col-md-5">
				<?php echo $form->labelEx($model,'receiver_id'); ?>
				<?php echo CHtml::textField('receiver', $receiverName,array('class'=>'form-control')) ?>
				<?php echo $form->hiddenField($model,'receiver_id'); ?>
				<?php echo $form->error($model,'receiver_id'); ?>
			</div>
			<div class='clear'></div>
			
			<div class="input  form-group col-md-5">
				<?php echo $form->labelEx($model,'subject'); ?>
				<?php echo $form->textField($model,'subject',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'subject'); ?>
			</div>
			<div class='clear'></div>
			
			<div class="input form-group col-md-5">
				<?php echo $form->labelEx($model,'body'); ?>
				<?php echo $form->textArea($model,'body',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'body'); ?>
			</div>
			<div class='clear'></div>
			<div class="buttons col-md-5  form-group">
				<button class="btn btn-primary"><?php echo MessageModule::t("Send") ?></button>
			</div>

			<?php $this->endWidget(); ?>

		</div>
	</div>


</section><?php $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_suggest'); ?>