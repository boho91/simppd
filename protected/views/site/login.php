
<div id="cl-wrapper" class="login-container">

<div class="middle-login" style="">
<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class='col-md-12'>
<h1 >Login</h1>
</div>
<div class="col-md-6">
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


	<div class=" form-group">
		<?php // echo $form->labelEx($model,'username',array('class'=>'label')); ?>
		<?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Username')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-group">
		<?php //echo $form->labelEx($model,'password',array('class'=>'label')); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div>

	<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-thumb-tack"></i></span>
				<select required  name="LoginForm[tahun_perencanaan]"  id="tahun" class="form-control">
					<?php 
					$minyear = Rpjmd::model()->getMinYear()-10;
					$maxyear = Rpjmd::model()->getMaxYear()+10;
					for($a=$maxyear;$a>$minyear;$a--)
					{
						echo '<option value="'.($a).'">'.($a).'</option>';      
					}
					?>
					                                     
				</select>
			</div>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton('Login',array('class'=>'btn btn-info')); ?>
		<?php echo CHtml::resetButton('Reset',array('class'=>'btn btn-danger')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
</div>
</div>
</div>