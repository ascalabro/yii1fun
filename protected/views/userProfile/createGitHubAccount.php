<?php

$this->breadcrumbs=array(
	$model->user->username=>array('view','id'=>$model->UserID),
	'Add Github Account',
);

$this->menu=array(
//	array('label'=>'List UserProfile', 'url'=>array('index')),
//	array('label'=>'Create UserProfile', 'url'=>array('create')),
	array('label'=>'View UserProfile', 'url'=>array('view', 'id'=>$model->user->id)),
//	array('label'=>'Manage UserProfile', 'url'=>array('admin')),
);
?>

<h1>Update <?php echo $model->user->username; ?>'s Profile</h1>

<?php echo $this->renderPartial('_newGHform', array('model'=>$model,'gha'=>$gha)); ?>