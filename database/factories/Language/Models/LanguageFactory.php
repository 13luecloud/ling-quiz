<?php

namespace Database\Factories\Language\Models;

use App\Language\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

class LanguageFactory extends Factory
{
    protected $model = Language::class;

    public function definition(): array
    {
        return [
            'en_name' => 'Japanese',
            'native_name' => '日本語',
        ];
    }
}
