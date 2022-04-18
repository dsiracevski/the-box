@extends('layouts.master')

@section('content')


    <div class="container w-max my-5 p-3 rounded-xl bg-white align-middle mx-auto shadow-xl">
        <p class="text-xl">Реченици за <span class="text-purple-500">{{ucwords($exercise->name)}}</span></p>
    </div>

    <div class="container my-5 rounded-xl bg-white">
        <div class="table w-full px-5 py-3 ">
            <div class="table-header-group">
                <div class="table-row text-gray-600 font-semibold">
                    <div class="table-cell text-left">#</div>
                    <div class="table-cell text-left">Реченица</div>
                    <div class="table-cell text-left">Клучен збор</div>
                    <div class="table-cell text-left">Автор</div>
                    <div class="table-cell">aa</div>
                </div>
            </div>
            <div class="table-row-group">
                @foreach($sentences as $sentence)
                    <div class="table-row text-left">
                        <div class="table-cell py-2 px-2">{{$loop->iteration}}</div>
                        <div
                            class="table-cell">{!!Str::of($sentence->body)->replace($sentence->keyword, "<b>" . $sentence->keyword . "</b>")!!}
                        </div>
                        <div class="table-cell">{{$sentence->keyword}}</div>
                        <div class="table-cell">{{$sentence->author->name}}</div>
                        <div class="table-cell">
                            <button type="submit"
                                    class="inline-flex items-center justify-center h-8 px-4 text-sm rounded-lg shadow-md bg-blue-500 uppercase">
                                <a href="{{route('edit-sentence', [$exercise, $sentence])}}">Промени</a></button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
