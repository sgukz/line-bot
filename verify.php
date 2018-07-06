<?php
$access_token = 'bZ8IdBFdZtEBOjZd6cnKRPsa6ITaDM1xj8d+bf/qwTbB/1ynMLPCbPckz6zJ3Werqn1ddTRAkz++WPNQUy9wQG+rbhlCAFK4Gz0Iwch0uQ83ng1Byy5Ze5rHhQo3x0IylWNwFZgz3i+EqQPw4WGbZQdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
