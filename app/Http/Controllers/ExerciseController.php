<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use App\Models\Sentence;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Index all Exercises
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('exercises.index', [
            'exercises' => Exercise::with('author', 'sentences', 'candidates')->withCount('sentences', 'candidates')->get()
        ]);
    }


    public function create()
    {
        $exTypes = Exercise::select('type')->pluck('type');

//        $exTypes = array_unique($exTypes);

        return view('exercises.create', [
            'exType' => $exTypes->unique()
        ]);
    }


    /**
     * Store new Exercise
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store()
    {

//        dd(\request()->all());

//        $user = auth()->user();

        $attributes = request()->validate([
            'name' => 'required',
            'type' => 'required',
            'author_id' => ''
        ]);

//        dd($attributes);

        try {
            Exercise::create($attributes);
            return redirect(route('viewExercises'))->with('message', ['text' => 'Вежбата е додадена', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewExercises'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }

    /**
     * Shows specific Exercise
     * @param Exercise $exercise
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Exercise $exercise)
    {
        return view('exercises.show', [
            'exercise' => Exercise::where('id', $exercise->id)->with('sentences', 'candidates')->withCount('sentences', 'candidates')->first()
        ]);
    }

    /**
     * Updates Exercise model
     * @param Exercise $exercise
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit(Exercise $exercise)
    {
        $attributes = request()->validate([
            'name' => '',
            'type' => ''
        ]);

        try {
            $exercise->update($attributes);
            return redirect(route('viewExercises'))->with('message', ['text' => 'Вежбата е променета', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewExercises'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }


    /**
     * Removes Exercise model
     * @param Exercise $exercise
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Exercise $exercise)
    {
        try {
            $exercise->delete();
            return redirect(route('viewExercises'))->with('message', ['text' => 'Вежбата е избришана', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewExercises'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }

    /**
     * Displays sentences for current Exercise model
     * @param Exercise $exercise
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showSentences(Exercise $exercise)
    {
        return view('exercises.show_sentences', [
            'exercise' => $exercise,
            'sentences' => $exercise->sentences()->get()
        ]);
    }

    /**
     * Retrieves all Sentence models that aren't already associated with the given Exercise model
     * @param Exercise $exercise
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addSentences(Exercise $exercise)
    {


        return view('exercises.add_sentences', [
            'sentences' => Sentence::whereDoesntHave('exercises', function (Builder $query) use ($exercise) {
                $query->where('exercises.id', $exercise->id);
            })->get(),
            'exercise' => Exercise::whereId($exercise->id)->firstOrFail()
        ]);

    }

    /**
     * Sends a single or array of IDs to attach
     * @param Exercise $exercise
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function attachSentences(Exercise $exercise)
    {

        $sentences = collect(request()->sentence);

        $sentences = $sentences->toArray();

        try {
            $exercise->sentences()->attach($sentences);
            return redirect(route('sentences-show', $exercise))->with('message', ['text' => 'Реченицата е додадена', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('show-sentences'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }

    }

    public function editSentence(Exercise $exercise, Sentence $sentence)
    {

        // TODO can edit sentences for current exercise


    }
}
