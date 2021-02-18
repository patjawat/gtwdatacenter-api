<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/',function(){
    return response()->json('Datacenter API');
});
Route::post('login',[App\Http\Controllers\Api\AuthenController::class, 'login']);
Route::get('register',[App\Http\Controllers\Api\AuthenController::class, 'register']);


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('numbers', function () {
        $use = auth()->user();
        return $use->tokenCan('admin') ? response()->json([1, 2, 3, 4]) : abort(403);
    });

    Route::get('user', function (Request $request) {
        // return response()->json([1, 2, 3, 4]);
        $user =  $request->user();
        $token = $user->createToken('postman', ['admin']);
        return response()->json([
            'token' => $token->plainTextToken,
            'profile' => $user,
        ]);
    });



});

Route::group(["namespace"=>"App\Http\Controllers\Api"],function() {
        
    Route::apiResource('branchs','BranchController');
    //สรุปข้อมูลรวม
    Route::get('datacenter','DatacenterController@index');
    Route::get('datacenter/branchs','DatacenterController@branch');
    Route::get('datacenter/groupbyhospcode','DatacenterController@groupByHospcode');
    Route::post('datacenter/summary-client','DatacenterController@summaryClient');

    //person summery
    Route::get('datacenter/persons','PersonController@index');

     //person summery
     Route::get('datacenter/assets','PersonController@index');


    // นำเข้าข้อมูลจาก client
    Route::post('datacenter/import-asset','DatacenterController@importAsset');
    Route::post('datacenter/import-assetbuilding','DatacenterController@importAssetbuilding');
    Route::post('datacenter/import-person','DatacenterController@importPerson');

    Route::post('datacenter/clearrecord','DatacenterController@clearRecord');
    //นำเข้าข้อมูล datacenter โดยตรงจาก database
    Route::get('datacenter/importv1','Importv1Controller@index');

});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();

// });

Route::get('/download/{name}', [App\Http\Controllers\VersionController::class, 'download']);
Route::group(["namespace"=>"App\Http\Controllers\Api"],function() {
    Route::get('/logs','LogController@index');
    Route::post('/logs','LogController@insert');
    Route::get('/versioninfo', 'VersionController@versioninfo')->middleware('guest');
    Route::apiResource('versions', 'VersionController');



    
});