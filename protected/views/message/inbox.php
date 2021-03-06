<section class="content-header">
<h1>
<?php $this->pageTitle=Yii::app()->name . ' - '.MessageModule::t("Messages:inbox"); ?>
<?php
	$this->breadcrumbs=array(
		MessageModule::t("Messages"),
		MessageModule::t("Inbox"),
	);
?>
</h1>
</section>

<section class="content">
<?php $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_flash') ?>
<div class="row">
	<?php $this->renderPartial(Yii::app()->getModule('message')->viewPath . '/_navigation') ?>
	<div class="col-md-6 message-content">
		<h2><?php echo MessageModule::t('Inbox'); ?></h2>

		<?php if ($messagesAdapter->data): ?>
			<?php $form = $this->beginWidget('CActiveForm', array(
				'id'=>'message-delete-form',
				'enableAjaxValidation'=>false,
				'action' => $this->createUrl('delete/')
			)); ?>

			<table class="bordered-table table zebra-striped">
				<tr>
					<th class="from-to">From</th>
					<th>Subject</th>
					<th>Date</th>
				</tr>
				<?php 
				
				?>
				<?php foreach ($messagesAdapter->data as $index => $message): ?>
					<tr class="<?php echo $message->is_read ? 'read' : 'unread' ?>">
						<td>
							<?php echo CHtml::checkBox("Message[$index][selected]"); ?>
							<?php echo $form->hiddenField($message,"[$index]id"); ?>
							<?php echo $message->getSenderName(); ?>
						</td>
						<td><a href="<?php echo $this->createUrl('view/', array('message_id' => $message->id)) ?>"><?php echo $message->subject ?></a></td>
						<td><span class="date"><?php echo date(Yii::app()->getModule('message')->dateFormat, strtotime($message->created_at)) ?></span></td>
					</tr>
				<?php endforeach ?>
			</table>

			<div class='form-group'>
				<br>
				<button class="btn btn-danger"><?php echo MessageModule::t("Delete Selected") ?></button>
			</div>

		<?php $this->endWidget(); ?>
		<div class="pagination">
			<?php $this->widget('CLinkPager', array('header' => '', 'pages' => $messagesAdapter->getPagination(), 'htmlOptions' => array('class' => 'pager'))) ?>
		</div>
		<?php 
		else :
		echo "<div class='alert alert-danger'>Belum ada pesan masuk.</div>";
		?>
		
		<?php endif; ?>
		
	</div>
</div>
</div>