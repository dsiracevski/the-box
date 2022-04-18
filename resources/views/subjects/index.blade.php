@extends('layouts.master')

@section('content')

    <div class="container my-5 rounded-xl bg-white">

        <div class="table w-full ml-9 py-3">
            <div class="table-header-group ">

                <div class="table-row text-gray-600 font-semibold">

                    <div class="table-cell text-left">Предмет</div>
                    <div class="table-cell text-left">Групи</div>
                    <div class="table-cell text-left">Наставник</div>
                </div>
            </div>
            <div class="table-row-group ">

                @foreach($subjects as $subject)
                    <div class="table-row">

                        <div class="table-cell py-3 text-purple-500">
                            <a href="{{route('viewSubject', ['subject' => $subject])}}">{{ucwords($subject->name)}}</a>
                        </div>

                        @foreach($subject->groups as $group)
                            <div class="table-cell">{{$group->name}}</div>
                        @endforeach

                        @foreach($subject->teachers as $teacher)
                            <div class="table-cell">{{$teacher->name}}</div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
