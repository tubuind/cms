<?php

use App\Common\Constants\RolesPermissionsTable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Common\Constants\PermissionsTable;
use app\Common\Constants\RolesTable;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(RolesPermissionsTable::TABLE_NAME, function (Blueprint $table) {
            $table->increments(RolesPermissionsTable::FLD_ID);
            $table->integer(RolesPermissionsTable::FLD_PERMISSION_ID)->unsigned();
            $table->integer(RolesPermissionsTable::FLD_ROLE_ID)->unsigned();
            
            $table->foreign(RolesPermissionsTable::FLD_PERMISSION_ID)
            ->references(PermissionsTable::FLD_ID)->on(PermissionsTable::TABLE_NAME)
            ->onDelete('cascade');
            
            $table->foreign(RolesPermissionsTable::FLD_ROLE_ID)
            ->references(RolesTable::FLD_ID)->on(RolesTable::TABLE_NAME)
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(RolesPermissionsTable::TABLE_NAME);
    }
}
