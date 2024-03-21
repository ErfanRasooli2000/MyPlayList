<?php

namespace Modules\Keyboard\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Modules\Keyboard\Enums\CallBackTypeEnum;
use Modules\Keyboard\Models\Keyboard;

class KeyboardController extends Controller
{
    public function createSearchResultKeyboard($result , $current = 1)
    {
        $keyboard = [];

        $musics = $result->skip(($current-1)*5)->take(5);
        foreach ($musics as $item)
        {
            $keyboard[] = [
                [
                    "text" => "     " . $item->artists->first()->name_en . " - " .$item->name_en . "     ",
                    "callback_data" => json_encode([
                        "music_id" => $item->id,
                        "type" => CallBackTypeEnum::SendMusic->value
                    ])
                ]
            ];
        }

        if ($pagination = $this->createPagination($current , count($result)))
            $keyboard[] = $pagination;

        return [
            'inline_keyboard' => $keyboard,
            'resize_keyboard' => true
        ];
    }

    private function createPagination($current , $count)
    {
        if ($count <= 5)
            return null;

        $pageCount = $count%5 == 0 ? $count/5 : ($count - $count % 5)/ 5 + 1;

        return [
            [
                "text" => "   ⏮   ",
                "callback_data" => json_encode([
                    "type" => CallBackTypeEnum::ChangePage->value,
                    "page" => $current == 1 ? 1 : $current - 1
                ]),
            ],
            [
                "text" => "   ".$current."/".$pageCount."   ",
                "callback_data" => json_encode([
                    "type" => CallBackTypeEnum::NoAction->value,
                ]),
            ],
            [
                "text" => "   Close   ",
                "callback_data" => json_encode([
                    "type" => CallBackTypeEnum::CloseKeyboard->value,
                ]),
            ],
            [
                "text" => "   ⏭   ",
                "callback_data" => json_encode([
                    "type" => CallBackTypeEnum::ChangePage->value,
                    "page" => min($current + 1, $pageCount)
                ]),
            ],
        ];
    }

    public function createKeyboardDb($message_id , $user , $type , $data)
    {
        Keyboard::create([
            'user_id' => $user->id,
            'message_id' => $message_id,
            'type' => $type,
            'data' => json_encode($data),
        ]);
    }
}
