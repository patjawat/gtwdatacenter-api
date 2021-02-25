<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Branch;
use App\Models\Assets;

class AssetsController extends Controller
{

    public function index()
    {
        return response()->json([
            'totalsummery' => $this->totalSummery(),
            'totaltypesummery' => $this->totalTypeSummery(),
            'sexsummery' => $this->sexSummery(),
            'items'=> Assets::whereNotNull('SUP_TYPE_NAME')->limit(20)->get()
        ]);
    }

    public function total(){
        return Assets::whereNotNull('SUP_TYPE_NAME')->count();
    }

// สรุปข้อมูล chart 1
public function datasets(){
        

    $sql = "SELECT CONCAT(xxx.chwpart,'0000')as chwpart,(SELECT name FROM thaiaddress where addressid=CONCAT(xxx.chwpart,'0000'))as name,SUM(xxx.x)as person,SUM(xxx.xx)as asset,SUM(xxx.totalassetbuildings)as assetbuildings
    FROM
    (
    SELECT hospcode.chwpart,hospcode.hospcode,hospcode.name,
    (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode AND HR_PERSON_TYPE_NAME IS NOT NULL) as x,
    (SELECT count(id)as x from assets where HOSPCODE = hospcode.hospcode AND SUP_TYPE_NAME IS NOT NULL) as xx,
    (SELECT count(id)as x from assetbuildings where HOSPCODE = hospcode.hospcode) as totalassetbuildings
    FROM hospcode 
    WHERE area_code = '01'
    AND hospital_type_id IN (5,6,7)
    GROUP BY hospcode.hospcode
    HAVING x > 0
    ORDER BY x DESC) as xxx
    GROUP BY xxx.chwpart";


    $querys = DB::select($sql);
    return $querys;
    }


public function groupByHospcode(Request $request){

    $sql = "SELECT asset.* from
    (
    SELECT CONCAT(hospcode.chwpart,'0000')as chwx,
    (SELECT name FROM thaiaddress where addressid=CONCAT(hospcode.chwpart,'0000'))as ch,
    hospcode.hospcode,hospcode.name,
    (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode) as person,
    (SELECT count(id)as x from assets where HOSPCODE = hospcode.hospcode) as asset,
    (SELECT count(id)as x from assetbuildings where HOSPCODE = hospcode.hospcode) as assetbuildings
    
    FROM hospcode 
    WHERE area_code = '01'
    AND hospital_type_id IN (5,6,7)
    GROUP BY hospcode.hospcode
    HAVING person > 0
    ORDER BY person DESC) as asset
    where asset.chwx=$request->chwpart";
    
    $querys = DB::select($sql);
    return response()->json($querys);
}

public function TypeMoneySummary(){
 $sql = "SELECT
        SUM(xxx.type_uc)as type_uc,
        SUM(xxx.type_maintenance)as type_maintenance,
        SUM(xxx.type_donation)as type_donation,
        SUM(xxx.type_other)as type_other
        FROM
        (
        SELECT hospcode.chwpart,hospcode.hospcode,hospcode.name,
            (SELECT sum(PRICE_PER_UNIT)as x from assets where HOSPCODE = hospcode.hospcode AND BUDGET_NAME IS NOT NULL AND BUDGET_NAME = 'เงิน UC') as type_uc,
            (SELECT sum(PRICE_PER_UNIT)as x from assets where HOSPCODE = hospcode.hospcode AND BUDGET_NAME IS NOT NULL AND BUDGET_NAME = 'เงินบำรุง') as type_maintenance,
            (SELECT sum(PRICE_PER_UNIT)as x from assets where HOSPCODE = hospcode.hospcode AND BUDGET_NAME IS NOT NULL AND BUDGET_NAME = 'เงินบริจาค') as type_donation,
            (SELECT sum(PRICE_PER_UNIT)as x from assets where HOSPCODE = hospcode.hospcode AND BUDGET_NAME IS NOT NULL AND BUDGET_NAME NOT IN ('เงิน UC','เงินบำรุง','เงินบริจาค')) as type_other
        FROM hospcode 
        WHERE area_code = '01'
        AND hospital_type_id IN (5,6,7)
        GROUP BY hospcode.hospcode
        HAVING type_uc > 0
        ORDER BY type_uc DESC) as xxx";
        $querys = DB::select($sql);
        $data = [];
        $data[0] = [
            'label' => 'เงิน UC',
            'total' => $querys[0]->type_uc
        ];
        $data[1] = [
            'label' => 'เงินบำรุง',
            'total' => $querys[0]->type_maintenance
        ];
        $data[2] = [
            'label' => 'เงินบริจาค',
            'total' => $querys[0]->type_donation
        ];
        $data[3] = [
            'label' => 'เงินอื่น ๆ',
            'total' => $querys[0]->type_other
        ];
        return response()->json($data);
}

    private function totalSummery(){
        return '0';
    }
    private function totalTypeSummery(){
        return '0';
    }

    private function sexSummery(){
        return '0';
    }
    
}
