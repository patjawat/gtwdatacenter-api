<?php

use illuminate\database\migrations\migration;
use illuminate\database\schema\blueprint;
use illuminate\support\facades\schema;

class createassetstable extends migration
{
    /**
     * run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('assets',function (blueprint $table) {
            $table->id();
            $table->String('hos_code')->comment('รหัสโรงพยาบาล');
            $table->String('article_num')->comment('หัสเลขครุภัณฑ์');
            $table->String('year_id')->nullable()->comment('ปีงบประมาณ');
            $table->String('article_name')->nullable()->comment('ชื่อครุภัณฑ์');
            $table->String('article_prop')->nullable()->comment('ลักษณะ');
            $table->String('sup_unit_name')->nullable()->comment('หน่วยนับ');
            $table->String('serial_no')->nullable()->comment('เลขเครื่อง');
            $table->String('brand_name')->nullable()->comment('ยี่ห้อครุภัณฑ์');
            $table->String('color_name')->nullable()->comment('สีครุภัณฑ์');
            $table->String('model_name')->nullable()->comment('รุ่น');
            $table->String('size_name')->nullable()->comment('ขนาด');
            $table->String('price_per_unit')->nullable()->comment('ราคา');
            $table->String('receive_date')->nullable()->comment('วันที่รับเข้า');
            $table->String('method_name')->nullable()->comment('วิธีได้มา');
            $table->String('buy_name')->nullable()->comment('การจัดซื้อ');
            $table->String('budget_name')->nullable()->comment('งบที่ใช้');
            $table->String('sup_type_name')->nullable()->comment('ประเภท');
            $table->String('decline_name')->nullable()->comment('ประเภทค่าเสื่อม');
            $table->String('vendor_name')->nullable()->comment('ผู้จำหน่าย');
            $table->String('hr_department_sub_name')->nullable()->comment('ประจำหน่วยงาน');
            $table->String('location_name')->nullable()->comment('อาคาร');
            $table->String('location_level_name')->nullable()->comment('ชั้น');
            $table->String('level_room_name')->nullable()->comment('ห้อง');
            $table->String('remark')->nullable()->comment('หมายเหตุ');
            $table->String('status_name')->nullable()->comment('สถานะการใช้งาน');
            $table->String('old_use')->nullable()->comment('อายุการใช้งาน');
            $table->String('expire_date')->nullable()->comment('หมดสภาพ');
            $table->String('pm_type_name')->nullable()->comment('การบำรุงรักษา pm');
            $table->String('cal_type_name')->nullable()->comment('การสอบเทียบ cal');
            $table->String('risk_type_name')->nullable()->comment('ความเสี่ยง');
            $table->timestamps();
            // $table->primary(['asset_number')->nullable()->comment();'hos_code']);
        });
    }

    /**
     * reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropifexists('assets');
    }
}
