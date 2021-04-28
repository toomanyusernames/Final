@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="column is-8 is-offset-2">
            <div class="card">
                <div class="card-header bg-info">
                    list of friends
                </div>
                @forelse ($friends as $friend)
                    <a href="{{ route('chat.show', $friend->id) }}" class="card-body bg-light">
                        <div class="">
                        {{ $friend->name }}
                    </div>
                    <onlineuser v-bind:friend="{{ $friend }}" vbind:onlineUsers="onlineusers"></onlineuser>
                    </a>
                @empty
                    <div class="bg-light card-body">
                        no friends
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
