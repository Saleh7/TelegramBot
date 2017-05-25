<?php

require('TelegramBot.php');

$TokenAPI = 'Your Api Key Here';
$BotNow = new TelegramBot($TokenAPI);

// Send message to user.
$ChatId = "26038459"; // id Chat
$TextMsg = "Hello world";
$BotNow ->SendMessage($ChatId,$TextMsg); // Success!


?>
