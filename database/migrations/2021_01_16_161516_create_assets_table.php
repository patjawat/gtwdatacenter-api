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
            $table->String('HOS_CODE')->comment('รหัสโรงพยาบาล');
            $table->String('HOS_NAME')->comment('ชื่อโรงพยาบาล');
            $table->String('TYPE_SUB_ID')->nullable()->comment('ประเภท');
            $table->String('ARTICLE_NUM')->nullable()->comment('หัสเลขครุภัณฑ์');
            $table->String('YEAR_ID')->nullable()->comment('ปีงบประมาณ');
            $table->String('ARTICLE_NAME')->nullable()->comment('ชื่อครุภัณฑ์');
            $table->String('ARTICLE_PROP')->nullable()->comment('ลักษณะ');
            $table->String('SUP_UNIT_NAME')->nullable()->comment('หน่วยนับ');
            $table->String('SERIAL_NO')->nullable()->comment('เลขเครื่อง');
            $table->String('BRAND_NAME')->nullable()->comment('ยี่ห้อครุภัณฑ์');
            $table->String('COLOR_NAME')->nullable()->comment('สีครุภัณฑ์');
            $table->String('MODEL_NAME')->nullable()->comment('รุ่น');
            $table->String('SIZE_NAME')->nullable()->comment('ขนาด');
            $table->String('PRICE_PER_UNIT')->nullable()->comment('ราคา');
            $table->String('RECEIVE_DATE')->nullable()->comment('วันที่รับเข้า');
            $table->String('METHOD_NAME')->nullable()->comment('วิธีได้มา');
            $table->String('BUY_NAME')->nullable()->comment('การจัดซื้อ');
            $table->String('BUDGET_NAME')->nullable()->comment('งบที่ใช้');
            $table->String('SUP_TYPE_NAME')->nullable()->comment('ประเภท');
            $table->String('DECLINE_NAME')->nullable()->comment('ประเภทค่าเสื่อม');
            $table->String('VENDOR_NAME')->nullable()->comment('ผู้จำหน่าย');
            $table->String('HR_DEPARTMENT_SUB_NAME')->nullable()->comment('ประจำหน่วยงาน');
            $table->String('LOCATION_NAME')->nullable()->comment('อาคาร');
            $table->String('LOCATION_LEVEL_NAME')->nullable()->comment('ชั้น');
            $table->String('LEVEL_ROOM_NAME')->nullable()->comment('ห้อง');
            $table->String('REMARK')->nullable()->comment('หมายเหตุ');
            $table->String('STATUS_NAME')->nullable()->comment('สถานะการใช้งาน');
            $table->String('OLD_USE')->nullable()->comment('อายุการใช้งาน');
            $table->String('EXPIRE_DATE')->nullable()->comment('หมดสภาพ');
            $table->String('PM_TYPE_NAME')->nullable()->comment('การบำรุงรักษา PM');
            $table->String('CAL_TYPE_NAME')->nullable()->comment('การสอบเทียบ CAL');
            $table->String('RISK_TYPE_NAME')->nullable()->comment('ความเสี่ยง');
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
