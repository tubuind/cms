<?php

use App\Common\Constants\CommonConstants;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar_url')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->string('note')->nullable();
            $table->boolean('is_verified');
            $table->enum('status', CommonConstants::COMMON_STATUS);
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
            $table->dropColumn('avatar_url');
            $table->dropColumn('ip');
            $table->dropColumn('created_by');
            $table->dropColumn('updated_by');
            $table->dropColumn('note');
            $table->dropColumn('is_verified');
            $table->dropColumn('status');
        });
    }
}
