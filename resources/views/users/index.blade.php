@extends('layouts.master')

@section('content')

    <div class="container my-5 rounded-xl bg-white">
        <div class="table w-full px-10 py-3">
            <div class="table-caption py-3 flex text-center text-xl">Ученици</div>
            <div class="table-header-group ">
                <div class="table-row text-gray-600 font-semibold">
                    {{--                    <div class="table-cell text-left">#</div>--}}
                    <div class="table-cell text-left">Име</div>
                    <div class="table-cell text-left">Email</div>
                    <div class="table-cell text-left">Улога</div>
                    <div class="table-cell text-left">Пол</div>
                    <div class="table-cell text-left">Возраст</div>
                    <div class="table-cell text-left">Група</div>
                    {{--                    <div class="table-cell text-center"></div>--}}
                </div>
            </div>
            <div class="table-row-group">
                @foreach($students as $user)
                    <div class="table-row">
                        {{--                @dd($user)--}}
                        {{--                        <div class="table-cell py-3">{{$loop->iteration}}</div>--}}
                        <div class="table-cell py-3 text-purple-500"><a
                                href="{{route('viewUser', [$user])}}">{{$user->name}}</a></div>
                        <div class="table-cell">{{$user->email}}</div>
                        <div class="table-cell">{{$user->role}}</div>
                        <div class="table-cell">{{$user->gender}}</div>
                        <div class="table-cell">{{$user->age}}</div>
                        <div class="table-cell" class="capitalize">{{$user->group->name}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container my-5 rounded-xl bg-white">
        <div class="table w-full px-10 py-3">
            <div class="table-caption py-3 flex text-center text-xl">Наставници</div>
            <div class="table-header-group ">
                <div class="table-row text-gray-600 font-semibold">
                    {{--                    <div class="table-cell text-left">#</div>--}}
                    <div class="table-cell text-left">Име</div>
                    <div class="table-cell text-left">Email</div>
                    <div class="table-cell text-left">Улога</div>
                    <div class="table-cell text-left">Пол</div>
                    <div class="table-cell text-left">Возраст</div>
                    <div class="table-cell text-left">Група</div>
                    {{--                    <div class="table-cell text-center"></div>--}}
                </div>
            </div>
            <div class="table-row-group">
                @foreach($teachers as $user)
                    <div class="table-row">
{{--                                        @dd($user)--}}
                        {{--                        <div class="table-cell py-3">{{$loop->iteration}}</div>--}}
                        <div class="table-cell py-3 text-purple-500"><a
                                href="{{route('viewUser', [$user])}}">{{$user->name}}</a></div>
                        <div class="table-cell">{{$user->email}}</div>
                        <div class="table-cell">{{$user->role}}</div>
                        <div class="table-cell">{{$user->gender}}</div>
                        <div class="table-cell">{{$user->age}}</div>
                        <div class="table-cell" class="capitalize">{{$user->group->name}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

{{--    @dd($unassignedUsers)--}}

    <div class="container my-5 rounded-xl bg-white">
        <div class="table w-full px-10 py-3">
            <div class="table-caption py-3 flex text-center text-xl">Ученици без групи</div>
            <div class="table-header-group ">
                <div class="table-row text-gray-600 font-semibold">
                    <div class="table-cell text-left">Име</div>
                    <div class="table-cell text-left">Email</div>
                    <div class="table-cell text-left">Улога</div>
                    <div class="table-cell text-left">Пол</div>
                    <div class="table-cell text-left">Возраст</div>
                </div>
            </div>


            <div class="table-row-group">
                @foreach($unassignedStudents as $user)
                    <div class="table-row">
                        <div class="table-cell py-3 text-purple-500"><a
                                href="{{route('viewUser', [$user])}}">{{$user->name}}</a></div>
                        <div class="table-cell">{{$user->email}}</div>
                        <div class="table-cell">{{$user->role}}</div>
                        <div class="table-cell">{{$user->gender}}</div>
                        <div class="table-cell">{{$user->age}}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



@endsection
