<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/25
 * Time: 下午12:13
 */

//echo function_exists('iconv');
//
//echo 'zlib.output_compression:' . ini_get('zlib.output_compression');
//
//$a = 'abc';
//echo $a[1];


$abc = null;
echo intval($abc);
if(!0) {
    echo 't';
}

function console_log($data) {
    if(is_array($data) || is_object($data)) {
        echo "<script>console.log('".json_encode($data)."')</script>";
    } else {
        echo "<script>console.log('".$data."')</script>";
    }
}

