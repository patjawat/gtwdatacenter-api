<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Persons;

class PersonController extends Controller
{

    public function index()
    {
        return response()->json([
            'sexsummery' => $this->sexSummery(),
            // 'totaltypesummery' => $this->totalTypeSummery(),
            // 'datasets' => $this->datasets(),
            // 'totalsummery' => $this->totalSummery(),
        ]);
    }
    
// สรุปข้อมูล chart 1
public function datasets(){
        $sql = "SELECT CONCAT(xxx.chwpart,'0000')as chwpart,
        (SELECT name FROM thaiaddress where addressid=CONCAT(xxx.chwpart,'0000'))as name,
        SUM(xxx.x)as person,SUM(xxx.xx)as asset,
        SUM(xxx.totalassetbuildings)as assetbuildings,
        SUM(xxx.man)as man,
        SUM(xxx.woman)as woman,
        SUM(xxx.person_type_a)as person_type_a,
        SUM(xxx.person_type_b)as person_type_b,
        SUM(xxx.person_type_c)as person_type_c,
        SUM(xxx.person_type_d)as person_type_d,
        SUM(xxx.person_type_e)as person_type_e,
        SUM(xxx.person_type_f)as person_type_f,
        SUM(xxx.person_type_other)as person_type_other
            FROM
            (SELECT hospcode.chwpart,hospcode.hospcode,hospcode.name,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode) as x,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX ='F') as man,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX ='M') as woman,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX IS NULL) as nottype,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ข้าราชการ') as person_type_a,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างประจำ') as person_type_b,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='พนักงานราชการ') as person_type_c,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='พนักงานกระทรวงสาธารณสุข') as person_type_d,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างชั่วคราว') as person_type_e,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างรายวัน') as person_type_f,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND (HR_PERSON_TYPE_NAME  NOT IN('ข้าราชการ','ลูกจ้างประจำ','พนักงานราชการ','พนักงานกระทรวงสาธารณสุข','ลูกจ้างชั่วคราว','ลูกจ้างรายวัน') OR HR_PERSON_TYPE_NAME IS NULL)) as person_type_other,

            (SELECT count(id)as x from assets where HOSPCODE = hospcode.hospcode) as xx,
            (SELECT count(id)as x from assetbuildings where HOSPCODE = hospcode.hospcode) as totalassetbuildings
            FROM hospcode 
            WHERE area_code = '01'
            AND hospital_type_id IN (5,6,7)
            GROUP BY hospcode.hospcode
            ORDER BY x DESC) as xxx
            GROUP BY xxx.chwpart";
        $querys =  DB::select($sql);
        return [
            'label' => 'จำนวนบุคลากรแยกตามจังหวัด',
            'items' => $querys
        ];
        

    }
    //จำนวนบุคลากรทั้งหมด
    public function total(){
        return Persons::whereNotNull('HR_PERSON_TYPE_NAME')->count();
    }

    // จำนวนบุคลากรแบ่งตามประเภท
    public function typeSummary(){
       $type_a = Persons::where('HR_PERSON_TYPE_NAME','=','ข้าราชการ')->count();
       $type_b = Persons::where('HR_PERSON_TYPE_NAME','=','ลูกจ้างประจำ')->count();
       $type_c = Persons::where('HR_PERSON_TYPE_NAME','=','พนักงานราชการ')->count();
       $type_d = Persons::where('HR_PERSON_TYPE_NAME','=','พนักงานกระทรวงสาธารณสุข')->count();
       $type_e = Persons::where('HR_PERSON_TYPE_NAME','=','ลูกจ้างชั่วคราว')->count();
       $type_f = Persons::where('HR_PERSON_TYPE_NAME','=','ลูกจ้างรายวัน')->count();
        //อื่นๆที่ไม่มีนอกเหนือจากนี้
       $type_other = Persons::whereNotIn('HR_PERSON_TYPE_NAME',['ข้าราชการ','ลูกจ้างประจำ','พนักงานราชการ','พนักงานกระทรวงสาธารณสุข','ลูกจ้างชั่วคราว','ลูกจ้างรายวัน'])->orWhere('HR_PERSON_TYPE_NAME','=',null)->count();
       $type_null = Persons::where('HR_PERSON_TYPE_NAME','=',null)->count();
       
       // ยกเว้นข้าราชการ
       $type_other_total = Persons::whereNotIn('HR_PERSON_TYPE_NAME',['ข้าราชการ'])->count();
       $type_all = Persons::count();

       return [
           'type_a' => [
               'label' => 'ข้าราชการ',
               'total' => $type_a
           ],
           'type_b' => [
            'label' => 'ลูกจ้างประจำ',
            'total' => $type_b
           ],
           'type_c' => [
            'label' => 'พนักงานราชการ',
            'total' => $type_c
           ],
           'type_d' => [
            'label' => 'พนักงานกระทรวงสาธารณสุข',
            'total' => $type_d
           ],
           'type_e' => [
            'label' => 'ลูกจ้างชั่วคราว',
            'total' => $type_e
           ],
           'type_f' => [
            'label' => 'ลูกจ้างรายวัน',
            'total' => $type_f
           ],
           'type_all' => [
            'label' => 'จำนวนบุคลากรทั้งหมด',
            'total' => $type_all
           ],
           'type_other' => [
            'label' => 'ลูกจ้างอื่นๆ',
            'total' => $type_other
           ],
           'type_other_total' => [ // ยกเว้นข้าราชการ
            'label' => 'อื่นๆ',
            'total' => $type_other_total
           ],
           'type_null_total' => [ // ยกเว้นข้าราชการ
            'label' => 'ไม่มีหมวดหมู่',
            'total' => $type_null
        ]
       ];
       
    }

    public function sexSummery(){

        $f = Persons::where('SEX','=','F')->count();
        $m = Persons::where('SEX','=','M')->count();
        $nottype = Persons::whereNull('SEX')->count();

        return [
            'f' =>$f,
            'm' =>$m,
            'nottype' => $nottype
        ];
    }
    
}


