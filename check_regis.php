<?php
include('connect.php');
$idcard = $_POST['idcard'];
$fullname = $_POST['fullname'];
$userId = $_POST['userId'];
//echo "INSERT INTO tb_regis_line_bot(fullname, idcard, userId) VALUES('$fullname','$idcard','$userId')";
$INSERT = mysql_query("INSERT INTO tb_regis_line_bot(fullname, idcard, userId) VALUES('$fullname','$idcard','$userId')");
if($INSERT){
require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'bZ8IdBFdZtEBOjZd6cnKRPsa6ITaDM1xj8d+bf/qwTbB/1ynMLPCbPckz6zJ3Werqn1ddTRAkz++WPNQUy9wQG+rbhlCAFK4Gz0Iwch0uQ83ng1Byy5Ze5rHhQo3x0IylWNwFZgz3i+EqQPw4WGbZQdB04t89/1O/w1cDnyilFU=';

$content_header = [
    "type" => "text",
    "text" => "ลงทะเบียนเรียบร้อยแล้ว",
    "size" => "xs",
    "weight" => "bold",
    "color" => "#17c950"
];

$content_body1 = [
    "type" => "text",
    "text" => "ขอบคุณครับ",
    "align" => "center"
];

$messages = [
    "type" => "flex",
    "altText" => "ผลการลงทะเบียน",
    "contents" => [
        "type" => "bubble",
        "header" => [
            "type" => "box",
            "layout" => "vertical",
            "contents" => [$content_header]
        ],
        "body" => [
            "type" => "box",
            "layout" => "horizontal",
            "contents" => [$content_body1]
        ]
    ]
];
				// Make a POST Request to Messaging API to reply to sender
$url = 'https://api.line.me/v2/bot/message/push';
$data = [
    'to' => $userId,
    'messages' => [$messages],

];
$post = json_encode($data);
$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result . "\r\n";

echo "<script>window.location = 'register.php?regis=$userId';</script>";
}
