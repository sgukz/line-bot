<?php
header("Content-type: application/json; charset=utf-8");
			$content_header = [
				"type" => "text" ,
				"text" => "ลงทะเบียน" ,
				"size" => "xl" ,
				"weight" => "bold"
			];
			$action_footer_1 = [
				"type" =>"uri" ,
				"label" =>"ยืนยันลงทะเบียน" ,
				"uri" => "https://line-bot-sg.herokuapp.com/register.php?regis="
			];
			$content_footer_1 = [
				"type" => "button" ,
				"margin" => "sm",
				"action" => $action_footer_1,
				"style" => "primary"
			];
			$content_body1 = [
				"type" => "text" ,
				"text" => "แจ้งเตือนเงินเดือนบุคคลากร" ,
				"align" => "start"
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
					 "url"=> "http://61.19.254.3/comcenter/logo-reh-new.jpg",
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
			
			
			
			//$url = 'https://api.line.me/v2/bot/message/push';
			$data = [
				'to' => "",
				'messages' => [$messages],
			];

			$post = json_encode($data);
			echo $post;

