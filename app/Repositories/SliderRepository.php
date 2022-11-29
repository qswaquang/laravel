<?php

namespace App\Repositories;

use App\Models\Slider;
use App\Repositories\SliderRepositoryInterface;

class SliderRepository extends BaseRepository implements SliderRepositoryInterface
{
	public function getModel()
	{
		return Slider::class;
	}

	public function getSliders()
    {
    	return $this->model->paginate(10);
    }
}