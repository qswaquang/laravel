<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
	public function getCategories();
}