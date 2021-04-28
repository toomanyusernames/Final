<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Auth::user()->friends();
        return view('chat.index')->withFriends($friends);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $friend = User::find($id);
        return view('chat.show')->withFriend($friend);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }

    public function getChat($id)
    {
        $chats = Chat::where(function ($query) use ($id){
            $query->where('user_id_1', '=', Auth::user()->id)->where('user_id_2', '=', $id);
        })->orWhere(function ($query) use ($id){
            $query->where('user_id_1', '=', $id)->where('user_id_2', '=', Auth::user()->id);
        })->get();

        return $chats;
    }

    public function sendChat(Request $request){
        Chat::create([
            'user_id_1' => $request->user_id_1,
            'user_id_2' => $request->user_id_2,
            'chat' => $request->chat
        ]);
        return[];
    }
}
