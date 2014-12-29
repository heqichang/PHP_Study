<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/24
 * Time: 上午9:48
 */


class S {
    function int($param) {
        return intval($param);
    }
}


$f = 10.2;
echo S::int($f);

$GLOBALS['abc'] = 1;
echo $abc;

$attr = array('HTTP_REFERER','HTTP_HOST','HTTP_X_FORWARDED_FOR','HTTP_USER_AGENT',
    'HTTP_CLIENT_IP','HTTP_SCHEME','HTTPS','PHP_SELF',
    'REQUEST_URI','REQUEST_METHOD','REMOTE_ADDR','SCRIPT_NAME',
    'QUERY_STRING');

foreach($attr as $a) {
    echo $a . ":" . $_SERVER[$a] . "<br>";
}