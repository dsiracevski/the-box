<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\Group;
use App\Models\Sentence;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Group::factory(3)->create();

        User::factory(1)->create([
            'role' => 'admin'
        ]);

        User::factory(3)->create([
            'role' => 'teacher'
        ]);

        User::factory(18)->create([
            'role' => 'student'
        ]);

        User::factory(1)->create([
            'role' => 'guest'
        ]);

        Sentence::factory(54)->create();

        Subject::factory(3)->hasAttached(
            Group::all()->random(Group::all()->count()), ['teacher_id' => User::where('role', '=','teacher')->get()->random()->id])->create();

        Exercise::factory(10)->hasAttached(Sentence::all()->random(10))->create()->each(function (Exercise $exercise) {
            $exercise->candidates()->attach(User::all()->random());
        });

    }
}
