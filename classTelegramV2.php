<?php

class TelegramBotV2{
    /**
     * Token API telegram
     * @example https://core.telegram.org/bots/api
    */

    function __construct(){
    }

    /**
     * @example (sendMessage,array_Parameters)
    */
    protected function Request($Method, array $Parameters = []){
        //Code
    }

    /**
     * @param int|null   offset
     * @param int|null   limit
     * @param int|null   timeout
     * @link https://core.telegram.org/bots/api#getupdates
     * Use this method to receive incoming updates using long polling (wiki). An Array of Update objects is returned.
     * @return Update[]
    */
    public function getUpdates($offset = null, $limit = null, $timeout = null){
        $data['offset'] = $offset;
        $data['limit'] = $limit;
        $data['timeout'] = $timeout;
        return $this->Request("getUpdates", $data);
    }

    /**
     * @param String    url
     * @param string    certificate
     * @link https://core.telegram.org/bots/api#setwebhook
     * Use this method to specify a url and receive incoming updates via an outgoing webhook.
     * @return Response
    */
    public function setWebhook($url, $certificate = null){
        $data['url'] = $url;
        $data['certificate'] = $certificate;
        return $this->Request("setWebhook", $data);
    }

    /**
     * @link https://core.telegram.org/bots/api#getme
     * A simple method for testing your bot's auth token.
     * Returns basic information about the bot in form of a User object.
     * @return User
    */
    public function getMe(){
        return $this->Request('getMe');
    }

    /**
     * @param int|String  chat_id
     * @param string      text
     * @param string   	  parse_mode
     * @param bool        disable_web_page_preview
     * @param bool  	  disable_notification
     * @param int         reply_to_message_id
     * @param string      reply_markup
     * @link https://core.telegram.org/bots/api#sendmessage
     * Use this method to send text messages. On success, the sent Message is returned.
     * @return Message
     */
    public function sendMessage($chat_id, $text, $mode = null, $web_page =true, $notification =false, $reply_message = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["text"]= $text;
        $data["parse_mode"] = $mode;
        $data["disable_web_page_preview"] = $web_page;
        $data["disable_notification"] = $notification;
        $data["reply_to_message_id"] = $reply_message;
        $data["reply_markup"] = $reply_markup;
        return $this->Request("sendMessage", $data);
    }

    /**
     * @param int|String  chat_id
     * @param int         from_chat_id
     * @param bool     	  disable_notification
     * @param bool        message_id
     * @link https://core.telegram.org/bots/api#forwardmessage
     * Use this method to send text messages. On success, the sent Message is returned.
     *
     * @return Message
    */
    public function forwardMessage($chat_id, $from_chat_id, $notification =false, $message_id){
        $data["chat_id"] = $chat_id;
        $data["from_chat_id"] = $from_chat_id;
        $data["disable_notification"] = $notification;
        $data["message_id"] = $message_id;
        return $this->Request("forwardMessage", $data);
    }

    /**
     * @param int|String  chat_id
     * @param string      photo
     * @param string   	  caption
     * @param bool  	  disable_notification
     * @param int         reply_to_message_id
     * @param string      reply_markup
     * @link https://core.telegram.org/bots/api#sendphoto
     * Use this method to send photos. On success, the sent Message is returned.
     * @return Message
    */
    public function sendPhoto($chat_id, $photo, $caption = null, $notification =false, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["photo"]= $photo;
        $data["caption"] = $caption;
        $data["disable_notification"] = $notification;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->Request("sendPhoto", $data);
    }

    /**
     * @param int|String  chat_id
     * @param string      audio
     * @param int         duration
     * @param string      performer
     * @param string      title
     * @param bool  	  disable_notification
     * @param int         reply_to_message_id
     * @param string      reply_markup
     * @link https://core.telegram.org/bots/api#sendaudio
     * can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
     * @return Message
    */
    public function sendAudio($chat_id, $audio, $duration = null, $performer = null, $title = null, $notification =false, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["audio"]= $audio;
        $data["duration"] = $duration;
        $data["performer"] = $performer;
        $data["title"] = $title;
        $data["disable_notification"] = $notification;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->RequestFile("sendAudio", $data);
    }

    /**
     * @param int|String  chat_id
     * @param string      document
     * @param string      caption
     * @param bool  	  disable_notification
     * @param int         reply_to_message_id
     * @param string      reply_markup
     * @link https://core.telegram.org/bots/api#senddocument
     * can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
     * @return Message
    */
    public function sendDocument($chat_id, $document, $caption = null, $notification =false, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["document"]= $document;
        $data["caption"]= $caption;
        $data["disable_notification"] = $notification;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->RequestFile("sendDocument", $data);
    }

