<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Logs;
use App\Models\Branch;
use App\Models\BranchGroup;
use App\Models\Assets;
use App\Models\Assetbuilding;
use App\Models\PersonGroup;
use App\Models\PersonWork;
use App\Models\PersonPosition;
use App\Models\Persons;
use App\Models\User;
use App\Models\Hospcode;

class DatacenterController extends Controller
{


    public function index(Request $request){
        $hospcode = $request->hospcode;

        return response()->json([
            'infomation' => [
                'labels' => 'ข้อมูลพื้นฐาน',
                'branchs' => $this->branch($hospcode),
                // 'authdaily' => $this->authDaily($hospcode),
            ],
            'provincegroup' => $this->ProvinceGroup(),
            'person' => $this->personSummary($hospcode),
            'assets' => $this->assetsSummary($hospcode)
        ]);
    }
    

    // สรุปข้อมูลครุภัณฑ์
    private function assetsSummary($hospcode){
        // $items = Assets::all();
        $items = $hospcode ? Assets::where(['HOSPCODE' => $hospcode])->get() : Assets::all();
        return [
            'items' => 'ข้อมูลทรัพย์สิน',
            'total' => $items->count(),
            'datasets' => $this->assetDataset(),
            'items' => $items
        ];
    }
// สรุปข้อมูลบุคลากร
    private function assetDataset($hospcode = null){
        return Assets::limit(1);
    }

 // สรุปข้อมูลบุคลากร
    private function personSummary($hospcode){
        $items = $hospcode ? Persons::where(['HOSPCODE' => $hospcode])->get() : Persons::all();
        return [
            'datasets' => $this->personDataset(),
            'items' => 'ข้อมูลบุคลากร',
            'total' => $items->count(),
            'items' => $items
        ];
    }

private function ProvinceGroup($hospcode = null){


    $sql = "SELECT CONCAT(xxx.chwpart,'0000')as chwpart,(SELECT name FROM thaiaddress where addressid=CONCAT(xxx.chwpart,'0000'))as name,SUM(xxx.x)as person,SUM(xxx.xx)as asset,SUM(xxx.asset05)as asset05
    FROM
    (
    SELECT hospcode.chwpart,hospcode.hospcode,hospcode.name,
    (SELECT count(id)as x from persons where HOSPCODE = hospcode.hospcode) as x,
    (SELECT count(id)as x from assets where HOSPCODE = hospcode.hospcode) as xx,
        (SELECT count(id)as x from assets where HOSPCODE = hospcode.hospcode AND GROUP_CLASS_CODE = '0005') as asset05
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
    (SELECT count(id)as x from assets where HOSPCODE = hospcode.hospcode AND GROUP_CLASS_CODE = '0005') as asset05
    
    FROM hospcode 
    WHERE area_code = '01'
    AND hospital_type_id IN (5,6,7)
    GROUP BY hospcode.hospcode
    HAVING person > 0
    ORDER BY person DESC) as asset
    where asset.chwx=$request->chwpart";
    $querys = DB::select($sql);
    // return response()->json($request->chwpart);
    return response()->json($querys);
}

// สรุปข้อมูลบุคลากร
private function personDataset($hospcode = null){

    $hos =  $query = Persons::select('HOSPCODE','HOS_NAME')
    ->groupBy('HOSPCODE')
    ->get();

    $main = Persons::select('HOSPCODE','HOS_NAME')
    ->groupBy('HOSPCODE')
    ->get();


    $data = [];
 
    foreach ($main as $key => $value){
        $data['label'][] = $value->HOS_NAME;
        $data['data'] = $this->subType($value->hospcode, $value->HR_PERSON_TYPE_NAME);
    }
    return  $data;
}
private function subType($hospcode,$TYPE){
    $data = [];
    $query = Persons::select('HOSPCODE','HR_PERSON_TYPE_NAME')
    ->groupBy('HR_PERSON_TYPE_NAME')
    ->get();

    foreach ($query as $sub){
        $data[] = [
            'label' =>$sub->HR_PERSON_TYPE_NAME,
            'data' => $this->subDataType($sub->HR_PERSON_TYPE_NAME)
        ];
    }

    return $data;
}

private function subDataType($data){

    $main = Persons::select('HOSPCODE','HOS_NAME')
    ->groupBy('HOSPCODE')
    ->get();
 
    $total = [];
    foreach ($main as $key => $value){
        $total[] = Persons::select('HOSPCODE')
        ->where('HR_PERSON_TYPE_NAME','=',$data)
        ->where('HOSPCODE','=',$value->hospcode)->count();
    }
    return $total;
}



private function branch(){
    $item = [];
    foreach (Branch::all() as $branch)
    {
        $item[] = [
            'HOSPCODE' => $branch->hospcode,
            'name' => $branch->name,
            'service_plan' => $branch->service_plan,
            // 'summaryAsset' => $this->summeryAsset($branch->hospcode),
            // 'summaryPerson' => $this->summeryPerson($branch->hospcode)
        ];
    }


    return [
        // 'total' => $branch->count(),
        'items' =>  $item
    ];
}

// private function summeryAsset($id){
//     return Assets::where(['HOSPCODE' => $id])->count();
// }


// การเข้าใช้งานประจำวัน
    private function authDaily(){
        return DB::table('logs')
        ->select('hos_name', DB::raw('COUNT(hoscode) as total'))
        ->where('created_at', 'like', date('Y-m-d').'%')
        ->where('type', '=','login')
        ->groupBy('hos_name')
        ->get();
    }
    

