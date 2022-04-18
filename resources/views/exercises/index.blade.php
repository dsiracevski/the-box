@extends('layouts.master')

@section('content')


    <div class="container my-5 rounded-xl bg-white">

        <div class="table w-full ml-9 py-3">

            <div class="table-header-group ">

                <div class="table-row text-gray-600 font-semibold">

                    <div class="table-cell text-left">#</div>
                    <div class="table-cell text-left">Вежба</div>
                    <div class="table-cell text-left">Вид на вежба</div>
                    <div class="table-cell text-left">Реченици</div>
                    <div class="table-cell text-left">Кандидати</div>
                    <div class="table-cell text-left">Автор</div>
                </div>
            </div>
            <div class="table-row-group ">
                @foreach($exercises as $exercise)
                    <div class="table-row">
                        <div class="table-cell">{{$loop->iteration}}</div>
                        <div class="table-cell text-purple-500"><a href="{{route('show-exercise', $exercise)}}">{{$exercise->name}}</a></div>
                        <div class="table-cell">{{$exercise->type}}</div>
                        <div class="table-cell">
                            <a href="{{route('sentences-show', [$exercise->id])}}">{{$exercise->sentences_count}}</a>
                        </div>
                        <div class="table-cell">
                            <a href="{{route('candidates-show', [$exercise->id])}}">{{$exercise->candidates_count}}</a>
                        </div>
                        <div class="table-cell">{{$exercise->author->name}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container rounded-xl p-3 mb-5">
        <div class="w-max bg-purple-400 shadow-2xl rounded-xl text-md p-2">
            <a href="{{route('create-exercise')}}">Нова вежба</a>
        </div>
    </div>


@endsection
