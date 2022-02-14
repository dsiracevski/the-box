<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
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
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_subject', 'subject_id', 'group_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'group_subject', 'subject_id', 'teacher_id');
    }

}
