<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSuppliesGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies_group', function (Blueprint $table) {
            $table->id('GROUP_CODE',2);
            $table->string('GROUP_NAME',60)->default('');
            $table->enum('ACTIVE',['True','False'])->default('True');
            $table->timestamps();
        });
        DB::unprepared(file_get_contents('database/db/supplies_group.sql'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplies_group');
    }
}
