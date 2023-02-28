@extends('layouts.main')

@section('content')
    <h1>Регистрация</h1>

    <form method="post" action="{{ route('register') }}">
        @csrf

        <div>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Имя">
            @error('name')
            <small>{{$message}}</small>
            @enderror
        </div>
        <div>
            <input type="text" name="email" value="{{ old('email') }}" placeholder="email">
            @error('email')
            <small>{{$message}}</small>
            @enderror
        </div>

        <div>
            <input type="password" name="password" value="{{ old('password') }}" placeholder="password">
            @error('password')
            <small>{{$message}}</small>
            @enderror
        </div>

        <button>Добавить</button>

    </form>

@endsection
