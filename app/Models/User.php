<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    /**
     * @method hasAccess
     * Checks if User has access to $permissions.
     *
     * @param array $permissions
     * @return boolean
     */
    public function hasAccess(array $permissions) : bool
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @method inRole
     * Checks if the user belongs to role.
     *
     * @param array $permissions
     * @return boolean
     */
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }

    /**
     * @method getRoleNames
     * Return the roles of user as string
     *
     * @param array $permissions
     * @return boolean
     */
    public function getRoleNames()
    {
        return $this->roles->pluck('name')->all();
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function activeRegistration()
    {
        //TODO which paid registration should we get? check date?
        return Registration::where([
            'user_id' => $this->id,
            'status' => config('constants.registration.PAID'),
        ])->first();
    }
}
