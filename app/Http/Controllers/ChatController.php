<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ChatModel;

class ChatController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function all()
    {
        $chats = ChatModel::orderBy('created_at', 'DESC')->take(10)->get();

        return response()->json(['messages' => ChatModel::transformCollection($chats)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'text' => 'required | max: 500',
        ]);

        $chat = new ChatModel($data);

        if($chat->save()){

            if(ChatModel::count() > ChatModel::REMOVE_LIMIT){
                ChatModel::first()->delete();
            }

            return response()->json(ChatModel::transform($chat));

        } else {

            return response()->json(['status' => -1, 'text' => SAVE_ERROR_TEXT], 200);
        }
    }
}
