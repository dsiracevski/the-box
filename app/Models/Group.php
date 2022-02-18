<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];


    /**
     *
     * Relationships
     *
     */
    public function students()
    {
        return $this->hasMany(User::class)->whereRole('student');
    }


    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'group_subject', 'group_id', 'subject_id');
    }


    public function teachers()
    {
        return $this->belongsToMany(User::class, 'group_subject', 'group_id', 'teacher_id');
    }
}
