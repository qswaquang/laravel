<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
	public function getModel()
    {
        return User::class;
    }

    public function getUsers(Request $filters)
    {
    	return $this->model->filter($filters)->paginate(10);
    }
}