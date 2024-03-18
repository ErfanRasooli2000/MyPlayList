<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Modules\Song\Models\Song;

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
            $data['reply_markup'] = $this->createInlineKeyboard($options);
        }

        $respone = Http::post($url , $data)->json();
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

    public function createInlineKeyboard()
    {
        return [
            'inline_keyboard' => [
                [
                    ['text' => 'test','callback_data' => 'بمون'],
                    ['text' => 'test3' , 'callback_data' => '2']
                ],
                [
                    ['text' => 'test2','callback_data' => '3'],
                    ['text' => 'test4' , 'callback_data' => '4']
                ],
            ],
            'resize_keyboard' => true
        ];
    }

    public function audio(User $user , Song $song)
    {
        $response = $this->sendSongToUser($user,$song);

        if ($response->successful())
        {
            if (is_null($song->file_id))
                $song->update([
                    "file_id" => $response->json()["result"]["audio"]["file_id"]
                ]);
        }
        else
        {
            if($response->json()["error_code"] == 400)
            {
                $song->update([
                    "file_id" => null
                ]);

                $this->sendSongToUser($user,$song);
            }
        }
    }

    private function sendSongToUser(User $user , Song $song)
    {
        $url = env('BOT_API') . env('BOT_TOKEN') . '/sendAudio';
        $data = [
            'chat_id' => $user->telegram_id,
            'audio' => $song->file_id ?? $song->url->url,
            'title' => $song->name_en,
            'caption' => $song->name_en,
        ];

        return Http::post($url , $data);
    }
}
