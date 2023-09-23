<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'status',
    ];
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
    public function isNew()
    {
        return $this->created_at->greaterThanOrEqualTo(now()->subDays(7));
    }
}
