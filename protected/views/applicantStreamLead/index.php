<?php
/* @var $this ApplicantStreamLeadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Applicant Stream Leads',
);

$this->menu=array(
	array('label'=>'Create ApplicantStreamLead', 'url'=>array('create')),
	array('label'=>'Manage ApplicantStreamLead', 'url'=>array('admin')),
);
?>

<h1>Applicant Stream Leads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
