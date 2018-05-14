<?php

// $token = "571961944:AAEy4eD_Nbu2l0B-u65tqQKkS2puWTm-Sic";
$token = getenv("BOTTOKEN");
$website = "https://api.telegram.org/bot{$token}";

$content = file_get_contents('php://input');

if(!$content)
	exit();

$update = json_decode($content, false); // mettendo false otterremo un oggetto php
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$username = $message->from->username;

error_log("message text {$text}: {$username}\n");

$url = $website."/sendMessage?chat_id={$chat_id}&text=".urlencode("Maire :)) - testo = {$text}");

$handle = curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_POST, true);
$response = curl_exec($handle);

error_log("risposta: {$response}");

?>