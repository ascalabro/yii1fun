<?php
Yii::import("ext.firebase-php-src.Firebase", true);
Yii::import("ext.firebase-php-src.FirebaseStub", true);

class FirebaseHelper extends CComponent {
    
    const FIREBASE_URI = "https://hitpracticelog.firebaseio.com/";
    const DEFAULT_TOKEN = 'MqL0c8tKCtheLSYcygYNtGhU8Z2hULOFs9OKPdEp';
    const DEFAULT_LOG_PATH = '/firebase/example';
    
    
    public static function firebaseLog($data) {
//        echo Yii::get ("firebase-php-src");
        $firebase = new \Firebase\Firebase("");
//        $firebase->update($path, array(
//            
//        ));
        self::test();
    }
    
    public static function firebaseStubLog($data) {
        $firebase = new \Firebase\FirebaseStub(self::FIREBASE_URI);
        $result = $firebase->set(self::DEFAULT_LOG_PATH, array(
            
        ));
    }
    
    public static function test() 
    {
        echo "this is the test for the class: " . __CLASS__;
    }
    
}