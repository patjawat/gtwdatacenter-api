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
        'ARTICLE_NUM',
        'ARTICLE_NAME',
        'RECEIVE_DATE',
        'PRICE_PER_UNIT',
        'REMARK',
        'EXPIRE_DATE',
        'OLD_USE',
        'VENDOR_ID',
        'BUY_ID',
        'BUY_NAME',
        'YEAR_ID',
        'DECLINE_ID',
        'CODE_REF',
        'BUDGET_ID',
        'BUDGET_NAME',
        'ARTICLE_PROP',
        'SUP_FSN'
    ];
    // protected $fillable = ['asset_number'];
}
