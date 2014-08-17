<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */
/* @var $gha GitHubAccount */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-profile-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($gha); ?>

	<div >
		<?php echo $form->labelEx($gha,'GitHub Username <span class="required">*</span>'); ?>
		<?php echo $form->textField($gha,'GitHubUsername',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($gha,'GitHubUsername'); ?>
	</div>

	<div >
		<?php echo $form->labelEx($gha,'GitHub Password <span class="required">*</span>'); ?>
		<?php echo $form->PasswordField($gha,'GitHubPassword',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($gha,'GitHubPassword'); ?>
	</div>
        
        <div >
		<?php echo $form->hiddenField($gha,'GitHubOwnerID',array('value'=>$model->user->id)); ?>
	</div>

	<div class="buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Submit')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->