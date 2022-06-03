<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function seo() 
    {
        return $this->hasOne(SEO::class);
    }

    public function variation()
    {
        return $this->hasMany(Variation::class);
    }

    public function stock() 
    {
        return $this->hasManyThrough(Stock::class, Variation::class);
    }

    public function image() 
    {
        return $this->hasManyThrough(Image::class, Variation::class);
    }
}
