<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Definition extends Model
{
    protected $fillable = [
        'term_id',
        'user_id',
        'title',
        'explanation',
        'code_example',
        'demo_url',
        'is_approved',
        'score',
        'views_count',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function incrementViews(): void
    {
        $this->increment('views_count');
    }

    public function updateScore(): void
    {
        $upvotes = $this->votes()->where('value', 1)->count();
        $downvotes = $this->votes()->where('value', -1)->count();
        $this->update(['score' => $upvotes - $downvotes]);
    }
}
