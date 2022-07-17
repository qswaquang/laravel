<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;

interface UserRepositoryInterface extends RepositoryInterface
{
	public function getUsers(Request $filters);
}