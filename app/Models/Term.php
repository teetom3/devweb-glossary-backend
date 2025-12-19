<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Term extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'category_id',
        'description_short',
        'is_approved',
        'created_by_id',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function definitions(): HasMany
    {
        return $this->hasMany(Definition::class);
    }

    public function approvedDefinitions(): HasMany
    {
        return $this->hasMany(Definition::class)->where('is_approved', true)->orderBy('score', 'desc');
    }
}
