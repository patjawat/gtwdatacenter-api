<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    use HasFactory;
    protected $fillable = [
        'HOS_CODE',
        'HOS_NAME',
        'HR_FNAME',
        'HR_LNAME',
        'HR_CID',
        'HR_BIRTHDAY',
        'HR_MARRY_STATUS_NAME',
        'HR_RELIGION_NAME',
        'HR_NATIONALITY_NAME',
        'HR_CITIZENSHIP_NAME',
        'SEX',
        'SEX_NAME',
        'HR_BLOODGROUP_NAME',
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
    ];
}