// $sql = "SELECT CONCAT(xxx.chwpart,'0000')as chwpart,
// (SELECT name FROM thaiaddress where addressid=CONCAT(xxx.chwpart,'0000'))as name,
// SUM(xxx.x)as person,SUM(xxx.xx)as asset,
// SUM(xxx.totalassetbuildings)as assetbuildings,
// SUM(xxx.man)as man,
// SUM(xxx.woman)as woman,
// SUM(xxx.person_type_a)as person_type_a,
// SUM(xxx.person_type1)as person_type1,
// SUM(xxx.person_type_b)as person_type_b,
// SUM(xxx.person_type_c)as person_type_c,
// SUM(xxx.person_type_d)as person_type_d,
// SUM(xxx.person_type_e)as person_type_e,
// SUM(xxx.person_type_f)as person_type_f,
// SUM(xxx.person_type7)as person_type7,
// SUM(xxx.person_type8)as person_type8,
// SUM(xxx.person_type9)as person_type9
//     FROM
//     (SELECT hospcode.chwpart,hospcode.hospcode,hospcode.name,
//     (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode) as x,
//     (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX ='F') as man,
//     (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX ='M') as woman,
//     (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ข้าราชการ') as person_type_a,
//     (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='จ้างเหมาบริการ') as person_type1,
//     (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='จ้างเหมาบริการบุคคล') as person_type_b,
//     (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='พนักงานกระทรวงสาธารณสุข') as person_type_c,
//     (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='พนักงานราชการ') as person_type_d,
//     (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างชั่วคราว') as person_type_e,
//     (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างประจำ') as person_type_f,
//     (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างรายคาบ') as person_type7,
//     (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างรายวัน') as person_type8,
//     (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างเหมาบริการ') as person_type9,
//     (SELECT count(id)as x from assets where HOSPCODE = hospcode.hospcode) as xx,
//     (SELECT count(id)as x from assetbuildings where HOSPCODE = hospcode.hospcode) as totalassetbuildings
//     FROM hospcode 
//     WHERE area_code = '01'
//     AND hospital_type_id IN (5,6,7)
//     GROUP BY hospcode.hospcode
//     HAVING x > 0
//     ORDER BY x DESC) as xxx
//     GROUP BY xxx.chwpart";