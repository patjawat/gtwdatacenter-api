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

    Route::get('datacenter/persons/total','PersonController@total');
    Route::get('datacenter/persons/datasets','PersonController@datasets');
    Route::get('datacenter/persons/type-summary','PersonController@typeSummary');
    Route::get('datacenter/persons/sex-summary','PersonController@sexSummery');
    Route::get('datacenter/persons/summary-type','PersonController@SummeryType');
    Route::get('datacenter/assets','AssetsController@index');
    Route::get('datacenter/assets/total','AssetsController@total');
    Route::get('datacenter/assets/type-money-summary','AssetsController@TypeMoneySummary');
    Route::get('datacenter/assets/datasets','AssetsController@datasets');
    Route::get('datacenter/assets/groupbyhospcode','AssetsController@groupByHospcode');
    Route::get('datacenter/assetbuilding','AssetsbuilddingController@index');

    //person summery
    Route::get('datacenter/persons','PersonController@index');

     //person summery
    //  Route::get('datacenter/assets','PersonController@index');


    // นำเข้าข้อมูลจาก client
    Route::post('datacenter/import-asset','DatacenterController@importAsset');
    Route::post('datacenter/import-assetbuilding','DatacenterController@importAssetbuilding');
    Route::post('datacenter/import-person','DatacenterController@importPerson');

    Route::post('datacenter/clearrecord','DatacenterController@clearRecord');
    //นำเข้าข้อมูล datacenter โดยตรงจาก database
    // Route::get('datacenter/importv1','Importv1Controller@index');
    Route::get('datacenter/importv1',function(){
        $query = DB::connection('db11119')
        ->table('hrd_person')
        ->select([
            DB::raw('(select ORG_PCODE FROM info_org limit 1) as HOSPCODE'),
            DB::raw('(select ORG_NAME FROM info_org limit 1) as HOS_NAME'),
            'hrd_person.ID as PERSON_ID',
            'HR_FNAME',
            'HR_FNAME',
            'HR_LNAME',
            'HR_CID',
            'HR_BIRTHDAY',
            'SEX',
            'SEX_NAME',
            'HR_DEPARTMENT_NAME',
            'HR_DEPARTMENT_SUB_NAME',
            'HR_DEPARTMENT_SUB_SUB_NAME',
            'HR_STARTWORK_DATE',
            'HR_POSITION_NUM',
            'HR_POSITION_ID',
            'POSITION_IN_WORK',
            'VCODE',
            'VCODE_DATE',
            'HR_LEVEL_NAME',
            'HR_STATUS_NAME',
            'HR_KIND_NAME',
            'HR_KIND_TYPE_NAME',
            'hrd_person.HR_PERSON_TYPE_ID',
            'HR_PERSON_TYPE_NAME',
            'HR_AGENCY_ID',
            'HR_SALARY',
            'MONEY_POSITION',
        ])
        ->leftJoin('hrd_prefix','hrd_person.HR_PREFIX_ID','=','hrd_prefix.HR_PREFIX_ID')
        ->leftJoin('hrd_sex','hrd_person.SEX','=','hrd_sex.SEX_ID')
        ->leftJoin('hrd_status','hrd_person.HR_STATUS_ID','=','hrd_status.HR_STATUS_ID')
        ->leftJoin('hrd_level','hrd_person.HR_LEVEL_ID','=','hrd_level.HR_LEVEL_ID')
        ->leftJoin('hrd_department_sub_sub','hrd_person.HR_DEPARTMENT_SUB_SUB_ID','=','hrd_department_sub_sub.HR_DEPARTMENT_SUB_SUB_ID')
        ->leftJoin('hrd_department','hrd_person.HR_DEPARTMENT_ID','=','hrd_department.HR_DEPARTMENT_ID')
        ->leftJoin('hrd_department_sub','hrd_person.HR_DEPARTMENT_SUB_ID','=','hrd_department_sub.HR_DEPARTMENT_SUB_ID')
        ->leftJoin('hrd_bloodgroup','hrd_person.HR_BLOODGROUP_ID','=','hrd_bloodgroup.HR_BLOODGROUP_ID')
        ->leftJoin('hrd_marry_status','hrd_person.HR_MARRY_STATUS_ID','=','hrd_marry_status.HR_MARRY_STATUS_ID')
        ->leftJoin('hrd_religion','hrd_person.HR_RELIGION_ID','=','hrd_religion.HR_RELIGION_ID')
        ->leftJoin('hrd_nationality','hrd_person.HR_NATIONALITY_ID','=','hrd_nationality.HR_NATIONALITY_ID')
        ->leftJoin('hrd_citizenship','hrd_person.HR_CITIZENSHIP_ID','=','hrd_citizenship.HR_CITIZENSHIP_ID')
        ->leftJoin('hrd_tumbon','hrd_person.TUMBON_ID','=','hrd_tumbon.ID')
        ->leftJoin('hrd_amphur','hrd_person.AMPHUR_ID','=','hrd_amphur.ID')
        ->leftJoin('hrd_province','hrd_person.PROVINCE_ID','=','hrd_province.ID')
        ->leftJoin('hrd_kind','hrd_person.HR_KIND_ID','=','hrd_kind.HR_KIND_ID')
        ->leftJoin('hrd_kind_type','hrd_person.HR_KIND_TYPE_ID','=','hrd_kind_type.HR_KIND_TYPE_ID')
        ->leftJoin('hrd_person_type','hrd_person.HR_PERSON_TYPE_ID','=','hrd_person_type.HR_PERSON_TYPE_ID')
        ->whereNotIn('hrd_person.HR_STATUS_ID', [5,6,7,8])->toSql();


        return response()->json($query);
    });

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