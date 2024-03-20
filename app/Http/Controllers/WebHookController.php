<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Facades\Telegram;
use App\Facades\Search;
use Illuminate\Support\Facades\Log;
use Modules\Song\Models\Song;

class WebHookController extends Controller
{
    public function receive(Request $request)
    {
        if (!$request->getContent()){
            return response()->json(['status'=>false, 'message' => 'No data found..!!']);
        }

        if (isset($request["callback_query"]))
        {
            $result = $request->toArray()["callback_query"];
            $message = $result["data"];
            $user_telegram_id = $result["message"]["chat"]["id"];

            Telegram::audio(
                $this->getUserById($user_telegram_id),
                Song::where("id" , $message)->first()
            );

            return 1;
        }

        $message = new Message($request->getContent());
        if (!$message->chat) return false;

        if ($message->chat->type === 'private')
        {
            $user = $this->getUser($message);
            $result = Search::search($message->text);

            if (count($result) == 0)
            {
                Telegram::sendMsg($user , "فایلی یافت نشد.");
                return 1;
            }

            Telegram::sendSearchResult($user , $result);
            return 1;
        }
    }

    private function getUser($message)
    {
        $last_name = $message->user->last_name ?? '';
        $user_id = (string) $message->user->id;
        $user = $this->getUserById($user_id);

        if (is_null($user))
            $user = User::create([
                'telegram_id' => $user_id,
                'name' => $message->user->first_name . $last_name,
                'username' => $message->user->username ?? null,
            ]);

        return $user;
    }

    private function getUserById($id)
    {
        return User::where("telegram_id", (string) $id)->get()->first();
    }
}

// https://api.telegram.org/bot7177087152:AAG2dftu8r9peT8SovQ-2NRkL4BTWtE3rZE/setWebhook?url=https://erfanrasooli.ir/
