<?php

use GuzzleHttp\Client;

require './vendor/autoload.php';

$client = new Client(
	[
		'base_uri' => 'https://fcm.googleapis.com',
		'timeout' => 10.0
	]
);

//Id do cara no banco de dados
$topic = "id_do_banco";


//Chave de servidor firebase
$key = 'shdahdadsadaosdjaksd';

//Para envio com token
$idToken = "caso_envie_para_token";

// //Somente id order
$title = 'Titulo da notificação';
$body = 'Descrição da notificacão';

// '{"notification": {"body": "this is a body","title": "this is a title"}, "priority": "high", 
// "data": {"click_action": "FLUTTER_NOTIFICATION_CLICK", "id": "1", "status": "done"}, "to": "<FCM TOKEN>"}'

$options = [
	'headers' => [
		'Content-Type' => 'application/json',
		'Authorization' => "key={$key}",
	],

	'body' => '{
			"notification":{
				"title":"'.$title.'",
				"body":"'.$body.'",
			},
			"data":{
				"type":"vai meu filho",
				"click_action": "FLUTTER_NOTIFICATION_CLICK"
			},
			"to": "/topics/'. $topic .'",
			"priority":"high",
			"restricted_package_name":""
		  }'



	//Android
	// 'body' => '{
	// 	"data":{
	// 		"title":"'.$title.'",
	// 		"body":"'.$body.'",
	// 		"sound":"sagaz_sound",
	// 		"click_action":"FCM_PLUGIN_ACTIVITY",
	// 		"icon":"fcm_push_icon",
	// 		"type":"communication",
	// 		"id":"'.$id.'"
	// 	},
	// 		"condition": "\''.$topic.'\' in topics && \'ANDROID\' in topics",
	// 		"priority":"high",
	// 		"restricted_package_name":""
	// 	}'


	//IOS
	// 'body' => '{
	// 	"notification":{
	// 		"title":"'.$title.'",
	// 		"body":"'.$body.'",
	// 		"sound":"default",
	// 		"click_action":"FCM_PLUGIN_ACTIVITY",
	// 		"icon":"fcm_push_icon"
	// 	},
	// 	"data":{
	// 		"type":"communication",
	// 		"id":"5b465b791412100006457c94"
	// 	},
	// 	  "condition": "\''.$topic.'\' in topics && \'ANDROID\' in topics",
	// 	  "priority":"high",
	// 	  "restricted_package_name":""
	//   }'
	//Android
	// 'body' => '{
	// 	"notification":{
	// 		"title":"'.$title.'",
	// 		"body":"'.$body.'",
	// 		"sound":"default",
	// 		"click_action":"FCM_PLUGIN_ACTIVITY",
	// 		"icon":"fcm_push_icon",
	// 		"type":"communication",
	// 		"id":"5b465b791412100006457c94",
	// 		"notId": '.$id.',
	// 		"badge": 1
	// 	},
	// 	  "to":"/topics/'.$topic.'",
	// 	  "priority":"high",
	// 	  "restricted_package_name":""
	//   }'
	// 'body' => '{
	// 	"notification":{
	// 	  "title":"'.$title.'",
	// 	  "body":"'.$body.'",
	// 	  "sound":"default",
	// 	  "click_action":"FCM_PLUGIN_ACTIVITY",
	// 	  "icon":"fcm_push_icon"
	// 	},
	// 	"data":{
	// 	  "type":"communication",
	// 	  "id":"5b465b791412100006457c94"
	// 	},
	// 	  "to":"/topics/'.$topic.'",
	// 	  "priority":"high",
	// 	  "restricted_package_name":""
	//   }'
];

$response = $client->request('POST', '/fcm/send', $options);

echo $response->getBody()->getContents();

exit;