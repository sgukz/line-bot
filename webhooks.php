<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'bZ8IdBFdZtEBOjZd6cnKRPsa6ITaDM1xj8d+bf/qwTbB/1ynMLPCbPckz6zJ3Werqn1ddTRAkz++WPNQUy9wQG+rbhlCAFK4Gz0Iwch0uQ83ng1Byy5Ze5rHhQo3x0IylWNwFZgz3i+EqQPw4WGbZQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			if($event['message']['text']=="ลงทะเบียน"){
				$text = $event['source']['userId'];
				// Get replyToken
				//$replyToken = $event['replyToken'];
				// Build message to reply back
				$content_header = [
					"type" => "text" ,
					"text" => "ลงทะเบียน" ,
					"size" => "xl" ,
					"weight" => "bold"
				];
				$action_footer_1 = [
					"type" =>"uri" ,
					"label" =>"ยืนยันลงทะเบียน" ,
					"uri" => "http://61.19.254.3/comcenter/line-bot/register.php?regis=$text"
				];
				$content_footer_1 = [
					"type" => "button" ,
					"margin" => "sm",
					"action" => $action_footer_1,
					"style" => "secondary"
				];
				$content_body1 = [
					"type" => "text" ,
					"text" => "แจ้งเตือนเงินเดือนบุคคลากร" ,
					"align" => "center"
				];
				/*$content_body2 = [
					"type" => "text" ,
					"text" => "โรงพยาบาลร้อยเอ็ด" ,
					"align" => "center"
				];*/
				$content_footer = [
					"type"=> "box",
					"layout"=> "horizontal",
					 "contents" => [$content_footer_1]
				];
				$messages = [
				"type" => "flex",
				"altText" => "ลงทะเบียน",
				"contents" => [
					"type" => "bubble",
					"header" => [
						"type" => "box" ,
						"layout" => "vertical" ,
						"contents" => [$content_header]
					],
					"hero" => [
						"type"=> "image",
						 "url"=> "https://www.img.in.th/images/4278202d996d315f755322e90a7f9ce5.jpg",
						 "size"=> "full",
						 "aspectRatio"=> "20:13",
						 "aspectMode"=> "cover"
					],
					"body" => [
						"type" => "box",
						"layout" => "horizontal",
						"contents" => [$content_body1]
					],
					"footer" => [
						"type" => "box",
						"layout" => "horizontal",
						"contents" => [$content_footer]
					]
				]
				];
				// Make a POST Request to Messaging API to reply to sender
				$url = 'https://api.line.me/v2/bot/message/push';
				$data = [
					'to' => $text,
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
			}
		}
	}
}
echo "OK";
