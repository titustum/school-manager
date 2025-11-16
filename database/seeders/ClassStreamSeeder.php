<?php

namespace Database\Seeders;

use App\Models\ClassStream;
use Illuminate\Database\Seeder;

class ClassStreamSeeder extends Seeder
{
    public function run(): void
    {
        $streams = [
            'East',
            'West',
            'North',
            'South',
            'Central',
        ];

        foreach ($streams as $stream) {
            ClassStream::create(['name' => $stream]);
        }
    }
}
