<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    //
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    // public function brandProduct()
    // {
    //     return $this->belongsToMany(brandsProduct::class);
    // }



    public function Material()
    {
        return $this->belongsToMany(Material::class, 'materials_formulas')
            ->withPivot('concentration');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Production()
    {
        return $this->hasMany(Production::class);
    }
}
