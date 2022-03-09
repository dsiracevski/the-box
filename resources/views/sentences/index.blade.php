@extends('layouts.master')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Реченица</th>
            <th>Клучен збор</th>
            <th>Автор</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sentences as $sentence)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$sentence->body}}</td>
                <td>{{$sentence->keyword}}</td>
                <td>{{$sentence->author->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
