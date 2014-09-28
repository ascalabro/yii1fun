<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */

Yii::app()->clientScript->registerCss('userProfileview1', "

th {
text-decoration: underline;
padding: 12px;
}

td {
padding: 12px;
}

#yw1 {
            width:1100px;
            margin: 20px 0 20px;
}
");


$this->breadcrumbs = array(
    $model->user->username,
);

// This demonstrates the relations between the Active Record Classes... Amazing.
//CVarDumper::dump($model->user->profile->Email, '20', true);


$this->menu = array(
//	array('label'=>'List UserProfile', 'url'=>array('index')),
//	array('label'=>'Create UserProfile', 'url'=>array('create')),
    array('label' => 'Update UserProfile', 'url' => array('update', 'id' => $model->user->id)),
//	array('label'=>'Delete UserProfile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage UserProfile', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->user->username; ?>'s Profile</h1>
<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'FirstName',
        'LastName',
        'Email',
    ),
));
// check if southeast.club api returned error message
if (!property_exists($repos[0], 'error')) {
    $this->widget('zii.widgets.jui.CJuiAccordion', array(
        'panels' => array(
            'Github' => $this->renderPartial('_repos', array('repos' => $repos), true),
//        'panel 2'=>'content for panel 2',
        // panel 3 contains the content rendered by a partial view
        ),
        // additional javascript options for the accordion plugin
        'options' => array(
            'collapsible' => true,
            'active' => false,
            'heightStyle' => 'content',
            'animated' => 'bounceslide',
        ),
    ));
} else {
    
}
