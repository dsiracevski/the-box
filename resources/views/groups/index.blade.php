@extends('layouts.master')

@section('content')

    {{--@dd($unassignedUsers)--}}
    <div class="container my-5 rounded-xl bg-white">

        <div class="table w-full ml-9 py-3">
            <div class="table-header-group ">
                <div class="table-row text-gray-600 font-semibold">
                    <div class="table-cell text-left">Име</div>
                    <div class="table-cell text-left">Ученици</div>
                    <div class="table-cell text-left">Предмети</div>
                    <div class="table-cell text-left">Наставници</div>
                </div>
            </div>
            <div class="table-row-group ">
                @foreach($groups as $group)
                    <div class="table-row">
                        <div class="table-cell py-3 text-purple-500"><a href="{{route('viewGroup', ['group' => $group])}}">{{ucwords($group->name)}}</a></div>
                        <div class="table-cell"><a href="{{route('viewGroupStudents', ['group' => $group])}}">{{$group->students_count}}</a></div>
                        <div class="table-cell"><a href="{{route('viewGroupSubjects', ['group' => $group])}}">{{$group->subjects_count}}</a></div>
                        <div class="table-cell"><a href="{{route('viewGroupTeachers', ['group' => $group])}}">{{$group->teachers_count}}</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container rounded-xl bg-white p-3">
        <div class="w-max bg-purple-500 rounded-xl text-md p-2">
            <a href="{{route('createGroup')}}">Додади нова група</a>
        </div>
    </div>

@endsection
