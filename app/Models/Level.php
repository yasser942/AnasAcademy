<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'status',
    ];
    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }
    public function units ()
    {
        return $this->hasMany(Unit::class);
    }
    public function isNew()
    {
        return $this->created_at->greaterThanOrEqualTo(now()->subDays(7));
    }
}
