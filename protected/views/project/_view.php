<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projectName')); ?>:</b>
	<?php echo CHtml::encode($data->projectName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projectDescription')); ?>:</b>
	<?php echo CHtml::encode($data->projectDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projectCategory')); ?>:</b>
	<?php echo CHtml::encode($data->projectCategory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projectCreationDate')); ?>:</b>
	<?php echo CHtml::encode($data->projectCreationDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('projectLink')); ?>:</b>
	<?php echo CHtml::encode($data->projectLink); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateAdded')); ?>:</b>
	<?php echo CHtml::encode($data->dateAdded); ?>
	<br />


</div>