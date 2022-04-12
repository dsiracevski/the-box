@extends('layouts.master')

@section('content')

    <div class="container w-max my-5 p-3 rounded-xl bg-white align-middle mx-auto shadow-xl">
        <p class="text-xl">Додади ученик во <span class="text-purple-500">{{ucwords($group->name)}}</span></p>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('store-group-student', $group)}}" method="POST">
        @csrf
        @method('POST')

        <div class="flex my-5 rounded-xl bg-white shadow-xl w-max mx-auto p-3 items-center">

            <div class="inline-flex space-x-2">
                @if(empty($students))
                    <label for="student_id" class="block mb-1 text-gray-600 font-semibold p-2">Додади ученик
                        <select name="student_id" class="rounded-xl bg-gray-100 p-1">
                            @foreach($students as $student)
                                <option value="{{$student->id}}">{{ucwords($student->name)}}</option>
                            @endforeach
                        </select>
                    </label>

                    <button
                        class="w-max bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 rounded-xl px-3"
                        type="submit">
                        Додади
                    </button>
                @else
                    <p class="block w-full py-4 px-8">Нема слободни ученици!</p>
                @endif

            </div>

        </div>
    </form>

@stop
