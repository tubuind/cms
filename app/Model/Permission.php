<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string action
 * @property string name
 * @property string created_at
 * @property string updated_at
 * @property int created_by
 * @property int updated_by
 * @property string note
 */
class Permission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'action',  'created_at',  'updated_at', 'created_by', 'updated_by', 'note'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The permissions that belong to the roles.
     */
     public function roles()
     {
         return $this->belongsToMany('App\Model\Role', 'roles_permissions', 'permission_id', 'role_id');
     }
}
