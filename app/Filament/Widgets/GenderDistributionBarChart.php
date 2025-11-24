<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\ChartWidget;

class GenderDistributionBarChart extends ChartWidget
{
    protected ?string $heading = 'Gender Distribution Bar Chart';

    protected static ?int $sort = 5;

    protected function getData(): array
    {
        // Count male and female students
        $maleCount = Student::where('gender', 'male')->count();
        $femaleCount = Student::where('gender', 'female')->count();

        return [
            'labels' => ['Male', 'Female'],
            'datasets' => [
                [
                    'label' => 'Students',
                    'data' => [$maleCount, $femaleCount],
                    'backgroundColor' => ['#3B82F6', '#F43F5E'], // blue for male, rose/red for female
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
            ],
        ];
    }

    public static function canView(): bool
    {
        // return parent::canView();
        return false;
    }
}
