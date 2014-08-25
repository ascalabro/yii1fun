<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id => array('/' . $this->module->id . '/Categories'),
        'Poker'=>array('/' . $this->module->id . '/' . $this->id),
        $this->pageTitle
);
?>
<div class="row">
<h1><?php echo $this->pageTitle ?></h1>

<p>
Use this tool to import a <?php echo CHtml::link('Statking','https://www.conjelco.com/statking/purchasekey.html'); ?> database which has been exported into a "CSV" document.
</p>
<p>
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>
</div>