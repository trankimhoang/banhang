<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['name', 'description', 'price', 'content', 'image'];

    public function Images() {
        return $this->hasMany(Image::class,'product_id');
    }

    public function getImagePath() {
        return 'product-images/' . $this->getAttribute('image');
    }

    public function Categorys() {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }
}
