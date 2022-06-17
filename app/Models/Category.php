<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
        'slug',
        'published',
    ];

    public static function root()
    {
       return self::whereNull('parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->with('children')->withCount('products');
    }

    public function parent()
    {
        return $this->hasMany(Category::class);
    }

    public function products() 
    {
        return $this->hasMany(Product::class);
    }

    public function deleteAllChild()
    {
        return $this->children()->delete();
    }

    public static function sumProductCountChild($categories)
    {
        return $categories->transform(
            function($category){
                $category->children->transform(
                    function($category){
                        $category['products_count'] = $category->children->sum('products_count') === 0 ? $category['products_count'] : $category->children->sum('products_count');
                        return $category;
                });
                $category['products_count'] = $category->children->sum('products_count');
                return $category;
            }
        );
    }
}
