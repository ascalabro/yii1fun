<?php
/* @var $this ApplicantStreamLeadController */
/* @var $model ApplicantStreamLead */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'applicant-stream-lead-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'job_board'); ?>
		<?php echo $form->textField($model,'job_board',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'job_board'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_address'); ?>
		<?php echo $form->textField($model,'email_address',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'email_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'main_phone'); ?>
		<?php echo $form->textField($model,'main_phone',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'main_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cell_phone'); ?>
		<?php echo $form->textField($model,'cell_phone',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'cell_phone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->