<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Facades\Telegram;
use App\Facades\Search;
use Illuminate\Support\Facades\Log;
use Modules\Keyboard\Enums\KeyboardTypeEnum;
use Modules\Keyboard\Http\Controllers\KeyboardController;
use Modules\Keyboard\Services\KeyboardActionHandle;

class WebHookController extends Controller
{
    public function receive(Request $request)
    {
        if (!$request->getContent()){
            return response()->json(['status'=>false, 'message' => 'No data found..!!']);
        }

        if (isset($request["callback_query"]))
        {
            $action = new KeyboardActionHandle();
            $action->reciveCallBack($request->toArray()["callback_query"]);
            return 1;
        }

        $message = new Message($request->getContent());
        if (!$message->chat) return false;

        if ($message->chat->type === 'private')
        {
            $user = $this->getUser($message);

            if ($this->keyWordPlayList($message->text))
            {
                Telegram::sendMsg($user , "پلی لیست تو");

            }
            else
            {
                $this->searchMusic($user , $message);
            }

            return 1;
        }
    }

    public function keyWordPlayList($text) :bool
    {
        $keyWord = ["/playlist" , "پلی لیست" , 'playlist'];

        return in_array($text , $keyWord);
    }

    private function searchMusic($user , $message)
    {
        $result = Search::search($message->text);

        if (count($result) == 0)
        {
            Telegram::sendMsg($user , "فایلی یافت نشد." );
            return 1;
        }

        $keyboard = new KeyboardController();
        $response = Telegram::sendMsg($user , "انتخاب کنید." , $keyboard->createSearchResultKeyboard($result));

        $keyboard->createKeyboardDb(
            $response->json()["result"]["message_id"],
            $user,
            KeyboardTypeEnum::SearchResult->value,
            ["message" => $message->text],
        );
    }

    private function getUser($message)
    {
        $last_name = $message->user->last_name ?? '';
        $user_id = (string) $message->user->id;
        $user = User::getUserById($user_id);

        if (is_null($user))
            $user = User::create([
                'telegram_id' => $user_id,
                'name' => $message->user->first_name . $last_name,
                'username' => $message->user->username ?? null,
            ]);

        return $user;
    }
}

