<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
	public function getProducts();
}