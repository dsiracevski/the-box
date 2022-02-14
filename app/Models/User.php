<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     *
     * Relationships
     *
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function sentences()
    {
        return $this->hasMany(Sentence::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_user', 'user_id', 'exercise_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'group_subject', 'teacher_id', 'subject_id');
    }


    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_subject', 'teacher_id', 'group_id');
    }


}
