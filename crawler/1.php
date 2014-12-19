<pre>
<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/19
 * Time: 下午5:02
 */

function parse_html($content) {
    $dom = new DOMDocument();
    $dom->loadHTML($content);
    $threadList = $dom->getElementById('threadlist');
    print_r($threadList);
    $threadStr = $threadList->nodeValue;
    echo $threadStr;
}

echo 'test';
$ch = curl_init();

$url = $_REQUEST['url'];

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$output = curl_exec($ch);
//ob_start();
//ob_end_clean();
//echo 'ok';
//echo $output;

$DOM = new DOMDocument();
$DOM->loadHTML($output);
$threadList = $DOM->getElementById('threadlist');
//print_r($threadList);
$threadStr = $threadList->nodeValue;

//echo htmlentities($threadStr);
//echo $threadStr;
//echo 'ok';
//parse_html($output);
?>
</pre>
