<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Facades\Telegram;
use App\Facades\Search;
use Illuminate\Support\Facades\Log;

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

            return 1;
        }

        $message = new Message($request->getContent());
        if (!$message->chat) return false;

        if ($message->chat->type === 'private')
        {
            $user = $this->getUser($message);
            $data = Search::search($message->text);

            if (!$data)
            {
                Telegram::sendMsg($user , "موزیکی یافت نشد");
                die();
            }

            Telegram::audio($user , $data);
        }
    }

    private function getUser($message)
    {
        $last_name = $message->user->last_name ?? '';
        $user_id = (string) $message->user->id;
        $user = User::where("telegram_id", $user_id)->get()->first();

        if (is_null($user))
            $user = User::create([
                'telegram_id' => $user_id,
                'name' => $message->user->first_name . $last_name,
                'username' => $message->user->username ?? null,
            ]);

        return $user;
    }
}

// https://api.telegram.org/bot7177087152:AAG2dftu8r9peT8SovQ-2NRkL4BTWtE3rZE/setWebhook?url=https://erfanrasooli.ir/
