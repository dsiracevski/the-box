<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return view('subjects.index', [
            'subjects' => Subject::with('groups', 'teachers')->orderByDesc('subjects.id')->get()
        ]);
    }


    public function store()
    {
        $user = auth()->user();

        $attributes = request()->validate([
            'name' => 'required'
        ]);

        try {
            $user->subjects()->create($attributes);
            return redirect(route('viewSubjects'))->with('message', ['text' => 'Предметот е додаден', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewSubjects'))->with('message', ['text' => 'Обидете се повторно', 'type' => 'danger']);
        }
    }

    public function create()
    {
        return view('subjects.store');
    }


    public function show(Subject $subject)
    {
        return view('subjects.show', [
            'subject' => Subject::with('groups')->withCount('groups')->whereIn('id', $subject)->first()
        ]);
    }

    /**
     *
     * @param Subject $subject
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit(Subject $subject)
    {
        $attributes = request()->validate([
            'name' => ''
        ]);

        try {
            $subject->update($attributes);
            return redirect(route('viewSubjects'))->with('message', ['text' => 'Предметот е додаден', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewSubjects'))->with('message', ['text' => 'Обидете се повторно', 'type' => 'danger']);
        }
    }


    /**
     *
     * @param Subject $subject
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Subject $subject)
    {
        try {
            $subject->delete();
            return redirect(route('viewCars'))->with('message', ['text' => 'Предметот е избришан', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewCars'))->with('message', ['text' => 'Обидете се повторно', 'type' => 'danger']);
        }
    }
}
