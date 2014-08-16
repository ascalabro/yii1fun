<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */

$this->breadcrumbs=array(
	$model->user->username,
);

// This demonstrates the relations between the Active Record Classes... Amazing.
//CVarDumper::dump($model->user->profile->Email, '20', true);

$this->menu=array(
//	array('label'=>'List UserProfile', 'url'=>array('index')),
//	array('label'=>'Create UserProfile', 'url'=>array('create')),
	array('label'=>'Update UserProfile', 'url'=>array('update', 'id'=>$model->ProfileID)),
//	array('label'=>'Delete UserProfile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ProfileID),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage UserProfile', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->user->username; ?>'s Profile</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'FirstName',
		'LastName',
		'Email',
	),
)); ?>