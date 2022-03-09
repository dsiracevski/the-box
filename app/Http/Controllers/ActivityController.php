<?php

namespace App\Http\Controllers;

use App\Models\Exercise;

class ActivityController extends Controller
{
    public function showSentences(Exercise $exercise)
    {

        return view('activities.sentences', [
            'sentences' => $exercise->sentences()->get()
        ]);
    }

    public function showCandidates(Exercise $exercise)
    {

        return view('activities.candidates', [
            'candidates' => $exercise->candidates()->withPivot('score')->with('group')->get()
        ]);
    }
}
