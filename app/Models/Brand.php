<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class,'brands_products');
    }
}