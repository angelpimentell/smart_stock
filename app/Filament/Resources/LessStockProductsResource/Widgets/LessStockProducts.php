<?php

namespace App\Filament\Resources\LessStockProductsResource\Widgets;

use App\Filament\Resources\StockResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\DB;

class LessStockProducts extends BaseWidget
{


    public function table(Table $table): Table
    {
        return $table
            ->heading('Less Stock Movements')
            ->query(
                StockResource::getEloquentQuery()
                    ->select('stocks.id', 'stocks.product_id', 'stocks.unit_id', 'stocks.quantity')
                    ->leftJoin(
                        DB::raw('(SELECT product_id, COUNT(*) AS cantidad_registros FROM stocks GROUP BY product_id) AS stock_summary'),
                        'stocks.product_id', '=', 'stock_summary.product_id'
                    )
                    ->selectRaw('stock_summary.cantidad_registros')
                    ->distinct('stocks.product_id')
                    ->orderBy('stocks.product_id', 'asc')
            )->defaultPaginationPageOption(5)
            ->columns([
                Tables\Columns\TextColumn::make('product.name')->label('Product')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('cantidad_registros')->label('Movements'),
            ]);
    }
}
