<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Lists all users
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('users.index', [
            'students' => User::students()->has('group')->orderBy('role')->get(),
            'teachers' => User::teachers()->get(),
            'unassignedStudents' => User::students()->doesntHave('group')->orderByDesc('id')->get(),
            'groups' => Group::all()
        ]);
    }

    /**
     * Opens view to show user
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {

//        dd($user);

        return view('users.show', [
            'user' => User::whereId($user->id)->with('group.subjects', 'exercises')->get()
        ]);

    }

    /**
     * Opens edit user view
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {

        return view('users.edit', [
            'user' => $user,
            'groups' => Group::all()
        ]);

    }

    /**
     * Creates new user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create()
    {

        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'gender' => '',
            'age' => 'numeric',
            'group_id' => ''
        ]);


        try {
            User::create($attributes);
            return redirect(route('viewUsers'))->with('message', ['text' => 'Корисникот е додаден', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewUsers'))->with('message', ['text' => 'Обидете се повторно', 'type' => 'danger']);
        }

    }

    /**
     * Updates User model
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, User $user)
    {

        $attributes = request()->validate([
            'name' => '',
            'email' => '',
            'password' => '',
            'role' => '',
            'gender' => '',
            'age' => '',
            'group_id' => ''
        ]);

        try {
            $user->update($attributes);
            return redirect(route('viewUsers'))->with('message', ['text' => 'Корисникот е додаден', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewUsers'))->with('message', ['text' => 'Обидете се повторно', 'type' => 'danger']);
        }

    }

    /**
     * Deletes User model
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {

        try {
            $user->delete();

            return redirect(route('viewUsers'))->with('message', ['text' => 'Корисникот е избришан', 'type' => 'success']);
        } catch (\Exception $e) {
            return redirect(route('viewUsers'))->with('message', ['text' => 'Обидете се повторно', 'type' => 'danger']);
        }
    }


}
