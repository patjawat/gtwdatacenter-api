<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Persons;

class PersonController extends Controller
{

    public function index()
    {
        $sql = "SELECT CONCAT(xxx.chwpart,'0000')as chwpart,
        (SELECT name FROM thaiaddress where addressid=CONCAT(xxx.chwpart,'0000'))as name,
        SUM(xxx.male)as male,
          SUM(xxx.female)as female,
          SUM(xxx.nottype)as nottype,
        SUM(xxx.person_type_a)as person_type_a,
        SUM(xxx.person_type_other)as person_type_other,
        SUM(xxx.person_type_null)as person_type_null
            FROM
            (SELECT hospcode.chwpart,hospcode.hospcode,hospcode.name,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode) as x,
              (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX ='F') as male,
              (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX ='M') as female,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND (SEX IS NULL or SEX = '')) as nottype,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ข้าราชการ') as person_type_a,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างประจำ') as person_type_b,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='พนักงานราชการ') as person_type_c,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='พนักงานกระทรวงสาธารณสุข') as person_type_d,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างชั่วคราว') as person_type_e,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างรายวัน') as person_type_f,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME  NOT IN('ข้าราชการ'))as person_type_other,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME  IS NULL) as person_type_null,
  
            (SELECT count(id)as x from assets where HOSPCODE = hospcode.hospcode) as xx,
            (SELECT count(id)as x from assetbuildings where HOSPCODE = hospcode.hospcode) as totalassetbuildings
            FROM hospcode 
            WHERE area_code = '01'
            AND hospital_type_id IN (5,6,7)
            ORDER BY x DESC) as xxx";
          $querys =  DB::select($sql);
          
        return response()->json([
                'male' =>(int) $querys[0]->male,
                'female' =>(int) $querys[0]->female,
                'nottype' =>(int) $querys[0]->nottype,
                'type_a' =>(int) $querys[0]->person_type_a,
                'type_other' =>(int) $querys[0]->person_type_other,
                'type_null' =>(int) $querys[0]->person_type_null,
                'typesummary' => $this->typeSummary(),
                'datasets' => $this->datasets()
        ]);
    }
    
