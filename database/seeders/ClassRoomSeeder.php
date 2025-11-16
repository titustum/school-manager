<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassRoom;

class ClassRoomSeeder extends Seeder
{
    public function run(): void
    {
        $grades = [
            'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4',
            'Grade 5', 'Grade 6', 'Grade 7', 'Grade 8',
            'Grade 9', 'Grade 10', 'Grade 11', 'Grade 12',
        ];

        foreach ($grades as $grade) {
            ClassRoom::create(['name' => $grade]);
        }
    }
}
