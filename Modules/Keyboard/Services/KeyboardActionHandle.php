<?php

namespace Modules\Keyboard\Services;

use App\Facades\Telegram;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Modules\Keyboard\Enums\CallBackTypeEnum;
use Modules\Song\Models\Song;

class KeyboardActionHandle
{
    public function reciveCallBack($result)
    {
        $call_back_id = $result["id"];
        $message = json_decode($result["data"] , true);
        $message_id = $result["message"]["message_id"];
        $user = User::getUserById($result["message"]["chat"]["id"]);

        switch ($message["type"]){
            case CallBackTypeEnum::SendMusic->value:
                Telegram::answerCallBackQuery($user , $call_back_id , "در حال ارسال موزیک." , true);
                Telegram::sendAudio($user , Song::where("id" , $message)->first());
                break;
            case CallBackTypeEnum::ChangePage->value:
                Telegram::answerCallBackQuery($user , $call_back_id , "در حال جا به جایی.");
                Telegram::editInlineMessage($user , $message_id , $message);
                break;
            case CallBackTypeEnum::CloseKeyboard->value:
                Telegram::answerCallBackQuery($user , $call_back_id , "closing");
                Telegram::deleteMessages($user , $message_id);
                break;
            case CallBackTypeEnum::NoAction->value:
                Telegram::answerCallBackQuery($user , $call_back_id , "paging");
                break;
        }
        return 1;
    }
}
