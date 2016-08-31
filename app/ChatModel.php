<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'chat';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable  = array(
        'text'
    );

    /**
     * @var array
     */
    protected $dates = [
        'created_at'
    ];

    const REMOVE_LIMIT = 10;
    const SAVE_ERROR_TEXT = 'Something went wrong';

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param $chat
     * @return array
     */
    public static function transform($chat)
    {
        return [
            'text' => $chat->getText(),
            'date' => $chat->created_at->toDateTimeString()
        ];
    }

    /**
     * @param $chats
     * @return array
     */
    public static function transformCollection($chats)
    {
        $results = [];

        foreach ($chats as $chat) {
            $results[] = self::transform($chat);
        }

        return $results;
    }
}
