<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSuppliesTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies_type', function (Blueprint $table) {
            $table->string('SUP_TYPE_ID');
            $table->string('SUP_TYPE_NAME',100)->default('');
            $table->enum('ACTIVE',['True','False'])->default('True');
            $table->string('SUP_TYPE_MASTER_ID',10)->default('');
            $table->timestamps();
            $table->primary('SUP_TYPE_ID');
        });
        DB::unprepared(file_get_contents('database/db/supplies_type.sql'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplies_type');
    }
}
