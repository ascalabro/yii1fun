<?php
/* @var $this PokerController */

$this->breadcrumbs = array(
    $this->module->id => array('/' . $this->module->id . '/Categories'),
    'Poker' => array('/' . $this->module->id . '/' . $this->id),
    $this->pageTitle
);
?>
<div class="row">
    <h1><?php echo $this->pageTitle ?></h1>
    <p>
        Use this tool to import a <?php echo CHtml::link('Statking', 'https://www.conjelco.com/statking/purchasekey.html'); ?> database which has been exported into a "CSV" document.
    </p>
    <?php
    $form = $this->beginWidget(
        'CActiveForm', array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
            )
    );
    echo $form->labelEx($model, 'dbaFile');
    echo $form->fileField($model, 'dbaFile');
    echo $form->error($model, 'dbaFile');
    echo CHtml::submitButton('Submit');
    $this->endWidget();
    ?>
</div>