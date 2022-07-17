<?php

namespace App\Repositories;

use App\Models\Role;
use App\Repositories\BaseRepository;
use App\Repositories\RoleRepositoryInterface;
use Illuminate\Http\Request;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
	public function getModel()
	{
		return Role::class;
	}

	public function getRoles(Request $filters)
	{
		return $this->model->filter($filters)->paginate(10);
	}

	public function create(array $attributes)
	{
		$role = parent::create($attributes);
		if (array_key_exists('permissions', $attributes)) {
			$role->permissions()->attach($attributes['permissions']);
		}
	}

	public function update(array $attributes, $id)
	{
		$role = parent::update($attributes, $id);
		if (array_key_exists('permissions', $attributes)) {
			$role->permissions()->sync($attributes['permissions']);
		}
	}
}