@extends('layouts.master')

@section('content')

    <div class="container my-5 rounded-xl bg-white">

        <div class="table w-full ml-9 py-3">
            <div class="table-header-group ">
                <div class="table-row text-gray-600 font-semibold">
                    <div class="table-cell text-left">Име</div>
                    <div class="table-cell text-left">Email</div>
                    <div class="table-cell text-left">Пол</div>
                    <div class="table-cell text-left">Возраст</div>
                </div>
            </div>

            <div class="table-row-group">
                @foreach($students as $user)
                    <div class="table-row">

                        <div class="table-cell py-3 text-purple-500"><a
                                href="{{route('viewUser', [$user])}}">{{$user->name}}</a></div>
                        <div class="table-cell">{{$user->email}}</div>
                        <div class="table-cell">{{$user->gender}}</div>
                        <div class="table-cell">{{$user->age}}</div>
                        <form action="{{route('remove-group-student', [$group, 'studentId' => $user->id])}}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="studentId" value="{{$user->id}}">
                            <button type="submit" class="bg-red-500 rounded-xl p-2 w-max">Отстрани</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="table-row">

            </div>
        </div>
    </div>

    <div class="container rounded-xl bg-white p-3">
        <div class="w-max bg-purple-500 rounded-xl text-md p-2">
            <a href="{{route('add-group-student', $group)}}">Додади нов ученик</a>
        </div>
    </div>



@endsection
