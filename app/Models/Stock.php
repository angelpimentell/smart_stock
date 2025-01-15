<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = ['product_id', 'unit_id', 'quantity', 'difference'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function unit()
    {
        return $this->belongsTo(MeasurementUnit::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Hook into the saving event
        static::saving(function ($stock) {
            // Fetch the last record for the same product and unit
            $lastStock = static::where('product_id', $stock->product_id)
                ->where('unit_id', $stock->unit_id)
                ->latest('id')
                ->first();

            // Calculate the difference if a previous record exists
            if ($lastStock) {
                $stock->difference = $stock->quantity - $lastStock->quantity;
            } else {
                // Default difference to the full quantity for the first record
                $stock->difference = $stock->quantity;
            }
        });
    }
}
