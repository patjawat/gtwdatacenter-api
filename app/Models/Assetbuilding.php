<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assetbuilding extends Model
{
    use HasFactory;
    protected $fillable = [
        "HOSPCODE",
        "HOS_NAME",
        "ASSET_BUILDING_ID",
        "SUP_FSN",
        "BUILD_NAME",
        "BUILD_NGUD_MONEY",
        "BUILD_CREATE",
        "BUILD_FINISH",
        "OLD_USE",
        "BUDGET_ID",
        "BUDGET_NAME"
    ];
}
