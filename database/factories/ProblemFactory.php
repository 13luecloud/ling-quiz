<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProblemFactory extends Factory
{
    public function definition(): array
    {
        $choices = ['A', 'B', 'C', 'D'];

        return [
            'for_language_id' => Language::factory()->create()->id,
            'question' => fake()->sentence(),
            'choices' => $choices,
            'correct_choice' => fake()->randomElement($choices),
        ];
    }
}
