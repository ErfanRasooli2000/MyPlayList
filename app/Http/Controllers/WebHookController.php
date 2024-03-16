<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Facades\Telegram;

class WebHookController extends Controller
{
    public function receive(Request $request)
    {
        if (!$request->getContent()){
            return response()->json(['status'=>false, 'message' => 'No data found..!!']);
        }

        $message = new Message($request->getContent());
        if (!$message->chat) return false;

        if ($message->chat->type === 'private')
        {
            $last_name = $message->user->last_name ?? '';
            $user = User::firstOrCreate([
                'telegram_id' => $message->user->id,
            ],[
                'telegram_id' => $message->user->id,
                'name' => $message->user->first_name . $last_name,
                'username' => $message->user->username ?? null,
            ]);
//            if(is_null($user->section))
//            {
//                $user->section = 'home';
//            }
//            $message = convert_numbers($message->text);

//            if(!$this->checkKeyWords($user,$message))
//                die();

//            self::router($user,$message);

            Telegram::audio($user);
        }

        Log::info("hi");
    }
}

// https://api.telegram.org/bot7177087152:AAG2dftu8r9peT8SovQ-2NRkL4BTWtE3rZE/setWebhook?url=https://f3c5-65-109-179-160.ngrok-free.app
