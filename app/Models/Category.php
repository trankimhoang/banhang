<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function Products(){
        return $this->belongsToMany(Product::class, 'product_category', 'category_id', 'product_id');
    }
}
