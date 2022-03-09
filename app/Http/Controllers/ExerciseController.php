<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        return view('exercises.index', [
            'exercises' => Exercise::with('author', 'sentences', 'candidates')->withCount('sentences', 'candidates')->get()
        ]);
    }


    public function store()
    {

        $user = auth()->user();

        $attributes = request()->validate([
            'name' => 'required',
            'type' => ''
        ]);

        try {
            $user->exercises()->create($attributes);
            return redirect(route('viewExercises'))->with('message', ['text' => 'Вежбата е додадена', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewExercises'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }

    public function show(Exercise $exercise)
    {
        return view('exercises.show', [
            'update' => Exercise::find($exercise)
        ]);
    }

    public function edit(Exercise $exercise)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'type' => ''
        ]);

        try {
            $exercise->update($attributes);
            return redirect(route('viewExercises'))->with('message', ['text' => 'Вежбата е променета', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewExercises'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }


    public function delete(Exercise $exercise)
    {
        try {
            $exercise->delete();
            return redirect(route('viewExercises'))->with('message', ['text' => 'Вежбата е избришана', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewExercises'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }
}
