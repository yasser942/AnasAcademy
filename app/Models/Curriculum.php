<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Level;
class Curriculum extends Model
{
    protected $table = 'curriculums';
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'image',
    ];
    public function levels()
    {
        return $this->hasMany(\App\Models\Level::class);
    }

    public  function image (){

        return $this->morphOne(Image::class,'imageable');
    }
    public function isNew()
    {
        return $this->created_at->greaterThanOrEqualTo(now()->subDays(7));
    }
}
