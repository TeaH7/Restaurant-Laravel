<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image' , 'slug' , 'ingredients' , 'price' , 'description' , 'user_id' , 'is_special' , 'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
