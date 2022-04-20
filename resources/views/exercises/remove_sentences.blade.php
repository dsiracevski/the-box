@extends('layouts.master')

@section('content')

    <form action="{{route('detach-sentences', ['exercise' => $exercise->id])}}" method="POST">
        @csrf
        @method('DELETE')


        <div class="flex my-5 rounded-xl bg-white shadow-xl w-max mx-auto p-3 items-center">

            <div class="inline-flex space-x-2">
                @if(!empty($sentences))
                    <label for="student_id" class="block mb-1 text-gray-600 font-semibold p-2">Додади реченица
                        @foreach($sentences as $sentence)
                            <div>
                                {{$sentence->id}}
                            </div>
                            <div>
                                <label for="{{$sentence->id}}">{{$sentence->body}}</label>
                                <input type="checkbox" value="{{$sentence->id}}" id="{{$sentence->id}}" name="sentence[]">
                            </div>
                        @endforeach
                    </label>

                    <div>
                        <button
                            class="w-max bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 rounded-xl px-3"
                            type="submit">
                            Отстрани
                        </button>
                    </div>
                @else
                    <p class="block w-full py-4 px-8">Нема достапни реченици, <a href="{{ route('create-sentence') }}">додадете нова</a>!</p>
                @endif

            </div>

        </div>
    </form>

@endsection
