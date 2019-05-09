<?php

namespace App;

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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * A user can have many roles
     *
     * @return Illuminate\Database\Eloquent
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Check if a user has any of the specified roles
     *
     * @param array $roles
     *
     * @return mixed
     */
    public function hasAnyRoles($roles)
    {
        return $this->roles()->whereIn('name', $roles)->first() ?? false;
    }

    /**
     * Check if user has specified role
     *
     * @param string $role
     *
     *@return mixed
     */
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->first() ?? false;
    }
}
