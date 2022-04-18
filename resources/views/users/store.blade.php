@extends('layouts.master')

@section('content')
    <div class="h-screen bg-gradient-to-br from-gray-50 to-gray-500-600 flex justify-center items-center w-full">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('storeUser')}}" method="POST">
            @csrf

            <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">
                <div class="space-y-4">
                    <h1 class="text-center text-2xl font-semibold text-gray-600">Регистрација</h1>
                    <div>
                        <label for="name" class="block mb-1 text-gray-600 font-semibold">Име</label>
                        <input type="text" id="name" name="name" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />
                    </div>
                    <div>
                        <label for="email" class="block mb-1 text-gray-600 font-semibold">Email</label>
                        <input type="text" id="email" name="email" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" />
                    </div>
                    <div>
                        <label for="password" class="block mb-1 text-gray-600 font-semibold">Лозинка</label>
                        <input type="password" id="password" name="password" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" required/>
                    </div>

                    <div>
                        <label for="role" class="mb-1 text-gray-600">Улога</label>
                        <select name="role" id="role" class="bg-indigo-50 px-4 py-2 outline-none rounded-md" required>
                            <option value="teacher">Наставник</option>
                            <option value="student">Ученик</option>
                        </select>
                    </div>

                    <div class="flex gap-2">
                        <div>
                            <label for="age" class="mb-1 text-gray-600">Возраст</label>
                            <input type="number" id="age" name="age" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-20" required>
                        </div>

                        <div>
                            <label for="gender" class="mb-1 text-gray-600">Пол</label>
                            <select name="gender" id="gender" class="bg-indigo-50 px-4 py-2 outline-none rounded-md" required>
                                <option value="male">Машко</option>
                                <option value="female">Женско</option>
                                <option value="unicorn">Друго</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="mt-4 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">Прати</button>
            </div>
        </form>
    </div>
@stop
