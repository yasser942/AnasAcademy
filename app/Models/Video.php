<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable=['name','description','status','link','type','lesson_id'];
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
    public function isNew()
    {
        return $this->created_at->greaterThanOrEqualTo(now()->subDays(7));
    }
}
