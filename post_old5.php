<?php

// 200 OK でSSL疎通できたが、DBが更新できない

// https://qiita.com/okdyy75/items/d21eb95f01b28f945cc6 PHP POST送信について
// API: DB_Ope_API

ini_set('display_errors', "On");

$url = 'https://localhost:44395/api/Members/';
//$url = 'http://localhost:63279/api/Members/';

$data = array(
    'Name' => 'Miyon',
    'Age' => '28',
    'HireDate' => '2018-06-28T00:00:00',
);

$data = json_encode($data); // JSONに変換

$context = array(
//    'http' => array(
    'ssl' => array(
        'method'  => 'POST',
//        'header'  => implode("\r\n", array('Content-Type: application/x-www-form-urlencoded',)),
//        'header'  => implode("\r\n", array('Content-Type: application/json',)),
        'header'  => 'Content-Type: application/json',
//        'content' => http_build_query($data),
        'content' => $data,
        'verify_peer' => false,
        'verify_peer_name' => false,
    )
);

$html = file_get_contents($url, false, stream_context_create($context));

var_dump($http_response_header);
//var_dump($context);
//echo $html;