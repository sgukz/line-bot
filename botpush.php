<?php



require "vendor/autoload.php";

$access_token = 'bZ8IdBFdZtEBOjZd6cnKRPsa6ITaDM1xj8d+bf/qwTbB/1ynMLPCbPckz6zJ3Werqn1ddTRAkz++WPNQUy9wQG+rbhlCAFK4Gz0Iwch0uQ83ng1Byy5Ze5rHhQo3x0IylWNwFZgz3i+EqQPw4WGbZQdB04t89/1O/w1cDnyilFU=';

$channelSecret = '381d768bb73e7aaae70edc688ef7949d';

$pushID = 'U0ce66a9d268b3f1d81d04b30631acc87';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







