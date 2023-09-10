<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'question',
        'options',
    ];
    protected $casts = [
        'options' => 'json', // Cast the 'options' field to JSON
    ];
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
