<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->String('HOSPCODE')->comment('รหัสโรงพยาบาล');
            $table->String('HOS_NAME')->comment('ชื่อโรงพยาบาล');
            $table->String('PERSON_ID');
            $table->String('HR_CID')->nullable()->comment('เลขบัตรแระชาชน');
            $table->String('SEX')->nullable()->comment('เพศ');
            $table->String('SEX_NAME')->nullable()->comment('เพศ');
            $table->String('HR_FNAME')->comment('ชื่อ');
            $table->String('HR_LNAME')->nullable()->comment('นามสกุล');
            $table->String('HR_BIRTHDAY')->nullable()->comment('วันเกิด');
            $table->String('HR_DEPARTMENT_NAME')->nullable()->comment('กลุ่มงาน');
            $table->String('HR_DEPARTMENT_SUB_NAME')->nullable()->comment('ฝ่าย/แผนก');
            $table->String('HR_DEPARTMENT_SUB_SUB_NAME')->nullable()->comment('หน่วยงาน');
            $table->String('HR_STARTWORK_DATE')->nullable()->comment('วันที่บรรจุ');
            $table->String('HR_POSITION_NUM')->nullable()->comment('เลขตำแหน่ง');
            $table->String('HR_POSITION_ID')->nullable()->comment('รหัสตำแหน่ง');
            $table->String('POSITION_IN_WORK')->nullable()->comment('ตำแหน่ง');
            $table->String('VCODE')->nullable()->comment('เลขใบประกอบวิชาชีพ');
            $table->String('VCODE_DATE')->nullable()->comment('วดป.รับใบประกอบ');
            $table->String('HR_LEVEL_NAME')->nullable()->comment('ระดับ');
            $table->String('HR_STATUS_NAME')->nullable()->comment('สถานะปัจจุบัน');
            $table->String('HR_KIND_NAME')->nullable()->comment('กลุ่มข้าราชการ');
            $table->String('HR_KIND_TYPE_NAME')->nullable()->comment('ประเภทข้าราชการ');
            $table->String('HR_PERSON_TYPE_ID')->nullable()->comment('รหัสกลุ่มบุคลากร');
            $table->String('HR_PERSON_TYPE_NAME')->nullable()->comment('กลุ่มบุคลากร');
            $table->String('HR_AGENCY_ID')->nullable()->comment('ต้นสังกัด');
            $table->String('HR_SALARY')->nullable()->comment('เงินเดือน');
            $table->String('MONEY_POSITION')->nullable()->comment('เงินประจำตำแหน่ง');
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
        Schema::dropIfExists('persons');
    }
}
