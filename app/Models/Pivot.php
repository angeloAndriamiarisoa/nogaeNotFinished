<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pivot extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_society' ,
        'id_project' ,
        'id_task',
        'id_employee'
    ];
}