    //นับจำนวน record ตามหน่วยบริการ
    public function summaryClient(Request $request){
        return response()->json([
            'assets' => Assets::where('HOSPCODE','=',$request->hospcode)->count(),
            'assetbuilding' => Assetbuilding::where('HOSPCODE','=',$request->hospcode)->count(),
            'person' => Persons::where('HOSPCODE','=',$request->hospcode)->count()
        ]);
    }

    private static function summaryType(){
        return Assets::select(['supplies_type.SUP_TYPE_ID','supplies_type.SUP_TYPE_NAME'])
                ->leftJoin('supplies_type','supplies_type.SUP_TYPE_ID','=','assets.TYPE_SUB_ID')
                ->get();
    }

    // สรุปข้อมูลพนักงาน
    public function importPerson(Request $request){
        // เก็บ logs ###
       $value = $request;
        // foreach($request->items as $key => $value){
            $data = Persons::create([
                    'HOSPCODE' =>  $value['HOSPCODE'],
                    'HOS_NAME' =>$value['HOS_NAME'],
                    'HR_CID' => $value['HR_CID'],
                    'PERSON_ID'=> $value['PERSON_ID'],
                    'HR_FNAME'=> $value['HR_FNAME'],
                    'HR_LNAME'=> $value['HR_LNAME'],
                    'HR_CID'=> $value['HR_CID'],
                    'HR_BIRTHDAY'=> $value['HR_BIRTHDAY'],
                    'SEX'=> $value['SEX'],
                    'SEX_NAME'=> $value['SEX_NAME'],
                    'HR_DEPARTMENT_NAME'=> $value['HR_DEPARTMENT_NAME'],
                    'HR_DEPARTMENT_SUB_NAME'=> $value['HR_DEPARTMENT_SUB_NAME'],
                    'HR_DEPARTMENT_SUB_SUB_NAME'=> $value['HR_DEPARTMENT_SUB_SUB_NAME'],
                    'HR_STARTWORK_DATE'=> $value['HR_STARTWORK_DATE'],
                    'HR_POSITION_NUM'=> $value['HR_POSITION_NUM'],
                    'HR_POSITION_ID'=> $value['HR_POSITION_ID'],
                    'POSITION_IN_WORK'=> $value['POSITION_IN_WORK'],
                    'VCODE'=> $value['VCODE'],
                    'VCODE_DATE'=> $value['VCODE_DATE'],
                    'HR_LEVEL_NAME'=> $value['HR_LEVEL_NAME'],
                    'HR_STATUS_NAME'=> $value['HR_STATUS_NAME'],
                    'HR_KIND_NAME'=> $value['HR_KIND_NAME'],
                    'HR_KIND_TYPE_NAME'=> $value['HR_KIND_TYPE_NAME'],
                    'HR_PERSON_TYPE_ID'=> $value['HR_PERSON_TYPE_ID'],
                    'HR_PERSON_TYPE_NAME'=> $value['HR_PERSON_TYPE_NAME'],
                    'HR_AGENCY_ID'=> $value['HR_AGENCY_ID'],
                    'HR_SALARY'=> $value['HR_SALARY'],
                    'MONEY_POSITION'=> $value['MONEY_POSITION'],
            ]); 
        // }
        $this->updateLog('update-person',$data);
        
        return response()->json($data, 200);        

    }

