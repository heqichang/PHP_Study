<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/17
 * Time: 上午9:13
 */

$a = 1;
$b = &$a;
$a = 2;
unset($a);
print_r($a);
print_r($b);
$b = 3;
print_r($a);
print_r($b);