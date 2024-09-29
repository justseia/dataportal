<?php

namespace Database\Seeders\Prod;

use App\Models\Faq\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::factory()->create([
            'question' => '123',
            'answer' => '123',
        ]);
        Faq::factory()->create([
            'question' => '123',
            'answer' => '123',
        ]);
        Faq::factory()->create([
            'question' => '123',
            'answer' => '123',
        ]);
        Faq::factory()->create([
            'question' => '123',
            'answer' => '123',
        ]);
        Faq::factory()->create([
            'question' => '123',
            'answer' => '123',
        ]);
    }
}
