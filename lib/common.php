<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/18
 * Time: 上午11:10
 */

class common {

    public static function isLogin() {
        $result = false;
        if(!isset($_SESSION)) {
            session_start();
        }
        if(array_key_exists('user_id', $_SESSION) && $_SESSION['user_id']) {
           $result = true;

        }
        return $result;
    }
}