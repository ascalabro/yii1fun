<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php Yii::app()->bootstrap->register(); ?>

        <?php // Yii::app()->booster->init(); ?>
        <!--Google Analytics Code-->
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-53843612-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>
        <meta name="google-site-verification" content="X9fp0YQ8LFnnArYYk6GFi4GZYAfXKH43XVmay1SE2ts" />

    </head>

    <body>
        <?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/javascript/soundManagerMp3Player.js');

Yii::app()->clientScript->registerScript('mp3ini','

function launchSoundManagerMp3Player() {

$.get(' . CJavaScript::encode($this->createUrl('site/loadMp3Playlist')) . ', function(playlist) {
    var playlist = jQuery.parseJSON(playlist);
    for (var i in playlist) { 
        console.log(playlist[i]);
    }
});
//$("#mp3dialog").dialog("open");
return false;
}
',CClientScript::POS_HEAD);
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mp3dialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Mp3 Player',
        'autoOpen'=>false,
        'modal'=>true,      
    ),

));


?>
<p><a href="/mp3/file1.mp3" id="singlePlayer_1" class="list1">Audio 1</a></p>
<p><a href="/mp3/file2.mp3" id="singlePlayer_2" class="list1">Audio 2</a></p>
<p><a href="/mp3/file3.mp3" id="singlePlayer_3" class="list1">Audio 3</a></p>
<p><a href="/mp3/file4.mp3" id="singlePlayer_4" class="list1">Audio 4</a></p>
<?php $this->widget("ext.SoundManager.ESoundManagerSimplePlayList", 
        array("playListId" => "playList1", 
              "playListClass" => "list1", 
              "autoPlay" => true, 
              "autoNext" => true, 
              "playCallback" => "onPlay", 
              "stopCallback" => "onStop", 
              "pauseCallback" => "onPause", 
              "resumeCallback" => "onResume", 
              "finishCallback" => "onFinish"));

$this->endWidget('zii.widgets.jui.CJuiDialog');


        $this->widget('bootstrap.widgets.TbNavbar', array(
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => array(
                        array('label' => 'Home', 'url' => array('/site/index')),
                        array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
//                        array('label' => 'Contact', 'url' => array('/site/contact')),
                        // array('label' => 'Portfolio', 'url' => array('/project/index'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Profile', 'url' => array('/userProfile/view/id/' . Yii::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Mp3 Player', 'url' => '#', 'itemOptions' => array('onclick' => 'js: launchSoundManagerMp3Player()'), 'visible' => Yii::app()->user->name == 'ascalabro'),
                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                    ),
                ),
            ),
        ));
        ?>

        <div class="container" id="page">

            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> .<br/>
                All Rights Reserved.<br/>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
