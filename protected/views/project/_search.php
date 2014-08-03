<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'projectName'); ?>
		<?php echo $form->textField($model,'projectName',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'projectDescription'); ?>
		<?php echo $form->textField($model,'projectDescription',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'projectCategory'); ?>
		<?php echo $form->textField($model,'projectCategory',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'projectCreationDate'); ?>
		<?php echo $form->textField($model,'projectCreationDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'projectLink'); ?>
		<?php echo $form->textField($model,'projectLink',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateAdded'); ?>
		<?php echo $form->textField($model,'dateAdded'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->