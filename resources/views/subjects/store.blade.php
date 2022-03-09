@extends('layouts.master')

@section('content')
    <div class="h-screen bg-gradient-to-br from-gray-50 to-gray-500-600 flex justify-center items-center w-full">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('storeSubject')}}" method="POST">
            @csrf

            <div class="bg-white px-10 py-8 rounded-xl w-screen shadow-md max-w-sm">
                <div class="space-y-4">
                    <h1 class="text-center text-2xl font-semibold text-gray-600">Нов предмет</h1>
                    <div>
                        <label for="name" class="block mb-1 text-gray-600 font-semibold">Име</label>
                        <input type="text" id="name" name="name"
                               class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full"/>
                    </div>
                    <button
                        class="mt-4 w-full bg-gradient-to-tr from-blue-600 to-indigo-600 text-indigo-100 py-2 rounded-md text-lg tracking-wide">
                        Прати
                    </button>
                </div>
        </form>
    </div>
@stop
