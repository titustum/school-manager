<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StudentOverviewStats extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {

        return [
            Stat::make('Total Students', Student::count())
                ->description('Total registered students')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('primary'),

            Stat::make('Male Students', Student::where('gender', 'male')->count())
                ->description('Gender: Male')
                ->icon('heroicon-m-user')
                ->color('info'),

            Stat::make('Female Students', Student::where('gender', 'female')->count())
                ->description('Gender: Female')
                ->icon('heroicon-m-user-group')
                ->color('rose'),

            Stat::make('Disabled Students', Student::where('disability', true)->count())
                ->description('Students with registered disabilities')
                ->icon('heroicon-m-hand-raised')
                ->color('warning'),
        ];
    }
}
