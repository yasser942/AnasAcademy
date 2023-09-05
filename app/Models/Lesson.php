<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'unit_id',
        'name',
        'description',
        'status',
    ];
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function pdfs()  { return $this->hasMany(PDF::class); }
    public function tests() { return $this->hasMany(Test::class); }
    public function videos(){ return $this->hasMany(Video::class); }
}
