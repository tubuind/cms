<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string name
 * @property string created_at
 * @property string updated_at
 * @property int created_by
 * @property int updated_by
 * @property string note
 */
class Role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id', 'name', 'created_at', 'updated_at', 'created_by', 'updated_by', 'note'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

     /**
     * The roles that belong to the permissions.
     */
     public function permissions()
     {
         return $this->belongsToMany('App\Model\Permission', 'roles_permissions', 'role_id', 'permission_id');
     }
}