    /**
     * @param int|String  chat_id
     * @param string      sticker
     * @param bool  	  disable_notification
     * @param int         reply_to_message_id
     * @param string      reply_markup
     * @link https://core.telegram.org/bots/api#sendsticker
     * Use this method to send .webp stickers. On success, the sent Message is returned.
     * @return Message
    */
    public function sendSticker($chat_id, $sticker, $notification =false, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["sticker"]= $sticker;
        $data["disable_notification"] = $notification;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->RequestFile("sendSticker", $data);
    }

    /**
     * @param int|String  chat_id
     * @param string      video
     * @param int     	  duration
     * @param int     	  width
     * @param int     	  height
     * @param string      caption
     * @param bool  	  disable_notification
     * @param int         reply_to_message_id
     * @param string      reply_markup
     * @link https://core.telegram.org/bots/api#sendvideo
     * can currently send video files of up to 50 MB in size, this limit may be changed in the future.
     * @return Message
    */
    public function sendVideo($chat_id, $video, $duration = null, $width =null, $height = mull, $caption = null, $notification =false, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["video"]= $video;
        $data["duration"] = $duration;
        $data["width"] = $width;
        $data["height"] = $height;
        $data["caption"] = $caption;
        $data["disable_notification"] = $notification;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->RequestFile("sendVideo", $data);
    }

    /**
     * @param int|String  chat_id
     * @param string      voice
     * @param int     	  duration
     * @param bool  	  disable_notification
     * @param int         reply_to_message_id
     * @param string      reply_markup
     * @link https://core.telegram.org/bots/api#sendvoice
     * can currently send voice files of up to 50 MB in size, this limit may be changed in the future.
     * @return Message
    */
    public function sendVoice($chat_id, $voice, $duration = null, $notification =false, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["voice"]= $voice;
        $data["duration"] = $duration;
        $data["disable_notification"] = $notification;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->RequestFile("sendVoice", $data);
    }

    /**
     * @param int|String  chat_id
     * @param float       latitude
     * @param float       longitude
     * @param bool  	  disable_notification
     * @param int         reply_to_message_id
     * @param string      reply_markup
     * @link https://core.telegram.org/bots/api#sendlocation
     * Use this method to send point on the map. On success, the sent Message is returned.
     * @return Message
    */
    public function sendLocation($chat_id, $latitude, $longitude, $notification =false, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["latitude"]= $latitude;
        $data["longitude"] = $longitude;
        $data["disable_notification"] = $notification;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->Request("sendLocation", $data);
    }

    /**
     * @param int|String  chat_id
     * @param float       latitude
     * @param float       longitude
     * @param string      title
     * @param string      address
     * @param string      foursquare_id
     * @param bool  	  disable_notification
     * @param int         reply_to_message_id
     * @param string      reply_markup
     * @link https://core.telegram.org/bots/api#sendvenue
     * Use this method to send information about a venue. On success, the sent Message is returned.
     * @return Message
    */
    public function sendVenue($chat_id, $latitude, $longitude, $title, $address, $foursquare =null, $notification =false, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["latitude"]= $latitude;
        $data["longitude"] = $longitude;
        $data["title"] = $title;
        $data["address"] = $address;
        $data["foursquare_id"] = $foursquare;
        $data["disable_notification"] = $notification;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->Request("sendVenue", $data);
    }

    /**
     * @param int|String  chat_id
     * @param string      phone_number
     * @param string      first_name
     * @param string      last_name
     * @param bool  	  disable_notification
     * @param int         reply_to_message_id
     * @param string      reply_markup
     * @link https://core.telegram.org/bots/api#sendcontact
     * Use this method to send phone contacts. On success, the sent Message is returned.
     * @return Message
    */
    public function sendContact($chat_id, $phone_number, $first_name, $last_name =null, $notification =false, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["phone_number"]= $phone_number;
        $data["first_name"] = $first_name;
        $data["last_name"] = $last_name;
        $data["disable_notification"] = $notification;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->Request("sendContact", $data);
    }

