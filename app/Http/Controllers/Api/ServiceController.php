<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Logs;
use App\Models\Assets;

class ServiceController extends Controller
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


    public function getUpdatelog(Request $request){
        $data = $request->asset;
        $asset = Assets::updateOrCreate(['hos_code' =>  $request->hos_code,'asset_number' => $data['ARTICLE_NUM']],
            [ 'asset_name' => $data['ARTICLE_NAME']]
        );
        return response()->json($asset, 200);
    }

    public function getjobs(Request $request){
        $data = $request->asset;
        $asset = Assets::updateOrCreate(['hos_code' =>  $request->hos_code,'asset_number' => $data['ARTICLE_NUM']],
            [ 'asset_name' => $data['ARTICLE_NAME']]
        );
        return response()->json($asset, 200);
    }

}
