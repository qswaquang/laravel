<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
	public function getModel()
	{
		return Category::class;
	}

	public function getAll ()
	{
		$categoriesChildCount = $this->model->root()->with('children')->get();

		return $categoriesChildCount;
	}

	public function getCategories()
	{
		return $this->model->root()->with('children')->withCount('products')->get();
	}
}