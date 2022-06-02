<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    public function Image()
    {
        return $this->hasMany(Image::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

    public function Stock()
    {
        return $this->hasMany(Stock::class);
    }
}
