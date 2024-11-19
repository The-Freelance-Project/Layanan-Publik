<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chat extends Model
{
    use HasUuids;

    protected $fillable = [
        'from',
        'to',
        'text',
        'status',
    ];

    public function from(): BelongsTo
    {
        return $this->belongsTo(User::class, 'from', 'id');
    }

    public function to(): BelongsTo
    {
        return $this->belongsTo(User::class, 'to', 'id');
    }
}
