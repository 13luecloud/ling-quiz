<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'target_language_id' => Language::factory()->create()->id,
        ];
    }

    public function started(): QuizFactory
    {
        return $this->state([
            'started_at' => now(),
        ]);
    }

    public function completed(): QuizFactory
    {
        return $this->state([
            'completed_at' => now(),
        ]);
    }
}
