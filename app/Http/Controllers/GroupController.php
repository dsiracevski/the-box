<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function index()
    {
        return view('groups.index', [
            'groups' => Group::with('students', 'subjects', 'teachers')->withCount('students', 'subjects', 'teachers')->get()
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
            $user->groups()->create($attributes);
            return redirect(route('viewGroups'))->with('message', ['text' => 'Групата е додадена', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewGroups'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }

    public function show(Group $group)
    {
        return view('groups.show', [
            'group' => Group::with('students', 'subjects', 'teachers')->withCount('students', 'subjects', 'teachers')->whereIn('id', $group)->first()
        ]);
    }

    public function edit(Group $group)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'type' => ''
        ]);

        try {
            $group->update($attributes);
            return redirect(route('viewGroups'))->with('message', ['text' => 'Групата е променета', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewGroups'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }


    public function delete(Group $group)
    {
        try {
            $group->delete();
            return redirect(route('viewGroups'))->with('message', ['text' => 'Групата е избришана', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewGroups'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }

    public function viewStudents(Group $group)
    {
        return view('groups.students', [
            'group' => $group,
            'students' => $group->students()->get()
        ]);
    }

    public function viewSubjects(Group $group)
    {
        return view('groups.subjects', [
            'group' => $group,
            'subjects' => $group->subjects()->get()
        ]);
    }

    public function viewTeachers(Group $group)
    {
        return view('groups.teachers', [
            'group' => $group,
            'teachers' => $group->teachers()->get()
        ]);
    }

    public function addSubject(Group $group)
    {
        return view('groups.add_subject', [
            'group' => $group,
            'subjects' => Subject::all(),
            'teachers' => User::all()->where('role', 'teacher')
        ]);
    }

    public function storeSubject(Group $group, Request $request)
    {

//        dd($request->subject_id);

        try {
            $group->subjects()->attach($request->subject_id, ['teacher_id' => $request->teacher_id]);
            return redirect(route('viewGroups'))->with('message', ['text' => 'Предметот е додаден', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewGroups'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }

}
