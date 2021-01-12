<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class logs extends Model
{
    use HasFactory;
    protected $fillable = ['data_json', 'logtype', 'username','hostid','ip_gateway','ip_client']; 
}
