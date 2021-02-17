<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Logs;
use App\Models\Assets;
use App\Models\Assetbuilding;
use App\Models\Branch;
use App\Models\Persons;

class Importv1Controller extends Controller
{

    public function index(){
        $branchs = Branch::all();
        foreach($branchs as $branch){
            $this->insertPerson($branch->hospcode);
            $this->insertAsset($branch->hospcode);
            $this->insertAssetbuildings($branch->hospcode);
        }
       
        
    }

    private function insertAssetbuildings($id){
        $query = DB::connection('db'.$id)
        ->table('asset_building')
        ->select([
            DB::raw('SELECT NOW() as created_at'),
            DB::raw('SELECT NOW() as updated_at'),
            DB::raw('(select ORG_PCODE FROM info_org limit 1) as HOSPCODE'),
            DB::raw('(select ORG_NAME FROM info_org limit 1) as HOS_NAME'),
            'asset_building.ID as ASSET_BUILDING_ID',
            'SUP_FSN',
            'BUILD_NAME',
            'BUILD_NGUD_MONEY',
            'BUILD_CREATE',
            'BUILD_FINISH',
            'OLD_USE',
            'asset_building.BUDGET_ID',
            'supplies_budget.BUDGET_NAME'
        ])
        ->leftJoin('supplies_budget','supplies_budget.BUDGET_ID','=','asset_building.BUDGET_ID')
        ->get();
        if(isset($query[0]->HOSPCODE)){
            $clear = Assetbuilding::where('HOSPCODE','=',$query[0]->HOSPCODE)->delete();
                foreach($query as $model){
                    Assetbuilding::insert(get_object_vars($model));
                }
            }

    }

    private function insertAsset($id){

            $query = DB::connection('db'.$id)
            ->table('asset_article')
            ->select([
                DB::raw('SELECT NOW() as created_at'),
                DB::raw('SELECT NOW() as updated_at'),
                DB::raw('distinct(ARTICLE_NUM)'),
                DB::raw('(select ORG_PCODE FROM info_org limit 1) as HOSPCODE'),
                DB::raw('(select ORG_NAME FROM info_org limit 1) as HOS_NAME'),
                'GROUP_CLASS_CODE',
                'TYPE_CODE',
                'GROUP_CODE',
                'NUM',
                'ARTICLE_NAME',
                'TYPE_SUB_ID',
                'ARTICLE_NUM',
                'YEAR_ID',
                'ARTICLE_PROP',
                'SUP_UNIT_NAME',
                'SERIAL_NO',
                'BRAND_NAME',
                'COLOR_NAME',
                'MODEL_NAME',
                'SIZE_NAME',
                'PRICE_PER_UNIT',
                'RECEIVE_DATE',
                'METHOD_NAME',
                'BUY_NAME',
                'BUDGET_NAME',
                'SUP_TYPE_NAME',
                'DECLINE_NAME',
                'VENDOR_NAME',
                'HR_DEPARTMENT_SUB_NAME',
                'LOCATION_NAME',
                'LOCATION_LEVEL_NAME',
                'LEVEL_ROOM_NAME',
                'REMARK',
                'STATUS_NAME',
                'OLD_USE',
                'EXPIRE_DATE',
                'PM_TYPE_NAME',
                'CAL_TYPE_NAME',
                'RISK_TYPE_NAME'
            ])
            ->leftJoin('supplies_prop','asset_article.SUP_FSN','=','supplies_prop.NUM')
            ->leftJoin('supplies_unit','asset_article.UNIT_ID','=','supplies_unit.SUP_UNIT_ID')
            ->leftJoin('supplies_brand','asset_article.BRAND_ID','=','supplies_brand.BRAND_ID')
            ->leftJoin('supplies_color','asset_article.COLOR_ID','=','supplies_color.COLOR_ID')
            ->leftJoin('supplies_model','asset_article.MODEL_ID','=','supplies_model.MODEL_ID')
            ->leftJoin('supplies_size','asset_article.SIZE_ID','=','supplies_size.SIZE_ID')
            ->leftJoin('supplies_method','asset_article.METHOD_ID','=','supplies_method.METHOD_ID')
            ->leftJoin('supplies_buy','asset_article.BUY_ID','=','supplies_buy.BUY_ID')
            ->leftJoin('supplies_budget','asset_article.BUDGET_ID','=','supplies_budget.BUDGET_ID')
            ->leftJoin('supplies_type','asset_article.TYPE_ID','=','supplies_type.SUP_TYPE_ID')
            ->leftJoin('supplies_decline','asset_article.DECLINE_ID','=','supplies_decline.DECLINE_ID')
            ->leftJoin('supplies_vendor','asset_article.VENDOR_ID','=','supplies_vendor.VENDOR_ID')
            ->leftJoin('hrd_department_sub','asset_article.VENDOR_ID','=','hrd_department_sub.HR_DEPARTMENT_SUB_ID')
            ->leftJoin('supplies_location','asset_article.LOCATION_ID','=','supplies_location.LOCATION_ID')
            ->leftJoin('supplies_location_level','asset_article.LOCATION_LEVEL_ID','=','supplies_location_level.LOCATION_LEVEL_ID')
            ->leftJoin('supplies_location_level_room','asset_article.LEVEL_ROOM_ID','=','supplies_location_level_room.LEVEL_ROOM_ID')
            ->leftJoin('hrd_person','asset_article.PERSON_ID','=','hrd_person.ID')
            ->leftJoin('asset_status','asset_article.STATUS_ID','=','asset_status.STATUS_ID')
            ->leftJoin('asset_group_cal','asset_article.CAL_TYPE_ID','=','asset_group_cal.CAL_TYPE_ID')
            ->leftJoin('asset_group_pm','asset_article.PM_TYPE_ID','=','asset_group_pm.PM_TYPE_ID')
            ->leftJoin('asset_group_risk','asset_article.RISK_TYPE_ID','=','asset_group_risk.RISK_TYPE_ID')
            // ->whereNotNull('asset_article.SUP_FSN')
            ->get();
            if(isset($query[0]->HOSPCODE)){
                $clear = Assets::where('HOSPCODE','=',$query[0]->HOSPCODE)->delete();
                    foreach($query as $model){
                        Assets::insert(get_object_vars($model));
                        
                    
                    }
                }
            
    }


    private function insertPerson($id){
       
        $query = DB::connection('db'.$id)
        ->table('hrd_person')
        ->select([
            DB::raw('SELECT NOW() as created_at'),
            DB::raw('SELECT NOW() as updated_at'),
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
        ->whereNotIn('hrd_person.HR_STATUS_ID', [5,6,7,8])
        // ->limit(10)
        ->get();
        if(isset($query[0]->HOSPCODE)){
            $clear = Persons::where('HOSPCODE','=',$query[0]->HOSPCODE)->delete();
                foreach($query as $model){
                    Persons::insert(get_object_vars($model));
                    
                }
            }
        }



}