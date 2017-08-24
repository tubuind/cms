<?php

namespace App\Model;

use App\Common\Constants\PermissionsTable;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = PermissionsTable::TABLE_NAME;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        PermissionsTable::FLD_ID, PermissionsTable::FLD_NAME, PermissionsTable::FLD_CREATED_AT, PermissionsTable::FLD_UPDATED_AT, 
            PermissionsTable::FLD_CREATED_BY, PermissionsTable::FLD_UPDATED_BY, PermissionsTable::FLD_NOTE, PermissionsTable::FLD_STATUS 
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}