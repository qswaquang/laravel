<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

interface SliderRepositoryInterface extends RepositoryInterface
{
	public function getSliders();
}