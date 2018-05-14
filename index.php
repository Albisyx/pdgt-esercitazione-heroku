<?php

$token = "571961944:AAEy4eD_Nbu2l0B-u65tqQKkS2puWTm-Sic";
$website = "https://api.telegram.org/bot".$token;

$content = file_get_contents('php://input');

if(!$content)
	exit();

$update = json_decode($content, false); // mettendo false otterremo un oggetto php
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$username = $message->from->username;

echo $text;

error_log("message text {$text}: {$username}\n");

?>