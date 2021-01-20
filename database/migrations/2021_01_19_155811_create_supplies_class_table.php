<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSuppliesClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies_class', function (Blueprint $table) {
            $table->id('ID');
            $table->string('CLASS_CODE',4)->default('');
            $table->string('GROUP_CODE',4)->default('');
            $table->string('CLASS_NAME',50)->default('');
            $table->string('GROUP_CLASS_CODE',6)->default('');
            $table->enum('ACTIVE',['True','False'])->default('True');
            $table->timestamps();
        });
        DB::unprepared(file_get_contents('database/db/supplies_class.sql'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplies_class');
    }
}
