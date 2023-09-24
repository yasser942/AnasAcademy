<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticalExam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'link',
        'description',
        'level',
        'status',
    ];
    public function isNew()
    {
        return $this->created_at->greaterThanOrEqualTo(now()->subDays(7));
    }
}
