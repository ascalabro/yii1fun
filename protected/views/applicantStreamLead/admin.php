<?php
/* @var $this ApplicantStreamLeadController */
/* @var $model ApplicantStreamLead */

$this->breadcrumbs=array(
	'Applicant Stream Leads'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ApplicantStreamLead', 'url'=>array('index')),
	array('label'=>'Create ApplicantStreamLead', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#applicant-stream-lead-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Applicant Stream Leads</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'applicant-stream-lead-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'first_name',
		'last_name',
		'job_board',
		'email_address',
		'main_phone',
		/*
		'cell_phone',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
