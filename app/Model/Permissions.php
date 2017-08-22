<?php

namespace App\Model;

use App\Common\Constants\PermissionsTable;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
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
        
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
