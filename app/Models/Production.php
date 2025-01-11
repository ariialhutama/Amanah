<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    //
    protected $guarded = [
        'id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function formula()
    {
        return $this->belongsTo(Formula::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
