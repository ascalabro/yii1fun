<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */

$this->breadcrumbs=array(
	$model->user->username=>array('view','id'=>$model->UserID),
	'Update',
);

$this->menu=array(
//	array('label'=>'List UserProfile', 'url'=>array('index')),
//	array('label'=>'Create UserProfile', 'url'=>array('create')),
	array('label'=>'View UserProfile', 'url'=>array('view', 'id'=>$model->Email)),
//	array('label'=>'Manage UserProfile', 'url'=>array('admin')),
);
?>

<h1>Update <?php echo $model->user->username; ?>'s Profile</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>