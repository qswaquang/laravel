<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
	protected $model;

	/**
	 * Class Constructor
	 * @param    $model   
	 */
	public function __construct()
	{
		$this->setModel();
	}

	abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

	public function getAll()
	{
		return $this->model->all();
	}

	public function find($id)
	{
		return $this->model->find($id);
	}

	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}

	public function update(array $attributes, $id)
	{
		$result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
	}

	public function delete($id)
	{
		$result = $this->find($id);
        if ($result) {
            $result->delete();
            return true;
        }

        return false;
	}
}