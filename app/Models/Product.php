<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];

    public function Category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'Products__Categories');
    }

    public function Brand(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class, 'brands_products');
    }

    public function Production(): BelongsToMany
    {
        return $this->belongsToMany(Production::class);
    }
}
