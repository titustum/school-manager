<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;

class StudentEnrollmentLineChart extends ChartWidget
{
    protected static ?int $sort = 4;

    protected ?string $heading = 'Student Enrollment Line Chart';

    protected function getData(): array
    {
        // Generate trend of student enrollments per month over the past 12 months
        $trend = Trend::model(Student::class)
            ->between(
                start: now()->subMonths(11)->startOfMonth(),
                end: now()->endOfMonth(),
            )
            ->perMonth()
            ->count(); // counts number of students per month

        return [
            'labels' => $trend->map(fn($entry) => $entry->date)->toArray(),
            'datasets' => [
                [
                    'label' => 'Enrollments',
                    'data' => $trend->map(fn($entry) => $entry->aggregate)->toArray(),
                    'borderColor' => '#3B82F6',            // blue
                    'backgroundColor' => 'rgba(59, 130, 246, 0.3)', // light blue fill
                    'tension' => 0.4,
                    'fill' => true,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
            ],
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],
            ],
        ];
    }
}
