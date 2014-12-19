<div>4.php</div>
<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/16
 * Time: 上午11:53
 */

class SubObject
{
    static $instances = 0;
    public $instance;

    public function __construct() {
        $this->instance = ++self::$instances;
    }

    public function __clone() {
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{
    public $object1;
    public $object2;

    function __clone()
    {

        // 强制复制一份this->object， 否则仍然指向同一个对象
        $this->object1 = clone $this->object1;
    }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;


print("Original Object:\n");
print_r($obj);

print("Cloned Object:\n");
print_r($obj2);


print_r($obj);

$obj2->object1->instance = 4;
$obj2->object2->instance = 5;
print_r($obj);


