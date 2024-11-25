<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SentimentsSeeder extends Seeder
{
    public function run()
    {
        DB::table('sentiments')->insert([
            [
                'text' => 'I love Laravel. It is amazing.',
                'positive_count' => 2,
                'negative_count' => 0,
                'neutral_count' => 3,
                'positive_words' => json_encode(['love', 'amazing']),
                'negative_words' => json_encode([]),
                'neutral_words' => json_encode(['i', 'it', 'is']),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}