<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/15
 * Time: 下午9:08
 */
//$id = $_GET['id'];
//echo "$id<br>";
//echo "my first PHP script<br>";
//$foo1 = 1 + 'abc';
//echo "$foo1<br>";
//$foo1 = 'string123';
//echo "$foo1<br>";
//var_dump($foo1);
//echo $foo;

$count = 0;
function test() {
    global $count;

    $count++;
    echo "$count<br>";
    if($count < 10) {
        test();
    }
    echo "$count<br>";
    $count--;
}
test();

?>

