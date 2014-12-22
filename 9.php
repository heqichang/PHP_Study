<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/21
 * Time: 下午11:36
 */
error_reporting(E_ALL);
$html  = '<h1 id="h1test" class="h1test">Heading</h1>';
$html .= '<p align="left" class="ptest">Hello World</p>';

$doc = new DOMDocument();
$doc->loadHTML($html);

// remove attributes from  the h1 element
$h1 = $doc->getElementsByTagName('h1')->item(0);

$classAttr = $h1->attributes->getNamedItem('class');
var_dump($classAttr);
echo $classAttr->nodeValue;
//$length = $h1->attributes->length;
//for ($i = 0; $i < $length; ++$i) {
//    echo "t<br>";
//    $name = $h1->attributes->item($i)->name;
////    $h1->removeAttribute($name);
//    echo "h1: removed attribute `$name`<br>";
//}
//// remove attributes from the p element
//$p = $doc->getElementsByTagName('p')->item(0);
//foreach ($p->attributes as $name => $attrNode) {
//    $p->removeAttribute($name);
//    echo "p: removed attribute `$name`<br>";
//}