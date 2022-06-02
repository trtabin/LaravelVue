<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function SEO() {
        return $this->hasOne(SEO::class);
    }

    public function Variation()
    {
        return $this->hasMany(Variation::class);
    }
}
