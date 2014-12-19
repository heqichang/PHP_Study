<pre>
<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/18
 * Time: 上午11:23
 */

if(isset($_SESSION)) {
    echo "no\n";
}

session_start();

if(isset($_SESSION)) {
    echo "yes\n";
}
?>
</pre>
