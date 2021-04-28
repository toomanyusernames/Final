@extends('layouts.app')

@section('content')
<!-- <audio id='"audi' src="// asset(sounds/chat.mp3) }}"></audio> -->
<meta name="friendId" content="{{ $friend->id }}">
    <div class="container">
        <div class="column is-8 is-offset-2">
            <div class="card">
                <div class="card-header bg-dark">
                    <div class="text-light">
                    {{ $friend->name }}

                    <div class="contain float-right">
                        <a href="{{ url('/chat') }}" class="is-link"> <i class="fa fa-arrow-left"></i></a>
                    </div></div>
                    <hr>
                    <chat v-bind:chats="chats" v-bind:userid="{{ Auth::user()->id }}" v-bind:friendid = "{{ $friend->id }}"> </chat>
                </div>
            </div>
        </div>
    </div>
@endsection
