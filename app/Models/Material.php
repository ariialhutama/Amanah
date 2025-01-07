<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Material extends Model
{
    //
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function Product()
    {
        return $this->belongsTo(Product::class, 'products__categories');
    }

    public function Formula()
    {
        return $this->belongsTo(Formula::class, 'materials_formulas')
            ->withPivot('concentration');
    }
}
