<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'definition_id',
        'user_id',
        'content',
    ];

    public function definition(): BelongsTo
    {
        return $this->belongsTo(Definition::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
