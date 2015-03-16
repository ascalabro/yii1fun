<?php
Yii::import("ext.firebase-php-src.FirebaseLib", true);
Yii::import("ext.firebase-php-src.FirebaseStub", true);

class FirebaseHelper extends CComponent {
    
    const FIREBASE_URI = "https://hitpracticelog.firebaseio.com/";
    const FIREBASE_TOKEN = 'FTwTuEoHgHd3yO5svHoBNnagiUWgJ0SxwNBHXrzf';
    const DEFAULT_LOG_PATH = '/hitpracticelog/logs';
    
    
    public static function pushLog($data) {
        $firebase = new \Firebase\FirebaseLib(self::FIREBASE_URI, self::FIREBASE_TOKEN);
        $firebase->push(self::DEFAULT_LOG_PATH, $data);
    }
    
    public static function pushLogStub($data) {
        $firebase = new \Firebase\FirebaseStub(self::FIREBASE_URI, self::FIREBASE_TOKEN);
        $result = $firebase->push(self::DEFAULT_LOG_PATH, CJSON::encode($data));
        self::_printResult($result);
    }
    
    private static function _printResult($result) {
        CVarDumper::dump($result);
        Yii::app()->end();
    }
    
}