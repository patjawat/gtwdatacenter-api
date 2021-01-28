<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Logs;
use App\Models\Branch;
use App\Models\Assets;
use App\Models\PersonGroup;
use App\Models\PersonWork;
use App\Models\PersonPosition;
use App\Models\Persons;
use App\Models\User;

class DatacenterController extends Controller
{


    public function index(Request $request){
        $hos_code = $request->hos_code;

        return response()->json([
            'person' => $this->personSummary($hos_code),
            'infomation' => [
                'labels' => 'ข้อมูลพื้นฐาน',
                'branchs' => $this->branch($hos_code),
                'authdaily' => $this->authDaily($hos_code),
            ],
            'assets' => $this->assetsSummary($hos_code)
        ]);
    }

    // สรุปข้อมูลครุภัณฑ์
    private function assetsSummary($hos_code){
        // $items = Assets::all();
        $items = $hos_code ? Assets::where(['HOS_CODE' => $hos_code])->get() : Assets::limit(10);
        return [
            'items' => 'ข้อมูลทรัพย์สิน',
            'total' => $items->count(),
            'datasets' => $this->assetDataset(),
            'items' => $items
        ];
    }
// สรุปข้อมูลบุคลากร
    private function assetDataset($hos_code = null){
        return Assets::limit(1);
    }

 // สรุปข้อมูลบุคลากร
    private function personSummary($hos_code){
        $items = $hos_code ? Persons::where(['HOS_CODE' => $hos_code])->get() : Persons::all();
        return [
            'datasets' => $this->personDataset(),
            'items' => 'ข้อมูลบุคลากร',
            'total' => $items->count(),
            'items' => $items
        ];
    }
// สรุปข้อมูลบุคลากร
private function personDataset($hos_code = null){
    // $item = DB::table(DB::raw('persons as p1'))
    // ->groupBy(DB::raw('HOS_CODE'))
    // ->select(['HOS_CODE','HOS_NAME'])
    // ->selectRaw("(SELECT count(p2.HOS_CODE) FROM persons p2 WHERE p2.HOS_CODE = p1.HOS_CODE AND HR_PERSON_TYPE_NAME = 'ข้าราชการ') as type1")
    // ->selectRaw("(SELECT count(p2.HOS_CODE) FROM persons p2 WHERE p2.HOS_CODE = p1.HOS_CODE AND HR_PERSON_TYPE_NAME = 'ลูกจ้างประจำ') as type2")
    // // ->limit(10)
    // ->get();

    // $sql = "SELECT 
    // p1.HOS_CODE,p1.HOS_NAME,p1.HR_PERSON_TYPE_NAME,
    // (SELECT count(p2.HOS_CODE) FROM persons p2 WHERE p2.HOS_CODE = p1.HOS_CODE AND HR_PERSON_TYPE_NAME = 'ข้าราชการ') as type1,
    // (SELECT count(p2.HOS_CODE) FROM persons p2 WHERE p2.HOS_CODE = p1.HOS_CODE AND HR_PERSON_TYPE_NAME = 'ลูกจ้างประจำ') as type2
    //  FROM persons p1
    //  GROUP BY p1.HOS_CODE";

    $query = Persons::select('HOS_NAME','HR_PERSON_TYPE_NAME','HOS_CODE',DB::raw('COUNT(HOS_NAME) as total'))
    ->groupBy('HOS_NAME')
    ->get();

    $data = [];
    foreach ($query as $sub){
        // $data['label'][] = $sub->HOS_NAME;
        // // $data['data'][] = (int) $sub->total;
        // $data['data'][] =  Persons::where('HOS_CODE','=',$sub->HOS_CODE)->where('HR_PERSON_TYPE_NAME','=',$sub->HR_PERSON_TYPE_NAME)->count();
        $data[] = [
            'label' => $sub->HOS_NAME,
            'type_name' => $sub->HR_PERSON_TYPE_NAME,
            'data' => Persons::where('HOS_CODE','=',$sub->HOS_CODE)->where('HR_PERSON_TYPE_NAME','=',$sub->HR_PERSON_TYPE_NAME)->count()
        ];
    }
    // return $item;
    return $data;
}

private function dataItem(){

}



private function branch(){
    $item = [];
    foreach (Branch::all() as $branch)
    {
        $item[] = [
            'hos_code' => $branch->hos_code,
            'name' => $branch->name,
            'service_plan' => $branch->service_plan,
            // 'summaryAsset' => $this->summeryAsset($branch->hos_code),
            // 'summaryPerson' => $this->summeryPerson($branch->hos_code)
        ];
    }


    return [
        'total' => $branch->count(),
        'items' =>  $item
    ];
}

private function summeryAsset($id){
    return Assets::where(['hos_code' => $id])->count();
}


// การเข้าใช้งานประจำวัน
    private function authDaily(){
        return DB::table('logs')
        ->select('hos_name', DB::raw('COUNT(hos_code) as total'))
        ->where('created_at', 'like', date('Y-m-d').'%')
        ->where('type', '=','login')
        ->groupBy('hos_name')
        ->get();
    }
    

