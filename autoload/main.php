<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/29
 * Time: 上午10:17
 */

function autoload($classname) {
    if(strpos($classname, '_') !== false) {
        list($folder) = explode('_', $classname);
        $file = 'class/' . $folder . '/' . $classname;
    } else {
        $file = 'class/' . $classname;
    }

    include_once $file . '.php';
    return true;
}


spl_autoload_register('autoload');

$c = new core();
$c->print_info();
core::print_info_s();

$p = new model_person();
$p->print_info();
model_person::print_info_s();
