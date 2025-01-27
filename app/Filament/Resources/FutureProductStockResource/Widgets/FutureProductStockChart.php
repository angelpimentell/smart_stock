<?php

namespace App\Filament\Resources\FutureProductStockResource\Widgets;

use App\Models\Product;
use Filament\Widgets\ChartWidget;

class FutureProductStockChart extends ChartWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $productOne = Product::find(1)->name;
        $productTwo = Product::find(2)->name;
        $productThree = Product::find(3)->name;

        return [
            'datasets' => [
                [
                    'label' => $productOne,
                    'data' => [20, 24, 13, 27, 14, 11, 21],
                ],
                [
                    'label' => $productTwo,
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                    'data' => [8, 9, 10, 11, 58, 50, 9],
                ],
                [
                    'label' => $productThree,
                    'backgroundColor' => '#ecf87f',
                    'borderColor' => '#59981a',
                    'data' => [23, 12, 5, 6, 7, 11, 40],
                ],
            ],
            'labels' => ['Lun', 'Mar', 'Mier', 'Jue', 'Vier', 'Sab', 'Dom'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
