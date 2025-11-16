<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassStream;

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
