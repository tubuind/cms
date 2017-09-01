<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
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
        'id', 'name', 'email', 'avatar_url', 'created_by', 'updated_by', 'password', 'remember_token',
            'created_at', 'updated_at', 'is_verified', 'status', 'ip', 'avatar_url', 'note'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The users that belong to the roles.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Model\Role', 'users_roles', 'user_id', 'role_id');
    }
}
