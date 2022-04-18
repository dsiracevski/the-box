@extends('layouts.master')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Кандидат</th>
            <th>Група</th>
            <th>Завршена</th>
            <th>Резултат</th>
        </tr>
        </thead>
        <tbody>
        {{--                @dd($candidates)--}}
        @foreach($candidates as $candidate)
{{--                                    @dd($candidate)--}}
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$candidate->name}}</td>
                <td>{{$candidate->group->name}}</td>
                <td>@if($candidate->pivot_is_completed)
                        Да
                    @else
                        Не
                    @endif</td>
                <td>{{$candidate->pivot->score}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
