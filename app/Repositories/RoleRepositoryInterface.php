<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Http\Request;

interface RoleRepositoryInterface extends RepositoryInterface
{
	public function getRoles(Request $filters);
}