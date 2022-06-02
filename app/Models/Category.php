<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'published',
    ];

    public function scopeRoot($query)
    {
        $query->whereNull('parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->hasManny(Category::class, 'id', 'parent_id');
    }

    public function products() 
    {
        return $this->hasManny(Product::class);
    }
}
