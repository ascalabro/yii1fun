<?php

class FirebaseHelper {
    
    const FIREBASE_URI = "https://hitpracticelog.firebaseio.com/";
    const DEFAULT_TOKEN = 'MqL0c8tKCtheLSYcygYNtGhU8Z2hULOFs9OKPdEp';
    const DEFAULT_PATH = '/firebase/example';
    
    public static function firebaseLog($data) {
        $firebase = new Firebase\FirebaseLib($baseURI);
        $firebase->update($path, array(
            
        ));
    }
    
    public static function test() 
    {
        echo "this is the test for the class: " . __CLASS__;
    }
    
}