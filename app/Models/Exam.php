<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'level',
        'status',
    ];
    public function examQuestions()
    {
        return $this->hasMany(ExamQuestion::class);
    }


    public function isNew()
    {
        return $this->created_at->greaterThanOrEqualTo(now()->subDays(7));
    }
}
