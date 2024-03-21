<?php

namespace App\Services;

use App\Facades\Search;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Modules\Keyboard\Enums\KeyboardTypeEnum;
use Modules\Keyboard\Http\Controllers\KeyboardController;
use Modules\Keyboard\Models\Keyboard;
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
            $data['reply_markup'] = $this->createKeyboard($options);
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

    public function sendSearchResult(User $user , $result , $text)
    {
        $url = env('BOT_API') . env('BOT_TOKEN') . '/sendMessage';

        $keyboard = new KeyboardController();

        $response = Http::post($url , [
            'chat_id' => $user->telegram_id,
            'text' => "انتخاب کنید",
            'reply_markup' => $keyboard->createSearchResultKeyboard($result)
        ]);

        $keyboard->createKeyboardDb(
            $response->json()["result"]["message_id"],
            $user,
            KeyboardTypeEnum::SearchResult->value,
            ["message" => $text],
        );

        return $response->json();
    }

    public function sendAudio(User $user , Song $song)
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

        $response = Http::post($url , $data);
        return $response;
    }

    public function answerCallBackQuery(User $user , $callBackQueryId , $message , $alert = false)
    {
        $url = env('BOT_API') . env('BOT_TOKEN') . '/answerCallbackQuery';
        $data = [
            'callback_query_id' => $callBackQueryId,
            'text' => $message,
            'show_alert' => $alert,
        ];

        return Http::post($url , $data);
    }

    public function editInlineMessage(User $user , $message_id , $message)
    {

        $url = env('BOT_API') . env('BOT_TOKEN') . '/editMessageText';

        $keyboardControll = new KeyboardController();
        $keyboard = Keyboard::where("user_id" , $user->id)->where("message_id" , $message_id)->first();

        $response = Http::post($url , [
            'chat_id' => $user->telegram_id,
            'message_id' => $message_id,
            'text' => "انتخاب کنید",
            'reply_markup' => $keyboardControll->createSearchResultKeyboard(Search::search(json_decode($keyboard->data , true)['message']) , $message["page"])
        ]);


        return $response->json();
    }

    public function deleteMessages(User $user , $message_id)
    {
        $url = env('BOT_API') . env('BOT_TOKEN') . '/deleteMessages';

        $response = Http::post($url , [
            'chat_id' => $user->telegram_id,
            'message_ids' => [$message_id],
        ]);

        if ($response->successful())
            Keyboard::where("user_id" , $user->id)->where("message_id" , $message_id)->first()->delete();

        return $response->json();
    }
}
