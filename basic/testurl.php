<?php
$url = 'https://www.php.net/releases/8.2/en.php';
$url = parse_url($url); // 
echo '<pre>';
var_dump($url); die();
echo '</pre>';

echo 'scheme : ' . $url['scheme'] . '<br>';
echo 'host : ' .$url['host'] . '<br>';
// echo 'port :' . $url['port'] . '<br>';
// echo 'user :' . $url['user'] . '<br>';
// echo 'pass :' . $url['pass'] . '<br>';
echo 'path :' . $url['path'] . '<br>';
?>