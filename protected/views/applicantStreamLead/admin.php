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

<div class="btn-toolbar">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'JSON Feed', 'url'=>'#'),
            array('items'=>array(
                array('label'=>'List All / All Attributes', 'url'=>array('list')),
                array('label'=>'List All / Emails only', 'url'=>Yii::app()->createUrl("applicantStreamLead/list", array("type"=>"email"))),
                array('label'=>'List All / First and last names only', 'url'=>Yii::app()->createUrl("applicantStreamLead/list", array("type"=>"name"))),
                '---',
                array('label'=>'Search', 'url'=>'#'),
            )),
        ),
    )); ?>
</div>

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

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
	'id'=>'applicant-stream-lead-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'template'=>"{items}",
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
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'htmlOptions'=>array('style'=>'width: 50px'),
                ),
	),
)); ?>
