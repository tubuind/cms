<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Common\Constants\CommonConstants;
use App\Common\Constants\RolesTable;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(RolesTable::TABLE_NAME, function (Blueprint $table) {
            $table->increments(RolesTable::FLD_ID);
            $table->string(RolesTable::FLD_NAME)->unique();
            $table->timestamps();
            $table->integer(RolesTable::FLD_CREATED_BY);
            $table->integer(RolesTable::FLD_UPDATED_BY);
            $table->string(RolesTable::FLD_NOTE)->nullable();
            $table->enum(RolesTable::FLD_STATUS, CommonConstants::COMMON_STATUS);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Constants.RolesTable::TABLE_NAME);
    }
}
