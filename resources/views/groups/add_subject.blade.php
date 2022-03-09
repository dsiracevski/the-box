@extends('layouts.master')

@section('content')

    <div class="container w-max my-5 p-3 rounded-xl bg-white align-middle mx-auto shadow-xl">
        <p class="text-xl">Додади предмет за <span class="text-purple-500">{{ucwords($group->name)}}</span></p>
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

        <form action="{{route('storeSubject', [$group])}}" method="POST">
            @csrf

            <div class="flex my-5 rounded-xl bg-white shadow-xl w-max mx-auto p-3 items-center">

                    <div class="inline-flex space-x-2">
                        <label for="subject_id" class="block mb-1 text-gray-600 font-semibold p-2">Предмет
                            <select name="subject_id" class="rounded-xl bg-gray-100 p-1">
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{ucwords($subject->name)}}</option>
                                @endforeach
                            </select>
                        </label>

                        <label for="teacher_id" class="block mb-1 text-gray-600 font-semibold p-2">Наставник
                            <select name="teacher_id" class="rounded-xl bg-gray-100 p-1">
                                @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{ucwords($teacher->name)}}</option>
                                @endforeach
                            </select>
                        </label>

                        <button
                            class="w-max bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 rounded-xl text-lg px-3">
                            Додади
                        </button>
                    </div>

                </div>
        </form>
@stop
