<?php
/* @var $this SiteController */
Yii::app()->clientScript->registerCss('cssa', "
.loading-img-container {
    display: none;
}
.hero-unit {
background-color: rgba(238, 238, 238, 0.1);
margin-bottom: 0;
}

.thumbnail {
background-color:rgba(163, 251, 226, 0.39);
}

.thumbnail:hover {
background-color:rgba(163,251,225,0.2);
}

img.center {
    margin-right: 50%;
    margin-left: 50%;
}
");
Yii::app()->clientScript->registerScriptFile(Yii::app()->assetManager->publish(dirname(__FILE__) . '/js/functions.js'), CClientScript::POS_HEAD);
Yii::app()->clientScript->registerScript('readery', '
$(".thumbnail").each(function(index) {
    var captionImage = $(this).find("td:first font").html();
    var boldTitle = $(this).find(".lh font:first").text();
    var articleLink = $(this).find(".lh a:first").attr(\'href\');
    if (captionImage == ""){
        $(this).find("td:first").html("<a href=\'" + articleLink + "\'><img src=\'' . Yii::app()->getBaseUrl() . '/images/businessgeneric.jpg' . '\'><br><font size=\'-2\'>" + boldTitle + "</font></a>");
    }
});
refreshNewsFeed();
', CClientScript::POS_READY);

$this->pageTitle=Yii::app()->name;

?>

<?php $this->beginWidget('booster.widgets.TbJumbotron',array(
//    'heading'=>'Welcome to '.CHtml::encode(Yii::app()->name),
)); ?>

<?php $this->endWidget(); ?>

<?php $this->widget('bootstrap.widgets.TbCarousel', array(
    'items'=>$carouselItems
)); ?>
<div class="news-container well">
    <div class="loading-img-container">
        <img class="center" id="loading-gif" src="/images/ring-alt.gif" alt="loading content...">
    </div>
<section>

</section>
</div>
<?php
Yii::app()->clientScript->registerCss('css', "
.carousel-control {
    display: none;
}
");