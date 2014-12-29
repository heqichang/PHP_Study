<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/23
 * Time: 上午9:55
 */

$file = __FILE__;
echo $file;

function getdirname($path = null) {
    if (!empty($path)) {
        if (strpos($path, '\\') !== false) {
            return substr($path, 0, strrpos($path, '\\')) . '/';
        } elseif (strpos($path, '/') !== false) {
            return substr($path, 0, strrpos($path, '/')) . '/';
        }
    }
    return './';
}

echo getdirname($file);