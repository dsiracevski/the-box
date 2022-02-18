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

        User::factory()->create([
            'role' => 'admin'
        ]);

        User::factory(3)->create([
            'role' => 'teacher'
        ]);

        User::factory(18)->create([
            'role' => 'student'
        ]);

        User::factory()->create([
            'role' => 'guest'
        ]);

        Sentence::factory(54)->create();

        Subject::factory(3)
            ->create()
            ->each(function (Subject $subject) {
                $subject->groups()->attach(
                    Group::inRandomOrder()->first(),
                    ['teacher_id' => User::where('role', '=', 'teacher')->inRandomOrder()->first()->id]
                );
            });

        Exercise::factory(10)
            ->hasAttached(Sentence::inRandomOrder()->limit(10)->get())
            ->create()
            ->each(function (Exercise $exercise) {
                $exercise->candidates()->attach(User::inRandomOrder()->first());
            });
    }
}
