<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\ChartWidget;

class AccommodationPieChart extends ChartWidget
{
    protected static ?int $sort = 3;

    protected ?string $heading = 'Accommodation Pie Chart';

    protected function getData(): array
    {
        $day = Student::where('accommodation', 'day')->count();
        $boarding = Student::where('accommodation', 'boarding')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Accommodation',
                    'data' => [$day, $boarding],
                    'backgroundColor' => [
                        '#10B981', // green-500
                        '#6366F1', // indigo-500
                    ],
                    'hoverOffset' => 4,
                ],
            ],
            'labels' => ['Day Students', 'Boarding Students'],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
