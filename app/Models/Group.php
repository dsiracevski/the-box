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
        return $this->belongsToMany(Subject::class, 'group_subject', 'group_id', 'subject_id')->withTimestamps();
    }


    public function teachers()
    {
        return $this->belongsToMany(User::class, 'group_subject', 'group_id', 'teacher_id')->withTimestamps();
    }

    /**
     * Check if group already has selected subject
     * @param $subject
     * @return bool
     */

    public function hasSubject($subject)
    {
        return $this->subjects()
            ->where('subject_id', $subject->id)
            ->exists();
    }
}
