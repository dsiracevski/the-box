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
                </div>
            </div>

            <div class="table-row-group">
                @foreach($teachers as $user)
{{--                    @dd($user)--}}
                    <div class="table-row">

                        <div class="table-cell py-3 text-purple-500"><a href="{{route('viewUser', [$user])}}">{{$user->name}}</a></div>
{{--                        @foreach()--}}

{{--                        @endforeach--}}
{{--                        <div class="table-cell">{{$user->pivot}}</div>--}}
                        <div class="table-cell">{{$user->email}}</div>
                        <div class="table-cell">{{$user->gender}}</div>
                        <div class="table-cell">{{$user->age}}</div>                                                       {{--                                class="bg-yellow-400 rounded-xl px-2 py-2 shadow-2xl">Промени</a></div>--}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>



@endsection
