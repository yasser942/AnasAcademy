<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curriculums';
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
    ];
}
