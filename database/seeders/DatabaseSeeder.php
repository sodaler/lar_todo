<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\TaskFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $user = User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => 'example123',
         ]);

        TaskFactory::new()->count(10)->create([
            'user_id' => $user->id
        ]);
    }
}
