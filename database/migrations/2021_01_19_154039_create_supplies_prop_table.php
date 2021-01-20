<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSuppliesPropTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies_prop', function (Blueprint $table) {
            $table->id('PROPOTIES_ID');
            $table->string('TYPE_ID',20)->default('');
            $table->string('PROPOTIES_NAME',100)->default('');
            $table->string('PROPOTIES_CODE',4)->default('');
            $table->string('UNIT_NAME')->default('');
            $table->enum('ACTIVE',['True','False'])->default('True');
            $table->string('GROUP_CLASS_CODE',4)->default('');
            $table->string('TYPE_CODE',3)->default('');
            $table->string('GROUP_CODE',2)->default('');
            $table->string('NUM',20)->default('');
            $table->timestamps();
        });
        DB::unprepared(file_get_contents('database/db/supplies_prop.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplies_prop');
    }
}
