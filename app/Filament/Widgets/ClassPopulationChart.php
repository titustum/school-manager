<?php

namespace App\Filament\Widgets;

use App\Models\ClassRoom;
use Filament\Widgets\ChartWidget;

class ClassPopulationChart extends ChartWidget
{
    protected static ?int $sort = 2;

    protected ?string $heading = 'Class Population Chart';

    protected function getData(): array
    {
        // Get class names
        $labels = ClassRoom::orderBy('name')
            ->pluck('name')
            ->toArray();

        // Count students per class
        $data = ClassRoom::withCount('students')
            ->orderBy('name')
            ->pluck('students_count')
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Students',
                    'data' => $data,
                    'backgroundColor' => '#3B82F6', // Tailwind "blue-500"
                    'borderRadius' => 4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'precision' => 0,
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

    protected function getType(): string
    {
        return 'bar';
    }
}
