<head>
    <meta charset="UTF-8">
</head>
<pre>
<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/19
 * Time: 下午5:02
 */

require_once 'simple_html_dom.php';

error_reporting(E_ALL);
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

//$output = mb_convert_encoding($output, "utf-8", "gb2312");
//$output = preg_replace('/charset=gb2312/', '/charset=utf-8/', $output);
//$output = preg_replace('/<style>.*?<\/style>/','/ /', $output);
//$fp = fopen('html1', 'w');
//fwrite($fp, $output);
//ob_start();
//ob_end_clean();
//echo 'ok';
//echo $output;

$DOM = new DOMDocument();
//$DOM->recover = true;
//$DOM->strictErrorChecking = false;
//$DOM->validateOnParse = true;
$DOM->loadHTML($output);
//var_dump($DOM);
//$threadList = $DOM->getElementById('threadlist');
$title_array = array();
$subjectList = $DOM->getElementsByTagName('td');
var_dump($subjectList);
foreach($subjectList as $subject) {
    //var_dump($subject);
    $className = $subject->attributes->getNamedItem('class');
    if($className->nodeValue === 'subject') {
        array_unshift($title_array, $subject->textContent);
    }
}
foreach($title_array as $title_one) {
    echo "$title_one\n";
}

//var_dump($threadList);
////print_r($threadList);
//$threadStr = $DOM->saveXML($threadList);
//print_r($threadStr);
$title_regex = '/<u.*?>(.+?)<\/u>/';
//echo htmlentities($threadStr);
//preg_match_all($title_regex, $threadStr, $matches, PREG_SET_ORDER);

//foreach($matches as $val) {
//    echo 'title : ' . $val[1] . "\n";
//}

//echo htmlentities($threadStr);
//echo $threadStr;
//echo 'ok';
//parse_html($output);
?>
</pre>
