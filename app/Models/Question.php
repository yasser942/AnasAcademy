<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['test_id', 'options' , 'question'];

    protected $casts = [
        'options' => 'json', // Cast the 'options' field to JSON
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
