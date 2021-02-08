<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;
    // protected $primaryKey = ['asset_number'];
    // protected $primaryKey = ['HOSPCODE', 'asset_number'];
    protected $fillable = [
        'GROUP_CLASS_CODE',
        'TYPE_CODE',
        'GROUP_CODE',
        'NUM',
        'HOSPCODE',
        'HOS_NAME',
        'TYPE_SUB_ID',
        'ARTICLE_NUM',
        'YEAR_ID',
        'ARTICLE_NAME',
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
    ];
    // protected $fillable = ['asset_number'];
}
