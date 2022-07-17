<?php

namespace App\Traits;
use Str;

trait FilterTrait
{
	public function scopeFilter($query, $filters)
	{
		$params = $filters->all();
        foreach ($params as $field => $value) {
            $method = 'filter' . Str::studly($field);

            if ($value != '') {
                if (method_exists($this, $method)) {
                    $this->{$method}($query, $value);
                }
            }
        }

        return $query;
	}
}