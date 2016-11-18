<?php
$access_token = 'wO7nUoOyE8BELlgafQ6Ti3nPr0KnQjORDhdkZCWbhV2WHNzmwTzuSfIO/tMguldNz/eY0VZr2QCM6zuN2+UF3E3RRuKqhzpwwjwPORyStgZEC8cTDsSvjydPWTm/KcX0biyiVxnX3Noonla2vOnY7AdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;