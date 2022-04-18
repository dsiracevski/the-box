@extends('layouts.master')

@section('content')

    <div class="container my-5 rounded-xl bg-white">
        <div class="table w-full ml-9 py-3">
            <div class="table-header-group ">
                <div class="table-row text-gray-600 font-semibold">
                    <div class="table-cell text-left">#</div>
                    <div class="table-cell text-left">Реченица</div>
                    <div class="table-cell text-left">Клучен збор</div>
                    <div class="table-cell text-left">Автор</div>
                </div>
            </div>


            <div class="table-row-group">

                @foreach($sentences as $sentence)
                    <div class="table-row">
                        <div class="table-cell p-1">{{$loop->iteration}}</div>
                        <div class="table-cell">{!!Str::of($sentence->body)->replaceFirst($sentence->keyword, "<b>" . $sentence->keyword . "</b>")!!}</div>
                        <div class="table-cell">{{$sentence->keyword}}</div>
                        <div class="table-cell">{{$sentence->author->name}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container rounded-xl bg-white p-3 mb-5">
        <div class="w-max bg-purple-500 rounded-xl text-md p-2">
            <a href="{{route('create-sentence')}}">Додади нова реченица</a>
        </div>
    </div>

@endsection
