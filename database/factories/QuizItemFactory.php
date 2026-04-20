<?php

namespace Database\Factories;

use App\Models\Problem;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuizItem>
 */
class QuizItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create()->id,
            'quiz_id' => Quiz::factory()->create()->id,
            'problem_id' => Problem::factory()->create()->id,
            'answer' => null,
        ];
    }
}
