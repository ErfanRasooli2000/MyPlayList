<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Modules\Song\Models\Song;

class TelegramService
{
    protected $url;
    public function __construct()
    {
        $this->url = env('BOT_API') . env('BOT_TOKEN') . "/";
    }
    public function sendMsg($user , $message , $keyboard = null)
    {
        $url = $this->url . 'sendMessage';
        $data = [
            'chat_id' => $user->telegram_id,
            'text' => $message,
            'reply_markup' => $keyboard ?? ""
        ];

        return Http::post($url , $data);
    }

    public function sendAudio(User $user , Song $song)
    {
        $url = $this->url . 'sendAudio';
        $data = [
            'chat_id' => $user->telegram_id,
            'audio' => $song->file_id ?? $song->url->url,
            'title' => $song->name_en,
            'caption' => $song->name_en,
        ];

        return Http::post($url , $data);
    }

    public function answerCallBackQuery(User $user , $callBackQueryId , $message , $alert = false)
    {
        $url = $this->url . 'answerCallbackQuery';
        $data = [
            'callback_query_id' => $callBackQueryId,
            'text' => $message,
            'show_alert' => $alert,
        ];

        return Http::post($url , $data);
    }

    public function editInlineMessage(User $user , $message_id , $text , $keyboard)
    {
        $url = $this->url . 'editMessageText';

        $response = Http::post($url , [
            'chat_id' => $user->telegram_id,
            'message_id' => $message_id,
            'text' => $text,
            'reply_markup' => $keyboard
        ]);

        return $response->json();
    }

    public function deleteMessages(User $user , $message_id)
    {
        $url = $this->url . 'deleteMessages';

        return Http::post($url , [
            'chat_id' => $user->telegram_id,
            'message_ids' => [$message_id],
        ]);

    }
}
