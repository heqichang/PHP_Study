<head>
    <meta charset="UTF-8">
</head>

<?php
/**
 * Created by PhpStorm.
 * User: heqichang
 * Date: 14/12/22
 * Time: 上午9:20
 */

require_once 'simple_html_dom.php';

$url = $_REQUEST['url'];

$html = file_get_html($url);

foreach($html->find('td') as $ele) {
    echo $ele;
}