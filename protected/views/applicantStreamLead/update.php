<?php
/* @var $this ApplicantStreamLeadController */
/* @var $model ApplicantStreamLead */

$this->breadcrumbs=array(
	'Applicant Stream Leads'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ApplicantStreamLead', 'url'=>array('index')),
	array('label'=>'Create ApplicantStreamLead', 'url'=>array('create')),
	array('label'=>'View ApplicantStreamLead', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ApplicantStreamLead', 'url'=>array('admin')),
);
?>

<h1>Update ApplicantStreamLead <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>