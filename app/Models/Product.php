<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'stock',
        'price',
        'old_price',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function orders() 
    {
        return $this->belongsToMany(Order::class, 'order_details', 'product_id', 'order_id');
    }

    public function images() 
    {
        return $this->belongsToMany(Image::class, 'images_products', 'product_id', 'image_id')->orderBy(DB::raw('ISNULL(images.display_order), images.display_order'), 'ASC');
    }
}
