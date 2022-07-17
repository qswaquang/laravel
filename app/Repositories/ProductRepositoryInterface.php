<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;

interface ProductRepositoryInterface extends RepositoryInterface
{
	public function getProducts(Request $filters);
}