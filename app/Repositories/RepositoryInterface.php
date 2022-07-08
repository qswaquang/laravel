<?php

namespace App\Repositories;

interface RepositoryInterface
{
	public function getAll();
	public function find($id);
	public function create(array $attributes);
	public function update(array $attributes, $id);
	public function delete($id);
}