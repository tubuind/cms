<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Common\Constants\PasswordResetsTable;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(PasswordResetsTable::TABLE_NAME, function (Blueprint $table) {
            $table->string(PasswordResetsTable::FLD_EMAIL)->index();
            $table->string(PasswordResetsTable::FLD_TOKEN);
            $table->timestamp(PasswordResetsTable::FLD_CREATED_AT)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(PasswordResetsTable::TABLE_NAME);
    }
}
