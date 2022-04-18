@extends('layouts.master')

@section('content')

    <div class="container my-5 rounded-xl bg-white">

        <div class="table w-full ml-9 py-3">
            <div class="table-header-group ">
                <div class="table-row text-gray-600 font-semibold">
                    <div class="table-cell text-left">Реченица</div>
                    <div class="table-cell text-left">Клучен збор</div>
                    <div class="table-cell text-left"></div>
                    <div class="table-cell text-left"></div>
                </div>
            </div>

{{--            @dd($sentence)--}}
            <div class="table-row-group ">
                <div class="table-row">
                    <div class="table-cell py-3 text-purple-500">{{$sentence->body}}</div>
                    <div class="table-cell">{{$sentence->keyword}}</div>
                    <div class="table-cell">@foreach($body as $word)
<p>{{$word}}</p>
                        @endforeach</div>
                    <div class="table-cell"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
