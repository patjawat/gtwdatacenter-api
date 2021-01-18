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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->String('hos_code')->nullable()->comment('รหัสโรงพยาบาล');
            $table->String('asset_number')->nullable()->comment('รหัสครุภัณฑ์');
            $table->String('asset_name')->nullable()->comment('ชื่อ');
            $table->String('supplier')->nullable()->comment('ผู้ผลิด/ผู้ขาย');
            $table->String('cartype')->nullable()->comment('ประเภทรถ');
            $table->String('car_register')->nullable()->comment('ทะเบียนรถ');
            $table->String('life')->nullable()->comment('อายุการใช้งาน');
            $table->String('vendor')->nullable()->comment('ผู้ผลิด/ผู้ขาย');
            $table->String('department')->nullable()->comment('ประจำอยู่หน่วยงาน');
            $table->String('location')->nullable()->comment('สถานที่จัดเก็บปัจจุบัน');
            $table->String('location_leve')->nullable()->comment('อยู่ชั้นไหน');
            $table->String('location_room')->nullable()->comment('อยู่ห้องไหน');
            $table->String('buy')->nullable()->comment('วิธีการจัดซื้อ');
            $table->String('buy_year')->nullable()->comment('ปีงบประมาณ');
            $table->String('decline')->nullable()->comment('ปีงบประมาณ');
            $table->String('code_ref')->nullable()->comment('รหัสอ้างอิง');
            $table->String('property')->nullable()->comment('คุณลักษณะ');
            $table->String('fsn')->nullable()->comment('FSN');
            $table->String('class')->nullable()->comment('class');
            $table->String('group')->nullable()->comment('group');
            $table->String('sub_id')->nullable()->comment('FSN');
            $table->timestamps();
            // $table->primary(['asset_number','hos_code']);
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
