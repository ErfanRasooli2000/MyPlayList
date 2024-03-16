<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    private $update_id;
    private $message;
    public $id;
    public $is_message = false;
    public $is_edited_message = false;
    public $is_callback_query = false;
    public $is_channel = false;
    public $user;
    public $chat;
    public $date;
    public $text;
    public $data;
    public $entities;
    public $voice;

    public function __construct($get_update)
    {
        $update = json_decode($get_update);
        $this->update_id = $update->update_id;

        // Set data from message
        if (isset($update->message)) {
            $this->is_message = true;
            $this->message = $update->message;
            $this->id = $this->message->message_id;
            $this->user = $this->message->from;
            $this->chat = $this->message->chat;
            $this->date = $this->message->date;
            if (isset($this->message->text)) {
                $this->text = $this->message->text;
            }
        }

        if (isset($update->edited_message)) {
            $this->is_edited_message = true;
            $this->message = $update->edited_message;
            $this->id = $this->message->message_id;
            $this->user = $this->message->from;
            $this->chat = $this->message->chat;
            $this->text = $this->message->text;
            $this->date = $this->message->date;
        }

        if (isset($update->callback_query)) {
            $this->is_callback_query = true;
            $this->message = $update->callback_query;
            $this->callback_id = $this->message->id;
            $this->id = $this->message->message->message_id;
            $this->user = $this->message->from;
            $this->chat = $this->message->message->chat;
            $this->data = explode('_', $update->callback_query->data);
            $this->date = $this->message->message->date;
        }

        if (isset($this->message->entities)) {
            $this->entities = $this->message->entities;
        }

        if (isset($this->message->voice)) {
            $this->voice = $this->message->voice;
        }

        if (isset($update->channel_post)) {
            $this->is_channel = true;
            $this->message = $update->channel_post;
            $this->user = $this->message->chat;
            $this->chat = $this->message->chat;
            $this->date = $this->message->date;
            if (isset($this->message->text)) {
                $this->text = $this->message->text;
            }
        }
    }
}
