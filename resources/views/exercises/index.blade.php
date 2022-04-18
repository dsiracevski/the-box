@extends('layouts.master')

@section('content')

    <table class="table-auto">
        <thead>
        <tr>
            <th>#</th>
            <th>Вежба</th>
            <th>Вид на вежба</th>
            <th>Реченици</th>
            <th>Кандидати</th>
            <th>Автор</th>
        </tr>
        </thead>
        <tbody>
        @foreach($exercises as $exercise)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$exercise->name}}</td>
                <td>{{$exercise->type}}</td>
                <td>
                    <a href="{{route('allSentences', [$exercise->id])}}">{{$exercise->sentences_count}}</a>
                </td>
                <td>
                    <a href="{{route('allCandidates', [$exercise->id])}}">{{$exercise->candidates_count}}</a>
                </td>
                <td>{{$exercise->author->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
