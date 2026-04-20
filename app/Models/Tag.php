<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function quizzes(): MorphToMany
    {
        return $this->morphedByMany(Quiz::class, 'taggable');
    }

    public function problems(): MorphToMany
    {
        return $this->morphedByMany(Problem::class, 'taggable');
    }
}
