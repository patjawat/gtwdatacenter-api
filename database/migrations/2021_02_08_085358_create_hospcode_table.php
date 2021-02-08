<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateHospcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospcode', function (Blueprint $table) {
            $table->String('hospcode',5)->primary();
            $table->String('amppart',2)->nullable();
            $table->String('chwpart',2)->nullable();
            $table->String('hosptype',50)->nullable();
            $table->String('name',100)->nullable();
            $table->String('tmbpart',2)->nullable();
            $table->String('moopart',2)->nullable();
            $table->String('hospital_type_id',11)->nullable(null);
            $table->String('hospital_level_id',11)->nullable();
            $table->String('hospital_phone',50)->nullable();
            $table->String('province_name',100)->nullable();
            $table->String('addrpart',150)->nullable();
            $table->String('area_code',2)->nullable();
            $table->timestamps();
        });
        DB::unprepared(file_get_contents('database/db/hospcode.sql'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospcode');
    }
}
