<?php
echo "I am a bot";

include 'bot-function.php';

$access_token = 'ts/ODdUyyx8b4V22zeXlZJFcwI5ujx+QH4lL+WOUH1zE/FFQWjsX/hz9ct7Z421y5qRuUYCUxM17fgFHO0coy/EKPuUPLJyqTaVtE0Xd/uR6YRlLFbvGBhNS9NE3Q2LkcKZTPstqbwkuL7hTjF5GGAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');

// Parse JSON
$events = json_decode($content, true);

//PROXY
//$proxy = 'velodrome.usefixie.com:80';
//$proxyauth = 'fixie:1sESv3OLyAM3Han';

// Validate parsed JSON data
if (!is_null($events['events'])) {
    // Loop through each event
    foreach ($events['events'] as $event) {
        // Reply only when message sent is in 'text' format
        if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
            // Get text sent
            $text = $event['message']['text'];
            // Get replyToken
            $replyToken = $event['replyToken'];

            // Build message to reply back
            $messages = [
                'type' => 'text',
                'text' => $text.', from editing branch'
            ];



            // Make a POST Request to Messaging API to reply to sender
            $url = 'https://api.line.me/v2/bot/message/reply';

            //reply
            $data = [
                'replyToken' => $replyToken,
                'messages' => [$messages],
            ];
            //reply to sth "light"
            if(strpos($text, 'light') !== false){
                $messages1 = [
                    'type' => 'text',
                    'text' => isLightOn()
                ];

                array_push($data['messages'], $messages1);
            }

            //reply to sth equation
//            if(isEquation()){
                $messages2 = [
                    'type' => 'text',
                    'text' => "Result from isEquation: ".isEquation()
                ];

                array_push($data['messages'], $messages2);
//            }

            $post = json_encode($data);
            $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
//            curl_setopt($ch, CURLOPT_PROXY, $proxy);
//            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);

            $result = curl_exec($ch);
            curl_close($ch);

            echo $result . "\r\n";
        }
    }
}
echo "OK";