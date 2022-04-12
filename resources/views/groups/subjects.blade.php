@extends('layouts.master')

@section('content')

    <div class="container my-5 rounded-xl bg-white">

        <div class="table w-full ml-9 py-3">
            <div class="table-header-group">

                <div class="table-column-group">
                    <div class="table-column"></div>
                    <div class="table-column"></div>
                    <div class="table-column"></div>
                </div>

                <div class="table-row text-gray-600 font-semibold">
                    <div class="table-cell text-left">Предмет</div>
                    {{--                    <div class="table-cell text-left">Групи</div>--}}
                    <div class="table-cell text-left">Наставник</div>
                </div>
            </div>


            <div class="table-row-group">
                <div class="table-row">
                    <div class="table-cell py-3 text-purple-500">
                        @foreach($group->subjects as $subject)
                            <div class="table-row">
                                <a href="{{route('viewSubject', ['subject' => $subject])}}">{{ucwords($subject->name)}}</a>
                            </div>
                        @endforeach
                    </div>

                    <div class="table-cell">
                        @foreach($group->teachers as $teacher)
                            <div class="table-row">
                                <div class="table-cell">{{$teacher->name}}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container rounded-xl bg-white p-3">
        <div class="w-max bg-purple-500 rounded-xl text-md p-2">
            <a href="{{route('add-group-subject', $group)}}">Додади нов предмет</a>
        </div>
    </div>

@endsection
