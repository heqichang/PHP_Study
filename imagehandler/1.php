<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/22
 * Time: 下午4:27
 */

//echo function_exists(imagecreate);

//echo GD_VERSION;
error_reporting(E_ALL);
header("Content-type: image/jpeg");
$im = @imagecreate(1000, 500)
or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 235, 246, 255);
$text_color = imagecolorallocate($im, 57, 84, 37);


$text = '中文测试...';
//$font = '/Library/Fonts/Kaiti.ttc';
$font = '苏新诗毛糙体简.ttf';
//imagestring($im, 1, 100, 100, 'test', $text_color);
imagettftext($im, 50, 0, 110, 151, $text_color, $font, $text);

imagejpeg($im);
imagedestroy($im);

