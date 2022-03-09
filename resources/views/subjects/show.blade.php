@extends('layouts.master')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th>Предмет</th>
            <th>Број на групи</th>
        </tr>
        </thead>
        <tbody>
            <tr>
{{--                @dd($subject)--}}
                <td>{{ucwords($subject->name)}}</td>
                <td>{{$subject->groups_count}}</td>
            </tr>
        </tbody>
    </table>



@endsection
