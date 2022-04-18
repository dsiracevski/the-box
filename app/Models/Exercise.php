<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

//protected $casts = 'author';
    /**
     *
     * Relationships
     *
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }


    public function candidates()
    {
        return $this->belongsToMany(User::class, 'exercise_user', 'exercise_id', 'user_id');
    }


    public function sentences()
    {
        return $this->belongsToMany(Sentence::class, 'activity', 'exercise_id', 'sentence_id');
    }

}