// สรุปข้อมูล chart 1
private function datasets(){
       

        $sql = "SELECT CONCAT(xxx.chwpart,'0000')as chwpart,
        (SELECT name FROM thaiaddress where addressid=CONCAT(xxx.chwpart,'0000'))as name,
        SUM(xxx.x)as person,
        SUM(xxx.xx)as asset,
        SUM(xxx.totalassetbuildings)as assetbuildings,
        SUM(xxx.male)as male,
        SUM(xxx.female)as female,
        SUM(xxx.person_type_a)as person_type_a,
        SUM(xxx.person_type_b)as person_type_b,
        SUM(xxx.person_type_c)as person_type_c,
        SUM(xxx.person_type_d)as person_type_d,
        SUM(xxx.person_type_e)as person_type_e,
        SUM(xxx.person_type_f)as person_type_f,
        SUM(xxx.person_type_other)as person_type_other,
        SUM(xxx.person_type_other_and_null)as person_type_other_and_null,
        SUM(xxx.person_type_null)as person_type_null
            FROM
            (SELECT hospcode.chwpart,hospcode.hospcode,hospcode.name,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode) as x,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX ='F') as male,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX ='M') as female,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX IS NULL) as nottype,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ข้าราชการ') as person_type_a,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างประจำ') as person_type_b,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='พนักงานราชการ') as person_type_c,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='พนักงานกระทรวงสาธารณสุข') as person_type_d,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างชั่วคราว') as person_type_e,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างรายวัน') as person_type_f,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME  NOT IN('ข้าราชการ','ลูกจ้างประจำ','พนักงานราชการ','พนักงานกระทรวงสาธารณสุข','ลูกจ้างชั่วคราว','ลูกจ้างรายวัน')) as person_type_other,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND (HR_PERSON_TYPE_NAME  NOT IN('ข้าราชการ','ลูกจ้างประจำ','พนักงานราชการ','พนักงานกระทรวงสาธารณสุข','ลูกจ้างชั่วคราว','ลูกจ้างรายวัน') OR HR_PERSON_TYPE_NAME IS NULL)) as person_type_other_and_null,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME  IS NULL) as person_type_null,

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

        $sql = "SELECT CONCAT(xxx.chwpart,'0000')as chwpart,
        (SELECT name FROM thaiaddress where addressid=CONCAT(xxx.chwpart,'0000'))as name,
        SUM(xxx.x)as person,
        SUM(xxx.xx)as asset,
        SUM(xxx.totalassetbuildings)as assetbuildings,
        SUM(xxx.male)as male,
        SUM(xxx.female)as female,
        SUM(xxx.person_type_a)as person_type_a,
        SUM(xxx.person_type_b)as person_type_b,
        SUM(xxx.person_type_c)as person_type_c,
        SUM(xxx.person_type_d)as person_type_d,
        SUM(xxx.person_type_e)as person_type_e,
        SUM(xxx.person_type_f)as person_type_f,
        SUM(xxx.person_type_other)as person_type_other,
        SUM(xxx.person_type_other_and_null)as person_type_other_and_null,
        SUM(xxx.person_type_null)as person_type_null
            FROM
            (SELECT hospcode.chwpart,hospcode.hospcode,hospcode.name,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode) as x,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX ='F') as male,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX ='M') as female,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX IS NULL) as nottype,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ข้าราชการ') as person_type_a,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างประจำ') as person_type_b,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='พนักงานราชการ') as person_type_c,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='พนักงานกระทรวงสาธารณสุข') as person_type_d,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างชั่วคราว') as person_type_e,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME ='ลูกจ้างรายวัน') as person_type_f,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME  NOT IN('ข้าราชการ','ลูกจ้างประจำ','พนักงานราชการ','พนักงานกระทรวงสาธารณสุข','ลูกจ้างชั่วคราว','ลูกจ้างรายวัน')) as person_type_other,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND (HR_PERSON_TYPE_NAME  NOT IN('ข้าราชการ','ลูกจ้างประจำ','พนักงานราชการ','พนักงานกระทรวงสาธารณสุข','ลูกจ้างชั่วคราว','ลูกจ้างรายวัน') OR HR_PERSON_TYPE_NAME IS NULL)) as person_type_other_and_null,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME  IS NULL) as person_type_null,

            (SELECT count(id)as x from assets where HOSPCODE = hospcode.hospcode) as xx,
            (SELECT count(id)as x from assetbuildings where HOSPCODE = hospcode.hospcode) as totalassetbuildings
            FROM hospcode 
            WHERE area_code = '01'
            AND hospital_type_id IN (5,6,7)
            GROUP BY hospcode.hospcode
            ORDER BY x DESC) as xxx";
        $querys =  DB::select($sql);

               return [
           'type_a' => [
               'label' => 'ข้าราชการ',
               'total' => $querys[0]->person_type_a
           ],
           'type_b' => [
            'label' => 'ลูกจ้างประจำ',
            'total' => $querys[0]->person_type_b
           ],
           'type_c' => [
            'label' => 'พนักงานราชการ',
            'total' => $querys[0]->person_type_c
           ],
           'type_d' => [
            'label' => 'พนักงานกระทรวงสาธารณสุข',
            'total' => $querys[0]->person_type_d
           ],
           'type_e' => [
            'label' => 'ลูกจ้างชั่วคราว',
            'total' => $querys[0]->person_type_e
           ],
           'type_f' => [
            'label' => 'ลูกจ้างรายวัน',
            'total' => $querys[0]->person_type_f
           ],
           'type_all' => [
            'label' => 'จำนวนบุคลากรทั้งหมด',
            'total' => $querys[0]->person
           ],
           'type_other' => [
            'label' => 'ลูกจ้างอื่นๆ',
            'total' => $querys[0]->person_type_other
           ],

           'type_null_total' => [ // ยกเว้นข้าราชการ
            'label' => 'ไม่มีหมวดหมู่',
            'total' => $querys[0]->person_type_null
           ],
           'type_other_and_null' => [ // ยกเว้นข้าราชการ
            'label' => 'อื่นๆ (รวมค่าว่าง)',
            'total' => $querys[0]->person_type_other_and_null
           ],

       ];

    }


    public function items(Request $request){
        $key = $request->get('key');
        $data = Persons::select('persons.*','branchs.hospcode','branchs.name','branchs.province','branchs.service_plan')
        ->leftJoin('branchs','branchs.hospcode','=','persons.HOSPCODE')
        ->where('HR_FNAME', 'like',$key . '%')
            ->orWhere('HR_LNAME', 'like', '%' . $key . '%')
            ->orWhere('persons.HOSPCODE', 'like', '%' . $key . '%')
            ->orWhere('HOS_NAME', 'like', '%' . $key . '%')
            ->orWhere('POSITION_IN_WORK', 'like', '%' . $key . '%')
            ->orWhere('HR_PERSON_TYPE_NAME', 'like', '%' . $key . '%')
            ->orWhere('province', 'like', '%' . $key . '%')
            ->orWhere('HR_LEVEL_NAME', 'like', '%' . $key . '%')
            ->orWhere('name', 'like', '%' . $key . '%')
            ->paginate(10)
            ->appends(request()
            ->query());
        return response()->json( $key ? $data  : Persons::where('id','=','0')->paginate(10));
    
    }


    public function reportsPositionInProvince(){
        // $sql = "SELECT p1.POSITION_IN_WORK as name,
        // (SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = p1.POSITION_IN_WORK) as total,
        // (SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = p1.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'น่าน')) as nan,
        // (SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = p1.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'พะเยา')) as phayao,
        // (SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = p1.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'ลำปาง')) as lampang,
        // (SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = p1.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'ลำพูน')) as lampoon,
        // (SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = p1.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'เชียงราย')) as chiangrai,
        // (SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = p1.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'เชียงใหม่')) as chiangmai,
        // (SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = p1.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'แพร่')) as phrae,
        // (SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = p1.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'แม่ฮ่องสอน')) as maehongson
        // FROM persons p1
        // GROUP by p1.POSITION_IN_WORK";
        //  $querys =  DB::select($sql);

         $querys = Persons::select(
             DB::raw('POSITION_IN_WORK as name'),
             DB::raw("(SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = persons.POSITION_IN_WORK) as total"),
             DB::raw("(SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = persons.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'น่าน')) as nan"),
             DB::raw("(SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = persons.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'พะเยา')) as phayao"),
             DB::raw("(SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = persons.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'ลำปาง')) as lampang"),
             DB::raw("(SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = persons.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'ลำพูน')) as lampoon"),
             DB::raw("(SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = persons.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'เชียงราย')) as chiangrai"),
             DB::raw("(SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = persons.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'เชียงใหม่')) as chiangmai"),
             DB::raw("(SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = persons.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'แพร่')) as phrae"),
             DB::raw("(SELECT count(id) FROM persons p2 WHERE POSITION_IN_WORK = persons.POSITION_IN_WORK AND HOSPCODE IN (SELECT hospcode FROM branchs WHERE province = 'แม่ฮ่องสอน')) as maehongson"),
             )
         ->groupBy('POSITION_IN_WORK')
         ->limit(1)
         ->paginate(10);

         return response()->json([
             'label' =>'รายงานบุคลากรแยกตามวิชาชีพ',
             'items' =>$querys
         ]);
    }


    // public function personTypeSummary(){

    
    // }

    // public function sexSummary(){

    //     $f = Persons::where('SEX','=','F')->count();
    //     $m = Persons::where('SEX','=','M')->count();
    //     $nottype = Persons::whereNull('SEX')->count();

    //     return [
    //         'f' =>$f,
    //         'm' =>$m,
    //         'nottype' => $nottype
    //     ];
    // }
    
}
