<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'projectName'); ?>
		<?php echo $form->textField($model,'projectName',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'projectName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'projectDescription'); ?>
		<?php echo $form->textField($model,'projectDescription',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'projectDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'projectCategory'); ?>
		<?php echo $form->textField($model,'projectCategory',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'projectCategory'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'projectCreationDate'); ?>
		<?php echo $form->textField($model,'projectCreationDate'); ?>
		<?php echo $form->error($model,'projectCreationDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'projectLink'); ?>
		<?php echo $form->textField($model,'projectLink',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'projectLink'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateAdded'); ?>
		<?php echo $form->textField($model,'dateAdded'); ?>
		<?php echo $form->error($model,'dateAdded'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->