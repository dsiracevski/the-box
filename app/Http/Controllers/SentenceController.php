<?php

namespace App\Http\Controllers;

use App\Models\Sentence;
use Illuminate\Http\Request;

class SentenceController extends Controller
{

    // TODO add a new/edit sentence

    public function index()
    {
        return view('sentences.index', [
            'sentences' => Sentence::with('author')->get()
        ]);
    }

    public function create()
    {
        return view('sentences.store');
    }

    public function store()
    {

        $user = auth()->user();

        $attributes = request()->validate([
            'body' => 'required',
            'keyword' => ''
        ]);

        try {
            $user->sentences()->create($attributes);
            return redirect(route('UPDATE'))->with('message', ['text' => 'Реченицата е додадена', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('UPDATE'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }

//    public function show(Sentence $sentence)
//    {
//
//        $body = $sentence->body;
//        $body = str_replace(array('.', ',', '"', ';', ':'), '', $body);
//        $body = explode(' ', $body);
//
//        return view('sentences.show', [
//            'sentence' => Sentence::find($sentence),
//            'body' => $body
//        ]);
//
//    }

    public function edit(Sentence $sentence)
    {

        $body = $sentence->body;
        $body = str_replace(array('.', ',', '"', ';', ':'), '', $body);
        $body = explode(' ', $body);

        return view('sentences.edit', [
            'sentence' => Sentence::find($sentence)->firstOrFail(),
            'body' => $body
        ]);
    }

    public function update(Sentence $sentence)
    {
        $attributes = request()->validate([
            'body' => '',
            'keyword' => ''
        ]);

        try {
            $sentence->update($attributes);
            return redirect(route('viewSubjects'))->with('message', ['text' => 'Реченицата е променета', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewSubjects'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }


    public function delete(Sentence $sentence)
    {
        try {
            $sentence->delete();
            return redirect(route('viewSubjects'))->with('message', ['text' => 'Реченицата е избришана', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewSubjects'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }

}
