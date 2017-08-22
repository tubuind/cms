<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Common\Constants\UsersTable;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(UsersTable::TABLE_NAME, function (Blueprint $table) {
            $table->increments(UsersTable::FLD_ID);
            $table->string(UsersTable::FLD_NAME);
            $table->string(UsersTable::FLD_EMAIL)->unique();
            $table->string(UsersTable::FLD_PASSWORD);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(UsersTable::TABLE_NAME);
    }
}
