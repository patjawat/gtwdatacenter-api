<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Branch;

class PersonController extends Controller
{

    public function index()
    {
        return response()->json([
            'datasets' => $this->datasets(),
            'totalsummery' => $this->totalSummery(),
            'totaltypesummery' => $this->totalTypeSummery(),
            'sexsummery' => $this->sexSummery()
        ]);
    }
// สรุปข้อมูล chart 1
    private function datasets(){
        return '0';
    }

    private function totalSummery(){
        return '0';
    }
    private function totalTypeSummery(){
        return '0';
    }

    private function sexSummery(){
        return '0';
    }
    
}
