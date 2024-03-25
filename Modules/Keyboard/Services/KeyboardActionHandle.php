<?php

namespace Modules\Keyboard\Services;

use App\Facades\Search;
use App\Facades\Telegram;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Modules\Keyboard\Enums\CallBackTypeEnum;
use Modules\Keyboard\Http\Controllers\KeyboardController;
use Modules\Keyboard\Models\Keyboard;
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
                Telegram::answerCallBackQuery($user , $call_back_id , "در حال ارسال موزیک.");
                $this->sendAudio($user , $message);
                break;
            case CallBackTypeEnum::ChangePage->value:
                Telegram::answerCallBackQuery($user , $call_back_id , "در حال جا به جایی.");
                $this->changePageMessage($user , $message_id , $message);
                break;
            case CallBackTypeEnum::SendPage->value:
                Telegram::answerCallBackQuery($user , $call_back_id , "در حال ارسال.");
                $this->getAll($user , $message_id , $message);
                break;
            case CallBackTypeEnum::ShuffleResult->value:
                Telegram::answerCallBackQuery($user , $call_back_id , "در حال ارسال.");
                $this->getAll($user , $message_id , $message , 'shuffle' , 7);
                break;
            case CallBackTypeEnum::CloseKeyboard->value:
                Telegram::answerCallBackQuery($user , $call_back_id , "closing");
                $this->deleteMessage($user , $message_id);
                break;
            case CallBackTypeEnum::NoAction->value:
                Telegram::answerCallBackQuery($user , $call_back_id , "paging");
                break;
            case CallBackTypeEnum::NewPlaylist->value:
                Telegram::answerCallBackQuery($user , $call_back_id , "در حال ساخت پلی لیست");
                Telegram::sendMsg($user , "نام پلی لیست خود را وارد کنید.");
                $user->update(["step" => "new_play_list"]);
                break;
        }
        return 1;
    }

    public function sendAudio($user , $message)
    {
        $song = Song::where("id" , $message)->first();
        $response = Telegram::sendAudio($user , $song);

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

                Telegram::sendAudio($user , $song);
            }
        }
    }

    public function changePageMessage($user , $message_id , $message)
    {
        $keyboardController = new KeyboardController();
        $keyboardData = Keyboard::where("user_id" , $user->id)->where("message_id" , $message_id)->first();
        $keyboardMessage = json_decode($keyboardData->data , true)['message'];
        $result = Search::search($keyboardMessage);
        $keyboard = $keyboardController->createSearchResultKeyboard($result , $message["page"]);

        Telegram::editInlineMessage($user , $message_id , "انتخاب کنید" , $keyboard);
    }

    public function getAll($user , $message_id , $message , $type = 'normal' , $count = 5)
    {
        $keyboardData = Keyboard::where("user_id" , $user->id)->where("message_id" , $message_id)->first();
        $keyboardMessage = json_decode($keyboardData->data , true)['message'];
        $result = Search::search($keyboardMessage);

        switch ($type)
        {
            case "normal":
                $musics = $result->skip(($message["page"]-1)*$count)->take($count);
                break;
            case "shuffle":
                $musics = $result->shuffle()->take($count);
                break;
        }

        foreach ($musics as $song)
        {
            Telegram::sendAudio($user , $song);
        }
    }

    public function deleteMessage($user , $message_id)
    {
        $response = Telegram::deleteMessages($user , $message_id);

        if ($response->successful())
            Keyboard::where("user_id" , $user->id)->where("message_id" , $message_id)->first()->delete();

    }
}
