<?php

namespace App\Models;

use App\Events\BroadcastChat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Chat extends Model
{
    use HasFactory;
    protected $dispatchesEvents = [
        'created' => BroadcastChat::class
    ];

    protected $fillable = ['user_id_1', 'user_id_2', 'chat'];
}