    //นำเข้าข้อมูลทรัพสิน
    public function importAsset(Request $request){
       

        $value = $request;
        $data = Assets::create([
            'HOSPCODE' =>  $value['HOSPCODE'],
            'ARTICLE_ID' => $value['ARTICLE_ID'],
            'HOS_NAME' => isset($value['HOS_NAME']) ? $value['HOS_NAME'] : NULL ,
            'GROUP_CLASS_CODE' => isset($value['ARTICLE_NUM'] ) ? $value['ARTICLE_NUM'] : NULL,
            'GROUP_CLASS_CODE' => isset($value['GROUP_CLASS_CODE'] ) ? $value['GROUP_CLASS_CODE'] : NULL,
            'TYPE_CODE' => isset($value['TYPE_CODE']) ? $value['TYPE_CODE'] : NULL,
            'GROUP_CODE' => isset($value['GROUP_CODE'] ) ? $value['GROUP_CODE'] : NULL,
            'NUM' => isset($value['NUM'] ) ? $value['NUM'] : NULL,
            'TYPE_SUB_ID' => isset($value['TYPE_SUB_ID']) ? $value['TYPE_SUB_ID'] : NULL,
            'YEAR_ID' => isset($value['YEAR_ID']) ? $value['YEAR_ID'] : NULL,
            'ARTICLE_NAME' => isset($value['ARTICLE_NAME'] ) ? $value['ARTICLE_NAME'] : NULL,
            'ARTICLE_PROP' => isset($value['ARTICLE_PROP'] ) ? $value['ARTICLE_PROP'] : NULL,
            'SUP_UNIT_NAME' => isset($value['SUP_UNIT_NAME'] ) ? $value['SUP_UNIT_NAME'] : NULL,
            'SERIAL_NO' => isset($value['SERIAL_NO'] ) ? $value['SERIAL_NO'] : NULL,
            'BRAND_NAME' => isset($value['BRAND_NAME'] ) ? $value['BRAND_NAME'] : NULL,
            'COLOR_NAME' => isset($value['COLOR_NAME'] ) ? $value['COLOR_NAME'] : NULL,
            'MODEL_NAME' => isset($value['MODEL_NAME'] ) ? $value['MODEL_NAME'] : NULL,
            'SIZE_NAME' => isset($value['SIZE_NAME'] ) ? $value['SIZE_NAME'] : NULL,
            'PRICE_PER_UNIT' => isset($value['PRICE_PER_UNIT'] ) ? $value['PRICE_PER_UNIT'] : NULL,
            'RECEIVE_DATE' => isset($value['RECEIVE_DATE'] ) ? $value['RECEIVE_DATE'] : NULL,
            'METHOD_NAME' => isset($value['METHOD_NAME'] ) ? $value['METHOD_NAME'] : NULL,
            'BUY_NAME' => isset($value['BUY_NAME'] ) ? $value['BUY_NAME'] : NULL,
            'BUDGET_NAME' => isset($value['BUDGET_NAME'] ) ? $value['BUDGET_NAME'] : NULL,
            'SUP_TYPE_NAME' => isset($value['SUP_TYPE_NAME']) ? $value['SUP_TYPE_NAME'] : NULL,
            'DECLINE_NAME' => isset($value['DECLINE_NAME']) ? $value['DECLINE_NAME'] : NULL,
            'VENDOR_NAME' => isset($value['VENDOR_NAME']) ? $value['VENDOR_NAME'] : NULL,
            'HR_DEPARTMENT_SUB_NAME' => isset($value['HR_DEPARTMENT_SUB_NAME'] ) ? $value['HR_DEPARTMENT_SUB_NAME'] : NULL,
            'LOCATION_NAME' => isset($value['LOCATION_NAME'] ) ? $value['LOCATION_NAME'] : NULL,
            'LOCATION_LEVEL_NAME' => isset($value['LOCATION_LEVEL_NAME'] ) ? $value['LOCATION_LEVEL_NAME'] : NULL,
            'LEVEL_ROOM_NAME' => isset($value['LEVEL_ROOM_NAME'] ) ? $value['LEVEL_ROOM_NAME'] : NULL,
            'REMARK' => isset($value['REMARK'] ) ? $value['REMARK'] : NULL,
            'STATUS_NAME' => isset($value['STATUS_NAME'] ) ? $value['STATUS_NAME'] : NULL,
            'OLD_USE' => isset($value['OLD_USE'] ) ? $value['OLD_USE'] : NULL,
            'EXPIRE_DATE' => isset($value['EXPIRE_DATE'] ) ? $value['EXPIRE_DATE'] : NULL,
            'PM_TYPE_NAME' => isset($value['PM_TYPE_NAME'] ) ? $value['PM_TYPE_NAME'] : NULL,
            'CAL_TYPE_NAME' => isset($value['CAL_TYPE_NAME'] ) ? $value['CAL_TYPE_NAME'] : NULL,
            'RISK_TYPE_NAME' => isset($value['RISK_TYPE_NAME'] ) ? $value['RISK_TYPE_NAME'] : NULL
           ]
        );
        $this->updateLog('update-asset',$data);
        return response()->json($data, 200);
    }

