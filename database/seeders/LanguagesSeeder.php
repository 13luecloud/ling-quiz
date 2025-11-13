<?php

namespace Database\Seeders;

use App\Language\Models\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::create([
            'en_name' => 'Japanese',
            'native_name' => '日本語',
        ]);
    }
}
