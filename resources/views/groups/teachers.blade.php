@extends('layouts.master')

@section('content')

    <div class="container w-max my-5 p-3 rounded-xl bg-white align-middle mx-auto shadow-xl">
        <p class="text-xl">Наставници за <span class="text-purple-500">{{ucwords($group->name)}}</span></p>
    </div>

    <div class="container my-5 rounded-xl bg-white shadow-xl">

        <div class="table w-full ml-9 py-3">
            <div class="table-header-group ">
                <div class="table-row text-gray-600 font-semibold">
                    <div class="table-cell text-left">Име</div>
{{--                    <div class="table-cell text-left">Предмет</div>--}}
                    <div class="table-cell text-left">Email</div>
                    <div class="table-cell text-left">Пол</div>
                    <div class="table-cell text-left">Возраст</div>
                    <div class="table-cell text-left">Предмет</div>
                </div>
            </div>

            <div class="table-row-group">
                @foreach($teachers as $user)
{{--                    @dd($user->subjects)--}}
                    <div class="table-row">

                        <div class="table-cell py-3 text-purple-500"><a href="{{route('viewUser', [$user])}}">{{$user->name}}</a></div>
                        <div class="table-cell">{{$user->email}}</div>
                        <div class="table-cell">{{$user->gender}}</div>
                        <div class="table-cell">{{$user->age}}</div>
                        <div class="table-cell">

                            @foreach($user->subjects as $subject)
                                <div class="table-row">{{$subject->name}}</div>
                            @endforeach

                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>



@endsection
