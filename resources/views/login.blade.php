@extends('layouts.main')

@section('content')
    <h1>Войдите</h1>

    <form method="post">
        @csrf

        <div>
            <input type="text" name="email" value="{{ old('email') }}">
            @error('email')
            <small>{{$message}}</small>
            @enderror
        </div>

        <div>
            <input type="password" name="password" value="{{ old('password') }}">
            @error('password')
            <small>{{$message}}</small>
            @enderror
        </div>

        <button>Войти</button>

    </form>

@endsection
