<?php
/*
 * Created to interact with GitHub API
 * by Angelo Scalabroni
 * @property string $user
 * @property string $password
 */
class GitHubClient {
    
    public $username;
    public $password;
    
    /*
     * This is how passwords are encrypted and stored in MySQL Table to be decrypted later
     * $key = Yii::app()->params['salt'];
     * $iv = md5(md5($key));
     * $output = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, $iv);
     * $output = base64_encode($output); //this is the final product to save
     */
    public function __construct($githubaccount) {
        $iv = md5(md5(Yii::app()->params['salt']));
        $password = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(Yii::app()->params['salt']), base64_decode($githubaccount->GitHubPassword), MCRYPT_MODE_CBC, $iv));
        $this->setCredentials($githubaccount->GitHubUsername, $password);
    }

    private function setCredentials($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function getRepoList() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://api.github.com/users/' . $this->username . '/repos',
            CURLOPT_USERAGENT => 'Get User Repos',
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        if (!curl_exec($curl)) {
            curl_close($curl);
            return false;
        } else {
            curl_close($curl);
            return json_decode($resp);
        }
    }

}
