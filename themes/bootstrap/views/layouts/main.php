<?php /* @var $this Controller */
$start = microtime(true);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
		<link rel="SHORTCUT ICON" href="<?php echo Yii::app()->baseUrl; ?>/images/icon.ico">
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
        <script type="text/javascript">
        $(document).ready(function(){
           //apply to each submenu item so that the 'url' property is correct.
           $(".dropdown-submenu").each(function() {
               var fully = $(this).find('li:first a').attr('href');
               var newStr = fully.substr(0,fully.lastIndexOf('/')+1);
               $(this).find('a:first').attr('href',newStr).val(newStr);
           });
        });
        </script>
        <meta name="google-site-verification" content="X9fp0YQ8LFnnArYYk6GFi4GZYAfXKH43XVmay1SE2ts" />

    </head>

    <body>
        <?php
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/javascript/soundManagerMp3Player.js');

        Yii::app()->clientScript->registerScript('mp3ini', '
function launchSoundManagerMp3Player() {
if (soundManager.loadedPlaylist != true) {
    $.get(' . CJavaScript::encode(Yii::app()->baseUrl . '/index.php/site/loadMp3Playlist') . ', function(playlist) {
    soundManager.loadedPlaylist = true;
    var playlist = jQuery.parseJSON(playlist);
    for (var i in playlist) {
        $("#mp3dialog").append("<p> <a href=\'/mp3/" + playlist[i] + "\' id=\'singlePlayer_" + parseInt(i+1) + "\' class=\'list1\'>" + playlist[i] + "</a></p>");
        console.log(playlist[i]);
    }
    });
}
$("#mp3dialog").dialog("open");
return false;
}
', CClientScript::POS_HEAD);


        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'mp3dialog',
            // additional javascript options for the dialog plugin
            'options' => array(
                'title' => 'Mp3 Player',
                'autoOpen' => false,
                'modal' => false,
                'width' => '98%'
            ),
        ));


?>
<!--<p><a href="/mp3/willfreestyle10-15-11 (2).mp3" id="singlePlayer_1" class="list1">Audio 1</a></p>
<p><a href="/mp3/05 With Closed Eyes [prod. A Dot] (Grey).mp3" id="singlePlayer_2" class="list1">Audio 2</a></p>
<p><a href="/mp3/file3.mp3" id="singlePlayer_3" class="list1">Audio 3</a></p>
<p><a href="/mp3/file4.mp3" id="singlePlayer_4" class="list1">Audio 4</a></p>-->
<?php $this->widget("ext.SoundManager.ESoundManagerSimplePlayList",
        array("playListId" => "playList1",
            "playListClass" => "list1",
            "autoPlay" => true,
            "autoNext" => true,
            "playCallback" => "onPlay",
            "stopCallback" => "onStop",
            "pauseCallback" => "onPause",
            "resumeCallback" => "onResume",
            "finishCallback" => "onFinish")
			);

        $this->endWidget('zii.widgets.jui.CJuiDialog');

        $this->widget('bootstrap.widgets.TbNavbar', array(
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'submenuHtmlOptions' => array('class' => 'multi-level'),
                    'items' => array(
                        array('label' => 'Home', 'url' => array('/site/index')),
                        array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
//                        array('label' => 'Contact', 'url' => array('/site/contact')),
                        // array('label' => 'Portfolio', 'url' => array('/project/index'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Profile', 'url' => array('/userProfile/view/id/' . Yii::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
//			array('label' => 'Mp3 Player', 'url' => '#', 'itemOptions' => array('onclick' => 'js: launchSoundManagerMp3Player()'), 'visible' => Yii::app()->user->name == 'ascalabro'),
                        array('label' => 'Applicant Stream', 'url' => array('/applicantStreamLead/admin/'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Tools', 'items' => array(
                                '...',
                                array('label' => 'All', 'url' => array('/Tools/categories/index')),
                                array('label' => 'Poker', 'url' => array('/Tools/Poker'),
                                    'items'=> array(
                                        array('label'=>'Statking', 'url' => array('/Tools/Poker/statkingdatabase'))
                                    )
                                ),
//                                array('label'=>'Poker',  'url' => Yii::app()->getBaseUrl(true) . '/index.php/Tools/Poker'
//                                    ),
                            ),
                            'visible'=>!Yii::app()->user->isGuest
                        ),
                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
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
                Copyright &copy; <?php echo date('Y'); ?><br/>
                All Rights Reserved.<br/>
                Page load time: <?php echo Yii::getLogger()->getExecutionTime(); ?><br/>
                <?php
                $end = microtime(true);
                printf("Page was generated in %f seconds", $end - $start);
                ?>
                <hr>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
