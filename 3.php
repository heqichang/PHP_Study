<div>3.php</div>

<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/16
 * Time: 上午9:59
 */
//class foo {
//    var $bar = 'I am bar.';
//    var $arr = array('A.', 'B.', 'C.');
//    var $r = 'I am r.';
//}
//
//$foo = new foo();
//$foo2 = $foo;
//$foo2->bar = 'changed';
//
//echo $foo->bar . "\n";
//echo 'abc';
//$variable = get_defined_constants();
//echo $variable . '<br>';

//function foofu() {
//    echo "foofu1 \n";
//}
//
//$foo3 = foofu;
//$foo3();

//$output = `ls -al`;
//echo "<pre>$output</pre>";

//declare(ticks=1);
//
//// A function called on each tick event
//function tick_handler()
//{
//    echo "tick_handler() called\n";
//}
//
//register_tick_function('tick_handler');
//
//$a = 1;
//
//if ($a > 0) {
//    $a += 2;
//    print($a);
//}
//
//include '4.php';
function counter() {
    $counter = 1;
    return function() use(&$counter) {return $counter ++;};
}
$counter1 = counter();
$counter2 = counter();
echo "counter1: " . $counter1() . "<br />/n";
echo "counter1: " . $counter1() . "<br />/n";
echo "counter1: " . $counter1() . "<br />/n";
echo "counter1: " . $counter1() . "<br />/n";
echo "counter2: " . $counter2() . "<br />/n";
echo "counter2: " . $counter2() . "<br />/n";
echo "counter2: " . $counter2() . "<br />/n";
echo "counter2: " . $counter2() . "<br />/n";
