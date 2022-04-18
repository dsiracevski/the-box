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

    public function create()
    {
        return view('groups.store');
    }

    public function store()
    {

        $user = auth()->user();

        $attributes = request()->validate([
            'name' => 'required'
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
            'group' => Group::with('subjects', 'teachers')->findOrFail($group->id)
        ]);
    }

    public function viewTeachers(Group $group)
    {
        return view('groups.teachers', [
            'group' => $group,
            'teachers' => $group->teachers()->get()
        ]);
    }

    public function addGroupSubject(Group $group)
    {
        return view('groups.add_subject', [
            'group' => $group,
            'subjects' => Subject::all(),
            'teachers' => User::teachers()->get()
        ]);
    }

    /**
     * @param Group $group
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addGroupStudent(Group $group)
    {
        return view('groups.add_student', [
            'students' => User::students()->whereDoesntHave('group')->orderBy('id')->get(),
            'group' => $group
        ]);
    }

    /**
     * @param Group $group
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeGroupStudent(Group $group)
    {

        $student = User::whereId(request()->student_id)->first();

        try {
            $group->students()->save($student);
            return redirect(route('add-group-student', $group))->with('message', ['text' => 'Ученикот е додаден', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('add-group-student', $group))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }

    /**
     * @param Group $group
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function removeStudent(Group $group, $studentId)
    {

//        dd(\request()->all());
        $student = User::whereId($studentId)->first();

//dd($student);
        try {
            $student->group()->dissociate();
            $student->save();
            return redirect(route('viewGroupStudents', $group))->with('message', ['text' => 'Ученикот е отстранет', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewGroupStudents', $group))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }
    }


    /**
     * @param Group $group
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeGroupSubject(Group $group, Request $request)
    {

//        dd($request->all());

        $subject = Subject::whereId($request->subject_id)->firstOrFail();

//        dd($subject->id);

        if (!$group->hasSubject($subject))

            try {
            $group->subjects()->attach($request->subject_id, ['teacher_id' => $request->teacher_id]);
            return redirect(route('viewGroups'))->with('message', ['text' => 'Предметот е додаден', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewGroups'))->with('message', ['text' => 'Обидете се повторно!', 'type' => 'danger']);
        }

        else

            return  redirect(route('viewGroupSubjects', $group))->with('message', ['text' => 'Групата веќе го следи тој предмет', 'type' => 'warning']);
    }


}
