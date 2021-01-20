<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonWork extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'label',
        'total',
        'hos_code',
        'hos_name',
    ];
}
