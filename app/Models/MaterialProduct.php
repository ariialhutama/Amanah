<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaterialProduct extends Model
{
    //
    protected $guarded = [
        'id',
    ];
    public function MaterialProduct()
    {
        return $this->belongsTo(Product::class);
    }
}
