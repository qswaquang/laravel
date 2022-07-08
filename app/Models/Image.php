<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'src',
        'alt',
        'display_order',
    ];

    public function products()
    {
        $this->belongsToMany(Product::class, 'images-products', 'image_id', 'product_id')->withPivot('display_order');
    }
}
