<?php

namespace App\Models;

use App\Lib\BaseFilter;
use App\Traits\FilterTrait;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory, FilterTrait;

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

    public function filterName($query, $value)
    {
        return $query->where('name', 'LIKE', '%' . $value . '%');
    }

    public function filterPrice($query, $value)
    {
        $range = explode(";", $value);

        return $query->whereBetween('price', [$range[0], $range[1]]);
    }

    public function filterStock($query, $value)
    {
        $range = explode(";", $value);

        return $query->whereBetween('stock', [$range[0], $range[1]]);
    }

    public function filterCategory($query, $value)
    {
        if ($value != -1) {
            return $query->where('category_id', $value);
        }
        
    }
}