    //นับจำนวน record ตามหน่วยบริการ
    public function summaryClient(Request $request){
        return response()->json([
            'assets' => Assets::where('HOS_CODE','=',$request->hos_code)->count(),
            'person' => Persons::where('HOS_CODE','=',$request->hos_code)->count()
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
        $this->updateLog('update-person',$request);
       
        foreach($request->items as $key => $value){
            Persons::updateOrCreate(['HOS_CODE' =>  $value['HOS_CODE'],'HOS_NAME' =>$value['HOS_NAME'],'HR_CID' => $value['HR_CID'], ],
                [
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
        }
        
        return response()->json($request, 200);        

    }

    //นำเข้าข้อมูลทรัพสิน
    public function importAsset(Request $request){

        // $infomation = $request->infomation;
        $this->updateLog('update-asset',$request);

        $data = '';
        foreach($request->items as $key => $value){
 
        $data = Assets::updateOrCreate(['HOS_CODE' =>  $value['HOS_CODE'],'ARTICLE_NUM' => $value['ARTICLE_NUM']],
           [
            'HOS_NAME' => $value['HOS_NAME'],
            'GROUP_CLASS_CODE' => $value['GROUP_CLASS_CODE'],
            'TYPE_CODE' => $value['TYPE_CODE'],
            'GROUP_CODE' => $value['GROUP_CODE'],
            'NUM' => $value['NUM'],
            'TYPE_SUB_ID' => $value['TYPE_SUB_ID'],
            'YEAR_ID' => $value['YEAR_ID'],
            'ARTICLE_NAME' => $value['ARTICLE_NAME'],
            'ARTICLE_PROP' => $value['ARTICLE_PROP'],
            'SUP_UNIT_NAME' => $value['SUP_UNIT_NAME'],
            'SERIAL_NO' => $value['SERIAL_NO'],
            'BRAND_NAME' => $value['BRAND_NAME'],
            'COLOR_NAME' => $value['COLOR_NAME'],
            'MODEL_NAME' => $value['MODEL_NAME'],
            'SIZE_NAME' => $value['SIZE_NAME'],
            'PRICE_PER_UNIT' => $value['PRICE_PER_UNIT'],
            'RECEIVE_DATE' => $value['RECEIVE_DATE'],
            'METHOD_NAME' => $value['METHOD_NAME'],
            'BUY_NAME' => $value['BUY_NAME'],
            'BUDGET_NAME' => $value['BUDGET_NAME'],
            'SUP_TYPE_NAME' => $value['SUP_TYPE_NAME'],
            'DECLINE_NAME' => $value['DECLINE_NAME'],
            'VENDOR_NAME' => $value['VENDOR_NAME'],
            'HR_DEPARTMENT_SUB_NAME' => $value['HR_DEPARTMENT_SUB_NAME'],
            'LOCATION_NAME' => $value['LOCATION_NAME'],
            'LOCATION_LEVEL_NAME' => $value['LOCATION_LEVEL_NAME'],
            'LEVEL_ROOM_NAME' => $value['LEVEL_ROOM_NAME'],
            'REMARK' => $value['REMARK'],
            'STATUS_NAME' => $value['STATUS_NAME'],
            'OLD_USE' => $value['OLD_USE'],
            'EXPIRE_DATE' => $value['EXPIRE_DATE'],
            'PM_TYPE_NAME' => $value['PM_TYPE_NAME'],
            'CAL_TYPE_NAME' => $value['CAL_TYPE_NAME'],
            'RISK_TYPE_NAME' => $value['RISK_TYPE_NAME']
           ]
        );
    }
  
        return response()->json($data, 200);
    }

// เก็บ logs
private function updateLog($type,$data){
    $information = $data['infomation'];
    $model = new Logs;
    $model->type = $type;
    $model->user_id = $information['user_id'];
    $model->username = $information['username'];
    $model->ip_client = $information['ip_client'];
    $model->ip_gateway = $information['ip_gateway'];
    $model->hos_code = $information['hos_code'];
    $model->hos_name = $information['hos_name'];
    $model->data_json = json_encode([
        'infomation' => $data['infomation'],
        'data' => $data['items']
    ],JSON_UNESCAPED_UNICODE);
    return $model->save();
}

}