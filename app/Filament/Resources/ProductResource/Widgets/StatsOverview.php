<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Product;
use App\Models\Stock;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Products', Product::count())
                ->description('Products available in stock'),
            Stat::make('Stock movements', Stock::where('created_at', '>=', Carbon::now()->subDays(30))->count())
                ->description('Stock movements last 30 days'),

        ];
    }
}
