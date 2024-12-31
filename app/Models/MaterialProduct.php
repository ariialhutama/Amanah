<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialProduct extends Model
{
    //
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function MaterialProduct()
    {
        return $this->belongsTo(Product::class);
    }
}
