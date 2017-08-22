<?php

use App\Common\Constants\UsersRolesTable;
use App\Common\Constants\UsersTable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\Common\Constants\RolesTable;

class CreateUsersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(UsersRolesTable::TABLE_NAME, function (Blueprint $table) {
            $table->increments(UsersRolesTable::FLD_ID); 
            $table->integer(UsersRolesTable::FLD_USER_ID)->unsigned();
            $table->integer(UsersRolesTable::FLD_ROLE_ID)->unsigned();
            $table->timestamps();
            $table->integer(UsersRolesTable::FLD_CREATED_BY)->nullable();
            $table->integer(UsersRolesTable::FLD_UPDATED_BY)->nullable();
            
            $table->foreign(UsersRolesTable::FLD_USER_ID)
            ->references(UsersTable::FLD_ID)->on(UsersTable::TABLE_NAME)
            ->onDelete('cascade');
            
            $table->foreign(UsersRolesTable::FLD_ROLE_ID)
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
        Schema::dropIfExists(UsersRolesTable::TABLE_NAME);
    }
}
