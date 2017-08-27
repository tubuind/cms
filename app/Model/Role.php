<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Common\Constants\RolesTable;

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
    protected $table = RolesTable::TABLE_NAME;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         RolesTable::FLD_ID,  RolesTable::FLD_NAME,  RolesTable::FLD_CREATED_AT,  RolesTable::FLD_UPDATED_AT,
         RolesTable::FLD_CREATED_BY,  RolesTable::FLD_UPDATED_BY,  RolesTable::FLD_NOTE
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
