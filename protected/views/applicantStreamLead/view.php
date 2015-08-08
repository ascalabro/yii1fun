<?php
/* @var $this ApplicantStreamLeadController */
/* @var $model ApplicantStreamLead */

$this->breadcrumbs=array(
	'Applicant Stream Leads'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ApplicantStreamLead', 'url'=>array('index')),
	array('label'=>'Create ApplicantStreamLead', 'url'=>array('create')),
	array('label'=>'Update ApplicantStreamLead', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ApplicantStreamLead', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ApplicantStreamLead', 'url'=>array('admin')),
);
?>

<h1>View ApplicantStreamLead #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'first_name',
		'last_name',
		'job_board',
		'email_address',
		'main_phone',
		'cell_phone',
	),
)); ?>
