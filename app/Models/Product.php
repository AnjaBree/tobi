<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'desc', 'price', 'img', 'category_id', 'product_type'];
    use HasFactory;

    public function category() {
        $this->belongsTo(Category::class);
    }

    public function type() {
        $this->belongsTo(CategoryType::class);
    }
}
