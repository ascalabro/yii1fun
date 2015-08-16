<?php 
// Put the following line at the top of protected/config/main.php to include this file
// require_once( dirname(__FILE__) . '/../components/helpers.php');

function writeLog($msg, $logName = '') {
    // If no logName is preferred, get the name of the controller that is
    // being used and updated it to fit the current naming convention used
    // by the logForDeveloper function.
    if ($logName == '') {
        $logName = ucfirst(Yii::app()->controller->id . 'Controller');
    }

    // Only allow letters and numbers in the fileName for security.
    $logName = preg_replace('/[^a-zA-Z0-9]/', '', $logName);

    $root = Yii::getPathOfAlias('webroot');
    $handle = fopen("{$root}/protected/runtime/{$logName}.log", 'a');
    fwrite($handle, date('Y-m-d H:i:s') . " - {$msg}\n");
    fclose($handle);
}

function dd($var) {
    CVarDumper::dump($var, 20, true);
    Yii::app()->end();
}