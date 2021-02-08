<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateThaiaddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thaiaddress', function (Blueprint $table) {
            $table->String('addressid',6)->primary();
            $table->String('name',50)->nullable();
            $table->String('chwpart',2)->nullable();
            $table->String('amppart',2)->nullable();
            $table->String('tmbpart',2)->nullable();
            $table->char('codetype',1)->nullable();
            $table->String('pocode',5)->nullable();
            $table->String('full_name',250)->nullable();
            $table->timestamps();
        });
        DB::unprepared(file_get_contents('database/db/thaiaddress.sql'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thaiaddress');
    }
}
