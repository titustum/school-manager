<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        // Create 300 students with Kenyan data
        Student::factory()->count(300)->create();
    }
}
