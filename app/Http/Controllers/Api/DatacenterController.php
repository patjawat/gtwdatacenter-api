<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Logs;
use App\Models\Assets;

class DatacenterController extends Controller
{

    public function index(){

        $data = DB::table('logs')
        // ->select('hos_code','hos_name','COUNT(hos_code) as total')
        ->select('hos_name', DB::raw('COUNT(hos_code) as total'))
        ->where('created_at', 'like', date('Y-m-d').'%')

        ->groupBy('hos_name')
        ->get();

        return response()->json([
            'dailylogin' => $data
        ]);
    }

    public function totalSummary(){
        $model = Assets::select('HOS_NAME', DB::raw('COUNT(HOS_CODE) as total'))
        ->groupby('HOS_NAME')
        ->get();

        return response()->json($model);


    }
    public function getUpdatelog(Request $request){
        $data = $request->asset;
        $asset = Assets::updateOrCreate(['hos_code' =>  $request->hos_code,'asset_number' => $data['ARTICLE_NUM']],
            [ 'asset_name' => $data['ARTICLE_NAME']]
        );
        return response()->json($asset, 200);
    }

    public function importAsset(Request $request){
        $data = $request->asset;
        $infomation = $request->infomation;
        $asset = Assets::updateOrCreate(['HOS_CODE' =>  $infomation['hos_code'],'ARTICLE_NUM' => $data['ARTICLE_NUM']],
           [
            'HOS_NAME' => $infomation['hos_name'],
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
