<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    public function sendMsg($user , $message , $options = [])
    {
        $url = env('BOT_API') . env('BOT_TOKEN') . '/sendMessage';
        $data = [
            'chat_id' => $user->telegram_id,
            'text' => $message,
        ];

        if($options !== false)
        {
            $data['reply_markup'] = $this->createKeyboard($options);
        }

        return Http::post($url , $data)->json();
    }

    public function createKeyboard($options)
    {
        if($options == [])
        {
            return ['remove_keyboard' => true];
        }

        $keyboard = [];

        foreach ($options as $option) {
            $data = [];

            foreach ($option as $value)
            {
                $data[] = ['text' => $value];
            }
            $keyboard[] = $data;
        }

        return [
            'keyboard' => $keyboard,
            'resize_keyboard' => true
        ];
    }

    public function audio($user)
    {
        $url = env('BOT_API') . env('BOT_TOKEN') . '/sendAudio';
        $data = [
            'chat_id' => $user->telegram_id,
            'audio' => 'https://dl.bir-music.com/1398/12/21/Daniyal%20(Dayan)%20-%20Khasteh%20Shodam/Daniyal%20(Dayan)%20-%20Khasteh%20Shodam.mp3',
            'title' => 'Dayan – Khasteh Shodam',
            'caption' => 'Dayan – Khasteh Shodam',
        ];
        return Http::post($url , $data)->json();
    }
}
