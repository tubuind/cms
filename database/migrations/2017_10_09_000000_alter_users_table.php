<?php

use App\Common\Constants\CommonConstants;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Common\Constants\UsersTable;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(UsersTable::TABLE_NAME, function (Blueprint $table) {
            $table->string(UsersTable::FLD_AVARTAR_URL)->nullable();
            $table->ipAddress(UsersTable::FLD_IP)->nullable();
            $table->ipAddress(UsersTable::FLD_IP)->nullable();
            $table->integer(UsersTable::FLD_CREATED_BY);   
            $table->integer(UsersTable::FLD_UPDATED_BY);
            $table->string(UsersTable::FLD_NOTE)->nullable();
            $table->boolean(UsersTable::FLD_IS_VERIFIED);
            $table->enum(UsersTable::FLD_STATUS, CommonConstants::COMMON_STATUS);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(UsersTable::TABLE_NAME, function (Blueprint $table) {
            $table->dropColumn(UsersTable::FLD_IP);
            $table->dropColumn(UsersTable::FLD_CREATED_BY);
            $table->dropColumn(UsersTable::FLD_UPDATED_BY);
            $table->dropColumn(UsersTable::FLD_NOTE);
            $table->dropColumn(UsersTable::FLD_STATUS);
        });
    }
}
