<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StudentOverviewStats extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $total = Student::count();

        // Calculate Average Age properly
        $ages = Student::pluck('date_of_birth')
            ->map(fn ($dob) => Carbon::parse($dob)->age);

        $avgAge = $ages->count() ? round($ages->avg(), 1) : 0;

        return [
            // TOTAL STUDENTS
            Stat::make('Total Students', $total)
                ->description('Total registered students')
                ->icon('heroicon-o-academic-cap')
                ->color('primary'),

            // AVERAGE AGE
            Stat::make('Average Age', "{$avgAge} yrs")
                ->description('Calculated from date of birth')
                ->icon('heroicon-o-clock')
                ->color('rose'),

            // DISABLED STUDENTS
            Stat::make(
                'Disabled Students',
                Student::where('disability', true)->count()
            )
                ->description('Students with registered disabilities')
                ->icon('heroicon-o-hand-raised')
                ->color('warning'),
        ];
    }
}
