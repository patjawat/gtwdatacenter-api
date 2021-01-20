<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Logs;
use App\Models\Assets;
use App\Models\PersonGroup;
use App\Models\PersonWork;
use App\Models\PersonPosition;

class DatacenterController extends Controller
{
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
            'data' => $data['data']
        ],JSON_UNESCAPED_UNICODE);
        return $model->save();
}

    // เก็บ logs
    public function getUpdatelog(Request $request){
        $data = $this->updateLog($request->type,$request);
        return response()->json($data,200);
    }
    

    public function index(){
        $sql = "SELECT CLASS_NAME,GROUP_NAME FROM assets
        LEFT JOIN supplies_prop ON supplies_prop.NUM = assets.NUM
        LEFT JOIN supplies_class ON supplies_class.GROUP_CLASS_CODE = assets.GROUP_CLASS_CODE
        LEFT JOIN supplies_group ON supplies_group.GROUP_CODE = supplies_class.GROUP_CODE
        LEFT JOIN supplies_type ON supplies_type.SUP_TYPE_ID = supplies_prop.TYPE_ID";

        return response()->json([
            'infomation' => [
                'labels' => 'ข้อมูลพื้นฐาน',
                'authdaily' => $this->authDaily(),
            ],
            'assets' => $this->assetsSummary(),
            'person' => $this->personSummary(),
        ]);
    }
    
// การเข้าใช้งานประจำวัน
    private function authDaily(){
        return DB::table('logs')
        ->select('hos_name', DB::raw('COUNT(hos_code) as total'))
        ->where('created_at', 'like', date('Y-m-d').'%')
        ->groupBy('hos_name')
        ->get();
    }
    // สรุปข้อมูลครุภัณฑ์
    private function assetsSummary(){
        $items = Assets::all();
        return [
            'items' => 'ข้อมูลทรัพย์สิน',
            'total' => $items->count(),
            // 'items' => $items
        ];
    }
    // สรุปข้อมูลพนักงาน
    private function personSummary(){

        $personGroup = PersonGroup::all();
        $personWork = PersonWork::all();
        $personPosition = PersonPosition::all();

        unset($personGroup->id);
            return [
                'total' => $personGroup->sum('total'),
                'person_group' =>[
                    'labels' => 'แยกตามกลุ่มงาน',
                    'items' => $personGroup
                ],
                'person_work' =>[
                    'labels' => 'แยกตามงาน',
                    'items' => $personWork
                ],
                'person_position' =>[
                    'labels' => 'แยกตามตำแหน่งงาน',
                    'items' => $personPosition
                ],
            ];
    }

    //นับจำนวน record ตามหน่วยบริการ
    public function summaryClient(Request $request){
        return response()->json([
            'assets' => Assets::where('HOS_CODE','=',$request->hos_code)->count()
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
        $data = [
            'infomation' => $request->infomation,
            'data' => [
                'person_work' => $request->work,
                'person_group' => $request->group,
                'person_position' => $request->position,
            ]
        ];

        $this->updateLog('update-person',$data);

        foreach($request->group as $key => $value){
            PersonGroup::updateOrCreate(['hos_code' =>  $request->infomation['hos_code'],'hos_name' => $request->infomation['hos_name'], 'label' =>  $value['HR_DEPARTMENT_NAME']],
                ['total' => $value['person_count']
            ]); 
        }

        foreach($request->work as $key => $value){
            PersonWork::updateOrCreate(['hos_code' =>  $request->infomation['hos_code'],'hos_name' => $request->infomation['hos_name'], 'label' =>  $value['POSITION_IN_WORK']],
                ['total' => $value['amount_count']
            ]); 
        }

        foreach($request->work as $key => $value){
            PersonPosition::updateOrCreate(['hos_code' =>  $request->infomation['hos_code'],'hos_name' => $request->infomation['hos_name'], 'label' =>  $value['POSITION_IN_WORK']],
                ['total' => $value['amount_count']
            ]); 
        }
            return response()->json($request, 200);        
    }

    //นำเข้าข้อมูลทรัพสิน
    public function importAsset(Request $request){

        $data = $request->asset;
        $infomation = $request->infomation;

        $asset = Assets::updateOrCreate(['HOS_CODE' =>  $infomation['hos_code'],'ARTICLE_NUM' => $data['ARTICLE_NUM']],
           [
            'HOS_NAME' => $infomation['hos_name'],
            'GROUP_CLASS_CODE' => $data['GROUP_CLASS_CODE'],
            'TYPE_CODE' => $data['TYPE_CODE'],
            'GROUP_CODE' => $data['GROUP_CODE'],
            'NUM' => $data['NUM'],
            'TYPE_SUB_ID' => $data['TYPE_SUB_ID'],
            'YEAR_ID' => $data['YEAR_ID'],
            'ARTICLE_NAME' => $data['ARTICLE_NAME'],
            'ARTICLE_PROP' => $data['ARTICLE_PROP'],
            'SUP_UNIT_NAME' => $data['SUP_UNIT_NAME'],
            'SERIAL_NO' => $data['SERIAL_NO'],
            'BRAND_NAME' => $data['BRAND_NAME'],
            'COLOR_NAME' => $data['COLOR_NAME'],
            'MODEL_NAME' => $data['MODEL_NAME'],
            'SIZE_NAME' => $data['SIZE_NAME'],
            'PRICE_PER_UNIT' => $data['PRICE_PER_UNIT'],
            'RECEIVE_DATE' => $data['RECEIVE_DATE'],
            'METHOD_NAME' => $data['METHOD_NAME'],
            'BUY_NAME' => $data['BUY_NAME'],
            'BUDGET_NAME' => $data['BUDGET_NAME'],
            'SUP_TYPE_NAME' => $data['SUP_TYPE_NAME'],
            'DECLINE_NAME' => $data['DECLINE_NAME'],
            'VENDOR_NAME' => $data['VENDOR_NAME'],
            'HR_DEPARTMENT_SUB_NAME' => $data['HR_DEPARTMENT_SUB_NAME'],
            'LOCATION_NAME' => $data['LOCATION_NAME'],
            'LOCATION_LEVEL_NAME' => $data['LOCATION_LEVEL_NAME'],
            'LEVEL_ROOM_NAME' => $data['LEVEL_ROOM_NAME'],
            'REMARK' => $data['REMARK'],
            'STATUS_NAME' => $data['STATUS_NAME'],
            'OLD_USE' => $data['OLD_USE'],
            'EXPIRE_DATE' => $data['EXPIRE_DATE'],
            'PM_TYPE_NAME' => $data['PM_TYPE_NAME'],
            'CAL_TYPE_NAME' => $data['CAL_TYPE_NAME'],
            'RISK_TYPE_NAME' => $data['RISK_TYPE_NAME']
           ]
        );

        return response()->json($asset, 200);
    }

}
