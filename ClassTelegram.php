<?php 

class TelegramBot{
    /**
     * Token API telegram
     * @example https://core.telegram.org/bots/api
     */ 
    private $TokenAPI;
    const API_URL = 'https://api.telegram.org/';
    
    function __construct($TokenAPI){
        $this->TokenApi = $TokenAPI; 
    }

    /**
     * @example (getMe,array_Parameters)
     */
    protected function Request($Method, array $Parameters = []){
        //Code
    }

    /**
     * @example (getMe,array_Parameters)
     */
    protected function RequestFile($Method, array $Parameters = []){
        //Code
    }

    /**
     * @param integer|null offset
     * @param integer|null limit | Defaults to 100
     * @param integer|null timeout
     * @telegram https://core.telegram.org/bots/api#getupdates
     */
    public function GetUpdates($offset = null, $limit = null, $timeout = null)
    {
        $data['offset'] = $offset;
        $data['limit'] = $limit;
        $data['timeout'] = $timeout;
        return $this->Request("getUpdates", $data);
    }
    /**
     * @param string    url
     * @param InputFile certificate
     * @telegram https://core.telegram.org/bots/api#setwebhook
     */
    public function SetWebhook($url = null, $certificate = null)
    {
        $data['url'] = $url;
        $data['certificate'] = $certificate;
        return $this->Request("setWebhook", $data);
    }
    /**
     * @param string getMe
     *  A simple method for testing your bot's auth token.
     *  Requires no parameters. Returns basic information about the bot in form of a User object.
     * @telegram https://core.telegram.org/bots/api#getme
     */
        public function getMe(){
        return $this->Request('getMe');
    }
    /**
     * @param integer  chat_id
     * @param string   text
     * @param string   parse_mode | true,false
     * @param boolean  disable_web_page_preview | true,false
     * @param integer|null  reply_to_message_id
     * @param integer|null  reply_markup
     * @telegram https://core.telegram.org/bots/api#sendmessage
     * Optional. For text messages, the actual UTF-8 text of the message
     */
    public function SendMessage($chat_id, $text, $parse_mode = null, $disable_web_page_preview =true, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["text"]= $text;
        $data["parse_mode"] = $parse_mode;
        $data["disable_web_page_preview"] = $disable_web_page_preview;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->Request("sendMessage", $data);
    }
    /**
     * @param integer chat_id
     * @param integer from_chat_id
     * @param integer message_id
     * @tutorial https://core.telegram.org/bots/api#forwardmessage
     */
    public function ForwardMessage($chat_id, $from_chat_id, $message_id){
        $data["chat_id"] = $chat_id;
        $data["from_chat_id"] = $from_chat_id;
        $data["message_id"] = $message_id;
        
        return $this->Request("forwardMessage", $data);
    }
    /**
     * @param integer      chat_id
     * @param string       photo | or InputFile
     * @param string|null  caption 
     * @param integer|null reply_to_message_id
     * @param integer|null  reply_markup
     * @telegram https://core.telegram.org/bots/api#sendphoto
     * Use this method to send photos. On success, the sent Message is returned.
     */
    public function SendPhoto($chat_id, $photo, $caption = null, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["photo"]= $photo;
        $data["caption"] = $caption;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->Request("sendPhoto", $data);
    }
    /**
     * @param integer      chat_id
     * @param string       audio | or InputFile
     * @param integer|null duration 
     * @param string|null  performer
     * @param string|null  title
     * @param integer|null reply_to_message_id
     * @param null         reply_markup
     * @telegram https://core.telegram.org/bots/api#sendaudio
     * can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
     */
    public function SendAudio($chat_id, $audio, $duration = null, $performer = null, $title = null, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["audio"]= $audio;
        $data["duration"] = $duration;
        $data["performer"] = $performer;
        $data["title"] = $title;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->RequestFile("sendAudio", $data);
    }
   /**
     * @param integer      chat_id
     * @param string       document | or InputFile
     * @param integer|null reply_to_message_id
     * @param null         reply_markup
     * @telegram https://core.telegram.org/bots/api#senddocument
     * can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
     */
    public function SendDocument($chat_id, $document, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["document"]= $document;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->RequestFile("sendDocument", $data);
    }
    /**
     * @param integer      chat_id
     * @param string       sticker | or InputFile
     * @param integer|null reply_to_message_id
     * @param null         reply_markup
     * @telegram https://core.telegram.org/bots/api#sendsticker
     * Use this method to send .webp stickers. On success, the sent Message is returned.
     */
    public function SendSticker($chat_id, $sticker, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["sticker"]= $sticker;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->RequestFile("sendSticker", $data);
    }
    /**
     * @param integer      chat_id
     * @param string       video | or InputFile
     * @param integer|null duration 
     * @param string|null  caption
     * @param integer|null reply_to_message_id
     * @param null         reply_markup
     * @telegram https://core.telegram.org/bots/api#sendvideo
     * can currently send video files of up to 50 MB in size, this limit may be changed in the future.
     */
    public function SendVideo($chat_id, $video, $duration = null, $caption = null, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["video"]= $video;
        $data["duration"] = $duration;
        $data["caption"] = $caption;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->RequestFile("sendVideo", $data);
    }
    /**
     * @param integer      chat_id
     * @param string       voice | or InputFile
     * @param integer|null duration 
     * @param string|null  caption
     * @param integer|null reply_to_message_id
     * @param null         reply_markup
     * @telegram https://core.telegram.org/bots/api#sendvoice
     * can currently send voice files of up to 50 MB in size, this limit may be changed in the future.
     */
    public function SendVoice($chat_id, $voice, $duration = null, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["voice"]= $voice;
        $data["duration"] = $duration;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->RequestFile("sendVoice", $data);
    }
    /**
     * @param integer      chat_id
     * @param Float number latitude
     * @param Float number longitude
     * @param integer|null reply_to_message_id
     * @param null         reply_markup
     * @telegram https://core.telegram.org/bots/api#sendlocation
     * Use this method to send point on the map. On success, the sent Message is returned.
     */
    public function SendLocation($chat_id, $latitude, $longitude, $reply_to_message_id = null, $reply_markup = null){
        $data["chat_id"]= $chat_id;
        $data["latitude"]= $latitude;
        $data["longitude"] = $longitude;
        $data["reply_to_message_id"] = $reply_to_message_id;
        $data["reply_markup"] = $reply_markup;
        return $this->Request("sendLocation", $data);
    }
    /**
     * @param integer      chat_id
     * @param string       action
     * @telegram https://core.telegram.org/bots/api#sendchataction
     * Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less
     */
    public function SendChatAction($chat_id, $action){
        $data["chat_id"]= $chat_id;
        $data["action"]= $action;
        return $this->Request("sendChatAction", $data);
    }
    /**
     * @param integer      chat_id
     * @param integer      offset
     * @param integer      limit
     * @telegram https://core.telegram.org/bots/api#getuserprofilephotos
     * Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less
     */
    public function GetUserPhotos($chat_id, $offset = null, $limit = null){
        $data["chat_id"]= $chat_id;
        $data['offset'] = $offset;
        $data['limit'] = $limit;
        return $this->Request("getUserProfilePhotos", $data);
    }
    /**
     * @param integer      chat_id
     * @param integer      offset
     * @param integer      limit
     * @telegram https://core.telegram.org/bots/api#getfile
     * Use this method to get basic info about a file and prepare it for downloading.
     * https://api.telegram.org/file/bot<token>/<file_path>
     */
    public function GetFile($file_id){
        $data["file_id"]= $file_id;
        return $this->Request("getFile", $data);
    }


?>
