<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'word_category_id',
        'word',
        'word_translation',
        'sentence',
        'audio',
        'sentence_translation',
    ];
    public function wordCategory()
    {
        return $this->belongsTo(WordCategory::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function isNew()
    {
        return $this->created_at->greaterThanOrEqualTo(now()->subDays(7));
    }

}
