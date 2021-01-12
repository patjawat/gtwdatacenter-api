<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logs;

class LogController extends Controller
{

    public function index(){

        // return response()->json(Logs::all(), 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
        // JSON_UNESCAPED_UNICODE);
        return response()->json(Logs::all());
    }

    public function insert(Request $request){
        // $request->validate([
        //     'logtype' => 'required'
        // ]);

            $model = new Logs;
            $model->type = $request->type;
            $model->user_id = $request->user_id;
            $model->username = $request->username;
            $model->ip_client = $request->ip_client;
            $model->ip_gateway = $request->ip_gateway;
            $model->hos_code = $request->hos_code;
            $model->hos_name = $request->hos_name;
            $model->data_json = json_encode($request->all(),JSON_UNESCAPED_UNICODE);
            return $model->save();
        
    }
}
