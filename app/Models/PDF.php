<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDF extends Model
{
    use HasFactory;
    protected $table= 'pdfs';
    protected $fillable = [
        'name',
        'description',
        'status',
        'link',
        'lesson_id',
    ];
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
    public function isNew()
    {
        return $this->created_at->greaterThanOrEqualTo(now()->subDays(7));
    }
}
