<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Common\Constants\CommonConstants;
use App\Common\Constants\PermissionsTable;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(PermissionsTable::TABLE_NAME, function (Blueprint $table) {
            $table->increments(PermissionsTable::FLD_ID);
            $table->string(PermissionsTable::FLD_NAME);
            $table->string(PermissionsTable::FLD_ACTION)->unique();
            $table->timestamps();
            $table->integer(PermissionsTable::FLD_CREATED_BY);
            $table->integer(PermissionsTable::FLD_UPDATED_BY);
            $table->string(PermissionsTable::FLD_NOTE)->nullable();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(PermissionsTable::TABLE_NAME);
    }
}
