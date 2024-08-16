<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
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
        Student::factory(20)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Course::factory()->create([
            'courseID' => 'HTTP5225',
            'name' => 'PHP',
            'description' => 'This is a PHP class.',
        ]);

        Course::factory()->create([
            'courseID' => 'HTTP5222',
            'name' => 'ASP.NET',
            'description' => 'This is a ASP class.',
        ]);

        // Course::factory(20)->create();
    }
}
