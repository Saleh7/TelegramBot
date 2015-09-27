## TelegramBot
 Class for Telegram APi in PHP

### Create a New Bot
1. Add [@BotFather](https://telegram.me/botfather) to start conversation.
2. Type `/newbot` and **@BotFather** will ask the name for your bot.
3. Choose a cool name, for example `The Nice Bot` and hit enter.
4. Now choose a username for your bot. It must end in *bot*, for example `NiceBot` or `Nice_Bot`.
5. If succeed, **@BotFather** will give you API key to be used in this library.

### Telegram Bot API
Telegram Bot API - [Introduction to Bots](https://core.telegram.org/bots).

Example usage Class TelegramBot
--------------
```php
require('TelegramBot.php');

$TokenAPI = 'Your Api Key Here';
$BotNow = new TelegramBot($TokenAPI);

// Send message to user.
$ChatId = "26038459"; // id Chat
$TextMsg = "Hello world";
$BotNow ->SendMessage($ChatId,$TextMsg); // Success!
```

## ClassTelegram.php Function List 

* `Request()`
* `RequestFile()`
* `GetUpdates()`
* `SetWebhook()`
* `getMe()`
* `SendMessage()`
* `ForwardMessage()`
* `SendPhoto()`
* `SendAudio()`
* `SendDocument()`
* `SendSticker()`
* `SendVideo()`
* `SendVoice()`
* `SendLocation()`
* `SendChatAction()`
* `GetUserPhotos()`
* `GetFile()`
