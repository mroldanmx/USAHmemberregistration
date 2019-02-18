<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'permissions',
    ];

    /**
     * The permission array.
     *
     * @var array
     */
    protected $casts = [
        'permissions' => 'array',
    ];

    /**
     * The users that have this role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_roles');
    }

    /**
     * @method hasAccess
     * Does this role has access to given permissions
     *
     * @param array $permissions
     * @return boolean
     */
    public function hasAccess(array $permissions) : bool
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission))
                return true;
        }
        return false;
    }

    /**
     * @method hasPermission
     * Does this role has access to given permissions
     *
     * @param array $permissions
     * @return boolean
     */
    private function hasPermission(string $permission) : bool
    {
        return $this->permissions[$permission] ?? false;
    }
}