    /**
     * @param int|String  chat_id
     * @param string      action
     * @link https://core.telegram.org/bots/api#sendchataction
     * Use this method when you need to tell the user that something is happening on the bot's side.
     * @return Response
    */
    public function sendChatAction($chat_id, $action){
        $data["chat_id"]= $chat_id;
        $data["action"]= $action; // typing,upload_photo,record_video,upload_video,record_audio,upload_audio,upload_document,find_location
        return $this->Request("sendChatAction", $data);
    }

    /**
     * @param int   user_id
     * @param int   offset
     * @param int   limit
     * @link https://core.telegram.org/bots/api#getuserprofilephotos
     * Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
     * @return User Profile Photos
    */
    public function getUserProfilePhotos($user_id, $offset = null, $limit = null){
        $data["user_id"]= $user_id;
        $data['offset'] = $offset;
        $data['limit'] = $limit;
        return $this->Request("getUserProfilePhotos", $data);
    }

    /**
     * @param int   chat_id
     * @param int   user_id
     * @link https://core.telegram.org/bots/api#kickchatmember
     * Use this method to kick a user from a group or a supergroup.
     * @return Response
    */
    public function kickChatMember($chat_id, $user_id){
        $data["chat_id"]= $chat_id;
        $data["user_id"]= $user_id;
        return $this->Request("kickChatMember", $data);
    }

    /**
     * @param int   chat_id
     * @param int   user_id
     * @link https://core.telegram.org/bots/api#unbanchatmember
     * Use this method to unban a previously kicked user in a supergroup.
     * @return Response
    */
    public function unbanChatMember($chat_id, $user_id){
        $data["chat_id"]= $chat_id;
        $data["user_id"]= $user_id;
        return $this->Request("unbanChatMember", $data);
    }

    /**
     * @param String   callback_query_id
     * @param String   text
     * @param bool     show_alert
     * @link https://core.telegram.org/bots/api#answercallbackquery
     * Use this method to send answers to callback queries sent from inline keyboards.
     * @return Response
    */
    public function answerCallbackQuery($callback, $text =null, $alert =false){
        $data["callback_query_id"]= $callback;
        $data["text"]= $text;
        $data["show_alert"]= $alert;
        return $this->Request("answerCallbackQuery", $data);
    }

    /**
     * @param int|String  chat_id
     * @param int         message_id
     * @param string      inline_message_id
     * @param string      text
     * @param string  	  parse_mode
     * @param bool  	  disable_web_page_preview
     * @param string      reply_markup
     * @link https://core.telegram.org/bots/api#editmessagetext
     * Use this method to edit text messages sent by the bot or via the bot (for inline bots).
     * @return Response
    */
    public function editMessageText($chat_id, $message_id, $inline_message, $text, $mode = null, $web_page =true, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["message_id"]= $message_id;
        $data["inline_message_id"] = $inline_message;
        $data["text"] = $text;
        $data["parse_mode"] = $mode;
        $data["disable_web_page_preview"] = $web_page;
        $data["reply_markup"] = $reply_markup;
        return $this->Request("editMessageText", $data);
     }

    /**
     * @param int|String  chat_id
     * @param int         message_id
     * @param string      inline_message_id
     * @param string      caption
     * @param string      reply_markup
     * @link https://core.telegram.org/bots/api#editmessagecaption
     * Use this method to edit captions of messages sent by the bot or via the bot (for inline bots).
     * @return Response
    */
    public function editMessageCaption($chat_id, $message_id, $inline_message, $caption = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["message_id"]= $message_id;
        $data["inline_message_id"] = $inline_message;
        $data["caption"] = $caption;
        $data["reply_markup"] = $reply_markup;
        return $this->Request("editMessageCaption", $data);
    }

    /**
     * @param int|String  chat_id
     * @param int         message_id
     * @param string      inline_message_id
     * @param string      reply_markup
     * @link https://core.telegram.org/bots/api#editmessagereplymarkup
     * Use this method to edit only the reply markup of messages sent by the bot or via the bot (for inline bots).
     * @return Response
    */
    public function editMessageReplyMarkup($chat_id, $message_id, $inline_message, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["message_id"]= $message_id;
        $data["inline_message_id"] = $inline_message;
        $data["reply_markup"] = $reply_markup;
        return $this->Request("editMessageReplyMarkup", $data);
    }

    /**
     * @param String  file_id
     * @link https://core.telegram.org/bots/api#getfile
     * Use this method to get basic info about a file and prepare it for downloading..
     * @return File
    */
    public function getFile($file_id){
        $data["file_id"]= $file_id;
        return $this->Request("getFile", $data);
    }


?>
