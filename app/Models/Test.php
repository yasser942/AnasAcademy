<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'lesson_id',
        'name',
        'description',
        'status',
    ];
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function isNew()
    {
        return $this->created_at->greaterThanOrEqualTo(now()->subDays(7));
    }
}
