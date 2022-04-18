@extends('layouts.master')

@section('content')

    {{--    @dd($exercise)--}}

    <div class="container w-max my-5 p-3 rounded-xl bg-white align-middle mx-auto shadow-xl">
        <p class="text-xl">Детали за <span class="text-purple-500">{{ucwords($exercise->name)}}</span></p>
    </div>

    <div class="container my-5 rounded-xl bg-white">

        <div class="table w-full m-auto px-4 py-3 text-center">

            <div class="table-header-group ">

                <div class="table-row text-gray-600 font-semibold">

                    <div class="table-cell ">Вид</div>
                    <div class="table-cell ">Реченици</div>
                    <div class="table-cell ">Кандидати</div>
                    <div class="table-cell ">Автор</div>
                </div>
            </div>
            <div class="table-row-group ">
                <div class="table-row">
                    <div class="table-cell">{{$exercise->type}}</div>
                    <div class="table-cell">
                        <a href="{{route('sentences-show', [$exercise->id])}}">{{$exercise->sentences_count}}</a>
                    </div>
                    <div class="table-cell">
                        <a href="{{route('candidates-show', [$exercise->id])}}">{{$exercise->candidates_count}}</a>
                    </div>
                    <div class="table-cell">{{$exercise->author->name}}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container rounded-xl p-3 mb-5">
        <div class="w-max bg-purple-400 shadow-2xl rounded-xl text-md p-2">
            <a href="{{route('create-exercise')}}">Додади реченици</a>
        </div>
    </div>
    {{--    Add accordion for sentences/candidates/etc...--}}
@endsection
