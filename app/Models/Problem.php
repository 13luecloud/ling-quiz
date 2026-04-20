<?php

namespace App\Models;

use App\Traits\TaggableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Problem extends Model
{
    use HasFactory, TaggableTrait;

    protected $guarded = ['id'];

    protected $casts = [
        'choices' => 'array',
    ];

    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }

    public function quizItems(): HasMany
    {
        return $this->hasMany(QuizItem::class);
    }
}
