<?php

namespace App\Models;

use App\Models\Society;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'society_id'];

    public function society()
    {
        return $this->belongsTo(Society::class);
    }
}
