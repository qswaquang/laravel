<?php

namespace App\Models;

use App\Models\Permission;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, FilterTrait;

    protected $fillable = [
        'title',
        'description',
    ];

    public function users()
    {
        $this->hasMany(User::class);
    }

    public function permissions() 
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions', 'role_id', 'permission_id')->orderBy('id');
    }
}
