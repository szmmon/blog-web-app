<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Database\Factories\PostFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        Post::factory(2)->create([
            'user_id' => 1
        ]);
        Post::factory(2)->create([
            'user_id' => 2
        ]);
        Post::factory(2)->create([
            'user_id' => 3
        ]);
        
    }
}
