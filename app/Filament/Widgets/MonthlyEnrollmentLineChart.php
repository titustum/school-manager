<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Widgets\ChartWidget;

class MonthlyEnrollmentLineChart extends ChartWidget
{
    protected static ?int $sort = 4;

    protected ?string $heading = 'Monthly Enrollment Line Chart';

    protected function getData(): array
    {
        // Get last 12 months
        $months = collect(range(0, 11))
            ->map(fn ($i) => now()->subMonths($i))
            ->reverse();

        // Labels like: Jan, Feb, Mar...
        $labels = $months->map(fn ($date) => $date->format('M'))->toArray();

        // Count students for each month
        $data = $months->map(function ($date) {
            return Student::whereMonth('created_at', $date->month)
                ->whereYear('created_at', $date->year)
                ->count();
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Enrollments',
                    'data' => $data,
                    'borderColor' => '#3B82F6', // blue-500
                    'backgroundColor' => 'rgba(59, 130, 246, 0.4)',
                    'tension' => 0.4,
                    'fill' => true,
                ],
            ],
            'labels' => $labels,
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
