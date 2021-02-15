<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetbuildingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assetbuildings', function (Blueprint $table) {
            $table->id();
            $table->String('HOSPCODE')->comment('รหัสโรงพยาบาล');
            $table->String('HOS_NAME')->comment('ชื่อโรงพยาบาล');
            $table->String("ASSET_BUILDING_ID");
            $table->String("SUP_FSN")->nullable();
            $table->String("BUILD_NAME")->nullable();
            $table->String("BUILD_NGUD_MONEY")->nullable()->comment('งบที่ใช้กี่บาท');
            $table->String("BUILD_CREATE")->nullable();
            $table->String("BUILD_FINISH")->nullable();
            $table->String("OLD_USE")->nullable()->comment('อายุการใช้งาน');
            $table->String("BUDGET_ID")->nullable();
            $table->String("BUDGET_NAME")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assetbuilding');
    }
}
