<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'society_id',
        'project_id',
        'task_id',
        'user_id'
    ];
}
