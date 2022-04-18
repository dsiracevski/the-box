@extends('layouts.master')

@section('content')
    <div class="flex-col justify-center items-center w-full">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{--        @dd($user)--}}
        <form action="{{route('editUser', ['user' => $user->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="container p-5 my-1 rounded-xl content-center bg-white">

                <div class="table w-full">
                    <div class="table-header-group">
                        <div class="table-row text-gray-600 font-semibold">
                            <div class="table-cell text-left">Име</div>
                            <div class="table-cell text-left">Email</div>
                            <div class="table-cell text-left">Лозинка</div>
                            <div class="table-cell text-left">Улога</div>
                            <div class="table-cell text-left">Пол</div>
                            <div class="table-cell text-left">Возраст</div>
                            <div class="table-cell text-left">Група</div>
                            <div class="table-cell text-left">Избриши</div>
                        </div>
                    </div>
                    <div class="table-row-group">
                        <div class="table-row">
                            {{--                @dd($user)--}}
                            <div class="space-x-2 mx-auto table-cell text-left">
                                <label for="name" class="block mb-1"></label>
                                <input type="text" id="name" name="name" value="{{$user->name}}"
                                       class="bg-gray-100 px-4 py-2 outline-none rounded-xl"
                                       placeholder="{{$user->name}}"/>
                            </div>
                            <div class="mx-auto table-cell text-left">
                                <input type="text" id="email" name="email" value="{{$user->email}}"
                                       class="bg-gray-100 px-4 py-2 outline-none rounded-xl"/>
                            </div>
                            <div class="mx-auto table-cell text-left">
                                <input type="password" id="password" name="password" value="{{$user->password}}"
                                       class="bg-gray-100 px-4 py-2 outline-none rounded-xl"/>
                            </div>
                            <div class="mx-auto table-cell text-left">
                                <select name="role" id="role" class="bg-gray-100 px-4 py-2 outline-none rounded-xl">
                                    <option value=""></option>
                                    <option value="admin">Администратор</option>
                                    <option value="teacher">Наставник</option>
                                    <option value="student">Ученик</option>
                                </select>
                            </div>
                            <div class="mx-auto table-cell text-left">
                                <select name="gender" id="gender"
                                        class="bg-gray-100 px-4 py-2 outline-none mx-auto rounded-xl">
                                    <option value=""></option>
                                    <option value="male">Машко</option>
                                    <option value="female">Женско</option>
                                    <option value="unicorn">Друго</option>
                                </select>
                            </div>
                            <div class="mx-auto table-cell text-left">
                                <input type="number" id="age" name="age"
                                       class="bg-gray-100 px-4 py-2 outline-none rounded-xl w-20">
                            </div>
                            <div class="mx-auto table-cell text-left">
                                <select name="gender" id="gender"
                                        class="bg-gray-100 px-4 py-2 outline-none mx-auto rounded-xl">
                                    <option value=""></option>
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}" >{{ucwords($group->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit"
                                class="mt-4 w-full bg-purple-500 text-indigo-100 py-2 rounded-xl text-lg tracking-wide">
                                Промени
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="table-cell rounded-2xl">
            <form action="{{route('destroyUser', [$user])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 rounded-xl px-2 py-2 shadow-2xl">Избриши
                </button>
            </form>
        </div>


        <div class="flex gap-2">


        </div>
    </div>

    </div>
    </div>
@stop
