<?php
/* @var $this ApplicantStreamLeadController */
/* @var $model ApplicantStreamLead */

$this->breadcrumbs=array(
	'Applicant Stream Leads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ApplicantStreamLead', 'url'=>array('index')),
	array('label'=>'Manage ApplicantStreamLead', 'url'=>array('admin')),
);
?>

<h1>Create ApplicantStreamLead</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>