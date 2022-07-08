<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\BaseRepository;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
	public function getModel()
    {
        return Product::class;
    }

    public function getProducts()
    {
    	return $this->model->with('category')->paginate(10);
    }
}