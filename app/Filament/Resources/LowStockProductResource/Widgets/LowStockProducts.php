<?php

namespace App\Filament\Resources\LowStockProductResource\Widgets;

use App\Filament\Resources\ProductResource;
use App\Filament\Resources\StockResource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Forms;
class LowStockProducts extends BaseWidget
{

    public function table(Table $table): Table
    {
        return $table
            ->query(
                StockResource::getEloquentQuery()->orderBy('quantity', 'asc')
            )->defaultPaginationPageOption(5)
            ->columns([
                Tables\Columns\TextColumn::make('product.name')->label('Product')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('unit.name')->label('Measurement Unit')->sortable(),
                Tables\Columns\TextColumn::make('quantity')->label('Quantity'),
            ]);
    }
}
