<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formula extends Model
{
    //
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function brandProduct()
    {
        return $this->belongsToMany(BrandProduct::class);
    }

    public function materialProduct()
    {
        return $this->belongsToMany(MaterialProduct::class);
    }
}
