<?php

namespace App\Http\Controllers;

use App\Enums\UserStepEnum;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use App\Facades\Telegram;
use App\Facades\Search;
use Illuminate\Support\Facades\Log;
use Modules\Keyboard\Enums\KeyboardTypeEnum;
use Modules\Keyboard\Http\Controllers\KeyboardController;
use Modules\Keyboard\Services\KeyboardActionHandle;
use Modules\PlayList\Database\Repositories\Contracts\playlistRepositoryInterface;
use Modules\PlayList\Models\Playlist;

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

        $keyboard = new KeyboardController();

        $message = new Message($request->getContent());
        if (!$message->chat) return false;

        if ($message->chat->type === 'private')
        {
            $user = $this->getUser($message);

            if ($user->step == UserStepEnum::NewPlayList->value)
            {
                //todo : why app doesnt work?
//                app(playlistRepositoryInterface::class)->create([
//                    "created_by" => $user->id,
//                    "name" => $message->text
//                ]);


                if (in_array($message->text , ["لغو" , "cancel"]))
                {
                    $user->update(["step" => UserStepEnum::Search->value]);

                    Telegram::sendMsg($user , "ساخت پلی لیست لغو شد." , $keyboard->createSimpleKeyboard([]));
                }
                else
                {
                    $playList = Playlist::create([
                        "created_by" => $user->id,
                        "name" => $message->text
                    ]);

                    $playList->users()->sync([$user->id]);

                    $user->update(["step" => UserStepEnum::Search->value]);

                    Telegram::sendMsg($user , "پلی لیست با موفقیت ساخته شد" , $keyboard->createSimpleKeyboard([]));
                }

                return 1;
            }

            if ($this->keyWordPlayList($message->text))
            {
                $playLists = $user->playlists;
                $message = Telegram::sendMsg($user , "پلی لیست تو" , $keyboard->playListKeyboard($playLists));

                $keyboard->createKeyboardDb(
                    $message->json()["result"]["message_id"],
                    $user,
                    KeyboardTypeEnum::PlayList->value,
                    [],
                );
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

