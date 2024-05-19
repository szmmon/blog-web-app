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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'is_admin' => "Admin"
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@user.com',
            'is_admin' => "User"
        ]);
        Post::factory(10)->create([
            'user_id' => 1
        ]);
    }
}
