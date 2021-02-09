<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets',function (Blueprint $table) {
        $table->id();
        $table->String('ARTICLE_NUM')->nullable()->comment('หัสเลขครุภัณฑ์');
        $table->String('ARTICLE_NAME')->nullable()->comment('ชื่อครุภัณฑ์');
        $table->String('RECEIVE_DATE')->nullable()->comment('วันที่รับเข้า');
        $table->String('PRICE_PER_UNIT')->nullable()->comment('ราคา');
        $table->String('REMARK')->nullable()->comment('หมายเหตุ');
        $table->String('EXPIRE_DATE')->nullable()->comment('หมดสภาพ');
        $table->String('OLD_USE')->nullable()->comment('อายุการใช้งาน');
        $table->String('METHOD_NAME')->nullable()->comment('วิธีได้มา');
        $table->String('BUY_NAME')->nullable()->comment('การจัดซื้อ');
        $table->String('BUDGET_NAME')->nullable()->comment('งบที่ใช้');
        $table->String('DECLINE_NAME')->nullable()->comment('ประเภทค่าเสื่อม');
        $table->timestamps();
            // $table->primary(['asset_number')->nullable()->comment();'hos_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
