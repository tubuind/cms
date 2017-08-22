<?php

namespace App\Model;

use App\Common\Constants\UsersTable;
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
        UsersTable::FLD_ID, UsersTable::FLD_NAME, UsersTable::FLD_EMAIL, UsersTable::FLD_PASSWORD, UsersTable::FLD_AVARTAR_URL,
            UsersTable::FLD_CREATED_BY, UsersTable::FLD_UPDATED_BY, UsersTable::FLD_IS_VERIFIED, UsersTable::FLD_STATUS
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        UsersTable::FLD_PASSWORD, UsersTable::FLD_REMEMBER_TOKEN
    ];
}
