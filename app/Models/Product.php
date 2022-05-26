<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function Images() {
        return $this->hasMany(Image::class,'product_id');
    }

    public function getImagePath() {
        return $this->Images()->orderBy('created_at', 'desc')->first()->path ?? null;
    }
}