    public function clearRecord(Request $request){
        $type = $request->type;
        $hospcode = $request->infomation['hospcode'];

            switch ($type) {
            case "asset":
                $result = Assets::where('HOSPCODE','=',$hospcode)->delete();
                break;
            case "assetbuilding":
                $result = Assetbuilding::where('HOSPCODE','=',$hospcode)->delete();
                break;
            case "person":
                $result = Persons::where('HOSPCODE','=',$hospcode)->delete();
                break;
            default:
               null;
            }

        return response()->json([
            'result' => $result,
            'type' => $type,
            'hospcode' => $hospcode
        ]);
    }
       //นำเข้าข้อมูลสิ่งก่อสร้าง
       public function importAssetbuilding(Request $request){
       
        $value = $request;
        $data = Assetbuilding::updateOrCreate(['HOSPCODE' =>  $value['HOSPCODE'],'ASSET_BUILDING_ID' => $value['ASSET_BUILDING_ID']],

            ['HOS_NAME' => isset($value['HOS_NAME']) ? $value['HOS_NAME'] : NULL ,
            'BUILD_NAME' => isset($value['BUILD_NAME'] ) ? $value['BUILD_NAME'] : NULL,
            'BUILD_NGUD_MONEY' => isset($value['BUILD_NGUD_MONEY']) ? $value['BUILD_NGUD_MONEY'] : NULL,
            'BUILD_CREATE' => isset($value['BUILD_CREATE'] ) ? $value['BUILD_CREATE'] : NULL,
            'BUILD_FINISH' => isset($value['BUILD_FINISH'] ) ? $value['BUILD_FINISH'] : NULL,
            'OLD_USE' => isset($value['TYPE_SUB_ID']) ? $value['OLD_USE'] : NULL,
            'BUDGET_NAME' => isset($value['BUDGET_NAME'] ) ? $value['BUDGET_NAME'] : NULL,
           ]
        );
        $this->updateLog('update-assetbuilding',$data);
        return response()->json($data, 200);
    }

// เก็บ logs
private function updateLog($type,$data){
    $information = $data['infomation'];
    $model = new Logs;
    $model->type = $type;
    // $model->user_id = $information['user_id'];
    // $model->username = $information['username'];
    // $model->ip_client = $information['ip_client'];
    // $model->ip_gateway = $information['ip_gateway'];
    // $model->hospcode = $information['hospcode'];
    // $model->hos_name = $information['hos_name'];
    $model->data_json = json_encode([
        'data' => $data
    ],JSON_UNESCAPED_UNICODE);
    return $model->save();
}

}