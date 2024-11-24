<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatText extends Model
{
    protected $fillable = [
        'chat_id',
        'sender_id',
        'message',
    ];

    public function chat() : BelongsTo {
        return $this->belongsTo(Chat::class, 'chat_id', 'id');
    }

    public function sender(): BelongsTo {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }
}
