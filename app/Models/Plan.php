<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'duration_in_days',
    ];

    // Define the relationship with users
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('start_date', 'end_date');
    }
}
