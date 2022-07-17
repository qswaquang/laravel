<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\BaseRepository;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
	public function getModel()
    {
        return Product::class;
    }

    public function getProducts(Request $filters)
    {
    	return $this->model->filter($filters)->paginate(10);
    }
}