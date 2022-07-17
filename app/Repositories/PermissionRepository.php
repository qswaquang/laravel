<?php

namespace App\Repositories;

use App\Models\Permission;
use App\Repositories\BaseRepository;
use App\Repositories\PermissionRepositoryInterface;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
	public function getModel()
	{
		return Permission::class;
	}
	
}