<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use app\Common\Constants\RolesTable;

class Roles extends Model
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
        
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
