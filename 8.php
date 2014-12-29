<pre>
<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/19
 * Time: 下午4:32
 */

//$s1 = '<a>abc';
//$p1 = '/<a>/';
//$c1 = preg_match($p1, $s1, $m1);
//echo $c1;
//
//$url = '<u>一场北海本土歌手原创音乐歌会募得用于支教乡村学生音乐的善款7万多元（海量图+视频）</u>';
/*$pattern = '/<u.*?>(.+?)<\/u>/'; */


//$count = preg_match($pattern, $url, $matches);
//echo $count;

//var_dump($GLOBALS);
//
//$GLOBALS += 'abc';
//var_dump($GLOBALS);

//$a = array('one');
//$a[] = & $a;
//
//xdebug_debug_zval('a');
//unset($a[1]);
//xdebug_debug_zval('a');

class a {

    public $b;

    function __construct() {
        echo "a\n";
        $this->b = 0;
    }

    function get_a() {
        echo "$this->b\n";
    }

    function __clone() {
        $this->b++;
    }
}

$x = new a();
$y = new a();
$x = clone $y;
$x->get_a();
$y->get_a();
$y->b = 2;
$x->get_a();
$y->get_a();
?>
</pre>