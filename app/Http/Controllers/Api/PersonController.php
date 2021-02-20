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
            'totaltypesummery' => $this->totalTypeSummery(),
            'datasets' => $this->datasets(),
            'totalsummery' => $this->totalSummery(),
        ]);
    }
// สรุปข้อมูล chart 1
    private function datasets(){
        $sql = "SELECT CONCAT(xxx.chwpart,'0000')as chwpart,
        (SELECT name FROM thaiaddress where addressid=CONCAT(xxx.chwpart,'0000'))as name,
        SUM(xxx.x)as person,SUM(xxx.xx)as asset,
        SUM(xxx.totalassetbuildings)as assetbuildings,
        SUM(xxx.man)as man,
        SUM(xxx.woman)as woman,
        SUM(xxx.person_type0)as person_type0,
        SUM(xxx.person_type1)as person_type1,
        SUM(xxx.person_type2)as person_type2,
        SUM(xxx.person_type3)as person_type3,
        SUM(xxx.person_type4)as person_type4,
        SUM(xxx.person_type5)as person_type5,
        SUM(xxx.person_type6)as person_type6,
        SUM(xxx.person_type7)as person_type7,
        SUM(xxx.person_type8)as person_type8,
        SUM(xxx.person_type9)as person_type9
            FROM
            (SELECT hospcode.chwpart,hospcode.hospcode,hospcode.name,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME IS NOT NULL) as x,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX ='F' AND HR_PERSON_TYPE_NAME IS NOT NULL) as man,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND SEX ='M' AND HR_PERSON_TYPE_NAME IS NOT NULL) as woman,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME IS NOT NULL AND HR_PERSON_TYPE_NAME ='ข้าราชการ') as person_type0,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME IS NOT NULL AND HR_PERSON_TYPE_NAME ='จ้างเหมาบริการ') as person_type1,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME IS NOT NULL AND HR_PERSON_TYPE_NAME ='จ้างเหมาบริการบุคคล') as person_type2,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME IS NOT NULL AND HR_PERSON_TYPE_NAME ='พนักงานกระทรวงสาธารณสุข') as person_type3,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME IS NOT NULL AND HR_PERSON_TYPE_NAME ='พนักงานราชการ') as person_type4,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME IS NOT NULL AND HR_PERSON_TYPE_NAME ='ลูกจ้างชั่วคราว') as person_type5,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME IS NOT NULL AND HR_PERSON_TYPE_NAME ='ลูกจ้างประจำ') as person_type6,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME IS NOT NULL AND HR_PERSON_TYPE_NAME ='ลูกจ้างรายคาบ') as person_type7,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME IS NOT NULL AND HR_PERSON_TYPE_NAME ='ลูกจ้างรายวัน') as person_type8,
            (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME IS NOT NULL AND HR_PERSON_TYPE_NAME ='ลูกจ้างเหมาบริการ') as person_type9,
            (SELECT count(id)as x from assets where HOSPCODE = hospcode.hospcode) as xx,
            (SELECT count(id)as x from assetbuildings where HOSPCODE = hospcode.hospcode) as totalassetbuildings
            FROM hospcode 
            WHERE area_code = '01'
            AND hospital_type_id IN (5,6,7)
            GROUP BY hospcode.hospcode
            HAVING x > 0
            ORDER BY x DESC) as xxx
            GROUP BY xxx.chwpart";
        $querys =  DB::select($sql);
        return [
            'label' => 'จำนวนบุคลากรแยกตามจังหวัด',
            'items' => $querys
        ];
        

    }

    private function totalSummery(){
        return '0';
    }
    private function totalTypeSummery(){
        $sql = "SELECT HR_PERSON_TYPE_NAME as name, count(id) as total FROM persons 
        WHERE HR_PERSON_TYPE_NAME IN('ข้าราชการ','ลูกจ้างประจำ','พนักงานราชการ','พนักงานกระทรวงสาธารณสุข','ลูกจ้างรายวัน','ลูกจ้างรายคาบ')
        AND HR_PERSON_TYPE_NAME IS NOT NULL GROUP BY HR_PERSON_TYPE_NAME";

        $querys = DB::select($sql);
        $data = [];

        foreach($querys as $query){
            $data[] = [
                'label'    => $query->name,
                'total' =>$query->total,
               
            ];
        }
      
        return [
            'label' => 'จำนวนบุคลากรแยกตามจังหวัด',
            'nullType' =>Persons::whereNull('HR_PERSON_TYPE_NAME')->count(),
            'total' => Persons::whereNotNull('HR_PERSON_TYPE_NAME')->count(),
            'items' => $data
        ];
    }

    private function sexSummery(){

        $f = Persons::where('SEX','=','F')->whereNotNull('HR_PERSON_TYPE_NAME')->count();
        $m = Persons::where('SEX','=','M')->whereNotNull('HR_PERSON_TYPE_NAME')->count();

        return [
            'f' =>$f,
            'm' =>$m
        ];
    }
    
}

// WHERE HR_PERSON_TYPE_NAME IN('ข้าราชการ','ลูกจ้างประจำ','พนักงานราชการ','พนักงานกระทรวงสาธารณสุข','ลูกจ้างรายวัน','ลูกจ้างรายคาบ')